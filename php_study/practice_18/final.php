<?php
class ParentClass {
    // finalメソッド
    final public function finalMethod() {
        return "This is a final method in the ParentClass.";
    }

    // オーバーライド可能なメソッド
    public function normalMethod() {
        return "This is a normal method in the ParentClass.";
    }
}

class ChildClass extends ParentClass {
    // オーバーライド
    public function normalMethod() {
        return "This is an overridden method in the ChildClass.";
    }

    // finalメソッドをオーバーライドしようとするとエラーになる
    // public function finalMethod() {
    //     return "This is an attempt to override the final method.";
    // }
}


$parentObject = new ParentClass();
$childObject = new ChildClass();

echo $parentObject->finalMethod() . PHP_EOL; // "This is a final method in the ParentClass."
echo $parentObject->normalMethod() . PHP_EOL; // "This is a normal method in the ParentClass."

echo $childObject->finalMethod() . PHP_EOL; // "This is a final method in the ParentClass."
echo $childObject->normalMethod() . PHP_EOL; // "This is an overridden method in the ChildClass."
