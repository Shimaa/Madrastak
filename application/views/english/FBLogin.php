<?php
require '/facebook-php-sdk/src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '279655428757090',
  'secret' => 'c4d24a11a4b4ea3b0a484db48d3a1a8b',
));

// Get User ID
$user = $facebook->getUser();
if ($user) {
	try {
		// Proceed knowing you have a logged in user who's authenticated.
		$user_profile = $facebook->api('/me');
	} catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	}
}// Login or logout url will be needed depending on current user state.
if ($user) {
	$logoutUrl = $facebook->getLogoutUrl();
} else {
	$loginUrl = $facebook->getLoginUrl();
}

// This call will always work since we are fetching public data.
// $naitik = $facebook->api('/naitik');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

<style>
body {
	font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
}

h1 a {
	text-decoration: none;
	color: #3b5998;
}

h1 a:hover {
	text-decoration: underline;
}
</style>
</head>
<body>

<?php if (!$user): ?>
<div><a href="<?php echo $loginUrl; ?>" class="fb-login-button">Login
with Facebook</a></div>
<?php endif ?>


<?php if ($user): ?>

<?php
	$_SESSION["fb_user_profile"] = $user_profile;
  	header("Location: ../index.php/login/savefbinfo");
?>

<!-- <?php  ?>
Welcome
<?php echo $user_profile['name']; ?>
-->

<?php endif ?>


</body>
</html>
