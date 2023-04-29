<?php
interface Shape
{
    function draw();
}

class Rectangle implements Shape
{
    function draw(){
        echo __METHOD__."\n";
    }
}
class Square implements Shape
{
    function draw(){
        echo __METHOD__."\n";
    }
}
class Circle implements Shape
{
    function draw(){
        echo __METHOD__."\n";
    }
}

abstract class ShapeDecorator implements Shape
{
    protected $decoratedShape;
    function __construct(Shape $decoratedShape){
        $this->decoratedShape = $decoratedShape;
    }
    function draw(){
        $this->decoratedShape->draw();
    }
}

class RedShapeDecorator extends ShapeDecorator
{
    function __construct(Shape $decoratedShape){
        parent::__construct($decoratedShape);
    }
    private function setRedBorder(){
        echo "BORDER COLOR RED\n";
    }
    function draw(){
        $this->decoratedShape->draw();
        $this->setRedBorder();
    }
}

$c = new Circle;
$rc = new RedShapeDecorator(new Circle);
$c->draw();
$rc->draw();