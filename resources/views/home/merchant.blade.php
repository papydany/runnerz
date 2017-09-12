@extends('layout.main')
@section('title','MERCHANT')
@section('content')

<div class="row" style="padding-top: 50px;">
<div class="col-sm-12">
  <div class="breadcrumb" style="margin-bottom:30px;">
                    <a href="{{'/'}}">Home</a> >>>
                    <span class="text-lg">Merchant</span>
                </div>
 <div class="col-sm-12" style="background-color:#FFA500;margin-bottom:10px;border-radius: 4px; color: #000;">

 <h3 class="text-lg text-center">Merchant Reg</h3>
                            
<p style="color: #000;font-weight: bolder;">Register as a merchant, all registered merchants receive favorable discount depending on transaction volume and location</p>
<p style="color: #000;font-weight: bolder;"> All merchants are welcome and have exclusive discounted packages. Merchants can request for a backend to monitor data of all delivery and errands initiated therefore having a productive experience, (T and C apply).</p>
<hr/>
                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/merchant') }}" data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           

                            <div class="col-sm-4">
                             <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                               
                            </div>
                   

                        
                           

                            <div class="col-sm-4">
                             <label for="brandname">Brand Name</label>
                                <input id="brandname" type="text" class="form-control" name="brandname" value="{{ old('brandname') }}" required>

                                
                            </div>
                   

                      
                        

                            <div class="col-sm-4">
                                <label for="email">Email </label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                              
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    

                            <div class="col-sm-4">
                                    <label for="email">Phone </label>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                </div>


                            <div class="col-sm-4">
                              <label for="goodtype">Good Type</label>
                                <input id="goodstype" type="text" class="form-control" name="goodstype" value="{{ old('goodstype') }}" required> 
                                </div>



                            <div class="col-sm-4">
                             <label for="tvpm">Transaction Valume Per Month</label>
                                <input id="tvpm" type="text" class="form-control" name="tvpm" value="{{ old('tvpm') }}" required> </div>
  

                                </div>

                          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                         

                            <div class="col-sm-4">
                               <label for="address">Address </label>
                                <textarea id="address" rows="4" type="text" class="form-control" name="address" value="{{ old('address') }}" required> </textarea>

                            </div>
                            <div class="col-sm-4">
                              <label for="state_id">State</label>
                                 <select class="form-control" name="state_id" id="state" required>
                        
                         <option value="">Select State</option>
                         @foreach($state as $value)
                           <option value="{{$value->id}}">{{$value->state_name}}</option>
                         @endforeach   
                         </select>  
                         </div>
                            <div class="col-sm-4">
                            <label for="password-confirm">LGA</label>
                              <select class="form-control" name="lga_id" id="lga" required>
                         </select>
                         </div>

                        </div>

                           <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-4">
                                <button type="submit" class="btn btn-default lg">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>

 </div>
 </div>    
 <div class="clear">   </div>        

@endsection

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body text-danger text-center">
          <p>... processing L G A ...</p>
        </div>
       
      </div>
      
    </div>
  </div>