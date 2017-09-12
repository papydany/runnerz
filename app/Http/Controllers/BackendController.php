<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Service;
use App\System;
use App\Order;
use App\Item;
use App\Erran;
use App\RequestErran;
use App\Agent;
use DB;
use App\User;
use Illuminate\Support\Facades\Session;

class BackendController extends Controller
{
	Const NEW_ORDER = 0;

	Const SHIPPED = 1;

	Const  CANCELLED = 2;

	Const  DELIVERED = 3;

	Const  RETURNED = 4;
	 
	 Const AGENT = 0;
Const MERCHANT = 1;
 Const ACTIVE = 1;
Const SUSPENDED = 0;
Const NEW_ERRAN = 0;
//Const TREATED_ERRAN = 1;
 Const ERRAN = 0;
Const CUSTOM = 1;
    //
	 public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
{
	// new order
    	$new = collect(Order::where('status',self::NEW_ORDER)->get());

    	$new = $new->count();

      	$shipped = collect(Order::where('status',self::SHIPPED)->get());

    	$shipped = $shipped->count();

    	$cancelled= collect(Order::where('status',self::CANCELLED)->get());

    	$cancelled= $cancelled->count();

    	$delivered = collect(Order::where('status',self::DELIVERED)->get());

    	$delivered = $delivered->count();

    	$return = collect(Order::where('status',self::RETURNED)->get());

    	$return = $return->count();	
// erran
    	$erran = collect(RequestErran::where([['status',self::NEW_ERRAN],['requesttype',self::ERRAN]])->get());

    	$erran = $erran->count();

    	$treated_erran = collect(RequestErran::where([['status','!=',self::NEW_ERRAN],['requesttype',self::ERRAN]])->get());

    	$treated_erran = $treated_erran->count();

    	// custom erran
$custom = collect(RequestErran::where([['status',self::NEW_ERRAN],['requesttype',self::CUSTOM]])->get());

    	$custom = $custom->count();

    	$treated_custom = collect(RequestErran::where([['status','!=',self::NEW_ERRAN],['requesttype',self::CUSTOM]])->get());

    	$treated_custom = $treated_custom->count();

    	// agent

 $agent = collect(Agent::where([['agent_type',self::AGENT],['status',1]])->get());

    	$agent = $agent->count();  
    	// merchant

 $merchant = collect(Agent::where([['agent_type',self::MERCHANT],['status',1]])->get());

    	$merchant = $merchant->count(); 

    	// active user
    	
	return view('backend.index')->withN($new)->withS($shipped)->withC($cancelled)->withD($delivered)->withR($return)->withE($erran)->withTe($treated_erran)->withEc($custom)->withTc($treated_custom)->withAgent($agent)->withMc($merchant);
}
//================================== SERVICE =============================================
   
    public function create_service()
{
	return view('backend.create_service');
}

    public function post_create_service(Request $request)
{

	$this->validate($request,array
     (
    'service_name'=>'required',
     'amount'=>'required'
  ));
	  $service = new Service;

	  $service->service_name = $request->service_name;

	  $service->amount = $request->amount;

	  $service->save();
 
 Session::flash('success','successfull');

	return redirect()->action('BackendController@create_service');
}

function view_service()
{
	$view_service = Service::all();
	return view('backend.view_service')->withVs($view_service);
}

function edit_service($id)
{
	$edit_service = Service::where('id',$id)->first();
	return view('backend.edit_service')->withEs($edit_service);
}

function update_service(Request $request, $id)
{
	$this->validate($request,array
     (
    'service_name'=>'required',
     'amount'=>'required'
  ));
	$u_service = Service::find($id);

	 $u_service->service_name =$request->input('service_name');

     $u_service->amount =$request->input('amount');

     $u_service->save();

      Session::flash('success','successfull');

	return redirect()->action('BackendController@view_service');

}

function delete_service($id)
{
	$delete = Service::destroy($id);
 Session::flash('success','successfull');

	return redirect()->action('BackendController@view_service');
}
//================================== Admin=============================================
   
    public function create_admin()
{
	return view('backend.create_admin');
}

    public function post_create_admin(Request $request)
{
$this->validate($request,array
     (
'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ));
	$admin = new User;
    $admin->name = $request->name;
    $admin->email =  $request->email;
    $admin->phone = '000000000';
    $admin->address = "0000000000000";
    $admin->is_admin=1;
    $admin->status=0;
    $admin->password = bcrypt($request->password);
	$admin->save();

	Session::flash('success','successfull');

	return redirect()->action('BackendController@create_admin');
}

function view_admin()
{
	$view_admin = User::where('is_admin',1)->get();
	return view('backend.view_admin')->withVs($view_admin);
}


//===========================================ITEM ==================================================

  public function create_item()
{
	return view('backend.create_item');
}

    public function post_create_item(Request $request)
{

	$this->validate($request,array
     (
    'item_name'=>'required',
     'amount'=>'required'
  ));
	  $item = new Item;

	  $item->item_name = $request->item_name;

	  $item->amount = $request->amount;

	  $item->save();
 
 Session::flash('success','successfull');

	return redirect()->action('BackendController@create_item');
}

function view_item()
{
	$view_item= Item::all();
	return view('backend.view_item')->withVi($view_item);
}

function edit_item($id)
{
	$edit_item = Item::where('id',$id)->first();
	return view('backend.edit_item')->withEi($edit_item);
}

function update_item(Request $request, $id)
{
	$this->validate($request,array
     (
    'item_name'=>'required',
     'amount'=>'required'
  ));
	$u_item = Item::find($id);

	 $u_item->item_name =$request->input('item_name');

     $u_item->amount =$request->input('amount');

     $u_item->save();

      Session::flash('success','successfull');

	return redirect()->action('BackendController@view_item');

}

function delete_item($id)
{
	$delete = Item::destroy($id);
 Session::flash('success','successfull');

	return redirect()->action('BackendController@view_item');
}

// configure system for phone and email  to receive alert
//=====================================System=================================================

  public function create_system()
{
	return view('backend.create_system');
}

    public function post_create_system(Request $request)
{

	$this->validate($request,array
     (
    'phone'=>'required',
     'email'=>'required'
  ));
	  $system= new System;

	  $system->phone = $request->phone;

	   $system->email = $request->email;

	   $system->save();
 
 Session::flash('success','successfull');

	return redirect()->action('BackendController@create_system');
}

function view_system()
{
	$view_system= System::all();
	return view('backend.view_system')->withVs($view_system);
}

function edit_system($id)
{
	$edit_system = System::where('id',$id)->first();
	return view('backend.edit_system')->withEs($edit_system);
}

function update_system(Request $request, $id)
{
	$this->validate($request,array
     (
    'phone'=>'required',
     'email'=>'required'
  ));
	$u_system = System::find($id);

	 $u_system->phone =$request->input('phone');

     $u_system->email =$request->input('email');

     $u_system->save();

      Session::flash('success','successfull');

	return redirect()->action('BackendController@view_system');

}

function delete_system($id)
{
	$delete = System::destroy($id);
 Session::flash('success','successfull');

	return redirect()->action('BackendController@view_system');
}


//=====================================Erran=================================================

  public function create_erran()
{
	return view('backend.create_erran');
}

    public function post_create_erran(Request $request)
{

	$this->validate($request,array('erran_name'=>'required'));
	  $erran= new Erran;

	  $erran->erran_name = $request->erran_name;
      $erran->save();
 
 Session::flash('success','successfull');

	return redirect()->action('BackendController@create_erran');
}

function view_erran()
{
	$view_erran= Erran::all();
	return view('backend.view_erran')->withVe($view_erran);
}

function edit_erran($id)
{
	$edit_erran = Erran::where('id',$id)->first();
	return view('backend.edit_erran')->withE($edit_erran);
}

function update_erran(Request $request, $id)
{
$this->validate($request,array('erran_name'=>'required'));
	$u_erran = Erran::find($id);

	 $u_erran->erran_name =$request->input('erran_name');

  $u_erran->save();

      Session::flash('success','successfull');

	return redirect()->action('BackendController@view_erran');

}

function delete_erran($id)
{
	$delete = Erran::destroy($id);
 Session::flash('success','successfull');

	return redirect()->action('BackendController@view_erran');
}

// ==================order====================================

function new_order()
{
 $new = Order::where('status',self::NEW_ORDER)->paginate(20);
 return view('backend.new_order')->withN($new);
}

function shipped($id)
{
 $shipped = Order::find($id);
 $shipped->status = self::SHIPPED;
 $shipped->save();
Session::flash('success','successfull');

	return redirect()->action('BackendController@new_order');
}

function cancelled($id)
{
 $shipped = Order::find($id);
 $shipped->status = self::CANCELLED;
 $shipped->save();
Session::flash('success','successfull');

	return redirect()->action('BackendController@new_order');
}

function shipped_order()
{
  $shipped= Order::where('status',self::SHIPPED)->paginate(20);
 return view('backend.shipped_order')->withS($shipped);
}

function delivered($id)
{
 $d = Order::find($id);
 $d->status = self::DELIVERED;
 $d->save();
Session::flash('success','successfull');

	return redirect()->action('BackendController@shipped_order');
}

function returned($id)
{
 $r = Order::find($id);
 $r->status = self::RETURNED;
 $r->save();
Session::flash('success','successfull');

	return redirect()->action('BackendController@shipped_order');
}


function cancelled_order()
{
  $cancelled = Order::where('status',self::CANCELLED)->paginate(20);
 return view('backend.cancelled_order')->withC($cancelled);
}

function delivered_order()
{
  $delivered = Order::where('status',self::DELIVERED)->paginate(20);
 return view('backend.delivered_order')->withD($delivered);
}

function return_order()
{
 $return = Order::where('status',self::RETURNED)->paginate(20);
 return view('backend.return_order')->withR($return);
}
// -=============================view agent ==============================
public function view_agent()
{
	$agent =Agent::where([['agent_type',self::AGENT],['status',1]])->paginate(1);
	return view('backend.view_agent')->withA($agent);
}

// -=============================view merchant ==============================
public function view_merchant()
{
	$merchant=Agent::where([['agent_type',self::MERCHANT],['status',1]])->paginate(1);
	return view('backend.view_merchant')->withM($merchant);
}
// -=============================new erran ==============================
public function new_erran()
{
	$new_erran= RequestErran::where([['request_errans.status',self::NEW_ERRAN],['request_errans.requesttype',self::ERRAN]])->orderBy('id','DESC')->paginate(20);

	return view('backend.new_erran')->withN($new_erran);
}
// -=============================treated erran ==============================
public function treated_erran()
{
	$treated_erran= RequestErran::where([['request_errans.status','!=',self::NEW_ERRAN],['request_errans.requesttype',self::ERRAN]])->orderBy('id','DESC')->paginate(20);

	return view('backend.treated_erran')->withT($treated_erran);
}

public function delivered_erran($id)
{
$erran = RequestErran::find($id);

$erran->status = self::DELIVERED;

$erran->save();
Session::flash('success','successfull');
	return redirect()->action('BackendController@new_erran');
}

public function cancelled_erran($id)
{
$erran = RequestErran::find($id);

$erran->status = self::CANCELLED;

$erran->save();
Session::flash('success','successfull');
	return redirect()->action('BackendController@new_erran');
}

// -=============================new custom erran ==============================
public function new_custom_erran()
{
	$new_custom_erran= RequestErran::where([['request_errans.status',self::NEW_ERRAN],['request_errans.requesttype',self::CUSTOM]])->orderBy('id','DESC')->paginate(20);

	return view('backend.new_custom_erran')->withN($new_custom_erran);
}
// -=============================treated custom erran ==============================
public function treated_custom_erran()
{
	$treated_custom_erran= RequestErran::where([['request_errans.status','!=',self::NEW_ERRAN],['request_errans.requesttype',self::CUSTOM]])->orderBy('id','DESC')->paginate(20);

	return view('backend.treated_custom_erran')->withT($treated_custom_erran);
}

public function delivered_custom_erran($id)
{
$erran = RequestErran::find($id);

$erran->status = self::DELIVERED;

$erran->save();
Session::flash('success','successfull');
	return redirect()->action('BackendController@new_custom_erran');
}

public function cancelled_custom_erran($id)
{
$erran = RequestErran::find($id);

$erran->status = self::CANCELLED;

$erran->save();
Session::flash('success','successfull');
	return redirect()->action('BackendController@new_custom_erran');
}
}
