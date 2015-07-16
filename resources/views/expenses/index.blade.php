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

		</tr>
		</thead>
		<tbody>
		{{--@foreach ($expenses as $expense)--}}
			<tr>
{{--				<td>{{$expense->id}}</td>--}}

			</tr>
		{{--@endforeach--}}
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
