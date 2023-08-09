

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


