<?php

namespace CompanyRegister;

class Application
{
    private DataHandler $dataHandler;

    public function __construct()
    {
        $this->dataHandler = new DataHandler();
    }

    public function run()
    {
        echo "Company Register" . PHP_EOL;
        while (true) {
            $identifier = readline("Enter the registration number or name or 'q' to exit : ");

            if ($identifier === "q") {
                echo "Exiting...";
                break;
            }

            $companies = $this->dataHandler->getData($identifier);

            if (empty($companies['result']['records'])) {
                echo "Nothing found" . PHP_EOL;
            } else {
                $this->displayData($companies);
            }
        }
    }

    private function displayData(array $companies): void
    {
        echo '---------------------' . PHP_EOL;
        foreach ($companies['result']['records'] as $company) {
            echo "Name: " . $company['name_in_quotes'] . PHP_EOL;
            echo "Legal form: " . $company['type'] . PHP_EOL;
            echo "Registration number: " . $company['regcode'] . PHP_EOL;
            echo "SEPA identifier: " . $company['sepa'] . PHP_EOL;
            echo "Registered: " . $company['registered'] . PHP_EOL;
            echo "Address: " . $company['address'] . PHP_EOL;
            echo '---------------------' . PHP_EOL;
        }
    }
}
