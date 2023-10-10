<?php

class Application
{
    private VideoStore $videoStore;

    public function __construct()
    {
        $this->videoStore = new VideoStore();
    }

    public function run()
    {
        while (true) {
            echo "Choose the operation you want to perform\n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!\n";
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you.\n";
            }
        }
    }

    private function addMovies()
    {
        echo "Enter the title of the video: ";
        $title = readline();
        $this->videoStore->addVideo($title);
    }

    private function rentVideo()
    {
        echo "Enter the title of the video to rent: ";
        $title = readline();
        $this->videoStore->rentVideo($title);
    }

    private function returnVideo()
    {
        echo "Enter the title of the video to return: ";
        $title = readline();
        $this->videoStore->returnVideo($title);
    }

    private function listInventory()
    {
        $this->videoStore->listInventory();
    }
}

class VideoStore
{
    private array $stock;

    public function __construct()
    {
        $this->stock = [];
    }

    public function addVideo(string $title): void
    {
        foreach ($this->stock as $video) {
            if ($video->getTitle($title)) {
                echo "Video ($title) already exists.";
            }
        }

        $newVideo = new Video($title);
        $this->stock[] = $newVideo;
        echo "($title) added to the stock.";
    }

    public function rentVideo(string $title): void
    {
        foreach ($this->stock as $video) {
            if ($video->getTitle() === $title) {
                if (!$video->isCheckedOut()) {
                    $video->setCheckedOut(true);
                    echo "Video '$title' has been rented.\n";
                } else {
                    echo "Video '$title' is already rented.\n";
                }
                return;
            }
        }

        echo "Video '$title' not found in the stock.\n";
    }

    public function returnVideo(string $title): void
    {
        foreach ($this->stock as $video) {
            if ($video->getTitle() === $title) {
                if ($video->isCheckedOut()) {
                    $video->returnVideo();
                    echo "Video '$title' has been returned.\n";
                    echo "Enter your rating for '$title' (1-5): ";
                    $rating = (float)readline();
                    $video->setRating($rating);
                } else {
                    echo "Video '$title' is not rented.\n";
                }
                return;
            }
        }

        echo "Video '$title' not found in the inventory.\n";
    }

    public function listInventory(): void
    {
        echo "Inventory Listing:\n";
        foreach ($this->stock as $video) {
            echo "Title: " . $video->getTitle() . "\n";
            echo "Average Rating: " . $video->getAverageRating() . "\n";
            echo "Checked Out: " . ($video->isCheckedOut() ? "Yes" : "No") . "\n";
            echo "---------------------------\n";
        }
    }
}

class Video
{
    private string $title;
    private bool $checkedOut;
    private float $averageRating;
    private int $totalRating;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->checkedOut = false;
        $this->averageRating = 0.0;
        $this->totalRating = 0;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isCheckedOut(): bool
    {
        return $this->checkedOut;
    }

    public function setCheckedOut(bool $checkedOut): void
    {
        $this->checkedOut = $checkedOut;
    }

    public function returnVideo(): void
    {
        $this->checkedOut = false;
    }

    public function setRating(float $rating): void
    {
        $this->averageRating = ($this->averageRating * $this->totalRating + $rating) / ($this->totalRating + 1);
        $this->totalRating++;
    }

    public function getAverageRating(): float
    {
        return $this->averageRating;
    }

}

$app = new Application();
$app->run();

