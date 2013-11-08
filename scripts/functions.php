<?php
/*functions.php
 *
 * Use this space to store PHP function used across the entire site
 */
 
 
 /* Print Team
  *
  * args : pointer to MEMBER object/page
  * output: prints formatted Team names directly to page
  */
 function printTeam($page){
	$spacer = ' | ';
	$mult = false;
	if($page->Build_Team){
		echo "Build Team";
		$mult = true;
	}
	if($page->Finance_Team){
		if($mult){ echo $spacer;}
		echo "Finance Team";
		$mult = true;
	}
	if($page->Marketing_Team){
		if($mult){ echo $spacer;}
		echo "Marketing Team";
		$mult = true;
	}
	if($page->Software_Team){
		if($mult){echo $spacer;}
		echo "Sotware Team";
	}
 }
?>