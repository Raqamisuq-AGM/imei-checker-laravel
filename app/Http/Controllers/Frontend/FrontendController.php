<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\Credit;
use App\Models\Imei;
use App\Models\ImeiLimit;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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
            $limit->limit = '3';
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
            $limit->limit = '3';
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
            $limit->limit = '3';
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
            $limit->limit = '3';
            $limit->save();

            // Create the user limit
            $credit = new Credit();
            $credit->user_id = $user->id;
            $credit->credit = '0';
            $credit->ip = $userIp;
            $credit->save();
        }

        $services = Service::all()->sortBy(function ($service) {
            return $service->price > 0;
        });
        return view('pages.frontend.imei-checker.imei-checker', compact('services'));
    }

    //buy credit Check method
    public function buyCredit()
    {

        // Check if the user is logged in
        if (!auth()->check()) {
            // Redirect to the login page if the user is not logged in
            return redirect()->route('login');
        }

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
            $limit->limit = '3';
            $limit->save();

            // Create the user limit
            $credit = new Credit();
            $credit->user_id = $user->id;
            $credit->credit = '0';
            $credit->ip = $userIp;
            $credit->save();
        }
        return view('pages.frontend.credit.buy');
    }

    public function addFund(Request $request)
    {

        // Check if the user is logged in
        if (!auth()->check()) {
            // Redirect to the login page if the user is not logged in
            return redirect()->route('login');
        }

        $request->validate([
            'fund-amount' => 'required|numeric|min:3|max:500',
        ]);

        // Store the validated amount in the session
        $amount = $request->input('fund-amount');
        $request->session()->put('fund-amount', $amount);

        return redirect()->route('checkout');
    }

    //checkout method
    public function checkout(Request $request)
    {
        if ($request->session()->has('fund-amount')) {
            return view('pages.frontend.checkout.checkout');
        } else {
            return redirect()->route('index');
        }
    }

    //contact us message submit method
    public function contactUsSubmit(Request $request)
    {
        // Validate the request input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Handle validation failures
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contactMessage = new ContactMessage();
        $contactMessage->name = $request->input('name');
        $contactMessage->email = $request->input('email');
        $contactMessage->subject = $request->input('subject');
        $contactMessage->message = $request->input('message');
        $contactMessage->save();

        // Send the messages via email
        Mail::to('superusercheckimeipro@gmail.com')->send(new ContactEmail($request->input('name'), $request->input('email'), $request->input('subject'), $request->input('message')));

        //return success message with tostr
        toastr()->success('Your message submitted successfully. We will contact you soon', 'success', ['timeOut' => 5000, 'closeButton' => true]);
        return redirect()->route('index');
    }

    public function aboutUs()
    {
        return view('pages.frontend.about-us.about-us');
    }

    public function contactUs()
    {
        return view('pages.frontend.contact-us.contact-us');
    }

    public function privacyPolicy()
    {
        return view('pages.frontend.privacy-policy.privacy-policy');
    }

    public function termsCondition()
    {
        return view('pages.frontend.terms-condition.terms-condition');
    }

    public function faq()
    {
        return view('pages.frontend.faq.faq');
    }
}
