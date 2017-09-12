@extends('layout.main')
@section('title','Request Erran')
@section('content')

<div class="row" style="padding-top: 50px;">
<div class="col-sm-12">
  <div class="breadcrumb" style="margin-bottom:30px;">
                    <a href="{{'/'}}">Home</a> >>>
                    <span class="text-lg">Request Erran</span>
                    </div>
                                 <div class="col-sm-12" style="background-color:#FFA500;margin-bottom: 20px;border-radius: 5px; color: #000;">
               <h4>Erran request</h4>
               <hr/>
   <form class="form-horizontal" role="form" method="POST" action="{{ url('/erran') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                         

                            <div class="col-sm-4">
                               <label for="name">Enter Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                            <label for="email">Enter Email </label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                              <div class="col-sm-4">
                              <label for="email">Enter Phone </label>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }}">
                         
                        
                            <div class="col-sm-4">
                               <label for="state_id">Select State</label>
                                 <select class="form-control" name="state_id" id="state" required>
                         }
                         }
                         <option value="">Select State</option>
                         @foreach($state as $value)
                           <option value="{{$value->id}}">{{$value->state_name}}</option>
                         @endforeach   
                         </select>

                                @if ($errors->has('state_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                     <div class="col-sm-4">
                       <label for="password-confirm">Select LGA</label>
                              <select class="form-control" name="lga_id" id="lga" required>
                        
                          
                         </select>

                                @if ($errors->has('lga_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lga_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                              <div class="col-sm-4">
                       <label for="password-confirm">Personality</label>
                              <select class="form-control" name="personality"  required>
                              <option>Select</option>
                         <option value="1">INDIVIDUAL</option>
                           <option value="2">ORGANASATION</option>
                         </select>

                                @if ($errors->has('person'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('person') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                          

                            <div class="col-md-4 col-sm-5">
                              <label for="email">Enter Address </label>
                                <textarea id="address" type="text" class="form-control" name="address" value="{{ old('address') }}"> </textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                                                         <div class="col-sm-7 col-md-8">
                                   <label for="email">Select Erran Type </label>                        
                                 @foreach($erran as $value)
             <div class="col-md-4 col-sm-6">                   
<input type="checkbox" name="erran_name[]" value="{{$value->id}}"> {{$value->erran_name}} &nbsp;&nbsp;
</div>
@endforeach
</div>
                        </div>

                   

                        <div class="form-group">
                           

                            <div class="col-sm-6">
                             <label for="detail">Detail</label>
                                <textarea id="address" type="text" class="form-control" name="detail" value="{{ old('detail') }}"> </textarea>

                                @if ($errors->has('detail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('detail') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6">
                            <br/><br/>
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-user"></i> Send Erran
                                </button>
                            </div>
                        </div>

                      
                    </form>

             </div>
                </div>

</div>
 </div>               

@endsection