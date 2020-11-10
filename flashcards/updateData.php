<?php  
$dbOk = false;
@ $db = new mysqli('localhost', 'root', '', 'lingoland');
if($db->connect_error){
	echo json_encode("error");
} 
else{
	$dbOk = true; 
}

if($dbOk){
	$card = json_decode("$_POST[card]", true);
	$date = new DateTime('now');

	if($_POST['correct'] == "true"){
		// gets the new interval and due date
		// Based on the SM2 alg (here: https://www.supermemo.com/en/archives1990-2015/english/ol/sm2)
		$newInterval = $card['interval'];
		if($newInterval == 0)
			$newInterval = 1;
		else if($newInterval == 1)
			$newInterval = 3;
		else
			$newInterval = ceil($card['easefactor'] * $newInterval / 100);

		$stringInterval = 'P'.$newInterval.'D';
		$date->add(new DateInterval($stringInterval));

		// creates and executes the update query
		$query = 'update flashcards set `duedate` = "'. $date->format('Y-m-d H:i:s').'", `interval` = ' . $newInterval . ' where cardid = ' . $card['cardid'];
		$db->query($query);
	}
	else{
		$newEase = $card['easefactor'];
		if($newEase != 130 && $card['interval'] > 1)
			$newEase -= 10;
		// creates and executes the update query
		$query = 'update flashcards set `duedate` = "'. $date->format('Y-m-d H:i:s').'", `interval` = 0, `easefactor` = '. $newEase .' where cardid = ' . $card['cardid'];
		$db->query($query);
	}
}
?>