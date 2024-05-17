<?php 
include 'application/views/top_banner.php';
//include 'top_banner.php';
//$this->load->helper('url');
//echo current_url();
?>


<form method="post" dir="rtl" action="login/verify">
<label> البريد الالكتروني </label> 
<input name="email" />
<br>
<label> كلمة السر </label>
<input name="password" type="password" />
<br>
<button type="submit">دخول</button>
</form>

<P dir="rtl">
<a href="../index.php/login/forgotpassword"> نسيت كلمة السر </a>


<br /> <br />

      
<br />
<a href="../index.php/register"> تسجيل حساب جديد</a>

</P>
