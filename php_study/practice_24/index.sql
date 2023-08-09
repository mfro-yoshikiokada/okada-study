

mysql> USE test;
Database changed
mysql> CREATE TABLE list(
    ->     id INT(11) AUTO_INCREMENT NOT NULL,
    ->     name VARCHAR(30) NOT NULL ,
    ->     age INT(3) NOT NULL,
    ->     PRIMARY KEY (id));
Query OK, 0 rows affected (0.02 sec)

mysql>
mysql> DESC list;
+-------+-------------+------+-----+---------+----------------+
| Field | Type        | Null | Key | Default | Extra          |
+-------+-------------+------+-----+---------+----------------+
| id    | int(11)     | NO   | PRI | NULL    | auto_increment |
| name  | varchar(30) | NO   |     | NULL    |                |
| age   | int(3)      | NO   |     | NULL    |                |
+-------+-------------+------+-----+---------+----------------+
3 rows in set (0.01 sec)

insert into list values (1, 'Yamada', 36);

insert into list values (2, 'tanaka', 21);
insert into list values (3, 'baba', 36);

insert into list values (4, 'yamamoto', 23);
mysql> select * from list;
+----+----------+-----+
| id | name     | age |
+----+----------+-----+
|  1 | Yamada   |  36 |
|  2 | tanaka   |  21 |
|  3 | baba     |  36 |
|  4 | yamamoto |  23 |
+----+----------+-----+
4 rows in set (0.00 sec)

mysql> select * from list WHERE age=36;
+----+--------+-----+
| id | name   | age |
+----+--------+-----+
|  1 | Yamada |  36 |
|  3 | baba   |  36 |
+----+--------+-----+
2 rows in set (0.00 sec)

mysql> select * from list WHERE age<36;
+----+----------+-----+
| id | name     | age |
+----+----------+-----+
|  2 | tanaka   |  21 |
|  4 | yamamoto |  23 |
+----+----------+-----+
2 rows in set (0.00 sec)


mysql> select * from list WHERE age<36 and id>3;
+----+----------+-----+
| id | name     | age |
+----+----------+-----+
|  4 | yamamoto |  23 |
+----+----------+-----+
1 row in set (0.00 sec)

create table report (name varchar(10), color varchar(10), sales int);
mysql> select name, sum(sales) from report group by name;
insert into report values ('Bag', 'Black', 4500);
insert into report values ('Wallet', 'White', 3800);
insert into report values ('Bag', 'Red', 5100);
insert into report values ('Bag', 'Black', 4600);
insert into report values ('Wallet', 'Black', 3900);
insert into report values ('Wallet', 'White', 4000);
insert into report values ('Bag', 'Red', 5200);

mysql>  select * from report;
+--------+-------+-------+
| name   | color | sales |
+--------+-------+-------+
| Bag    | Black |  4500 |
| Wallet | White |  3800 |
| Bag    | Red   |  5100 |
| Bag    | Black |  4600 |
| Wallet | Black |  3900 |
| Wallet | White |  4000 |
| Bag    | Red   |  5200 |
+--------+-------+-------+
7 rows in set (0.00 sec)

+--------+------------+
| name   | sum(sales) |
+--------+------------+
| Bag    |      19400 |
| Wallet |      11700 |
+--------+------------+
2 rows in set (0.00 sec)

create table user (name varchar(10), address varchar(10), old int);

insert into user values ('Yamada', 'Tokyo', 25);
insert into user values ('Suzuki', 'Osaka', 19);
insert into user values ('Kudou', 'Nagoya', 34);
insert into user values ('Shima', 'Tokyo', 17);
insert into user values ('Nishi', 'Chiba', 28);
insert into user values ('Harada', 'Osaka', 35);
insert into user values ('Yasuda', 'Fukuoka', 16);
insert into user values ('Sugisaki', 'Tokyo', 41);



mysql> select * from user;
+----------+---------+------+
| name     | address | old  |
+----------+---------+------+
| Yamada   | Tokyo   |   25 |
| Suzuki   | Osaka   |   19 |
| Kudou    | Nagoya  |   34 |
| Shima    | Tokyo   |   17 |
| Nishi    | Chiba   |   28 |
| Harada   | Osaka   |   35 |
| Yasuda   | Fukuoka |   16 |
| Sugisaki | Tokyo   |   41 |
+----------+---------+------+
8 rows in set (0.01 sec)

mysql> select * from user order by address;
+----------+---------+------+
| name     | address | old  |
+----------+---------+------+
| Nishi    | Chiba   |   28 |
| Yasuda   | Fukuoka |   16 |
| Kudou    | Nagoya  |   34 |
| Suzuki   | Osaka   |   19 |
| Harada   | Osaka   |   35 |
| Yamada   | Tokyo   |   25 |
| Shima    | Tokyo   |   17 |
| Sugisaki | Tokyo   |   41 |
+----------+---------+------+
8 rows in set (0.00 sec)

mysql> select * from user order by address desc;
+----------+---------+------+
| name     | address | old  |
+----------+---------+------+
| Yamada   | Tokyo   |   25 |
| Shima    | Tokyo   |   17 |
| Sugisaki | Tokyo   |   41 |
| Suzuki   | Osaka   |   19 |
| Harada   | Osaka   |   35 |
| Kudou    | Nagoya  |   34 |
| Yasuda   | Fukuoka |   16 |
| Nishi    | Chiba   |   28 |
+----------+---------+------+
8 rows in set (0.00 sec)

mysql> select * from user order by address desc, old asc;
+----------+---------+------+
| name     | address | old  |
+----------+---------+------+
| Shima    | Tokyo   |   17 |
| Yamada   | Tokyo   |   25 |
| Sugisaki | Tokyo   |   41 |
| Suzuki   | Osaka   |   19 |
| Harada   | Osaka   |   35 |
| Kudou    | Nagoya  |   34 |
| Yasuda   | Fukuoka |   16 |
| Nishi    | Chiba   |   28 |
+----------+---------+------+
8 rows in set (0.00 sec)

/* inner join
 */
CREATE TABLE sample1_employees (
    no int NOT NULL, -- 従業員番号
    department_no char(5), -- 部署番号
    last_name varchar(255), -- 名
    first_name varchar(255), -- 姓
    PRIMARY KEY (no)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- テストデータ
INSERT INTO sample1_employees VALUES('10001', 'A0001','yamada','taro');
INSERT INTO sample1_employees VALUES('10002', 'A0001','yamada','jiro');
INSERT INTO sample1_employees VALUES('10003', 'A0002','yamada','hanako');
INSERT INTO sample1_employees VALUES('10004', 'A0003','yamada','saburou');
select * from sample1_employees;

CREATE TABLE sample1_departments (
    department_no     char(5),     -- 部署番号
    department_name varchar(255),  -- 部署名
    PRIMARY KEY (department_no)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
INSERT INTO sample1_departments VALUES('A0001', 'application dev');
INSERT INTO sample1_departments VALUES('A0002', 'database dev');
INSERT INTO sample1_departments VALUES('B0003', 'Web design');

mysql> SELECT * FROM sample1_employees a INNER JOIN sample1_departments b ON a.department_no = b.department_no;
+-------+---------------+-----------+------------+---------------+-----------------+
| no    | department_no | last_name | first_name | department_no | department_name |
+-------+---------------+-----------+------------+---------------+-----------------+
| 10001 | A0001         | yamada    | taro       | A0001         | application dev |
| 10002 | A0001         | yamada    | jiro       | A0001         | application dev |
| 10003 | A0002         | yamada    | hanako     | A0002         | database dev    |
+-------+---------------+-----------+------------+---------------+-----------------+
3 rows in set (0.00 sec)


create table staff(id integer, name text, deptid integer);

insert into staff values(1, 'Suzuki', 1);
insert into staff values(2, 'Endou', 3);
insert into staff values(3, 'Katou', 1);
insert into staff values(4, 'Yamada', 2);
insert into staff values(5, 'Takahashi', 4);
insert into staff values(6, 'Honda', 3);

create table dept(id integer, name text);

insert into dept values(1, 'Sales');
insert into dept values(2, 'Manage');
insert into dept values(3, 'Dev');]

select * from staff left outer join dept on staff.deptid = dept.id;

mysql> select * from staff left outer join dept on staff.deptid = dept.id;
+------+-----------+--------+------+--------+
| id   | name      | deptid | id   | name   |
+------+-----------+--------+------+--------+
|    1 | Suzuki    |      1 |    1 | Sales  |
|    3 | Katou     |      1 |    1 | Sales  |
|    4 | Yamada    |      2 |    2 | Manage |
|    2 | Endou     |      3 |    3 | Dev    |
|    6 | Honda     |      3 |    3 | Dev    |
|    5 | Takahashi |      4 | NULL | NULL   |
+------+-----------+--------+------+--------+
6 rows in set (0.00 sec)

mysql>
mysql> select * from dept left outer join staff on dept.id = staff.deptid;
+------+--------+------+--------+--------+
| id   | name   | id   | name   | deptid |
+------+--------+------+--------+--------+
|    1 | Sales  |    1 | Suzuki |      1 |
|    3 | Dev    |    2 | Endou  |      3 |
|    1 | Sales  |    3 | Katou  |      1 |
|    2 | Manage |    4 | Yamada |      2 |
|    3 | Dev    |    6 | Honda  |      3 |
+------+--------+------+--------+--------+
5 rows in set (0.00 sec)

