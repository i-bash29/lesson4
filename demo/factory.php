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

class ShapeFactory
{
    function getShape($type){
        $type = strtoupper($type);
        switch($type){
            case "R": return new Rectangle();
            case "S": return new Square();
            case "C": return new Circle();
            default: throw new Exception("Wrong type!");
        }
    }
}

$factory = new ShapeFactory();
$round = $factory->getShape("R");
$square = $factory->getShape("S");
$circle = $factory->getShape("C");
$round->draw();
$square->draw();
$circle->draw();