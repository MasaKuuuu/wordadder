<html>
<head>
<title>@yield('title')</title>
<style type="text/css"></style>
</head>
<body>
	<h1>@yield('title')</h1>
	<hr size="1">
	
	<form action="add" method="post">
	{{ csrf_field() }}
	@yield('form')
	</form>
	
	<div class="footer">
	@yield('footer')
	</div>
</body>
</html>