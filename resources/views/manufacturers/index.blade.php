@extends('app')

@section('content')
	<div class="row">
		<div class="col-xs-6">
			<h2>Manufacturer</h2>
		</div>
	</div>

	<table id="manufacturer" class="table table-striped">
		<thead>
		<tr>
			<th>id</th>
			<th>company</th>
			<th>contact_person</th>
			<th>contact_url</th>
			<th>wholesale_link</th>
			<th>email</th>
			<th>phone</th>
			<th>address</th>
			<th>homepage</th>
			<th>status</th>
			<th>no_amazon</th>
			<th>notes</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($manufacturers as $manufacturer)
			<tr>
				<td>{{$manufacturer->id}}</td>
				<td>{{$manufacturer->company}}</td>
				<td>{{$manufacturer->contact_person}}</td>
				<td>{{$manufacturer->contact_url}}</td>
				<td>{{$manufacturer->wholesale_link}}</td>
				<td>{{$manufacturer->email}}</td>
				<td>{{$manufacturer->phone}}</td>
				<td>{{$manufacturer->address}}</td>
				<td>{{$manufacturer->homepage}}</td>
				<td>{{$manufacturer->status}}</td>
				<td>{{$manufacturer->no_amazon}}</td>
				<td>{{$manufacturer->notes}}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection

@section('scripts')
	<script>
		$(document).ready(function () {
//			var dynatable = $('#manufacturer').dynatable({});
		})
	</script>
@endsection
