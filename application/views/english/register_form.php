<html>
<head>
<title>Register to Madrastak</title>
</head>
<body>

<div>
<font color=red size="smaller" face="verdana" > 
<?php echo validation_errors(); ?>
</font>
</div>


<?php echo form_open('account/register'); ?>
<label> Email </label> 
<input name="email" type="text" value="<?php echo set_value('email');?>" />
<br>
<label> Password </label>
<input name="password" type="password" value="<?php echo set_value('password');?>" />
<br>
<label> Retype Password </label>
<input name="passconf" type="password" value="<?php echo set_value('passconf');?>" />
<br>
<label> Your Name </label> 
<input type="text" name="name" value="<?php echo set_value('name');?>" />
<br>
<label> You are a </label> 
<select name="type"> 
<option value="1"> Parent
</option>
<option value="2"> Teacher
</option>
<option value="3"> School
</option>
<option name="4"> Student
</option>

 </select>
<br>

<button type="submit"> Register</button>
</form>
</body>
</html>
