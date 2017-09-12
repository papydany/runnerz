@extends('layout.admin')
@section('title','Admin')
@section('content')
    <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Create system
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard >>> Create system Phone and Email
                            </li>
                        </ol>
                    </div> 
                </div>
                <!-- /.row -->

<div class="row">
                    <div class="col-md-6">
                    <p>NB : Email and Phone You want to receive Alert when Customer place Order</p>
                  <form  method="POST" action="{{url('create_system')}}" data-parsley-validate>
  {{ csrf_field() }}
                            <div class="form-group" >
                                <label>System Phone</label>
                                <input type="text" name="phone"  class="form-control" required>
                              
                            </div>
                              <div class="form-group" >
                              
                                <label>System Email</label>
                                <input type="text" name="email"  class="form-control" required>
                              
                            </div>
                            <div class="form-group">
   <button type="submit" class="btn btn-primary">Create</button>
   </div>
                            </form>
                            </div>
                            </div>
@endsection