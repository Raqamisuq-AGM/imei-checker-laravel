<?php

namespace App\Http\Controllers\Imei;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\Imei;
use App\Models\ImeiLimit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ImeiController extends Controller
{
    //checking method
    public function checkingImei(Request $request)
    {
        $userIp = request()->ip();
        $imei = $request->input('imei');

        $user = User::where('ip', $userIp)->first();
        // dd($user->id);
        // Daily Free Limit
        $freeCredit = ImeiLimit::where('ip', $userIp)->first();
        $dailyCredit = $freeCredit->limit;

        // User Credit
        $userCredit = Credit::where('ip', $userIp)->first();
        $credit = $freeCredit->credit;


        // Define your API key, service ID, and the IMEI/SN
        $apiKey = 'fyHBj-1vGss-eRlmP-jpFD5-kYirc-WNYNm';
        // $apiKey = env('IMEI_CHECK_API ');
        $serviceId = $request->input('service_id');
        $imei = $request->input('imei');

        // Construct the API URL
        $url = "https://alpha.imeicheck.com/api/php-api/create";

        if ($dailyCredit > 0) {
            // Make the HTTP request
            $response = Http::get($url, [
                'key' => $apiKey,
                'service' => $serviceId,
                'imei' => $imei
            ]);

            // $data = $response->json();
            // dd($data);

            // Check if the request was successful
            if (isset($data['status']) && $data['status'] === 'error') {
                // Handle credit error or other errors
                toastr()->success('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                return back();
                // return redirect()->route('imei.checking.result')->with('error', $data['response']);
            } else if ($response->successful()) {
                // Decode the JSON response into an array
                $data = $response->json();

                if ($data['status'] == 'error') {
                    toastr()->success('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                    return back();
                } else {
                    $freeCredit->limit = $dailyCredit - 1;
                    $freeCredit->save();

                    $iemies = new Imei();
                    $iemies->user_id = $user->id;
                    $iemies->imei = $request->input('imei');
                    $iemies->result = isset($data['object']) ? json_encode($data['object']) : null;
                    $iemies->save();

                    Session::put('imei_result', $data);
                    return redirect()->route('imei.checking.result');
                }
            } else {
                // Handle the error, you can also log the error message
                toastr()->success('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                return back();
            }
            // return redirect()->route('imei.checking.result');
        } else if ($credit > 0) {

            // Make the HTTP request
            $response = Http::get($url, [
                'key' => $apiKey,
                'service' => $serviceId,
                'imei' => $imei
            ]);

            // Check if the request was successful
            if (isset($data['status']) && $data['status'] === 'error') {
                // Handle credit error or other errors
                toastr()->success('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                // return redirect()->route('imei.checking.result')->with('error', $data['response']);
            } else if ($response->successful()) {
                // Decode the JSON response into an array
                $data = $response->json();
                if ($data['status'] == 'error') {
                    toastr()->success('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                    return back();
                } else {
                    $userCredit->credit = $credit - 1;
                    $userCredit->save();

                    $iemies = new Imei();
                    $iemies->user_id = $user->id;
                    $iemies->imei = $request->input('imei');
                    $iemies->result = isset($data['object']) ? json_encode($data['object']) : null;
                    $iemies->save();

                    Session::put('imei_result', $data);
                    return redirect()->route('imei.checking.result');
                }
            } else {
                // Handle the error, you can also log the error message
                toastr()->success('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                return back();
            }
        } else {
            return redirect()->route('imei.out.credit');
        }
    }

    //Result method
    public function checkingResult(Request $request)
    {
        // Retrieve the data from session
        $data = Session::get('imei_result');
        if ($data) {
            return view('pages.frontend.imei-checker.checking-result', [
                'data' => $data,
                'object' => $data['object']
            ]);
        } else {
            toastr()->success('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
            return back();
            // return redirect()->route('home')->with('error', 'No data available');
        }
    }

    //Out of credit method
    public function outOfCredit(Request $request)
    {
        return view('pages.frontend.imei-checker.out-of-credit');
    }
}
