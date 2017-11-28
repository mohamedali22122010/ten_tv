<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Mail\ContactMail;
use App\Mail\ApplyCareerMail;
use Illuminate\Support\Facades\Mail;
use Storage;
use App\Post;
use App\Program;
use App\ProgramEposides;
use App\User;
use App\Slider;
use App\Category;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
	
	public function changeLanguage($lang)
    {
        if (array_key_exists($lang, config('laravel-translatable.languages'))) {
            Session::set('locale', $lang);
			$cookie = cookie()->forever('locale', $lang);
			return redirect()->back()->withCookie($cookie);
        }
        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$rightPost = Post::lightSelection()->approved()->where('home_page_right',1)->orderBy('id','desc')->first();
    	$leftPost = Post::lightSelection()->approved()->where('home_page_left',1)->orderBy('id','desc')->first();
    	$soonPosts = Post::lightSelection()->approved()->where('home_page_soon',1)->orderBy('id','desc')->limit(3)->get();
		$slides = Slider::where('active','=',1)->get();
        return view('frontend.index',compact('slides','rightPost','leftPost','soonPosts'));
    }
	
	public function about()
	{
		return view('frontend.about');
	}
	
	public function live()
	{
		return view('frontend.live');
	}	

	public function news()
	{
		$posts = Post::approved()->orderBy('id','desc')->get();
		return view('frontend.news',compact('posts'));
	}	
	
	public function newsDetail($slug)
	{
		$post = Post::approved()->where('slug',$slug)->firstOrFail();
		$recentPosts = Post::approved()->where('id','!=',$post->id)->orderBy('id','desc')->limit(3)->get();
		$popularPosts = Post::approved()->where('id','!=',$post->id)->inRandomOrder()->limit(4)->get();
		return view('frontend.news_detail',compact('post','recentPosts','popularPosts'));
	}	
	
	public function page($slug)
	{
		$page = Page::approved()->where('slug',$slug)->firstOrFail();
		return view('frontend.page',compact('page'));
	}
	
	public function programs()
	{
		$programs = Program::approved()->orderBy('id','desc')->get();
		return view('frontend.programs',compact('programs'));
	}	
	
	public function programDetails($slug)
	{
		$program = Program::approved()->where('slug',$slug)->firstOrFail();
		$eposides = ProgramEposides::where('program_id',$program->id)->get();
		return view('frontend.program_details',compact('program','eposides'));		
	}
	
	    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function ContactPageSubmit(Request $request)
    {
	
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
		
		$site_email = "mohamedali22122010@gmail.com";
		$site_url = "ten.tv";
		$site_title = "Ten Tv";
        
        // SEND Notification Email
        if (env('MAIL_USERNAME') != "") {
            Mail::send('mail.webmail', [
                'title' => "NEW MESSAGE FROM :" . $request->name,
                'details' => $request->message,
                'websiteURL' => $site_url,
                'websiteName' => $site_title
            ], function ($message) use ($request, $site_email, $site_title) {
                $message->from(env('NO_REPLAY_EMAIL', $request->email), $request->name);
                $message->to($site_email);
                $message->replyTo($request->email, $site_title);
                $message->subject("Contact us message");

            });
        }

        return "OK";
    }
	

}
