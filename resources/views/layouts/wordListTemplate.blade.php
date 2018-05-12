<html>
<head>
<title>@yield('title')</title>
<style type="text/css"></style>
</head>
<body>
	<h1>@yield('title')</h1>
	<hr size="1">
	<div class="content">
	@yield('content')
	</div>
	<div class="back">
	@yield('back')
	</div>
	<div class="footer">
	@yield('footer')
	</div>
</body>
</html>