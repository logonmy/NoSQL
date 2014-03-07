<?php

$mongoClient = new MongoClient("mongodb://whisky:13000/?replicaset=seta");
$connections = $mongoClient->getConnections();
foreach( $connections as $con){
	if($con['connection']['connection_type_desc'] == "SECONDARY")
	{
		echo "Closing '{$con['hash']}':";
		$a->close($con['hash']);
	}
}

$mongoClient->selectDB("foo");
$mongoClient->getHosts();
$m->setReadPreference(MongoClient::RP_SECONDARY, array(
    array('dc' => 'east', 'use' => 'reporting'),
    array('dc' => 'west'),
    array(),
));
var_dump($m->getReadPreference());

$cursor = $collections->find();
$result = $cursor->next();
$info = $cursor->info();
MongoClient::killCursor($info['server'], $info['id']);

var_dump($mongoClient->listDBs());
$c1 = $m->selectCollection("foo", "bar.baz");
$c2 = $m->selectDB("foo")->selectCollection("bar.baz");
var_dump(MongoClient::_toString);
