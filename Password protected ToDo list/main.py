def modInverse(e,m):
    f=0
    for i in range(2, m + 1):
        if m % i == 0 and e % i==0:
            f=1
            break
    if f==1:
        print("Modular inverse does not exist. Nos. are not co-prime")
    else:
        for i in range(e+1):
            if (m*i+1)%e==0:
                print(int((m*i+1)/e))
                break

modInverse(12,1441)
