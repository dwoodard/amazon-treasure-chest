@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
				</div>
			</div>
		</div>
	</div>
</div>

<!-- https://jsfiddle.net/hdohz25f/ -->



<iframe width="500" height="330" src="//www.google.com/trends/fetchComponent?hl=en-US&q={{"some,word"}}&cmpt=q&tz&content=1&cid=TIMESERIES_GRAPH_0&export=5&w=500&h=330" style="border: none;"></iframe>

<script type="text/javascript" src="//www.google.com/trends/embed.js?hl=en-US&q={{"some,word"}}&cmpt=q&tz&tz&content=1&cid=TIMESERIES_GRAPH_0&export=5&w=500&h=330"></script>


@endsection
