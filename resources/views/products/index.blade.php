@extends('app')

@section('content')

	<div class="row">
		<div class="col-xs-6">
			<h2>All Products</h2>
		</div>
		<div class="col-xs-1 col-xs-offset-3">
			<a href="/products/create" class="btn btn-primary"><i class="fa fa-plus"> Add Product</i></a>
		</div>
	</div>


	<table id="all-products" class="table table-hover table-condensed">
		<thead>
		<tr>
			<th width="18px"></th>
			<th class="col-md-3">asin</th>
			<th class="col-md-3">title</th>
			<th class="col-md-3">fba_sellers_total</th>
			<th class="col-md-3">price</th>
		</tr>
		</thead>
		<tbody></tbody>
	</table>


@endsection

@section('scripts')
	<script>
		function format(d) {
			// `d` is the original data object for the row
			return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
					'<tr>' +
					'<td>Manufacturer:</td>' +
					'<td>' + d.manufacturer + '</td>' +
					'</tr>' +
					'<tr>' +
					'<td>Sold By:</td>' +
					'<td>' + d.sold_by + '</td>' +
					'</tr>' +
					'<tr>' +
					'<td>category:</td>' +
					'<td>' + d.category +'</td>' +
					'<td>category rank:</td>' +
					'<td>' + d.category_rank +'</td>' +
					'</tr>' +
					'<td>dimensions:</td>' +
					'<td>' + d.dimensions +'</td>' +
					'</tr>' +
					'</table>';
		}

		var editor;
		$(document).ready(function () {

			editor = new $.fn.dataTable.Editor( {
				ajax: "../php/staff.php",
				table: "#example",
				fields: [ {
					label: "First name:",
					name: "first_name"
				}, {
					label: "Last name:",
					name: "last_name"
				}, {
					label: "Position:",
					name: "position"
				}, {
					label: "Office:",
					name: "office"
				}, {
					label: "Extension:",
					name: "extn"
				}, {
					label: "Start date:",
					name: "start_date",
					type: "date"
				}, {
					label: "Salary:",
					name: "salary"
				}
				]
			} );

			var table = $('#all-products').DataTable({
				dom: 'C<"clear">lfrtip',
				"processing": true,
//				"serverSide": true,
				"ajax": "/products/data",
				"columns": [
					{
						"className":      'details-control',
						"orderable":      false,
						"data":           null,
						"defaultContent": ''
					},
					{data: 'asin', name: 'asin'},
					{data: 'title', name: 'title'},
					{data: 'fba_sellers_total', name: 'fba_sellers_total'},
					{data: 'price', name: 'price'}
				]
			});

			// Add event listener for opening and closing details
			$('#all-products tbody').on('click', 'td.details-control', function () {
				var tr = $(this).closest('tr');
				var row = table.row( tr );

				if (row.child.isShown()) {
					// This row is already open - close it
					row.child.hide();
					tr.removeClass('shown');
				} else {
					// Open this row
					row.child(format(row.data())).show();
					tr.addClass('shown');
				}
			} );
		});

	</script>

@endsection

@section('css')
	<style>
		td.details-control {
			background: url('/css/img/details_open.png') no-repeat center center;
			cursor: pointer;
		}

		tr.shown td.details-control {
			background: url('/css/img/details_close.png') no-repeat center center;
		}
	</style>
@endsection
