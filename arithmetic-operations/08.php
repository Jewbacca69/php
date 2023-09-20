<?php

$employees = [
    'John' => ['basePay' => 8.20, 'hoursWorked' => 47],
    'Jane' => ['basePay' => 7.50, 'hoursWorked' => 35],
    'Peter' => ['basePay' => 10.00, 'hoursWorked' => 73],
];

$data = [
    "minWage" => 8.00,
    "maxRegularHours" => 40,
    "maxTotalHours" => 60,
    "overtimeRate" => 1.5,
];

function calculatePay(float $basePay, float $hoursWorked, array $data): string
{
    if ($basePay < $data["minWage"]) {
        return "Rate is below the minimum, RATE : $basePay";
    } elseif ($hoursWorked > $data["maxTotalHours"]) {
        return "Worked too much... Hours worked : $hoursWorked";
    } else {
        $regularPay = min($hoursWorked, $data["maxRegularHours"]) * $basePay;
        $overtimeHours = max($hoursWorked - $data["maxRegularHours"], 0);
        $overtimePay = $overtimeHours * $basePay * $data["overtimeRate"];
        $totalPay = $regularPay + $overtimePay;
        return "WAGE : " . number_format($totalPay, 1) . ", HOURS WORKED : $hoursWorked";
    }
}

foreach ($employees as $employeeName => $employeeData) {
    $result = calculatePay($employeeData['basePay'], $employeeData['hoursWorked'], $data);
    echo "NAME : $employeeName, $result\n";
}
