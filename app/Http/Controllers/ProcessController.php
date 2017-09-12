<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use App\System;
use Mail;

class ProcessController extends Controller
{

    public function index(Request $request)
    {
        $request->session()->put('source',$request->source);
        $request->session()->put('destination', $request->destination);
        $request->session()->put('selectedservice', $request->selectedservice);
        $request->session()->put('selected_item_text', $request->selected_item_text);
        $request->session()->put('total_amount', $request->total_amount);
        $request->session()->put('total_distance',$request->total_distance);
    
if (Auth::check()) {
    if($request->source == null)
    {
       return redirect()->intended('/');   
    }
$this->insert_order(Auth::user()->id,$request->source,$request->destination,$request->selectedservice,$request->selected_item_text,$request->total_amount);
        
          

       return redirect()->intended('/process_success')->with('status', 'your order was successfull.we will get back to you in a minute');
   }else{
   	
        return view('process.login');
    }
   }

  public function login_p(Request $request)

    {

        $this->validate($request, [

            'email' => 'required|email',

            'password' => 'required',

        ]);


        if (auth()->attempt(array('email' => $request->input('email'), 'password' => $request->input('password'))))

        {
// insert order function
$this->insert_order(Auth::user()->id,$request->source,$request->destination,$request->selectedservice,$request->selected_item_text,$request->total_amount);
        
            return redirect()->intended('/process_success')->with('status', 'your order was successfull.we will get back to you in a minute');

        }else{
            Session::flash('warning',"please check your username and password.");
            return back();

        }

    }
    function process_success()
    {
      return view('process.success');
    }

function insert_order($user_id,$source,$destination,$selectedservice,$selected_item_text,$total_amount)
{

    $order = new Order;
          $order->user_id =$user_id;
          $order->source =$source;
         $order->destination =$destination;
          $order->selectedservice =$selectedservice;
         $order->selected_item_text =$selected_item_text;

        
         $order->total_amount=$total_amount;
          $order->status =0;
       // check if a user has make an order more than once.
        $order_user = Order::where('user_id',$user_id)->get();
        if(isset($order_user)){

    if(count($order_user) <= 1)

    {
         $order->discount_amount =($total_amount * 95) / 100 ;
    

    }
    
}

$order->save();

$sys = System::all();
$sms_message ="An+order+for+erran+has+been+placed+through+www.runnaz.com";



foreach ($sys as $key => $value) {
$data = array(
           
            'email' => $value->email
             );

/*$phone = $value->phone;
$sms ="http://www.openbulksms.com/api/send?sender=Runnaz&message=".$sms_message."&recipient=".$phone."&loginId=myeto5&password=admin@**1";
  $c  =file_get_contents($sms,false);*/

  Mail::send(array('html'=>'emails.notify'), $data, function($message) use ($data)  {
                $message->from('admin@runnaz.com');
                $message->to($data['email']);
                $message->subject('New Order');

            });
}
  
  return 1;
}
  
     
     protected function processregister(Request $request)
    {
       
         $this->validate($request, [

           'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6|confirmed',

        ]);

         $user =new User;
         $user->name =$request->name;
         $user->email =$request->email;
         $user->phone =$request->phone;
         $user->address =$request->address;
         $user->password =bcrypt($request->password);
         $user->is_admin =0;
         $user->status = 0;
         $user->save();


         // insert order function
$this->insert_order($user->id,$request->source,$request->destination,$request->selectedservice,$request->selected_item_text,$request->total_amount);
                
              
      return redirect()->intended('/process_success')->with('status', 'your order was successfull.we will get back to you in a minute');   

      }           
          
}
