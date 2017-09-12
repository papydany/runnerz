@extends('layout.main')
@section('title','Process')
@section('content')
<div class="col-xs-12" style="margin-top: 50px; min-height: 530px;background-color: #cec;">
<div class="col-sm-8 col-sm-offset-2 thumbnail" style="margin-top: 100px;">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

</div>
</div>


 @endsection