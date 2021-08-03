<!--@extends('Layout.page1')-->
@section('lib')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 


@stop
@section('content')
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Image</th>
                <th>Buyer Email</th>
                <th>Price</th>
                <th>Bid Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
	@foreach($seller_data  as $value)
		<tr>
			<td><a href="{{$value->url}}"> <img style="width: 80px" src="{{$value->url}}"> </a> </td>
			<td>{{ $value->buyer_email }}</td>
			<td>{{$value->price}}</td>
			<td>{{$value->time}}</td>
			<td>
			<select class="state" id="{{$value->id}}">
				<option value="Request">Pending</option>
				<option value="Approve">Approve</option>
			</select>
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
    $('.state').on('change',function(){
    	$('#preloader').css('display','block');

    	var bid_id = $(this).prop('id');
    	var state = $(this).val();
    	$.ajax({
    		url: "{{url('/seller_approve_image')}}",
    		data:{
    		"_token": "{{ csrf_token() }}",
    		'id':bid_id,'state':state},
    		method: 'post',
    		success: function(result){
    		$('#preloader').css('display','none');

			}
		});
    });
} );
   </script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
@stop