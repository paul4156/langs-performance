import java.util.*;
import java.lang.Math;

class PrimeNumbersGenerator {
	HashMap<Integer, Integer> get_primes7(int n) {
		HashMap<Integer, Integer> res = new HashMap<Integer, Integer>();

		if (n < 2) return res;
		res.put(2, 2);
		if (n == 2) {
			return res;
		}
		for (int i = 3; i < n + 1; i += 2) {
			res.put(i, i);
		}
		int mroot = (int)Math.sqrt(n);
		int m, j;
		for (m = 3; m <= mroot; m+= 2) {
			if (res.containsKey(m)) {
				for (j = m + m; j <= n; j += m) {
					res.remove(j);
				}
			}
		}
		return res;
	}
}

class PrimeNumbersBenchmarkApp {
	public static void main(String[] args) {
		for (int i = 1; i <= 10; ++i) {
			System.out.format("Found %d prime numbers.\n", (new PrimeNumbersGenerator()).get_primes7(10000000).size());
		}
	}
}
