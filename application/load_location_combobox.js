window.onload = initPage;
<script language="javascript" src="json2.js"></script>
function initPage() {
	country_combo = document.getElementById("country_combo");
	governorate_combo = document.getElementById("Governorate_combo");
	city_combo = document.getElementById("City_combo");
	if(governorate_combo != null) {
		addEventHandler(governorate_combo, "change", getCity);
	}
	if(city_combo != null) {
		addEventHandler(city_combo, "change", getDistrict);
	}
	if(country_combo != null) {
		country_id = country_combo.value;
		////alert("This is country_id"+country_id);
	} else {
		country_id = 0;
	}
	getGovernorate(country_id);
}

function createRequest() {
	try {
		request = new XMLHttpRequest();	
	} catch (tryMS) {
		try{
			request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (otherMS) {
			try{
				request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (failed) {
				request = null;
			}
		}
	}
	return request;
}

function addEventHandler (obj, eventName, handler) {
	if(document.attachEvent) {
		obj.attachEvent("on"+eventName, handler);
	} else if(document.addEventListener) {
		obj.addEventListener(eventName, handler, false);
	}
}

function getGovernorate(country_id){
	////alert('inside getGovernorate');
	request = createRequest();
	if(request == null){
		////alert("Unable to create request");
	} else {
		var url = document.getElementById('url_field').value;
		////alert("url "+url);
		url = url +"School_search_controller/load_governorate/"+country_id;
		////alert("url "+url);
		request.onreadystatechange = fillGovernorateCombo;
		request.open("Post", url, true);
		request.send(null);
		
		
	}
	
	
}
function fillGovernorateCombo(){
	if(request.readyState==4) {
		if(request.status == 200) {
			////alert(request.responseText);
			var governorates = JSON.parse(request.responseText);
			////alert(governorates);
			////alert(governorates[0].arabic_name);
			////alert(governorates[0].id);
			
			////alert('inside fillGovernorateCombo ');
			fillCombo(governorates, "Governorate_combo");
			} else {
				////alert('Sorry, Problem');
			}
		}
	
}

function fillCityCombo(){
	if(request.readyState==4) {
		if(request.status == 200) {
			////alert('fillCityCombo###');
			////alert(request.responseText);
			var cities = JSON.parse(request.responseText);
			////alert(cities);
			
			////alert('inside fillCityCombo ');
			fillCombo(cities, "City_combo");
			} else {
				////alert('Sorry, Problem');
			}
		}
}

function fillDistrictCombo(){
	if(request.readyState==4) {
		if(request.status == 200) {
			////alert('fillDistrictCombo###');
			////alert(request.responseText);
			var districts = JSON.parse(request.responseText);
			////alert(districts);
			
			////alert('inside fillDistrictCombo ');
			fillCombo(districts, "District_combo");
			} else {
				////alert('Sorry, Problem');
			}
		}
}
	



function fillCombo (combo_array, combo_id){
	////alert('inside fill Combo');
	var combo_box = document.getElementById(combo_id);
	if(combo_box != null && combo_array != null) {
		////alert('combo_box != null');
		////alert('array_size'+combo_array.length);
		for(var i =0; i<combo_array.length; i++){
		////alert('creating options');
		var option_element = document.createElement("option");
		option_element.innerHTML = combo_array[i].english_name;
		option_element.value =  combo_array[i].id;
		combo_box.appendChild(option_element);
		
		}
		combo_box.disabled = false;
	}
	
}

function deleteOptions (node){
	////alert('****************deleteOptions*********'+node.id);
	firstChild = node.firstChild;
	if(firstChild != null) {
	//alert('firstChild***'+firstChild.nodeName);
	sibling = firstChild.nextSibling;
	while(sibling != null){
		if(sibling.nodeName=="OPTION" && sibling.nodeVale != '0' && sibling.nodeValue != null) {
		//alert('***************sibling being deleted************'+sibling.nodeName+sibling.nodeValue);
		removedNode = sibling;
		sibling = sibling.nextSibling;
		node.removeChild(removedNode);
		} else {
			sibling = sibling.nextSibling;
		}
		
	}
	}
	//alert('exit deleteOptions');
}

function disable_other_combos(node) {
	//alert('****************Inside disable siblings');
	sibling_new = node.nextSibling;
	while(sibling_new != null){
		//alert('***************sibling****NAme***'+sibling_new.nodeName+"nodeType***"+sibling_new.nodeType);
		if(sibling_new.nodeName == "SELECT"){
		sibling_new.disabled = true;
		deleteOptions (sibling_new);
		}
		sibling_new = sibling_new.nextSibling;
	}
}

function getCity (){
	//alert("Inside get city");
	governorate_combo = document.getElementById("Governorate_combo");
	
	if(governorate_combo != null){
		disable_other_combos(governorate_combo);
		governorate_id = governorate_combo.value;
	}
	else {
		governorate_id = 0;
	}
	request = createRequest();
	if(request == null){
		//alert("Unable to create request");
	} else {
		var url = document.getElementById('url_field').value;
		//alert("url "+url);
		url = url +"School_search_controller/load_city/"+governorate_id;
		//alert("url "+url);
		request.onreadystatechange = fillCityCombo;
		request.open("Post", url, true);
		request.send(null);
		
		
	}
}

function getDistrict (){
	//alert("Inside get District");
	city_combo = document.getElementById("City_combo");
	if(city_combo != null){
		disable_other_combos(city_combo);
		city_id = city_combo.value;
	}
	else {
		city_id = 0;
	}
	request = createRequest();
	if(request == null){
		//alert("Unable to create request");
	} else {
		var url = document.getElementById('url_field').value;
		//alert("url "+url);
		url = url +"School_search_controller/load_district/"+city_id;
		//alert("url "+url);
		request.onreadystatechange = fillDistrictCombo;
		request.open("Post", url, true);
		request.send(null);
		
		
	}
}
