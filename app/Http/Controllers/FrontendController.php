<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Mail\ContactMail;
use App\Mail\ApplyCareerMail;
use Illuminate\Support\Facades\Mail;
use Storage;
use App\Post;
use App\ProgramTime;
use Carbon\Carbon;
use App\Program;
use App\ProgramEposides;
use App\User;
use App\Slider;
use App\FeatureVideo;
use App\Category;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $posts = Post::lightSelection()->approved()->where('home_page',1)->orderBy('id','desc')->limit(3)->get();
    	$videos = FeatureVideo::where('is_home',1)->orderBy('id','desc')->limit(6)->get();
    	$soonPosts = Post::lightSelection()->approved()->where('home_page_soon',1)->orderBy('id','desc')->limit(3)->get();
		$slides = Slider::where('active','=',1)->get();
		$dayOfWeek = Carbon::now()->dayOfWeek;
        $currentShow = $this->getShow($dayOfWeek,true);
		$notInIds = []; 
		$nextShow = $this->getShow($dayOfWeek);
		if(!$nextShow){
			$nextShow = $this->getShow($dayOfWeek+1);
		}
		if($nextShow){
			$notInIds[] = $nextShow->id;
		}
		$upcommingShow = $this->getShow($dayOfWeek,false,$notInIds);
		if(!$upcommingShow){
			$upcommingShow = $this->getShow($dayOfWeek+1,false,$notInIds);			
		}
				
		return view('frontend.index',compact('slides','posts', 'videos', 'soonPosts','currentShow','nextShow','upcommingShow'));
    }

    public function search(Request $request)
    {
        $programs = Program::approved();
        if ($request->input('search')) {
            $key = $request->input('search');
            /*$key = str_replace("\u","'\\\\\\\\u'",$key);
            $key = str_replace("'","",$key);*/
            //dd($key);
            $programs = $programs->where('title', 'like', "%".$key."%");
            $programs = $programs->OrWhere('description', 'like', "%".$key."%");
        }
        $programs = $programs->orderBy('ordering','asc')->get();
        return view('frontend.programs',compact('programs'));
    }

	public function getShow($dayOfWeek,$is_current=false,$notInIds=[])
	{
		$programTime = ProgramTime::with(['program'=>function($query){
			//$query->where('status',1);
		}])->where('day',$dayOfWeek);
		
		if($is_current){
			return $programTime->where('show_at','<=',Carbon::now()->format('H:i'))->orderBy('show_at','desc')->first();
		}
		if($dayOfWeek == Carbon::now()->dayOfWeek){
			$programTime->where('show_at','>',Carbon::now()->format('H:i'));
		}
		return $programTime->whereNotIn('id',$notInIds)->orderBy('show_at','asc')->first();	
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
		$programs = Program::approved()->orderBy('ordering','asc')->get();
		return view('frontend.programs',compact('programs'));
	}	
	
	public function programDetails($slug)
	{
		$program = Program::approved()->where('slug',$slug)->firstOrFail();
		$eposides = ProgramEposides::where('program_id',$program->id)->orderBy('id','desc')->paginate(9);
        $videos = FeatureVideo::where('program_id',$program->id)->orderBy('id','desc')->get();
		return view('frontend.program_details',compact('program','eposides','videos'));		
	}
	
	public function Broadcast()
	{
		$dayOfWeek = Carbon::now()->dayOfWeek;
		$broadcasts = ProgramTime::with(['program'=>function($query){
			//$query->where('status',1);
		}])->where('day',$dayOfWeek)->orderBy('show_at','desc')->get();
		$today = Carbon::now();
		$currentShow = ProgramTime::with(['program'=>function($query){
			$query->where('status',1);
		}])->where('day',$dayOfWeek)->where('show_at','<=',Carbon::now()->format('H:i'))->orderBy('show_at','desc')->first();
		
		return view('frontend.broadcast',compact('broadcasts','today','currentShow'));		
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

    public function format($show)
    {
        if($show){
            $return = [];
            $return['url'] = null;
            if($show->program){
                if($show->program->status){
                    $return['url'] = url('program_detail',$show->program->slug);
                    $return['name'] = $show->program->title;
                }else{
                    $return['name'] = $show->program->title;
                }
            }else{
                $return['name'] = $show->program_name;
            }
            $return['show_at'] = $show->show_at;
            return $return;
        }
        return null;
    }


    //--------------------------------- Mobile Api -----------------------//

    public function GetMainpagePrograms(Request $request)
    {
        $dayOfWeek = Carbon::now()->dayOfWeek;
        $currentShow = $this->getShow($dayOfWeek,true);
        $notInIds = []; 
        $nextShow = $this->getShow($dayOfWeek);
        if(!$nextShow){
            $nextShow = $this->getShow($dayOfWeek+1);
        }
        if($nextShow){
            $notInIds[] = $nextShow->id;
        }
        $upcommingShow = $this->getShow($dayOfWeek,false,$notInIds);
        if(!$upcommingShow){
            $upcommingShow = $this->getShow($dayOfWeek+1,false,$notInIds);          
        }
        $currentShow = $this->format($currentShow);
        $nextShow = $this->format($nextShow);
        $upcommingShow = $this->format($upcommingShow);

        return ['currentShow'=>$currentShow,'nextShow'=>$nextShow, 'upcommingShow'=>$upcommingShow];
    }

    public function GetPrograms(Request $request)
    {
        $programs = Program::approved()->orderBy('ordering','asc')->paginate(10);
        foreach ($programs as $program) {
            $program->title = $program->title;
            $program->about_announcer = $program->about_announcer;
            $program->description = $program->description;
            $program->show_text = $program->show_text;
            $program->repeate_text = $program->repeate_text;

        }
        return $programs;
    }
	
    public function GetProgramDetails(Request $request)
    {
        $program = Program::approved()->where('id',$request->id)->firstOrFail();
        
        $program->title = $program->title;
        $program->about_announcer = $program->about_announcer;
        $program->description = $program->description;
        $program->show_text = $program->show_text;
        $program->repeate_text = $program->repeate_text;

        $episodes = $program->episodes()->paginate(10);
        foreach ($episodes as $eposide) {
            $eposide->title = $eposide->title; 
        }
        return ['program'=>$program,'episodes'=>$episodes->appends(request()->query())];
    }

    public function GetShowSchedule(Request $request)
    {
        $dayOfWeek = Carbon::now()->dayOfWeek;
        $broadcasts = ProgramTime::with(['program'=>function($query){
            //$query->where('status',1);
        }])->where('day',$dayOfWeek)->orderBy('show_at','desc')->get();
        $today = Carbon::now();
        $currentShow = ProgramTime::with(['program'=>function($query){
//            $query->where('status',1);
        }])->where('day',$dayOfWeek)->where('show_at','<=',Carbon::now()->format('H:i'))->orderBy('show_at','desc')->first();
        
        $todayShow = [];
        foreach ($broadcasts as $k=>$broadcast) {
            $todayShow[$k]['title'] = $broadcast->program ? $broadcast->program->title:$broadcast->program_name;
            $todayShow[$k]['image'] = $broadcast->getImage();
            $todayShow[$k]['time'] = $broadcast->show_at;
            $todayShow[$k]['isLiveNow'] = ($broadcast->id == $currentShow->id)?true:false;
        }
        return ['show'=>$todayShow];

    }

}
