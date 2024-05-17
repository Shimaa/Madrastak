<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<?php 
include 'application/views/top_banner.php';
?>
<html>
<?php
	$this->load->helper('url');
?>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<script type="text/javascript" src="<?php echo base_url();?>javascript/form_validation.js"></script>
<title>Search for School</title>
</head>
    <body>
	
	<form name="search_form" action="<?php echo base_url("School_search_controller/".SEARCH_NAME_ACTION);?>" method="post" onsubmit="return validateForm()" >School
	Name: <input type="text" name="school_name" /> <input type="submit"
		value="Submit" /></form>
	
	
    </body>
</html>