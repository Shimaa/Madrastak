<div>
<font color=red size="smaller" face="verdana" > 
<?php echo validation_errors(); ?>
</font>
</div>


<?php echo form_open('login/resetpassword'); ?>
<label>New Password</label> 
<input name="password" type="password" />
<br>
<label> Retype Password </label>
<input name="passconf" type="password" />
<br>
<button type="submit"> Reset Password </button>
</form>
