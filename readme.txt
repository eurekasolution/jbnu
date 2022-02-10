readme.txt 파일입니다.


오늘은 IoT 시각화를 위한 시뮬레이션을 이용해
시각화하는 방법에 대해 공부할 예정입니다.
필요에 따라 BootStrap 추가 설명을 드리겠습니다.


2022-02-07 첫번째 할일..
데이터베이스 테이블 만들기.

create table sensor_table (
    idx int(10) auto_increment,

    temp    float default '0.0',
    hum     float default '0.0',


    time    datetime,

    primary key(idx)

);

2022-02-10

코로나 데이터의 3d 시각화

a-b : network graph, sankey chart


2022-02-09

오늘 공부할 내용은 3d 그래프 만들기입니다.
하나씩 천천히 공부를 해 보면 좋은데,,
이를 위해서 

http://d3js.org  를 먼저 한번 구경하시면 도움이 됩니다.


http://localhost/3d/html-nodes/



오늘 할 일은 데이터 크롤링입니다.
7:00 정각에 시작하겠습니다.



Data Crawling 
자동 수집..
http://www.auction.co.kr

1. PHP, WEB Program... : Curl : Client URL
2. PyThon 


notebook git test

1. 홈페이지와 DB 연결하는 코드는 배포를 하고, 설명만 하면 될 것 같습니다.

DB 연동을 테스트하기 위해 아래와 같이 테이블을 만들고, 간단하게 데이터베이스에서 읽어오는 것만 확인해봅니다.

test
/* */
//
;
#
-- comment

create  table first_table (
    idx     int(10) auto_increment,
    id      char(20) UNIQUE not null,
    name    char(20) not null,
    age     int(5) default '10',
    time    datetime,
    primary key(idx)
);

insert into first_table (id, name, age, time) values ('test', '테스트', '22', now());
insert into first_table (id, name, age, time) values ('test1', '테스트1', '33', now());
insert into first_table (id, name, age, time) values ('test2', '테스트2', '44', now());
insert into first_table (id, name, age, time) values ('test3', '테스트3', '55', now());


2022-02-03 Database

오늘 학습할 내용은 데이터베이스입니다.
주로, 프로그래밍을 할 때 반드시 알아야하는 최소한의 쿼리(Query)를 중심으로 실습을 겸하겠습니다.

Database = DB
        = FileSystem

        Query : 질의

            검색 : Search
            삽입 : insert
            갱신 : Update
            삭제 : Delete

        Database (DB) : Excel File
        Table           : Sheet
char name[10];

char
_________
_________
_________

varchar
_________
___
_____
_______


1
2
3X  7 
4
5
6
7

create table mytable (
    idx     int(10) auto_increment,

    name    char(10) default 'user',
    id      char(10) unique,
    age     int(10)  default '10',

    primary key(idx)
);       

insert
    INSERT INTO mytable (name, id, age) VALUES ('홍길동', 'kdhong', '12');
    INSERT INTO mytable (name, id, age) VALUES ('이순신', 'sslee', '22');
    INSERT INTO mytable (name, id, age) VALUES ('강감찬', 'gckang', '42');
    INSERT INTO mytable (name, id, age) VALUES ('광개토', 'king', '13');
    INSERT INTO mytable (name, id, age) VALUES ('테스트', 'test', '32');
    INSERT INTO mytable (name, id, age) VALUES ('관리자', 'admin', '62');
    INSERT INTO mytable (name, id, age) VALUES ('김개똥', 'kimgd', '42');

Search
    SELECT 필드1, 필드2, .... FROM 테이블명 [WHERE 조건] [ORDER BY 순서] [ limit 개수]

    select name, age from mytable ;
    select * from mytable;

    select * from mytable where age>'30';
    select * from mytable order by name asc; -- desc
    select * from mytable limit 3, 2;

    select * from mytable where age>30 order by age desc, id asc;
    select * from mytable where age>10 order by age asc limit 3;

    부분검색..
    select * from mytable where name like '%김%' ;

UPDATE

    UPDATE 테이블명 SET 필드1='새값1', 필드2='새값2', ... WHERE 조건;

    update mytable set age='30' where idx='3';
    select * from mytable;

Delete
    DELETE FROM TABLE_NAME WHERE 조건;

    delete from mytable where idx='3';
    





DB : Oracle -> MySQL -> Maria DB   -> SQLite
            -> MSSQL

OS : Unix - Error Free

        - Linux
        - MS Windows