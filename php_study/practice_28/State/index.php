<?php

// Stateの抽象クラス
abstract class TrafficLightState {
    /** @type TrafficLight $traffic_light */
    protected $traffic_light;

    function __construct( TrafficLight $traffic_light ) {
        // TrafficLightオブジェクトの参照を持たせる
        $this->traffic_light = $traffic_light;
    }

    /**
     * TrafficLightオブジェクトの「状態」を設定する
     *
     * @param string $state 状態の名前
     */
    function to_state( $state ) {
        $this->traffic_light->set_state( $this->traffic_light->get_state( $state ) );
    }

    public function to_green() {
        $from = $this->get_last_state();
        $this->to_state( 'green_state' );
        echo "{$from}から青に変える";
    }

    public function to_red() {
        $from = $this->get_last_state();
        $this->to_state( 'red_state' );
        echo "{$from}から赤に変える";
    }

    public function to_yellow() {
        $from = $this->get_last_state();
        $this->to_state( 'yellow_state' );
        echo "{$from}から黄色に変える";
    }

    /**
     * 最後の信号機の色を取得する
     * @return string
     */
    private function get_last_state() {
        $current_state = $this->traffic_light->get_state();
        $last_state    = '青';

        if ( $current_state instanceof RedState ) {
            $last_state = '赤';
        }
        if ( $current_state instanceof YellowState ) {
            $last_state = '黄色';
        }

        return $last_state;
    }
}

// TrafficLightState抽象クラスの具象クラス。「状態」ごとに少しず実装が違う。
class GreenState extends TrafficLightState {

    public function to_green() {
        echo "既に青に変わっている";
    }
}

class RedState extends TrafficLightState {

    public function to_red() {
        echo "既に赤に変わっている";
    }

}

class YellowState extends TrafficLightState {

    public function to_yellow() {
        echo "既に黄色に変わっている";
    }

}


// 主役の TrafficLightクラス。
class TrafficLight {
    /** @type TrafficLightState $state */
    private $state;

    private $red_state;
    private $green_state;
    private $yellow_state;

    function __construct() {
        // TrafficLightオブジェクトに全ての状態を持たせる
        $this->red_state    = new RedState( $this );
        $this->green_state  = new GreenState( $this );
        $this->yellow_state = new YellowState( $this );

        // 青をデフォルトの状態にする
        $this->state = $this->green_state;
    }

    public function to_green() {
        // 処理をState(GreenState)に委託する
        $this->state->to_green();
    }

    public function to_red() {
        // 処理をState(RedState)に委託する
        $this->state->to_red();
    }

    public function to_yellow() {
        // 処理をState(YellowState)に委託する
        $this->state->to_yellow();
    }

    public function set_state( TrafficLightState $state ) {
        $this->state = $state;
    }

    public function get_state( $state = null ) {
        return $state ? $this->$state : $this->state;
    }
}


$traffic_light = new TrafficLight();
?>

<section>
    <h1><code>$traffic_light->to_green()</code></h1>
    <?php $traffic_light->to_green(); ?>
</section>

<section>
    <h1><code>$traffic_light->to_red()</code></h1>
    <?php $traffic_light->to_red(); ?>
</section>

<section>
    <h1><code>$traffic_light->to_yellow()</code></h1>
    <?php $traffic_light->to_yellow(); ?>
</section>

<section>
    <h1><code>$traffic_light->to_green()</code></h1>
    <?php $traffic_light->to_green(); ?>
</section>

<section>
    <h1><code>$traffic_light->to_green()</code></h1>
    <?php $traffic_light->to_green(); ?>
</section>

<section>
    <h1><code>$traffic_light->to_yellow()</code></h1>
    <?php $traffic_light->to_yellow(); ?>
</section>