<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

function get_primes7($n) {
	if ($n < 2) return array();
	if ($n == 2) return array(2);
	$s = range(3, $n, 2);
	$mroot = (int)sqrt($n);
	$half = count($s);
	$i = 0;
	$m = 3;
	while ($m <= $mroot) {
		if (!empty($s[$i])) {
			$j = (int)(($m*$m - 3) / 2);
			while ($j < $half) {
				unset($s[$j]);
				$j += $m;
			}
		}
		$i = $i + 1;
		$m = 2*$i + 3;
	}
	array_unshift($s, 2);
	return $s;
}

$res = array();
for ($i = 1; $i <= 10; ++$i) {
	$res = get_primes7(10000000);
	print "Found ".count($res)." prime numbers.\n";
}
