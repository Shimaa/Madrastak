<?php 
include 'application/views/top_banner.php';
//$this->load->helper('url');
//echo current_url();
?>

<form method="post" action="login/verify">
<label> Email </label> 
<input name="email" />
<br>
<label> Password </label>
<input name="password" type="password" />
<br>
<button type="submit"> Login</button>
</form>


<a href="../index.php/login/forgotpassword"> Forgot Password </a>


<br /> <br />

      
<br />
<a href="../index.php/register"> Create a New Account</a>