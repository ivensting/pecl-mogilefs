--TEST--
Test for invalid timeouts in the connect method
--FILE--
<?php
$client = new MogileFs();
try {
	$client->connect('testhost', 1234, 'domain', PHP_INT_MAX + 1);
} catch (MogileFsException $e) {
	var_dump($e->getMessage(), $e->getCode());
}
try {
	$client->connect('testhost', 1234, 'domain', -1);
} catch (MogileFsException $e) {
	var_dump($e->getMessage(), $e->getCode());
}
?>
==DONE==
--EXPECTF--
string(%d) "Invalid timeout"
int(0)
string(%d) "Invalid timeout"
int(0)
==DONE==