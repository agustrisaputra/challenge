<!doctype html>
<html>
<head>
  <meta charset="utf8">
  <meta name="generator" content="Insomnia Documenter v0.4.1">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="shortcut icon" href="{{ asset('docs/assets/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('docs/assets/bundle.css') }}">
  <script defer src="{{ asset('docs/assets/bundle.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
  <noscript>In order to view this documentation page, you have to enable JavaScript in your web browser.</noscript>
  <div id="app" data-root="{{ asset('docs') }}"></div>
</body>
<script>
  $(function() {
    setTimeout( function(){
      $('.logo img').attr('src','{{ asset("docs/assets/logo.png") }}');
  }  , 1500 );
  })
</script>
</html>
