<?php

$redis = new Redis();
$redisException = new RedisException();
var_dump($redisException);
$redis->flushDB();
$redis->info();
$redis->info("COMMANDSTATS");
$redis->ifno("CPU");
$redis->lastSave();

$redis->resetStat();
$redis->save();
$redis->slaveof('10.0.1.7', 6379);

$redis->slowlog('get', 10);
$redis->slowlog('reset');
$redis->get('key');
$redis->get('key');
$redis->set('key','value', 10);
$redis->set('key', 'value', Array('nx', 'ex'=>10));
$redis->set('key', 'value', Array('xx', 'px'=>1000));

$redis->setex('key', 3600, 'value');
$redis->psetex('key', 100, 'value');
$redis->setnx('key', 'value'); 
$redis->set('key1', 'val1');
$redis->set('key2', 'val2');
$redis->set('key3', 'val3');
$redis->set('key4', 'val4');

$redis->delete('key1', 'key2'); /* return 2 */
$redis->delete(array('key3', 'key4')); /* return 2 */
$redis->set('key', 'value');
$redis->exists('NonExistingKey');

$redis->incr('key1'); /* 4 */
$redis->incrBy('key1', 10); /* 14 */
$redis->decr('key1'); /* -2 */
$redis->decr('key1'); /* -3 */
$redis->decrBy('key1', 10); /* -13 */

$redis->mGet(array('key1', 'key2', 'key3')); 
$redis->mGet(array('key0', 'key1', 'key5')); 

$redis->set('x', '42');
$exValue = $redis->getSet('x', 'lol');  // return '42', replaces x by 'lol'
$newValue = $redis->get('x');      // return 'lol'
$redis->select(0);  // switch to DB 0
$redis->set('x', '42'); // write 42 to x
$redis->move('x', 1);   // move to DB 1
$redis->select(1);  // switch to DB 1
$redis->get('x');   // will return 42
$redis->set('x', '42');
$now = time(NULL); // current timestamp
$redis->expireAt('x', $now + 3);    // x will disappear in 3 seconds.
sleep(5);               // wait 5 seconds
$redis->get('x');       // will return `FALSE`, as 'x' has expired.
$allKeys = $redis->keys('*');   // all keys will match this.
$keyWithUserPrefix = $redis->keys('user*');
$redis->object("encoding", "l"); // → ziplist
$redis->object("refcount", "l"); // → 1
$redis->object("idletime", "l"); // → 400 (in seconds, with a precision of 10 seconds).
$redis->type('key');
$redis->set('key', 'value1');
$redis->append('key', 'value2'); /* 12 */
$redis->get('key'); /* 'value1value2' */
$redis->set('key', 'string value');
$redis->getRange('key', 0, 5); /* 'string' */
$redis->getRange('key', -5, -1); /* 'value' */
$redis->strlen('key'); 
$redis->set('key', "\x7f"); // this is 0111 1111
$redis->getBit('key', 0); /* 0 */
$redis->getBit('key', 1); /* 1 */
$redis->set('key', "*");    // ord("*") = 42 = 0x2f = "0010 1010"
$redis->setBit('key', 5, 1); /* returns 0 */
$redis->setBit('key', 7, 1); /* returns 0 */
$redis->get('key'); /* chr(0x2f) = "/" = b("0010 1111") */
$redis->delete('s');
$redis->sadd('s', 5);
$redis->sadd('s', 4);
$redis->sadd('s', 2);
$redis->sadd('s', 1);
$redis->sadd('s', 3);

var_dump($redis->sort('s')); // 1,2,3,4,5
var_dump($redis->sort('s', array('sort' => 'desc'))); // 5,4,3,2,1
var_dump($redis->sort('s', array('sort' => 'desc', 'store' => 'out'))); // (int)5
$redis->persist('key');

function psubscribe($redis, $pattern, $chan, $msg) {
    echo "Pattern: $pattern\n";
    echo "Channel: $chan\n";
    echo "Payload: $msg\n";
}
$redis->eval("return 1"); // Returns an integer: 1
$redis->eval("return {1,2,3}"); // Returns Array(1,2,3)
$redis->del('mylist');
$redis->rpush('mylist','a');
$redis->rpush('mylist','b');
$redis->rpush('mylist','c');
// Nested response:  Array(1,2,3,Array('a','b','c'));
$redis->eval("return {1,2,3,redis.call('lrange','mylist',0,-1)}}");