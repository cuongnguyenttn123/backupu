<!--@extends('Layout.page1')-->
@section('lib')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 


@stop
@section('content')
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Image</th>
                <th>Seller Email</th>
                <th>Price</th>
                <th>Bid Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
	@foreach($buyer_data  as $value)
		<tr>
			<td><a href="{{$value->url}}"> <img style="width: 80px" src="{{$value->url}}"> </a> </td>
			<td>{{ $value->seller_email }}</td>
			<td>{{$value->price}}</td>
			<td>{{$value->time}}</td>
			<td>

                <a type="button" class="btn btn-primary payment" href="{{url('payment-test?amount='.$value->price)}}" id="{{$value->id}}">Pay</button>
			</td>
		</tr>
	@endforeach
        </tbody>

    </table>
@stop

@section('javascript')
   <script>
   	$(document).ready(function() {
    $('#example').DataTable();
} );
   </script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
@stop