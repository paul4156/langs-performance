import sys

def get_primes7(n):
	s = {};
	if n < 2: return s
	s[2] = 2
	if n == 2: return s
	# do only odd numbers starting at 3
	if sys.version_info.major <= 2:
		for i in xrange(3, n + 1, 2):
			s[i] = i
	else: # Python 3
		for i in range(3, n + 1,2):
			s[i] = 1
	mroot = int(n ** 0.5)
	if sys.version_info.major <= 2:
		for m in xrange(3, mroot + 1, 2):
			if m in s:
				for j in xrange(m + m, n + 1, m):
					s.pop(j, None)
	else: # Python 3
		for m in range(3, mroot + 1, 2):
			if m in s:
				for j in range(m + m, n + 1, m):
					s.pop(j, None)
	return s

for t in range(10):
	res = get_primes7(10000000)
	print("Found {} prime numbers." . format(len(res)))
