<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>ATC</title>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">

	{{--Font Awesome--}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"/>

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	@yield('css')
</head>

<body>

<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
			        aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

		</div>
		<div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
			<ul class="nav navbar-nav">

				<li role="presentation" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
						<i class="fa fa-shopping-cart fa-fw"></i> Products <span class="caret"></span></a>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="/products"><i class="fa fa-shopping-cart fa-fw"></i> All Products</a>
						</li>
						<li>
							<a href="/products/scores"><i class="fa fa-shopping-cart fa-fw"></i> Update Product Scores</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
				</li>

				<li>
					<a href="/my-products"><i class="fa fa-suitcase"></i> My Products</a>
				</li>

				<li>
					<a href="/tracker"><i class="fa fa-line-chart"></i> Tracker</a>
				</li>

				<li>
					<a href="/manufacturers"><i class="fa fa-truck"></i> Manufacturers</a>
				</li>

				<li>
					<a href="/users"><i class="fa fa-users fa-fw"></i> Users</a>
				</li>

				<li>
					<a href="javascript:function loadScript(scriptURL) {var scriptElem = document.createElement('SCRIPT'); scriptElem.setAttribute('language', 'JavaScript'); scriptElem.setAttribute('src', scriptURL); document.body.appendChild(scriptElem); } loadScript('{{url('js/scriptlet/atc.js')}}');">ATC</a>
				</li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="./">Login</a></li>
			</ul>
		</div>
		<!--/.nav-collapse -->
	</div>
</nav>


<div id="wrapper">
	<!-- Page Content -->
	<div class="container-fluid">
		@yield('content')
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#wrapper -->

<!-- Scripts -->
<script src="{{ asset('/js/vendor.js') }}"></script>
@yield('scripts')
</body>

</html>




