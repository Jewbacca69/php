<?php

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints(Point $point1, Point $point2): void
    {
        $tempA = $point1->x;
        $point1->x = $point2->x;
        $point2->x = $tempA;
        $tempB = $point1->y;
        $point1->y = $point2->y;
        $point2->y = $tempB;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

$p1->swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")" . PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")";