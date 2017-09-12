@extends('layout.main')
@section('title','Agent')
@section('content')

<div class="row" style="padding-top: 50px;">
<div class="col-sm-12">
  <div class="breadcrumb" style="margin-bottom:30px;">
                    <a href="{{'/'}}">Home</a> >>>
                    <span class="text-lg">Agent</span>
                </div>
<div class="col-sm-12" style="background-color:#FFA500;margin-bottom:10px;border-radius: 4px; color: #000;">

 <h3 class="text-lg text-center">Agent Reg</h3>
               <hr/>
               <p style="color: #000;font-weight: bolder;">All motorbike’s proposed for registration must meet the LASG specified requirement of 200CC.</p>
 
<p style="color: #000; font-weight: bolder;">All proposed registered vehicles should meet the required registration requirements of the law</p>
                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/agent') }}" enctype="multipart/form-data" data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            

                            <div class="col-sm-4">
                            <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            </div>
                       
                            <div class="col-sm-4">
                              <label for="email">Email </label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                       <div class="col-sm-4">
                             <label for="email">Phone </label>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                              
                            </div>
                        </div>

                         

                        
                   <div class="form-group{{ $errors->has('cat') ? ' has-error' : '' }}">
                            
                        
                            <div class="col-sm-4">
                            <label for="cat">Categorory</label>
                                 <select class="form-control" name="cat"  required>
                         
                         <option value="">Select State</option>
                         <option value="Bike">Bike</option>
                           <option value="Car">Car</option>
                 <option value="Bus">Bus</option>
                         </select>

                               
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
                              <label for="password-confirm" >LGA</label>
                              <select class="form-control" name="lga_id" id="lga" required>
                        
                          
                         </select>

                               
                            </div>
                        </div>
    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <div class="col-sm-6">
                             <label for="email">Address </label>
                                <textarea id="address" rows="4" type="text" class="form-control" name="address" value="{{ old('address') }}"> </textarea>

                             
                        </div>
                         
                        
                            <div class="col-sm-4">
                               <label for="image">Image</label>
                          <input type="file" name="image" class="form-control" required>
                          </div>
                          <div class="col-sm-2">
                                <br/>
                                <button type="submit" class="btn btn-default lg">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                          </div>
                
                    </form>
                    </div>

 </div>
 </div>               

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