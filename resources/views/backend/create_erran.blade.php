@extends('layout.admin')
@section('title','Admin')
@section('content')
    <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Create Erran
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard >>> Create Erran
                            </li>
                        </ol>
                    </div> 
                </div>
                <!-- /.row -->

<div class="row">
                    <div class="col-lg-3 col-md-6">
                  <form  method="POST" action="{{url('create_erran')}}" data-parsley-validate>
  {{ csrf_field() }}
                            <div class="form-group" >
                                <label>Erran</label>
                                <input type="text" name="erran_name"  class="form-control" required>
                              
                            </div>
                          
                            <div class="form-group">
   <button type="submit" class="btn btn-primary">Create</button>
   </div>
                            </form>
                            </div>
                            </div>
@endsection