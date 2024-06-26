<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Imei;
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
    public function index()
    {
        $items = Blog::orderBy('id', 'desc')->take(6)->get();
        $counts = $this->getCounts();
        // dd($counts['total']);
        return view('pages.frontend.index', compact('items', 'counts'));
    }

    //blog method
    public function blog()
    {
        $items = Blog::orderBy('id', 'desc')->paginate(10);
        return view('pages.frontend.blog.blog', compact('items'));
    }

    //blog details method
    public function blogDetails($slug)
    {
        $item = Blog::where('slug', $slug)->firstOrFail(); // Fetch single item by slug
        $tags = explode(',', $item->tags); // Split tags into an array
        return view('pages.frontend.blog.details', compact('item', 'tags'));
    }

    //IMEI Check method
    public function imeiCheck()
    {
        return view('pages.frontend.imei-checker.imei-checker');
    }
}
