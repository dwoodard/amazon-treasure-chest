@extends('app')

@section('content')

	<div class="container">
		<div>address: {{$manufacturer->address}}</div>
		<div>company: {{$manufacturer->company}}</div>
		<div>contact_person: {{$manufacturer->contact_person}}</div>
		<div>contact_url: {{$manufacturer->contact_url}}</div>
		<div>created_at: {{$manufacturer->created_at}}</div>
		<div>deleted_at: {{$manufacturer->deleted_at}}</div>
		<div>email: {{$manufacturer->email}}</div>
		<div>homepage: {{$manufacturer->homepage}}</div>
		<div>id: {{$manufacturer->id}}</div>
		<div>no_amazon: {{$manufacturer->no_amazon}}</div>
		<div>notes: {{$manufacturer->notes}}</div>
		<div>phone: {{$manufacturer->phone}}</div>
		<div>status: {{$manufacturer->status}}</div>
		<div>updated_at: {{$manufacturer->updated_at}}</div>
		<div>wholesale_link: {{$manufacturer->wholesale_link}}</div>
	</div>

	</div>

@endsection

@section('scripts')
	<script>

		$(document).ready(function () {


		})

	</script>

@endsection
