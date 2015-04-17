@extends('app')

@section('content')

<div class="container">
	<h2>{{$product->title}}</h2>





</div>

@endsection

@section('scripts')
<script>

$(document).ready(function() {
	var dynatable = $('#products').dynatable({
    readers: {
      'weight-(oz)': function(el, record) {return Number($(el).text()); },
      'price': function(el, record) {return Number($(el).text().replace('$','')); },
      'rank-#': function(el, record) {return Number($(el).text().replace(/[#,]/ig,"")); }

    }
  });

})

</script>

@endsection
