@extends('layout.admin')
@section('title','Admin')
@section('content')

   <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         Edit Item
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard >>> Edit Item
                            </li>
                        </ol>
                    </div> 
                </div>
                <!-- /.row -->

<div class="row">
                    <div class="col-md-6">
                    @if(count($ei) > 0)


                  <form  method="POST" action="{{url('update_item',$ei->id)}}" data-parsley-validate>
  {{ csrf_field() }}
  {{ method_field('PUT') }}
                            <div class="form-group" >
                                <label>item Type</label>
                                <input type="text" name="item_name" value="{{$ei->item_name}}"  class="form-control" required>
                              
                            </div>
                              <div class="form-group" >
                              
                                <label>Price</label>
                                <input type="text" name="amount"  class="form-control" value="{{$ei->amount}}" required>
                              
                            </div>
                            <div class="form-group">
   <button type="submit" class="btn btn-warning">Update</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a class="btn btn-default" href="/runnaz_backend">Cancel</a>
   </div>
                            </form>
                          
             
                   

                      @else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-danger" role="alert" style="z-index: 1000px;">
      <p>  No item type is available </p>
    </div>


                      @endif
                                    

                            </div>
                            </div>
@endsection