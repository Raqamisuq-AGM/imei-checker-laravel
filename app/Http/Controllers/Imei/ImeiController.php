<?php

namespace App\Http\Controllers\Imei;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\ImeiLimit;
use Illuminate\Http\Request;

class ImeiController extends Controller
{
    //checking method
    public function checkingImei(Request $request)
    {
        $userIp = request()->ip();
        $imei = $request->input('imei');
        // Daily Free Limit
        $freeCredit = ImeiLimit::where('ip', $userIp)->first();
        $dailyCredit = $freeCredit->limit;

        // User Credit
        $userCredit = Credit::where('ip', $userIp)->first();
        $credit = $freeCredit->credit;

        if ($dailyCredit > 0) {
            $freeCredit->limit = $dailyCredit - 1;
            $freeCredit->save();
            return redirect()->route('imei.checking.result');
        } else if ($credit) {
            $userCredit->credit = $credit - 1;
            $userCredit->save();
            return redirect()->route('imei.checking.result');
        } else {
            return redirect()->route('imei.out.credit');
        }
    }

    //Result method
    public function checkingResult(Request $request)
    {
        return view('pages.frontend.imei-checker.checking-result');
    }

    //Out of credit method
    public function outOfCredit(Request $request)
    {
        return view('pages.frontend.imei-checker.out-of-credit');
    }
}
