<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - lumen </title>
    
    <link href="/css/custom.css" rel="stylesheet" type="text/css"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
@include('partials.navbar')
@include('partials.sidebar')
<div class="container">

    @yield('content')
</div>
   
</body>
</html>