@extends('layout.admin')
@section('title','Admin')
@section('content')

   <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          View Item
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard >>> View Item
                            </li>
                        </ol>
                    </div> 
                </div>
                <!-- /.row -->

<div class="row">
                    <div class="col-md-6">
                    @if(count($vi) > 0)
                    {{!! $c = 0}}
                      <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>item Type</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach($vi as $v)
                                <tbody>
                                    <tr>
                                        <td>{{++$c}}</td>
                                        <td>{{$v->item_name}}</td>
                                        <td>{{$v->amount}}</td>
                                        <td><a class="btn btn-success" href="{{url('edit_item',$v->id)}}">edit</a>&nbsp;&nbsp;<a href="{{url('delete_item',$v->id)}}" class="btn btn-danger">delete</a></td>
                                    </tr>
                                    </tbody>
                                @endforeach    
                                    </table>
                                    </div>

                      @else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-danger" role="alert" style="z-index: 1000px;">
      <p>  No item type is available </p>
    </div>


                      @endif
                                    

                            </div>
                            </div>
@endsection