<html>
<head>
<title>Sucess</title>
</head>
<body>

<h3>Success</h3>
<script>
FB.api('/me', function(response) {
  alert('Your name is ' + response.name);
});
</script>

</body>
</html>
