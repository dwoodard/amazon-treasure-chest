@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				Drag Link to Bookmarks
			</div>
			<a href="javascript:function loadScript(scriptURL) {var scriptElem = document.createElement('SCRIPT'); scriptElem.setAttribute('language', 'JavaScript'); scriptElem.setAttribute('src', scriptURL); document.body.appendChild(scriptElem); } loadScript('{{url('js/scriptlet/atc.js')}}');">
			ATC</a>
		</div>
	</div>
</div>

@endsection
