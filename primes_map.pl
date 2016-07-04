#!/usr/bin/perl

use strict;
use warnings;
use POSIX;

sub get_primes7($) {
	my ($n) = @_;

	my %s = ();

	if ($n < 2) {
		return %s;
	}
	$s{2} = 2;
	if ($n == 2) {
		return %s;
	}
	my $i;
	for ($i = 3; $i <= $n; $i += 2) {
		$s{$i} = $i;
	}
	my $mroot = floor($n ** 0.5);
	my $m;
	my $j;
	for ($m = 3; $m <= $mroot; $m += 2) {
		if (exists $s{$m}) {
			for ($j = $m + $m; $j <= $n; $j += $m) {
				if (exists $s{$j}) {
					delete $s{$j};
				}
			}
		}
	}
	return %s;
}

for (1..10) {
	my %h = get_primes7(10000000);
	print "Found " . (scalar (keys %h)) . " prime numbers.\n";
}
