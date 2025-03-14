/*

トランザクション(transaction)とは、一連のSQL処理のまとまりのことです。
SQLはDML(データ操作言語)に限ります。
たとえば、開始して、insertして、updateして、終了するといった一連の流れのまとまりのことです。

SQLのデータ操作に関しては、SQLのデータ操作(DML)の書き方まとめを参考にしてみてください。

ACID特性
トランザクション処理で担保される要素の頭文字です。

Atomicity(原子性)
Consistency(一貫性)
Isolation(独立性)
Durability(永続性)
Atomicity(原子性)とは
Atomicity(原子性)とは、SQLがすべて成功するか、またはすべて失敗することが保証されていることをいいます。
トランザクションが開始され、最初の処理（たとえばinsert)が成功し、deleteをしたとして、
そのdeleteが失敗した場合、開始時の状態へ戻します(rollback)。
トランザクション内のすべてのSQLが成功した場合は、処理を反映(commit)します。
トランザクション内に一つでも失敗があれば、失敗として開始時の状態へ戻る、このような特性をAtomicity(原子性)といいます。

Consistency(一貫性)
Consistency(一貫性)とは、トランザクションの結果が整合性を保つことを保証されていることをいいます。

たとえば、他のテーブルにも影響を与える外部キー制約のcascadeや、トリガーでの値の変更に関してもcommitやrollbackによってレコードの状態の整合性が担保されます。

Isolation(独立性)
Isolation(独立性)とは、トランザクション処理中の状態が、他のセッションから独立していることが保証されていることです。
データベースに接続した際、セッションもしくはコネクションと呼ばれるものを取得する必要があります。
接続元が複数になると、このコネクションも複数になります。
例えば、コネクション1のトランザクションの途中で、たとえば、レコードをinsertしたとします。
そのレコードは、コネクション1のトランザクションが成功するまでは、別のコネクション2からは見えない状態になります。
これをIsolation(独立性)といいます。
MySQLの場合は、分離レベルというのがあり、それを変更することで、トランザクション中のものも見れたりします。

Durability(永続性)
Durability(永続性)とは、トランザクション完了後のデータが、永続的にストレージに保持されることが保証されていることをいいます。
トランザクションが終了したあとに、たとえ障害が発生しても、データは保持されます。

-- セッション スタート
start transaction;

-- 処理を書く

-- 成功
commit;

-- 失敗
rollback;

 */
/*
 例
 */
BEGIN TRANSACTION;

UPDATE list
SET age = 0, name = 'john smith'
WHERE 1;
UPDATE list
SET age = 999, name = 'aaaaaaaaaaaaa'
WHERE 1;
COMMIT;
