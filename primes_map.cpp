#include <cstdio>
#include <cmath>
#include <unordered_map>

using namespace std;

unordered_map<int, int> get_primes7(int n) {
	unordered_map<int, int> s;
	if (n < 2) {
		return s;
	}
	s[2] = 2;
	if (n == 2) {
		return s;
	}
	for (int i = 3; i <= n; i += 2) {
		s[i] = i;
	}

	int mroot = (int)sqrt(n);
	int m, j;
	for (m = 3; m <= mroot; m += 2) {
		if (s.find(m) != s.end()) {
			for (j = m + m; j <= n; j += m) {
				s.erase(j);
			}
		}
	}
	return s;
}

int main() {
	for (int i = 1; i <= 10; ++i) {
		printf("Found %d prime numbers.\n", (int)get_primes7(10000000).size());
	}

	return 0;
}
