<?php
//namespaceを指定すれば、同一のファイルでクラスや関数などの名前の衝突を防ぐことができます。
//そこで同じ関数名を使用するためにはnamespaceを使用して、関数を明確に区別する必要があります。
//以下にnamespaceを使用して、同一関数名を呼び出す方法を記述します。

//place.php　に続く
namespace name1;

function getName(){
    return 'melon';
}

namespace name2;

function getName(){
    return 'pan';
}

?>