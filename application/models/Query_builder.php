<?php

function creatQuery ($type) {
	$sql = NULL;
	
	return $sql;
}

function append_count($sql){
	$sql = "";
	
	return $sql;
	
}

function append_select($sql){
	$sql = "";
	return $sql;
	
}

function append_offset_and_limit($sql, $limit, $offset) {
    $sql =  $sql." limit ". $limit;
		if($offset != '')
		{
			echo "inside offset";
				
			$sql= $sql." offset ".$offset;
			echo $sql;
		}
	return $sql;
}