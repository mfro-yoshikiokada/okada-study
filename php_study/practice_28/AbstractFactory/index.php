<?php
interface Robot
{
public function say();
}

class BlueRobot implements Robot
{
private $color;

public function __construct($color)
{
$this->color = $color;
}

public function say()
{
echo $this->color;
}
}

class YellowRobot implements Robot
{
private $color;

public function __construct($color)
{
$this->color = $color;
}

public function say()
{
echo $this->color;
}
}

class RobotFactory
{
public function create($color)
{
if ($color === 'blue') {
return new BlueRobot($color);
}

if ($color === 'yellow') {
return new YellowRobot($color);
}

throw new Exception("Can't create an instance");
}
}

$robotFactory = new RobotFactory();

try {
$blueRobot = $robotFactory->create('blue');
$blueRobot->say(); // blue

$yellowRobot = $robotFactory->create('yellow');
$yellowRobot->say(); // yellow

$greenRobot = $robotFactory->create('green');
$greenRobot->say(); // Cat't create an instance
} catch (\Exception $e) {
echo $e->getMessage();
}