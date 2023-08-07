<?php
//useとは名前空間の拡張機能で、外部のエイリアスやその一部を参照したり、クラス・関数・定数などをインポートするときに使用します。
//useキーワードを使用すれば、名前空間などのフルパスを短縮して、別の名称で定義することが可能です。
namespace asia\japan\tokyo\shibuya;

function getName(){
    return 'shibuya';
}

namespace asia\japan\tokyo\minato;

function getName(){
    return 'minato';
}

namespace asia\japan\tokyo\shinagawa;

function getName(){
    return 'shinagawa';
}

?>
