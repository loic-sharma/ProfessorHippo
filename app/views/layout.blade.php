<!doctype html>
<html>

	<head>
		<title>Professor Hippo</title>
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

		<link href="{{ asset('css/theme.css') }}" rel="stylesheet" type="text/css" />
	</head>

	<body>
		{{ $navigation }}

		<div class="container">

			<ul class="breadcrumb">
				<li>
					<a href="http://localhost/cms/ ">Home</a>
					<span class="dividider">/</span>
				</li>
			
				@foreach($breadcrumbs as $breadcrumb)
					@if(is_null($breadcrumb->link))
						<li class="active">{{ $breadcrumb->link }}</span>
					@else
						<li><a href="{{ URL::to($breadcrumb->link) }}">{{ $breadcrumb->name }}</a></li>
					@endif
				@endforeach	
			</ul>

			@foreach($errors->all(':message') as $error)
				<div class="alert">
					<span><b>Error:</b> {{ $error }}</span>
				</div>
			@endforeach

			<div class="row">
				<div class="span8">
					{{ $content }}
				</div>

				<div class="span4">
					<div class="well">
						<h3>Links</h3>

						<li class="first">
							<a href="http://localhost/cms/profile">User Control Panel</a>
						 </li>
						<li>
							<a href="http://localhost/cms/index.php/admin">Admin Control Panel</a>
						</li>
						<li class="last">
							<a href="http://localhost/cms/logout">Logout</a>
						</li>

						<h3>Information</h3>
						<p>Load time: {{ $loadtime}} seconds.</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>