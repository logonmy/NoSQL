<?php
$redis = new Redis();
$redis->connect("127.0.0.1", "6379");

// string
$redis->delete("KeyTime");
$redis->mset(array('key111' =>"key111" ,
		"key222"=>"key222"));
echo (int)$redis->exists("key111");

$array = $redis->getMultiple(array(
	"key111","key222"));
echo "<br>";
print_r($array);

for ($i=0; $i < 10; $i++) { 
	$redis->lpush("list", $i);
}

$redis->lpop("list");
$redis->rpop("list");

echo $redis->lsize("list");
echo $redis->lget("list", 0);
echo $redis->lset("list", 1, "new_value");
$data = $redis->lRange("list", 0, -1);
echo "<pre>";
print_r($data);
$bool = $redis->ltrim("list", 0, 5);

echo $redis->lrem("list", "5");
$bool = $redis->rpoplpush("srcKey", "dstKey");

// SET 
for($i=0; $i<10;$i++){
	$redis->sadd("myset", $i+rand(10,99));
}
$bool = $redis->srem("myset", 16);
echo (int)$bool;

$bool = $redis->sMove("myset", "myset1", 35);
echo $bool;

$data = $redis->smembers("myset");
$bool = $redis->sismember("myset", 555);
echo (int)$bool;

echo $redis->scard("myset");

$redis->sinterstore("output","myset","myset1");
$data = $redis->smembers("output");
echo "<pre>";

// sort
$data = $redis->sort("myset", array("sort"=>"desc"));
echo "<pre>";
print_r($data);

for($i=0; $i < 10;$i++){
	$redis->zadd("zset", $i+rand(10,99), $i+rand(100, 999));
}

$data = $redis->zrange("zset", 0, 3, "withscores");
echo "<pre>";
print_r($data);

$redis->zrem("zset", 456);
echo $redis->zcount("zset", 10, 50);
$redis->zRemRangeByScore("key", star, end);
echo $redis->zScore("zset", 503);
echo $redis->zrank("zset", 723);
for($i=0; $i<10;$i++){
	$redis->hset("myhash", $i, rand(10,99)+$i);
}

echo $redis->hget("myhash", "0");
echo $redis->hlen("myhash");

echo $redis->hdel("myhash","0");
$data = $redis->hkeys("myhash");
$data = $redis->hvals("myhash");
$data = $redis->hgetall("myhash");
echo "<pre>";
print_r($data);
echo $redis->hexists("myhash", "0");
$redis->hmset("user:1", array("name1"=>"name1",
	"name2"=>"Joe2"));
$data = $redis->hmget("user:1", array('name', 'salary'));
print_r($data);

// redis
$redis->move("key1", 2);
$redis->settimeout("user:1", 10);
$redis->expireat("myhash", time()+23);
$count = $redis->dbSize();
$redis->auth("foobared");
$redis->bgrewriteaof();
$redis->slaveof("10.0.1.7", 6379);

print_r($redis->info());
echo $redis->type("myset");
