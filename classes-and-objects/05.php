<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function displayDate(): string
    {
        return $this->getDay() . '/' . $this->getMonth() . '/' . $this->getYear();
    }
}

$date = new Date(10, 5, 2023);

echo "Date: " . $date->displayDate() . "\n";

$date->setMonth(12);
$date->setDay(25);
$date->setYear(2024);

echo "New Date: " . $date->displayDate() . "\n";
