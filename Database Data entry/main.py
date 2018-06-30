import pymysql
conn=pymysql.connect(host="localhost",port=3306,user="root",password="")
cursor=conn.cursor()
cursor.execute("create database HW9")
conn=pymysql.connect(host="localhost",port=3306,user="root",password="",db="HW9")
cursor=conn.cursor()
countries=['Argentina','Australia','Austria','Belgium','Bolivia','Brazil','Bulgaria','Canada','Chile','France','Germany','Hungary','Japan','Mexico','Netherlands','New Zealand','Norway','Paraguay','Peru','Poland','Romania','Russia','South Africa','Spain','Sweden','Switzerland','Ukraine','United States','Uruguay']
noOfCols=len(countries)+1
createTable='create table flu (Date VARCHAR(15),'
createView='create or replace view flu1 as '
for i in countries:
    createTable+="`"+i+"` INT,"
    createView += "select Date, (select column_name from information_schema.columns where TABLE_NAME='flu' and TABLE_SCHEMA='HW9' and column_name like '" + i + "') as Country, `" + i + "` as Value from flu union "
createTable=createTable[:-1]+");"
createView=createView[:-7]+";"

cursor.execute(createTable)

with open("fluData.txt","r") as f:
    content=f.readlines()
    content=[x.strip() for x in content]

for i in range(len(content)):
    temp = content[i].split(',')
    formatted = '\'' + temp[0] + '\''
    for j in range(1,noOfCols):
        if (temp[j]==''):
            temp[j]="NULL"
    temp = ",".join(temp[1:noOfCols])
    final = formatted + "," + temp
    cursor.execute("INSERT INTO flu VALUES (%s);"%final)

cursor.execute(createView)

#QUERY 1
cursor.execute("select distinct Country from flu1 where Value>200 AND year(Date)=2003 AND month(Date)=8")
results=cursor.fetchall()
print("Query 1 results:")
for row in results:
    print("%s"%(row[0]))

#QUERY 2
cursor.execute("select distinct year(Date) from flu1 where Country='United States' AND Value>1000 order by year(Date)")
results=cursor.fetchall()
print("Query 2 results:")
for row in results:
    print("%d"%(row[0]))

#QUERY 3
cursor.execute("select year(Date), avg(Value) from flu1 group by year(Date) having avg(Value)>=(select avg(Value) from flu1 where Country='United States')")
results=cursor.fetchall()
print("Query 3 results:")
for row in results:
    print("%d %s"%(row[0],row[1]))

#QUERY 4
cursor.execute("create or replace view flu2 AS select Country, avg(Value) average from flu1 group by Country")
cursor.execute("select a.Country,b.Country from flu2 a,flu2 b where a.average BETWEEN (0.95*b.average) AND (1.05*b.average) AND a.average!=b.average")
results=cursor.fetchall()
print("Query 4 results:")
for row in results:
    print("%s %s"%(row[0],row[1]))

#QUERY 5
cursor.execute("select Country from flu1 where month(Date)=3 group by Country order by avg(Value) DESC limit 1;")
results=cursor.fetchall()
print("Query 5 results:")
for row in results:
    print("%s"%(row[0]))

conn.commit()
conn.close()