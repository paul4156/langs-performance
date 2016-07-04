<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

function get_primes7($n) {
	if ($n < 2) {
		return [];
	}
	$s = [2 => 2];
	if ($n == 2) {
		return $s;
	}
	for ($i = 3; $i <= $n; $i += 2) {
		$s[$i] = $i;
	}
	$mroot = (int)sqrt($n);
	for ($m = 3; $m <= $mroot; $m += 2) {
		if (!empty($s[$m])) {
			for ($j = $m + $m; $j <= $n; $j += $m) {
				unset($s[$j]);
			}
		}
	}
	return $s;
}

$res = [];
for ($i = 1; $i <= 10; ++$i) {
	print "Found " . count(get_primes7(10000000)) . " prime numbers.\n";
}
