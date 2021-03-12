n=int(input())

counter=2
counter2=3
counter3=5
counter4=7

for i in range(2,n,1):
    if(i>2 and (i%counter==0 or i%counter2==0 or i%counter3==0 or i%counter4==0)):
        continue
    elif(i<10):
        print(2)
        print(3)
        print(5)
        print(7)
    else:
        print(i)
