<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<?php
$this->load->helper('url');
?>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<script type="text/javascript" 
	src="<?php echo base_url();?>javascript/prototype.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>javascript/load_location_combobox.js"></script>

	
<title>Search for School by Location</title>
</head>

<form name="search_form"
	action="<?php echo base_url("School_search_controller/load_search_by_location");?>"
	method="post" onsubmit="return validateForm()"> <div>Country: <select id = "country_combo">
	<option value="1" selected>Egypt</option>
</select>
 Governorate:
 <select disabled id = "Governorate_combo" name = "Governorate_combo">
 <option value="0" selected></option>
</select>
 City: 
<select disabled id = "City_combo" name = "City_combo">
 <option value="0" selected></option>
</select>
District: 
<select disabled id = "District_combo"  name = "District_combo" >
 <option value="0" selected></option>
</select>
</div>
<div>
<input type="hidden" value="<?php echo base_url();?>" id = "url_field" />

<input type="submit" value="Submit" />
</div>


</form>


</body>
</html>
