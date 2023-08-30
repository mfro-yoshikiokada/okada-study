<?php
interface Output
{
    public function outputWeak();

    public function outputStrong();
}
class Banner
{
    private $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function showWithParen()
    {
        echo "(" . $this->string . ")";
    }

    public function showWithAster()
    {
        echo "*" . $this->string . "*";
    }
}
class OutputBanner extends Banner implements Output
{
    public function __construct($string)
    {
        parent::__construct($string);
    }

    public function outputWeak()
    {
        $this->showWithParen();
    }

    public function outputStrong()
    {
        $this->showWithAster();
    }
}
class Main
{
    public function main()
    {
        $ob = new OutputBanner("hoge");
        $ob->outputWeak();
        $ob->outputStrong();
    }
}
