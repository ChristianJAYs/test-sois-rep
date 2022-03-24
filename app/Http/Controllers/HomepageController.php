<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// use App\Models\SoisGate;
class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $h;
    public $user_log;
    public $key_array;
    public $user_key;
    public $selected_key;
    public $selected_user_key;
    

    public $gate_key;
    public $gate_keyRemove_Start;
    public $gate_keyRemove_End;
    public $gate_keyHolder;
    public $hash_key;
    public $hash_keyHolder;
    public $key;
    public $key2;
    public $key_Final;
    public $userID;
    public $userData;
    public $userData2;
    public $userDataCount;

    public $s;
    public $KeyID;
    
    public $testReRoute;
    public $reroute;

    public function test($id,$key)
    {
        // /$0lsL0gIn/idem/1/gateportal/1ca782ac-ba82-440c-9e1c-6f9ee426fe21/home
        $string = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $str_arr = explode ("/", $string); 

        $userID = $str_arr[5];
        $key = $str_arr[7];
        // $key2 = $str_arr[8];
        // $testReRoute = $str_arr[9];
        // $key_Final = $str_arr[7]."/".$str_arr[8];

        echo $key;        




        // dd($str_arr);
        // dd($key);
        // dd(DB::table('sois_gates')->where('user_id','=',$userID)->where('is_logged_in','=','1')->first());
        $gate_keyHolder = DB::table('sois_gates')->where('user_id','=',$userID)->where('is_logged_in','=','1')->pluck('gate_key');
        $gate_key = serialize($gate_keyHolder);
        // dd($key_Final);
        // $gate_key = (string) $gate_keyHolder;
        dd($gate_key);
        $gate_keyRemove_Start = str_replace("[\"", '', $gate_key);
        $gate_keyRemove_End = str_replace("\"]", '', $gate_keyRemove_Start);
        // dd($gate_keyRemove_End);
        // $gate_key = print_r($gate_keyHolder);
        // $gate_key = $gate_keyHolder;
        // dd(gettype($gate_key));
        // dd($gate_key);
        // dd(str_replace("[\"", '', $gate_key));
        // dd($gate_key->toString());
        // dd(json_encode(($gate_key)));
        // if(Hash::check('1ca782ac-ba82-440c-9e1c-6f9ee426fe21', $key_Final)){
        if(Hash::check($gate_keyRemove_End, $key_Final)){
            $s = 1;
            $userData = DB::table('sois_gates')->where('user_id','=',$userID)->where('hash_key','=',$key_Final)->where('is_logged_in','=','1')->first();
            $userData2 = DB::table('sois_gates')->where('user_id','=',$userID)->where('hash_key','=',$key_Final)->where('is_logged_in','=','1')->get();
            $userDataCount = count($userData2);
            // dd($userData2);
            if ($userDataCount == 1) {
                $KeyID = $userData->user_id;
                Auth::loginUsingId($KeyID);
                if($testReRoute == 'home'){
                    // return redirect('/home');
                }
                if($testReRoute == 'reroute-test'){
                    // $this->reroute = $testReRoute;
                    // dd($this->reroute);
                    // $this->testroute($this->reroute)
                    // return redirect('/reroute-test');
                }
                // dd($testReRoute);
                // return redirect('/home');
            }else{
                // return redirect("/");
            }
            $selected_key = DB::table('sois_gates')->get();
        }else{
            echo "not Exist";
        }
        dd($str_arr);

        // dd($key_Final);

        


        // dd('echo');
    }

    public function reroute(){
        return View('testRoute');
    }

    public function index()
    {
        // dd("Hello");
        // $user_log = DB::table('sois_gates')->where('is_logged_in','=','1')->pluck('user_id');

        // dd($user_log);

        // if($user_log->count() != 1){
            // return view('homepageController');
        // }else{
            // Auth::loginUsingId($user_log);
        // }
            return view('homepageController');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    



    public function testroute($route)
    {
        return redirect("/reroute-test");
    //     $key = DB::table('sois_gates')->where('is_logged_in','=','1')->pluck('user_id');
    //     $user_log = DB::table('sois_gates')->where('is_logged_in','=','1')->pluck('user_id');

    //      if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    //      $url = "https://";   
    // else  
    //      $url = "http://";   
    // // Append the host(domain name, ip) to the URL.   
    // $url.= $_SERVER['HTTP_HOST'];   
    
    // // Append the requested resource location to the URL   
    // $url.= $_SERVER['REQUEST_URI'];    
      
    // echo $url; 
    // echo '<br><br><br>'; 
    // echo gettype($url); 
    // echo '<br><br><br>'; 
    // echo str_replace('/', ',', $url); 
    // echo $url; 
    // // echo explode(',', $url); 
    // $key_array = explode('/', $url);
    // echo '<br><br><br>'; 
    // $selected_key = $key_array[4];
    // echo gettype($selected_key); 
    // echo '<br><br><br>'; 
    // // $user_key = DB::table('sois_gates')->where('user_id','=',$key)->pluck('gate_key');
    // $user_key = DB::table('sois_gates')->where('user_id','=',$key)->first();
    // // echo serialize($user_key);

    // // echo gettype($user_key);

    // $selected_user_key = $user_key->gate_key;

    // echo $selected_user_key;

    // echo '<br><br><br>'; 

    // if($selected_user_key != $selected_key){
    //     echo "world";
    // }else{
    //     Auth::loginUsingId($user_log);
    //     return redirect("/home");
    // }


    // dd($key_array[4]);
    // dd(explode('/', $url));
        // dd($key);


        // return redirect()->route('profile', ['key' => 1]);
        // dd("Hello");
    }
}
