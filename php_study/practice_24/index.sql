

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

insert into list values (, 'tanaka', 21);
mysql> select * from list;
+----+--------+-----+
| id | name   | age |
+----+--------+-----+
|  1 | Yamada |  36 |
|  2 | tanaka |  21 |
+----+--------+-----+
2 rows in set (0.00 sec)