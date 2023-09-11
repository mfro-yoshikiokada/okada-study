<?php
// 通知を発行するオブジェクト
abstract class Subject {
    protected $observers = array();

    public function registerObserver( $observer ) {
        $this->observers[] = $observer;
    }

    public function removeObserver( $observer ) {
        $oid = $observer->id;

        $this->observers = array_filter( $this->observers, function ( $observer ) use ( $oid ) {
            return $observer->id != $oid;
        } );

    }

    abstract public function notifyObservers();
}

// `Subject`の内部で暗黙的に`notify`メソッドを呼ぶことで、`Subject`からの通知を受け取るオブジェクト
abstract class Observer {
    public $id, $subject;

    abstract public function notify( $time );

    function __construct( Subject $subject ) {
        $this->id      = uniqid();
        $this->subject = $subject;
        $this->subject->registerObserver( $this );
    }
}

// 帰宅時に登録している全Observerに通知を発行するオブジェクト
class SMS extends Subject {
    private $time;

    public function notifyObservers() {
        /** @type Observer $observer */
        foreach ( $this->observers as $observer ) {
            $observer->notify( $this->time );
        }
    }

    public function IAmHome( $time = null ) {
        $this->time = $time ? date( 'h時i分s秒', $time ) : date( 'h時i分s秒' );
        $this->notifyObservers();
    }
}

// 通知を受け取る人々
class GirlFriend extends Observer {
    public function notify( $time ) {
        echo "今家帰ったよ！晩御飯何にする？ ($time)<br>";
    }
}

class Mum extends Observer {
    public function notify( $time ) {
        echo "遊びにくる？？($time)<br>";
    }
}

//メイン処理

$sms = new SMS();
// SNSから通知を受け取るようにする
$girlFriend = new GirlFriend( $sms );
$mum        = new Mum( $sms );

$sms->IAmHome();
echo "<hr>";
$sms->IAmHome( time() + 3600 ); // 一時間後