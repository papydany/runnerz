@extends('layout.admin')
@section('title','Admin')
@section('content')
    <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Create Item
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard >>> Create Item
                            </li>
                        </ol>
                    </div> 
                </div>
                <!-- /.row -->

<div class="row">
                    <div class="col-lg-3 col-md-6">
                  <form  method="POST" action="{{url('create_item')}}" data-parsley-validate>
  {{ csrf_field() }}
                            <div class="form-group" >
                                <label>Item Type</label>
                                <input type="text" name="item_name"  class="form-control" required>
                              
                            </div>
                              <div class="form-group" >
                              
                                <label>Price</label>
                                <input type="text" name="amount"  class="form-control" required>
                              
                            </div>
                            <div class="form-group">
   <button type="submit" class="btn btn-primary">Create</button>
   </div>
                            </form>
                            </div>
                            </div>
@endsection