<?php

namespace App\Http\Controllers\Imei;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\Imei;
use App\Models\ImeiLimit;
use App\Models\Service;
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
        $serviceId = $request->input('service_id');
        // get the user
        $user = User::where('ip', $userIp)->first();
        // get User Credit/fund
        $userCredit = Credit::where('ip', $userIp)->first();
        $userFund = $userCredit->credit;
        // get the service and service price
        $service = Service::where('service_id', $request->input('service_id'))->first();
        $servicePrice = $service->price;
        // Define your API key
        $apiKey = 'tNhtv-7BWra-UwD4Q-dPpET-r7om7-EBKq7';
        // Construct the API URL
        $url = "https://alpha.imeicheck.com/api/php-api/create";

        if ($servicePrice == '0') {
            $response = Http::get($url, [
                'key' => $apiKey,
                'service' => $serviceId,
                'imei' => $imei
            ]);

            $data = $response->json();

            // Check if the request was successful
            if (isset($data['status']) && $data['status'] === 'error') {
                // Handle credit error or other errors
                toastr()->warning('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                return back();
                // return redirect()->route('imei.checking.result')->with('error', $data['response']);
            } else if (isset($data['status']) && $data['status'] === 'failed') {
                toastr()->warning('Mobile not found', ['timeOut' => 5000, 'closeButton' => true]);
                return back();
            } else if ($response->successful()) {
                if ($data['status'] == 'error') {
                    toastr()->warning('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                    return back();
                } else if ($data['status'] === 'failed') {
                    toastr()->warning('Mobile not found', ['timeOut' => 5000, 'closeButton' => true]);
                    return back();
                } else {

                    $iemies = new Imei();
                    $iemies->user_id = $user->id;
                    $iemies->imei = $request->input('imei');
                    $iemies->result = isset($data['object']) ? json_encode($data['object']) : null;
                    $iemies->save();

                    Session::put('imei_result', $data);
                    return redirect()->route('imei.checking.result');
                }
            } else {
                toastr()->warning('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                return back();
            }
        } else {
            if ($userFund > 0) {

                $response = Http::get($url, [
                    'key' => $apiKey,
                    'service' => $serviceId,
                    'imei' => $imei
                ]);

                $data = $response->json();

                // Check if the request was successful
                if (isset($data['status']) && $data['status'] === 'error') {
                    // Handle credit error or other errors
                    toastr()->warning('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                    return back();
                    // return redirect()->route('imei.checking.result')->with('error', $data['response']);
                } else if (isset($data['status']) && $data['status'] === 'failed') {
                    toastr()->warning('Mobile not found', ['timeOut' => 5000, 'closeButton' => true]);
                    return back();
                } else if ($response->successful()) {
                    if ($data['status'] == 'error') {
                        toastr()->warning('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                        return back();
                    } else if ($data['status'] === 'failed') {
                        toastr()->warning('Mobile not found', ['timeOut' => 5000, 'closeButton' => true]);
                        return back();
                    } else {

                        $userCredit->credit = $userFund - $servicePrice;
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
                    toastr()->warning('Something went wrong, please try again later', ['timeOut' => 5000, 'closeButton' => true]);
                    return back();
                }
            } else {
                return redirect()->route('imei.out.credit');
            }
        }
    }

    //Result method
    public function checkingResult(Request $request)
    {
        // Retrieve the data from session
        $data = Session::get('imei_result');
        $services = Service::all()->sortBy(function ($service) {
            return $service->price > 0;
        });
        if ($data) {
            return view('pages.frontend.imei-checker.checking-result', [
                'data' => $data,
                'object' => $data['object'],
                'services' => $services
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
