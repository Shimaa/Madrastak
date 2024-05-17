<?php
header('Content-Type: text/html; charset=utf8');

$requestUrl = $_SERVER["REQUEST_URI"];

//$this->session->unset_userdata('action');
$this->session->unset_userdata('requestUrl');


$slashes_number = substr_count($requestUrl, "/");
$pos = 0;
//$action_name = null;
if($slashes_number >= 3) // then there is a function name, remove it
{
	$pos = strrpos($requestUrl, "/");
	$action_name = substr($requestUrl, $pos+1);
	echo '************************************* top banner';
	if($action_name != ENGLISH && $action_name != ARABIC){
		$this->session->set_userdata("action", $action_name);
	}
	$requestUrl = substr($requestUrl, 0, $pos);
	echo ' action '.$action_name;
}

$this->session->set_userdata("requestUrl", $requestUrl);

echo  '@@@@@@@@@@@'.$requestUrl.'@@@@@@@@@@@@';

if($this->session->userdata('lang') == ENGLISH) { ?>
<form method="post" action=<?php echo $requestUrl."/".ARABIC ?>>
<button type="submit">عربي</button>
</form>
<?php } else { ?>

<form method="post" action=<?php echo $requestUrl."/".ENGLISH ?>>
<button type="submit">English</button>

</form>
<?php } ?>
