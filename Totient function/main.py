import math
def totient(n):
    #To take care of illegal input
    if n<1:
        print("Totient of",n,"is not defined")
    else:
        tot = int(n)
        for i in range(2, n + 1):
            f = 0
            #Finding factors
            if n % i == 0:
                for j in range(2, math.floor(math.sqrt(i)) + 1):
                    #Finding PRIME factors
                    if i % j == 0:
                        f = 1
                if f == 0:
                    tot = tot * (1 - (1 / i))
        print("Totient of", n, "is: ", int(tot))

totient(992013)