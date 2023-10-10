<?php

class SavingsAccount
{
    private float $balance;
    private float $annualInterestRate;

    public function __construct($balance, $annualInterestRate)
    {
        $this->balance = $balance;
        $this->annualInterestRate = $annualInterestRate;
    }

    public function deposit($amount) : void
    {
        $this->balance += $amount;
    }

    public function withdraw($amount) : void
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "Insufficient balance for withdrawal.\n";
        }
    }

    public function addMonthlyInterest() : void
    {
        $monthlyInterestRate = $this->annualInterestRate / 12;
        $monthlyInterest = $this->balance * $monthlyInterestRate;
        $this->balance += $monthlyInterest;
    }

    public function getBalance() : float
    {
        return $this->balance;
    }
}

echo "How much money is in the account?: ";
$initialBalance = floatval(readline());
echo "Enter the annual interest rate: ";
$annualInterestRate = floatval(readline());
echo "How long has the account been opened? ";
$months = intval(readline());

$savingsAccount = new SavingsAccount($initialBalance, $annualInterestRate);

$totalDeposits = 0;
$totalWithdrawals = 0;

for ($i = 1; $i <= $months; $i++) {
    echo "Enter amount deposited for month $i: ";
    $depositAmount = floatval(readline());
    $savingsAccount->deposit($depositAmount);
    $totalDeposits += $depositAmount;

    echo "Enter amount withdrawn for month $i: ";
    $withdrawAmount = floatval(readline());
    $savingsAccount->withdraw($withdrawAmount);
    $totalWithdrawals += $withdrawAmount;

    $savingsAccount->addMonthlyInterest();
}

$endingBalance = $savingsAccount->getBalance();
$interestEarned = $endingBalance - ($initialBalance + $totalDeposits - $totalWithdrawals);

echo "Total deposited: $" . number_format($totalDeposits, 2) . PHP_EOL;
echo "Total withdrawn: $" . number_format($totalWithdrawals, 2) . PHP_EOL;
echo "Interest earned: $" . number_format($interestEarned, 2) . PHP_EOL;
echo "Ending balance: $" . number_format($endingBalance, 2) . PHP_EOL;