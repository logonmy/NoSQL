<?php

$m = new MongoClient(); // 连接到 localhost:27017
$db = $m->comedy;
$collection = $db->cartoons;
$people = $db->people;
$address = $db->address;

$myAddress = array("line 1" => "123 Main Street", 
    "line 2" => null,
    "city" => "Springfield",
    "state" => "Vermont",
    "country" => "USA");
$address->insert($myAddress);
$me = array('name'=>'Fred', 'address'=>$myAddress['_id']);
$people->insert($me);

$people = $db->selectCollection("people");
$trainRef = MongoDBRef::create("hobbies", $modelTrains['_id']);
// soccer is in the "sports" collection
$soccerRef = MongoDBRef::create("sports", $soccer['_id']);
$people = $db->selectCollection("people");

// model trains are in the "hobbies" collection
$trainRef = MongoDBRef::create("hobbies", $modelTrains['_id']);
// soccer is in the "sports" collection
$soccerRef = MongoDBRef::create("sports", $soccer['_id']);

$collection->insert(array("task"=>"dishes", "do by"=> new MongoMaxKey));

$collection->insert($someDoc, array('w'=>0));
$collection->update($someDoc, $someUpdates, array('w'=>'majority'));
$m = new MongoClient("mongodb://localhost/?journal=true&w=majority&wTimeoutMS=20000");

$m = new MongoClient("mongodb://localhost/");
$d = $m->demoDb;
$c = $d->demoCollection;

// Set w=3 on the database object with a timeout of 25000ms
$d->setWriteConcern(3, 25000);

// Set w=majority on the collection object without changing the timeout
$c->setWriteConcern("majority");
$d->setWriteConcern(3, 25000);
