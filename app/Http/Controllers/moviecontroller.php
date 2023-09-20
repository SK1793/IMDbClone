<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use App\Models\movie;
use App\Models\user;
use Filebase\Validate;
use Sweetalert2 as Swal;
use vendor\hmerritt;
use hmerritt\Imdb;
use Illuminate\support\Facades\app;
use Illuminate\Support\Facades\Session;


class moviecontroller extends Controller
{
    //

    public function template(Request $req){

        App::setlocale(Session::get('lang','en'));
        $content_name=$req['search'] ?? '';
        $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);
        return view('page.main')->with(compact('content_name','api_search'));
    }
    public function index(Request $req)
    {
            App::setlocale(''.Session::get('lang','en').'');

        $content_name=$req['search'] ?? '';
        $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);

        $thriller=Http::get("https://imdb-rest-api.herokuapp.com/api/genre/Thriller");
        list($thriller_api)=$thriller;
        $Array_thriller=json_decode($thriller);

        $mystery=Http::get("https://imdb-rest-api.herokuapp.com/api/genre/Mystery");
        list($mystery_api)=$mystery;
        $Array_mystery=json_decode($mystery);

        $crime=Http::get("https://imdb-rest-api.herokuapp.com/api/genre/Crime");
        list($crime_api)=$crime;
        $Array_crime=json_decode($crime);

        $data_basic=['api_search','content_name','Array_mystery','Array_thriller','mystery_api','thriller_api','mystery','thriller','Array_crime','crime'];

        return view('page.home',compact($data_basic))->with('api_search');
    }


    public function get_search(Request $req){
        App::setlocale(Session::get('lang','en'));

        $content_name=$req['search'] ?? '';
        $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);

        return view('page.home')->with(compact('api_search','content_name'));

    }
    public function result_search(Request $req){
        $content_name=$req['search'] ?? '';
        $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);
        App::setlocale(Session::get('lang','en'));
        return view('page.home')->with(compact('content_name','api_search'));
    }
    public function store_data($id,Request $req){
        App::setlocale(Session::get('lang','en'));
        $content_name=$req['search'];
        $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);
        $model_ar=movie::all();
        if(Session::get('user_id')!=null){

            if(strlen($id)>4){

                $model_movie=new movie;
                $model_movie->Imdb_id=$id ;
                $model_movie->user_id= Session::get('user_id','');
                $model_movie->save();
                Session::put('isAdded',"true");
                echo "<script>window.location.reload()</script>";
                return redirect()->route('movie.favourites')->with(compact('model_ar','content_name','api_search'));

            }
            }else{
                echo "<script> setTimeout({()=>
                    alert('please login to comtinue...');
                });</script>";
                return view('page.login')->with(compact('model_ar','content_name','api_search'));
            }
            return view('page.favourites')->with(compact('model_ar','content_name','api_search'));

    }
     public function remove_data($id){
        App::setlocale(Session::get('lang','en'));

        $model=movie::find($id);
        if($model){

        $model->delete();
        return redirect()->back();
        }
        return redirect()->back();
    }
    public function get_data(Request $req){

        App::setlocale(Session::get('lang','en'));
        $content_name=$req['search'] ?? '';
        $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);

        $model= new movie();
        $model_ar=movie::all();
        // $user_id=Session::get('user_id');

        return view('page.favourites')->with(compact('model_ar','content_name','api_search'));

        }
        public function get_movie_details($id,Request $req){
            App::setlocale(Session::get('lang','en'));
            $movie=new movie();
            $user=new user();
            $content_name=$req['search'] ?? '';
            $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);




         if($id!=null){
                $imdb_= new Imdb;
                $imdb_=$imdb_->film($id)['trailer'];

                if(!$imdb_==null){
                    $video_id=$imdb_['id'];
                    $api=Http::get("https://imdb-rest-api.herokuapp.com/api/livescraper/download/video/".$video_id);
                    $trailer_api=$api['Video_info'] ?? [];
                }

                $api_=Http::get("https://imdb-api.projects.thetuhin.com/title/".$id);

                echo "<script>let to=setTimeout(function(){ location.reload(); }, 2000);
                clearTimeout(to)</script>";
                return  view('page.details')->with(compact('api_','trailer_api','content_name','api_search','movie','user'));
            }

               return redirect()->refresh();

        }

        public function videos_playlist($id,Request $req){
            App::setlocale(Session::get('lang','en'));
            $content_name=$req['search'] ?? '';
            $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);
            if($id!=null){

                $imdb_= new Imdb;
                $imdb_=$imdb_->film($id)['trailer'];
                $trailer_api="";
                $selected="video";
                // echo "<pre>";
                // print_r($imdb_);

                if(!$imdb_==null)
                {
                    $video_id=$imdb_['id'];
                    $api=Http::get("https://imdb-rest-api.herokuapp.com/api/livescraper/download/video/".$video_id);
                    $trailer_api=$api['Video_info'] ?? [];
                }
                $api_=Http::get("https://imdb-api.projects.thetuhin.com/title/".$id);
                return view('page.playlist')->with(compact('api_','trailer_api','selected','content_name','api_search'));
            }
            return redirect()->back();
        }

         public function photos_playlist(Request $req,$id){
            App::setlocale(''.Session::get('lang','en').'');
            $content_name=$req['search'] ?? '';
            $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);
            if($id!=null){
                $trailer_api="";
                $selected="photo";
            $api_=Http::get("https://imdb-api.projects.thetuhin.com/title/".$id);
                // echo "<pre>";
                // print_r($imdb_);
                return view('page.playlist')->with(compact('api_','selected','trailer_api','content_name','api_search'));

            }
            return redirect()->back();

        }
    public function language($lang,Request $req){
        $content_name=$req['search'] ?? '';
        $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);
        Session::put('lang',$lang);
        Session::put('url',$_SERVER['REQUEST_URI']);
        App::setlocale(Session::get('lang','en'));

        return redirect()->back()->with(compact('content_name','api_search'));
       }

    public function login(Request $req){
        $content_name=$req['search'];
        $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);
        return view('page.login')->with(compact('content_name'))->with(compact('content_name','api_search'));

    }
    public function login_check(Request $req){
        $content_name=$req['search'] ?? '';
        $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);
        if(Session::get('user_id')==null){
            $user=new user();
            $user_ar=user::all();
            $c=0;
            foreach($user_ar as $user1){
                    $c=$c+1;
                    if($user1['user_mail']==$req['user_mail'])
                    {
                            if($user1['user_pass']==md5($req['user_password']))
                            {
                                Session::put('user_id',$user1['user_id']);
                                Session::put('user_name',$user1['user_name']);
                                Session::put('user_mail',$user1['user_mail']);

                                return redirect()->action([moviecontroller::class,'template']);
                            }else
                            {
                                if($c==count($user_ar))
                                {
                                    echo "<script> setTimeout(()=>alert('password is incorrect try again '),1000); </script >";
                                    return view('page.login')->with(compact('content_name','api_search'));
                                }
                            }
                    }else{
                            if($c==count($user_ar)){
                            echo "<script> setTimeout(()=>alert('Invalid Email Id or Password,check again!'),1000); </script >";
                            return view('page.register')->with(compact('content_name','api_search'));
                        }
            }
        }
        }
    }
    public function register(Request $req){
        $content_name=$req['search'];
        $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);
        return view('page.register')->with(compact('content_name','api_search'));
    }
    public function register_store(Request $req){
        $content_name=$req['search'] ?? '';
        $api_search=Http::get('https://imdb-api.projects.thetuhin.com/search?query='.$content_name);
        $req->validate ([

            'user_id'=>'auto',
            'user_name'=>'required',
            'user_mail'=>'required|email',
            'user_pass'=>'required',
            'confirmpassword'=>'required | same:user_pass',

            ]);
        $user=new user;
        $mail=$user::Where('user_mail',$req['user_mail'])->first();
        if($mail){
            echo "<script>alert('account already exists!login');</script>";
            return view('page.login')->with('content_name');
        }else{

            $user->user_name=$req['user_name'];
            $user->user_mail=$req['user_mail'];
            $user->user_pass=md5($req['user_pass']);
            $user->save();
            echo "<script>alert('account Created sucessfully!Login');</script>";
            return view('page.login')->with('content_name','api_search');
        }

    }

    public function logout(Request $req){
        Session::forget(['user_id','user_name','user_mail','isSearch','isAdded']);
         echo "<script>alert('Logged out sucessfully!');</script>";
         Artisan::call('cache:clear');
        $content_name=$req['search'];
        return view('page.login')->with(compact('content_name'));
    }

    public function Session(){
       $session= Session::all();
        echo "<pre>";
        print_r($session);
    }
    }
