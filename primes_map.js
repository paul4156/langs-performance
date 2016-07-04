function get_primes7(n) {
	var s = {};
	if (n < 2) { return s; }
	s[2] = 2;
	if (n == 2) { return s; }

	var i;
	for (i = 3; i < n + 1; i += 2) {
		s[i] = i;
	}

	var mroot = Math.floor(Math.sqrt(n));
	var m, j;

	for (m = 3; m <= mroot; m += 2) {
		if (typeof s[m] !== 'undefined') {
			for (j = m + m; j <= n; j += m) {
				delete s[j];
			}
		}
	}
	return s;
}

for (var i = 0; i < 10; i++) {
	var res = get_primes7(10000000);
	var count = 0, k;
	for (k in res) {
		if (res.hasOwnProperty(k)) {
			count++;
		}
	}
	console.log("Found " + count + " prime numbers.");
}
