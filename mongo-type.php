<?php

MongoId::getHostname();
MongoId::__toString();
MongoId::getTimestamp();
MongoId::isValid();
MongoId::__set_state();
MongoId::getInc();
MongoId::getPID();

$collection->save(array("ts" => new MongoDate()));

$start = new MongoDate(strtotime("2010-01-15 00:00:00"));
$end = new MongoDate(strtotime("2010-01-30 00:00:00"));

$collection->find(array("ts" => array('$gt' => $start, '$lte' => $end)));

$search = "V";
$where = array('name'=>array('
	$regex'=> new MongoRegex("/^$search/")));
$cursor = $collection->find($where);
$where = array('name'=>array('$regex'=>new MongoRegex(
	"/^$search/i")));


$profile = array(
	"username"=> 'foobity',
	"pic" => new MongoBinData(file_get_contents("gravatar.jpg"), MongoBinData::GENERIC),
	);

$connection->save($profile);
$people = $db->people;
$addresses = $db->addresses;

$myAddress =array("line 1"=>'12 main sreet',
	'line 2'=> null,
	'city'=>'beijing',
	'state'=>"vermont",
	'country'=>'china');
$addresses->insert($myAddress);
$me = array('name'=>'fred', 'address'=>$myAddress['_id']);
$people->insert($me);
