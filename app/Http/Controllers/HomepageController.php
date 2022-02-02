<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;
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
    public $key;
    public $key_array;
    public $user_key;
    public $selected_key;
    public $selected_user_key;



    public function index()
    {
        // echo $h =1;
        // $user_log = DB::table('sois_gates')->where('is_logged_in','=','1')->pluck('user_id');
        // dd(DB::table('sois_gates')->where('is_logged_in','=','1')->get());

        // Auth::loginUsingId($user_log);


        return view('HomepageController');
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
    public function testroute()
    {
        $key = DB::table('sois_gates')->where('is_logged_in','=','1')->pluck('user_id');
        $user_log = DB::table('sois_gates')->where('is_logged_in','=','1')->pluck('user_id');

         if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
    echo $url; 
    echo '<br><br><br>'; 
    echo gettype($url); 
    echo '<br><br><br>'; 
    echo str_replace('/', ',', $url); 
    echo $url; 
    // echo explode(',', $url); 
    $key_array = explode('/', $url);
    echo '<br><br><br>'; 
    $selected_key = $key_array[4];
    echo gettype($selected_key); 
    echo '<br><br><br>'; 
    // $user_key = DB::table('sois_gates')->where('user_id','=',$key)->pluck('gate_key');
    $user_key = DB::table('sois_gates')->where('user_id','=',$key)->first();
    // echo serialize($user_key);

    // echo gettype($user_key);

    $selected_user_key = $user_key->gate_key;

    echo $selected_user_key;

    echo '<br><br><br>'; 

    if($selected_user_key != $selected_key){
        echo "world";
    }else{
        Auth::loginUsingId($user_log);
        return redirect("/home");
    }


    // dd($key_array[4]);
    // dd(explode('/', $url));
        // dd($key);


        // return redirect()->route('profile', ['key' => 1]);
        // dd("Hello");
    }
}
