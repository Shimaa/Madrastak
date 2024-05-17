function validateForm() { 
	var x=document.forms["search_form"]["school_name"].value; 
	if (x==null || x=="") 
	{ 
		alert("You must enter school name"); 
		return false; 
	} 
}