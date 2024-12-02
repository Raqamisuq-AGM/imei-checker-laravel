<?php

namespace App\Http\Controllers;

use App\Models\Imei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UniversalImeiCheckFreeController extends Controller
{
    //
    public function check(Request $request)
    {
        $request->validate([
            'imei' => 'required|string|max:15',
        ]);

        $imei = $request->input('imei');

        $apiUrl = "https://api.ifreeicloud.co.uk/";
        $postData = [
            "service" => 0,
            "imei" => $imei,
            "key" => "LPU-MIJ-RYI-QO7-67L-S63-X4S-KR8"
        ];

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $data = json_decode($response, true);

        // dd($data);

        if ($httpcode !== 200 || $data['success'] !== true) {
            return back()->withErrors(['error' => $data['error'] ?? "HTTP Code: $httpcode"]);
        }

        // ডেটা Imei মডেলে সেভ করা
        $imeiRecord = new Imei();
        $imeiRecord->user_id = auth()->check() ? auth()->id() : null; // যদি ইউজার লগ ইন না থাকে, null সেট করুন
        $imeiRecord->user_type = auth()->check() ? 'registered' : 'guest'; // ইউজারের টাইপ চেক করা
        $imeiRecord->imei = $imei;
        $imeiRecord->result = isset($data['object']) ? json_encode($data['object']) : null;
        $imeiRecord->save();

        // সেশনে রেজাল্ট স্টোর করা
        Session::put('imei_result', $data);

        // রিডাইরেক্ট করা রেজাল্ট পেজে
        return redirect()->route('imei.checking.result-uni');
    }

    public function checkingResultUni()
    {
        $data = Session::get('imei_result');
        if (!$data) {
            return redirect()->route('imei.check')->withErrors(['error' => 'No result found.']);
        }

        return view('pages.frontend.imei-checker.uni-check-result', ['data' => $data['object'] ?? []]);
    }
}
