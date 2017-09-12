@extends('layout.main2')
@section('title','Process')
@section('content')
<div class="col-xs-12" style="margin-top: 50px; min-height: 530px;background-color: #cec;">
<div class="col-sm-8 col-sm-offset-2 thumbnail" style="margin-top: 100px;">
<h3 class="text-success"> Order Summary</h3>
<p><strong>Source :</strong>{{session()->get('source')}}

</p>
<p><strong>Destination :</strong>{{session()->get('destination')}}

</p>
<p><strong>Selected Service :</strong>{{session()->get('selectedservice')}}

</p>@if(session()->has('selected_item_text'))
<p><strong>Select Items :</strong>{{session()->get('selected_item_text')}}
</p>
@endif
<p><strong>Total Amount :</strong>{{session()->get('total_amount')}}
</p>
@if(session()->has('discount_amount'))

<p><strong>Discounted Price :</strong>{{session()->get('discount_amount')}} &nbsp;&nbsp;<span class="text-danger">(You are enjoying 5 % discount)</span></p>
@endif
</div>
</div>


 @endsection