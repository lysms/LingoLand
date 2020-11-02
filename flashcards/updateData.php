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
		// TODO: implement the SM2 alg (here: https://www.supermemo.com/en/archives1990-2015/english/ol/sm2)
		$newInterval = ceil(1.5 * $card['interval']);
		$stringInterval = 'P'.$newInterval.'D';
		$date->add(new DateInterval($stringInterval));

		// creates and executes the update query
		$query = 'update flashcards set `duedate` = "'. $date->format('Y-m-d H:i:s').'", `interval` = ' . $newInterval . ' where cardid = ' . $card['cardid'];
		$db->query($query);

		echo $date->format('Y-m-d H:i:s');
	}
	else{
		// creates and executes the update query
		$query = 'update flashcards set `duedate` = "'. $date->format('Y-m-d H:i:s').'", `interval` = 1 where cardid = ' . $card['cardid'];
		$db->query($query);
	}
}
?>