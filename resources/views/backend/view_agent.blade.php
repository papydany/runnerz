@extends('layout.admin')
@section('title','Admin')
@section('content')

   <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          View Agent
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard >>> View Service
                            </li>
                        </ol>
                    </div> 
                </div>
                <!-- /.row -->

<div class="row">
                    <div class="col-sm-12">
                    @if(count($a) > 0)
                    {{!! $c = 0}}
                      <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>name</th>
                                    
                                        <th>phone</th>
                                        <th>reg num</th>
                                        <th>cat</th>
                                        <th>state</th>
                                        <th>lga</th>
                                        <th>detail</th>
                                    </tr>
                                </thead>
                                @foreach($a as $v)
                                <tbody>
                                    <tr>
                                        <td>{{++$c}}</td>
                                        <td>{{$v->name}}</td>
                                      
                                        <td>{{$v->phone}}</td>
                                        <td>R{{$v->id}}</td>
                                        <td>{{$v->cat}}</td>
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
          <p><strong>Reg Num: </strong>R{{$v->id}}</p>
        
         
            <p><img src="{{asset('img/c_image/'.$v->detail)}}"></p>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                                @endforeach    
                                    </table>
                                    </div>
{{ $a->links() }}
                      @else
 <div class=" col-sm-10 col-sm-offset-1 alert alert-danger" role="alert" style="z-index: 1000px;">
      <p>  No service type is available </p>
    </div>


                      @endif
                                    

                            </div>
                            </div>
@endsection