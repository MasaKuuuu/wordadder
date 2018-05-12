<html>
<head>
<title>@yield('title')</title>
<style type="text/css"></style>
</head>
<body>
	<h1>@yield('title')</h1>
	@section('menubar')
	<ul>
		<p class="menutitle">※メニュー</p>
		@show
	</ul>
	<hr size="1">
	<div class="content">
	@yield('content')
	</div>
	<div class="footer">
	@yield('footer')
	</div>
</body>
</html>