<?php
interface Strategy
{
    function doOp($n1, $n2);
}

class Add implements Strategy
{
    function doOp($n1, $n2){
        return $n1 + $n2;
    }
}
class Sub implements Strategy
{
    function doOp($n1, $n2){
        return $n1 - $n2;
    }
}
class Mult implements Strategy
{
    function doOp($n1, $n2){
        return $n1 * $n2;
    }
}

class Context
{
    private $s;
    function __construct($op){
        switch($op){
            case "+": $this->s = new Add(); break;
            case "-": $this->s = new Sub(); break;
            case "*": $this->s = new Mult(); break;
        }
    }
    function execute($n1, $n2){
        return $this->s->doOp($n1, $n2);
    }
}

$c = new Context("+");
echo $c->execute(2, 3);