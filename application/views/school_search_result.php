<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>School Search Result</title>
</head>
<body>
<?php include 'top_banner.php';?>
<?php echo $this->pagination->create_links(); ?>

<?php   echo 'Total Results: ' . count($query); 
if (count($query) > 0)
{

	foreach ($query as $row)
	{
   	echo '<h1>'.$row->english_name. '</h1>';
        echo '<h2>'.$row->arabic_name. '</h2>';
        if($row->location != NULL){
        echo '<h3>'.$row->location->english_detailed_address. '</h3>';
        echo '<h3>'.$row->location->arabic_detailed_address. '</h3>';
      /*  if($row->location->city != NULL)
       	 	echo '<h3>'.$row->location->city->english_name. '</h3>';
       	if($row->location->country != NULL)
        	echo '<h3>'.$row->location->country->english_name. '</h3>';
        if($row->location->governorate != NULL)
         	echo '<h3>'.$row->location->governorate->english_name. '</h3>';
        if($row->location->district != NULL)
          echo '<h3>'.$row->location->district->english_name. '</h3>';*/
        }
       /*   if($row->school_categories != NULL){
          echo '<h3>School Category:</h3>';
          foreach ($row->school_categories as $category)
          {
          	echo '<h4>'.$category->category_english_name.'</h4>';
          }
          }
          if($row->school_categories != NULL){
          echo '<h3>School Level:</h3>';
          foreach ($row->school_grade_levels as $grade_level)
          {
          	echo '<h4>'.$grade_level->level_english.'</h4>';
          }
          }*/
	}
} else echo 'Sorry No Results found';
?>

</body>
</html>
