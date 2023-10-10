<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function showUserNameAndBalance(): string
    {
        $formattedBalance = number_format(abs($this->balance), 2);
        if ($this->balance < 0) {
            return $this->name . ", -$" . $formattedBalance;
        }
        return $this->name . ", $" . $formattedBalance;
    }
}


$benson = new BankAccount("Benson", 1.21);

echo $benson->showUserNameAndBalance();