<?php

连接数据库
$connection = new MongoClient("mongodb://example.com:27018");
选择集合

$connection->baz->foobar;

$connection->insert($arrayName = array('key' => 222 ));
$document = $collection->findOne();
echo $connection->count();
$cursor = $connection->find();
foreach($cursor as $id => $value){
	echo $id.":";
	var_dump($value);
}

$query=array('i'=>71);
$cursor = $collection->find($query);
while($cursor->hasNext()){
	var_dump($cursor->getNext());
}

$query = array('i'=>array('$gt'=>50));
$query = array('i'=>array('$gt'=>20, '$lte'=>30));
$cursor = $coll->find($query);
while( $cursor->hasNext()){
	var_dump($cursor->geNext());
}

$collection->ensureIndex(array("id"=>i));
$collection->ensureIndex(array( "i" => -1, "j" => 1 ));

