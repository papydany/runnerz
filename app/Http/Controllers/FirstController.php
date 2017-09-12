<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use App\Item;
use App\Lga;
use App\State;
use App\Erran;
use App\Agent;
use App\RequestErran;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Events\MessageSent;
class FirstController extends Controller
{
   Const AGENT = 0;
Const MERCHANT = 1;
  Const ERRAN = 0;
Const CUSTOM = 1;
 public function __construct()
    {}
public function index()
{
$item =  Item::all();
$service = Service::all();
	return view('home.index')->withIt($item)->withSc($service);
}
public function contact()
{
return view('home.contact');
}

public function service()
{
	return view('home.service');
}

public function merchant()
{

$state = State::get();


	return view('home.merchant')->withState($state);
}

public function post_merchant(Request $request)
{
$this->validate($request,array
     (
    'name'=>'required',
    'brandname'=>'required',
    'email'=>'required|email|max:255|unique:agents',
    'phone'=>'required',
    'address'=>'required',
    'state_id'=>'required',
    'lga_id'=>'required',
    'goodstype' =>'required',
  ));
	

$agent =New Agent;
$agent->name =$request->name;
$agent->brandname =$request->brandname;
$agent->goodstype =$request->goodstype;
$agent->tvpm =$request->tvpm;
$agent->email =$request->email;
$agent->phone =$request->phone;
$agent->cat =$request->cat;
$agent->state_id =$request->state_id;
$agent->lga_id =$request->lga_id;
$agent->agent_type =1;
$agent->status = 1;
$agent->address =$request->address;
$agent->save();



 Session::flash('success','successfull');
return $this->merchant();
}

public function agent()
{

$state = State::get();
$erran = Erran::get();

	return view('home.agent')->withState($state)->withErran($erran);
}

public function post_agent(Request $request)
{
$this->validate($request,array
     (
    'name'=>'required',
    'email'=>'required|email|max:255|unique:agents',
    'phone'=>'required',
    'address'=>'required',
    'state_id'=>'required',
    'lga_id'=>'required',
  ));

$agent =New Agent;
	if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
           $destinationPath = public_path('img/c_image');
            $img = Image::make($image->getRealPath());
            $img->resize(150, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $filename);

           
            $agent->detail = $filename;
          

        }


$agent->name =$request->name;
$agent->email =$request->email;
$agent->phone =$request->phone;
$agent->state_id =$request->state_id;
$agent->lga_id =$request->lga_id;
$agent->agent_type =0;
$agent->status = 1;
$agent->address =$request->address;
$agent->save();


 Session::flash('success','successfull');
return $this->agent();
}

public function erran()
{
  $state = State::get();
$erran = Erran::get();
  return view('home.erran')->withState($state)->withErran($erran);
}


public function post_erran(Request $request)
{
$this->validate($request,array
     (
    'name'=>'required',
    'email'=>'required',
    'phone'=>'required',
    'address'=>'required',
    'state_id'=>'required',
    'lga_id'=>'required',
    'personality'=>'required',
  ));
    $variable = $request->input('erran_name');
if(array_count_values($variable) == 0)
{
    return back();
}   

$re =New RequestErran;
$re->name =$request->name;
$re->email =$request->email;
$re->phone =$request->phone;
$re->state_id =$request->state_id;
$re->lga_id =$request->lga_id;
$re->status =0;
$re->requesttype =self::ERRAN;
$re->personality = $request->personality;
$re->address =$request->address;
$re->detail =$request->detail;
$re->save();
    foreach ($variable as $key => $value) {
        $erran[] = ['request_erran_id'=>$re->id,'erran_id'=>$value];
    };
DB::table('request_erran_types')->insert($erran);
Session::flash('success','successfull');
return redirect()->action('FirstController@erran');
}

public function custom()
{
  $state = State::get();
$erran = Erran::get();
  return view('home.custom')->withState($state)->withErran($erran);
}


public function post_custom(Request $request)
{
$this->validate($request,array
     (
    'name'=>'required',
    'email'=>'required',
    'phone'=>'required',
    'address'=>'required',
    'state_id'=>'required',
    'lga_id'=>'required',
    'personality'=>'required',
  ));
   

$re =New RequestErran;
$re->name =$request->name;
$re->email =$request->email;
$re->phone =$request->phone;
$re->state_id =$request->state_id;
$re->lga_id =$request->lga_id;
$re->status =0;
$re->requesttype =self::CUSTOM;
$re->personality = $request->personality;
$re->address =$request->address;
$re->detail =$request->detail;
$re->save();

Session::flash('success','successfull');
return redirect()->action('FirstController@custom');
}


public function verification()
{
 return view('home.verification');
}

public function post_verification(Request $request)
{
    $c = $request->c;
    
  $this->validate($request,array('c'=>'required'));
  $a =Agent::where([['agent_type',self::AGENT],['id',$c]])->first();  
  
return view('home.verification')->withA($a);
}

public function getlga($id)
    {
  
    $lga =Lga::where('state_id', $id)->get();
    return response()->json($lga);
    }

    public function fetchMessages()
{
  return Message::with('user')->get();
}

public function sendMessage(Request $request)
{
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);
 broadcast(new MessageSent($user, $message))->toOthers();
  return ['status' => 'Message Sent!'];
}

}
