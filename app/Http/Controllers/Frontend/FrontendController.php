<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Credit;
use App\Models\Imei;
use App\Models\ImeiLimit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FrontendController extends Controller
{

    public function getCounts()
    {
        $totalCount = Imei::count();
        $thisMonthCount = Imei::whereYear('created_at', '=', Carbon::now()->year)
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->count();
        $thisWeekCount = Imei::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();
        $todayCount = Imei::whereDate('created_at', Carbon::today())
            ->count();

        return [
            'total' => $totalCount,
            'this_month' => $thisMonthCount,
            'this_week' => $thisWeekCount,
            'today' => $todayCount,
        ];
    }

    //index method
    public function index(Request $request)
    {
        $userIp = request()->ip();
        $user = User::where('ip', $userIp)->first();
        if ($user == null) {
            // Create the user
            $user = new User();
            $user->ip = $userIp;
            $user->save();

            // Create the user limit
            $limit = new ImeiLimit();
            $limit->user_id = $user->id;
            $limit->ip = $userIp;
            $limit->limit = '5';
            $limit->save();

            // Create the user limit
            $credit = new Credit();
            $credit->user_id = $user->id;
            $credit->ip = $userIp;
            $credit->credit = '0';
            $credit->save();
        }
        $items = Blog::orderBy('id', 'desc')->take(6)->get();
        $counts = $this->getCounts();
        return view('pages.frontend.index', compact('items', 'counts'));
    }

    //blog method
    public function blog()
    {
        $userIp = request()->ip();
        $user = User::where('ip', $userIp)->first();
        if ($user == null) {
            // Create the user
            $user = new User();
            $user->ip = $userIp;
            $user->save();

            // Create the user limit
            $limit = new ImeiLimit();
            $limit->user_id = $user->id;
            $limit->ip = $userIp;
            $limit->limit = '5';
            $limit->save();

            // Create the user limit
            $credit = new Credit();
            $credit->user_id = $user->id;
            $credit->credit = '0';
            $credit->ip = $userIp;
            $credit->save();
        }
        $items = Blog::orderBy('id', 'desc')->paginate(10);
        return view('pages.frontend.blog.blog', compact('items'));
    }

    //blog details method
    public function blogDetails($slug)
    {
        $userIp = request()->ip();
        $user = User::where('ip', $userIp)->first();
        if ($user == null) {
            // Create the user
            $user = new User();
            $user->ip = $userIp;
            $user->save();

            // Create the user limit
            $limit = new ImeiLimit();
            $limit->user_id = $user->id;
            $limit->ip = $userIp;
            $limit->limit = '5';
            $limit->save();

            // Create the user limit
            $credit = new Credit();
            $credit->user_id = $user->id;
            $credit->credit = '0';
            $credit->ip = $userIp;
            $credit->save();
        }
        $item = Blog::where('slug', $slug)->firstOrFail(); // Fetch single item by slug
        $tags = explode(',', $item->tags); // Split tags into an array
        return view('pages.frontend.blog.details', compact('item', 'tags'));
    }

    //IMEI Check method
    public function imeiCheck()
    {
        $userIp = request()->ip();
        $user = User::where('ip', $userIp)->first();
        if ($user == null) {
            // Create the user
            $user = new User();
            $user->ip = $userIp;
            $user->save();

            // Create the user limit
            $limit = new ImeiLimit();
            $limit->user_id = $user->id;
            $limit->ip = $userIp;
            $limit->limit = '5';
            $limit->save();

            // Create the user limit
            $credit = new Credit();
            $credit->user_id = $user->id;
            $credit->credit = '0';
            $credit->ip = $userIp;
            $credit->save();
        }
        return view('pages.frontend.imei-checker.imei-checker');
    }
}
