<?php

class Account
{
    public string $name;
    public string $balance;

    public function __construct(string $name, string $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): string
    {
        return $this->balance;
    }

    public function displayAccountInfo(): string
    {
        return $this->getName() . " Balance is : " . $this->getBalance() . PHP_EOL;
    }

    public function withdraw(string $amount): void
    {
        $this->balance = $this->getBalance() - $amount;
    }

    public function transfer(Account $to, int $howMuch): void
    {
        if ($this->balance >= $howMuch) {
            $this->balance -= $howMuch;
            $to->balance += $howMuch;
        }
    }
}

$accounts = [
    $accountA = new Account("A", 1000),
    $accountB = new Account("B", 0),
    $accountC = new Account("C", 0)
];

echo "Initial Data" . PHP_EOL;
echo $accounts[0]->displayAccountInfo();
echo $accounts[1]->displayAccountInfo();
echo $accounts[2]->displayAccountInfo();

$accounts[0]->withdraw(200);
$accounts[0]->transfer($accounts[1], 50.0);
$accounts[1]->transfer($accounts[2], 25.0);

echo "Updated Data" . PHP_EOL;

foreach ($accounts as $account) {
    echo $account->displayAccountInfo();
}
