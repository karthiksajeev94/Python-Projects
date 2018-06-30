import itertools
import time

def sat(arr=[]):
    start = time.time()
    n=len(arr)
    m=len(arr[0])
    #Total number of combinations of assignments possible
    nOfComb=pow(2,m)
    found=0
    #Generating individual combinations
    x = list(itertools.product([0, 1], repeat=m))
    #For each combination
    for comb in range(nOfComb):
        f = 0
        for i in range(n):
            #For every row, start with an empty set denoting unknown assignments for x
            temp = []
            for j in range(m):
                if arr[i][j] != 0:
                    if arr[i][j] == 1:
                        temp.append(x[comb][j])
                    elif x[comb][j] == 0:
                        temp.append(1)
                    else:
                        temp.append(0)
            if sum(temp) == 0:
                f = 1
                break
        if f != 1:
            found=1
            break
    if found==1:
        print("Valid assignment found")
        for i in range(m):
            print("x",i+1,": ",x[comb][i])
    else:
        print("Valid assignment does not exist")
    print("Execution time: ", time.time()-start, "s")


sat([[0,0,1,-1,-1,1,-1,-1,0,-1],[1,-1,-1,1,1,-1,-1,0,-1,1],[-1,-1,-1,-1,-1,-1,0,1,-1,-1],[-1,0,-1,0,-1,1,1,-1,-1,-1],[0,-1,-1,1,-1,-1,1,0,-1,-1],[1,1,1,1,1,1,1,1,1,1],[-1,0,-1,0,-1,-1,1,-1,-1,-1],[0,1,-1,-1,-1,-1,0,0,1,-1],[-1,1,1,0,0,1,-1,0,1,-1],[0,0,-1,-1,-1,-1,0,0,-1,-1]])
#sat([[1,0],[-1,1],[0,-1]])
#sat([[1,0,1],[1,0,0],[0,1,-1],[0,-1,-1],[-1,-1,0]])
#sat([[1,0,1],[-1,-1,0]])
#sat([[0,0,1,-1,-1,1,0,1,-1,-1,0,0,1,-1,-1,1,0,-1,-1,-1,0,0,1,-1,-1],[1,0,-1,-1,-1,0,0,1,-1,-1,-1,0,-1,-1,-1,0,-1,1,1,-1,-1,0,-1,1,1],[-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,0,1,-1,-1,-1],[1,0,-1,-1,-1,0,0,1,-1,-1,-1,0,-1,-1,-1,0,-1,1,1,-1,-1,0,-1,-1,-1],[0,0,1,-1,-1,1,0,-1,-1,-1,0,0,1,-1,-1,1,0,-1,-1,1,1,0,1,-1,-1],[1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1],[-1,0,-1,-1,-1,0,0,1,-1,-1,-1,0,-1,-1,-1,0,-1,-1,1,-1,-1,0,-1,-1,-1],[0,0,1,-1,-1,1,0,1,-1,-1,-1,0,1,-1,-1,1,0,1,-1,-1,0,0,1,-1,-1],[-1,0,1,-1,-1,0,0,1,-1,-1,-1,0,-1,-1,-1,0,0,1,-1,-1,1,0,1,-1,-1],[0,0,-1,-1,-1,1,0,-1,-1,-1,0,0,1,-1,-1,1,0,-1,-1,-1,0,0,-1,-1,-1]])