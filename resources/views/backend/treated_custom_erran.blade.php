@extends('layout.admin')
@section('title','Admin')
@section('content')

   <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                       Treated Custom Erran
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard >>> Treated Custom Erran
                            </li>
                        </ol>
                    </div> 
                </div>
                <!-- /.row -->

<div class="row">
                    <div class="col-sm-12">
                    @if(count($t) > 0)
                    {{!! $c = 0}}
                      <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>name</th>
                                    
                                        <th>phone</th>
                                        <th>email</th>
                                        <th>status</th>
                                        <th>state</th>
                                        <th>lga</th>
                                        <th>detail</th>
                                    </tr>
                                </thead>
                                @foreach($t as $v)
                                <tbody>
                                    <tr>
                                        <td>{{++$c}}</td>
                                        <td>{{$v->name}}</td>
                                     
                                        <td>{{$v->phone}}</td>
                                        <td>{{$v->email}}</td>
                                        <td>@if($v->status == 2)
                                      <span class="text-danger">CANCELLED</span>
                                      @elseif($v->status == 3)
                                     <span class="text-success"> DELIVERED</span>
                                      @endif
                                      </td>
                                       <td>{{$v->state->state_name}}</td>
                                        <td>{{$v->lga->lga_name}}</td>
                                        <td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{$v->id}}">View</button>

                                       </td>
                                    </tr>
                                    </tbody>
                                    <div id="myModal{{$v->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$v->name}}</h4>
      </div>
      <div class="modal-body">
     
        <p><strong>Phone Number : </strong>{{$v->phone}}</p>
          <p><strong>Email : </strong>{{$v->email}}</p>
          <p><strong>state : </strong>{{$v->state->state_name}}</p>
          <p><strong>LGA: </strong>{{$v->lga->lga_name}}</p>
          <p><strong>Address : </strong>{{$v->address}}</p>
          <p><strong>Personality: </strong>
 @if($v->personality === 1)
Individual
@else
Organisation
@endif</p>
   <p><strong>Detail : </strong>{{$v->detail}}</p> 
  
       
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                                @endforeach    
                                    </table>
                                    </div>
{{ $t->links() }}
                      @else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-danger" role="alert" style="z-index: 1000px;">
      <p>  No treated custom erran is  available </p>
    </div>


                      @endif
                                    

                            </div>
                            </div>
@endsection