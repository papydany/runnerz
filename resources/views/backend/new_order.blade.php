@extends('layout.admin')
@section('title','Admin')
@section('content')

   <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        New Order
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard >>> New Order
                            </li>
                        </ol>
                    </div> 
                </div>
                <!-- /.row -->

<div class="row">
                    <div class="col-xs-12">
                    @if(count($n) > 0)
                    {{!! $c = 0}}
                      <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Customer</th>
                                        <th>Pick Up</th>
                                        <th>Destination</th>
                                        <th>Service Type</th>
                                        <th>Items</th>
                                        <th>Amount</th>
                                        <th>Discount</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach($n as $v)
                                <tbody>
                                    <tr>
                                        <td>{{++$c}}</td>
                                        <td><a href="#" data-toggle="modal" data-target="#myModal{{$v->user->id}}">{{$v->user->name}}</a>



<!-- Modal -->
<div id="myModal{{$v->user->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Customer Detail</h4>
      </div>
      <div class="modal-body">
        <p>Phone number :{{$v->user->phone}}</p>
            <p>Email :{{$v->user->email}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


                                        </td>
                                        <td>{{$v->source}}</td>
                                        <td>{{$v->destination}}</td>
                                        <td>{{$v->selectedservice}}</td>
                                        <td>{{$v->selected_item_text}}</td>
                                        <td>{{$v->total_amount}}</td>
                                        <td>@if($v->discount_amount == null)
                                            Nill
                                            @else
                                        {{$v->discount_amount}}

                                        @endif</td>
                                            <td>{{$v->created_at}}</td>
                                        <td><a class="btn btn-success" href="{{url('shipped',$v->id)}}">Shipped</a><br/><br/><a href="{{url('cancelled',$v->id)}}" class="btn btn-danger">Cancelled</a></td>
                                    </tr>
                                    </tbody>

                                @endforeach    
                                    </table>
                                   {{ $n->links() }}
                                    </div>



                      @else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-danger" role="alert" style="z-index: 1000px;">
      <p>  No item type is available </p>
    </div>


                      @endif
                                    

                            </div>
                            </div>
@endsection