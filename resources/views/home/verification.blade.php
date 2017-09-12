@extends('layout.main')
@section('title','Verification')
@section('content')

<div class="row" style="padding-top: 50px;">
<div class="col-sm-12">
  <div class="breadcrumb" style="margin-bottom:30px;">
                    <a href="{{'/'}}">Home</a> >>>
                    <span class="text-lg">Verification</span>
                </div>
                <div class="row">
                <div class="col-sm-5">
<form class="form-horizontal" role="form" method="POST" action="{{ url('/verification') }}" data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                         

                            <div class="col-sm-12">
                               <label for="c" class="text-success">Enter Code</label>
                                <input id="c" type="text" class="form-control" name="c" value="{{ old('c') }}" required>

                                @if ($errors->has('c'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('c') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
 <div class="col-sm-6">
                         
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i> Verification
                                </button>
                            </div>
                            </div>
                            </form>

                            @if(isset($a))
                    @if(count($a) == 0)
                    <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert">
                    Please check the code you enter. no runnarz agent with these code on our plantform
                    </div>
                     @else
                    @if($a->status == 0)
                    <div class=" col-sm-10 col-sm-offset-1 alert alert-warning" role="alert">
                    The Runnarz Agent with thses reg number has been deactivated from our plantform
                    </div>
                    @else
                    <hr/>
                    <p>Name : {{$a->name}}</p>
                    <p>Phone: {{$a->phone}}</p>
                    
                     <p>Status: <span class="text-success">Active</span></p>
                    @endif

                   
                      
                    @endif
                    @endif
                </div>
                	   <div class="col-sm-6 hidden-xs" style="background-image: url(img/logo/service.jpg); min-height: 435px">

                </div>
                </div>

</div>
 </div>               

@endsection