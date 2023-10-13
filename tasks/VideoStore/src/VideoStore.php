<?php

namespace rickandmorty;

use Exception;
class VideoStore
{
    private string $api;
    private ?array $rating;

    public function __construct(string $api)
    {
        $this->api = $api;
        $this->rating = null;
        $this->loadRatings();
    }

    public function run()
    {
        while (true) {
            echo "Menu:\n1) Rate an episode\n2) View current ratings\n3) Quit\n";
            $choice = readline("Enter your choice: ");

            switch ($choice) {
                case '1':
                    $this->rateEpisode();
                    break;
                case '2':
                    $this->viewRatings();
                    break;
                case '3':
                    echo "Goodbye!\n";
                    exit;
                default:
                    echo "Invalid choice. Please enter 1, 2, or 3.\n";
            }
        }
    }

    private function loadRatings()
    {
        $this->rating = file_exists('ratings.json') ? json_decode(file_get_contents('ratings.json'), true) : [];
    }

    private function storeRating($episodeTitle, $rating) : void
    {
        $this->rating[$episodeTitle] = (int)$rating;
        file_put_contents('ratings.json', json_encode($this->rating));
    }

    private function getData($page): ?array
    {
        $url = $this->api . "?page={$page}";

        try {
            $response = file_get_contents($url);

            if ($response === false) {
                echo "Failed to retrieve data from the API.\n";
                return null;
            }

            $data = json_decode($response, true);

            if (!is_array($data) || (isset($data['error']) && $data['error'] === "There is nothing here")) {
                echo "No episodes found on page $page. Please enter 'q' to quit.\n";
                return null;
            }

            return $data;
        } catch (Exception $e) {
            echo "An error occurred while fetching data from the API: " . $e->getMessage() . "\n";
            return null;
        }
    }

    public function rateEpisode() : void
    {
        $episodesPerPage = 20;
        $currentPage = 1;
        $episodeIndex = 1;

        while (true) {
            $episodesData = $this->getData($currentPage);

            if (empty($episodesData['results'])) {
                echo "No episodes found on page $currentPage. Please enter 'q' to quit.\n";
                $selectedEpisode = 'q';
            } else {
                echo "Episode List (Page $currentPage):\n";
                for ($i = 0; $i < count($episodesData['results']); $i++) {
                    echo ($episodeIndex + $i) . ". Episode {$episodesData['results'][$i]['episode']}: {$episodesData['results'][$i]['name']}\n";
                }

                $selectedEpisode = readline("Enter the episode number you want to rate (Go back : q, Next page : n, Previous page : p):");
            }

            if ($selectedEpisode === 'q') {
                return;
            } elseif ($selectedEpisode === 'n') {
                $currentPage++;
                $episodeIndex += count($episodesData['results']);
                continue;
            } elseif ($selectedEpisode === 'p' && $currentPage > 1) {
                $currentPage--;
                $episodeIndex -= $episodesPerPage;
                continue;
            }

            $selectedEpisode = (int)$selectedEpisode;

            if (!is_numeric($selectedEpisode) || $selectedEpisode < $episodeIndex || $selectedEpisode > $episodeIndex + count($episodesData['results']) - 1) {
                echo "Invalid episode selection.\n";
                continue;
            }

            $selectedEpisodeData = $episodesData['results'][$selectedEpisode - $episodeIndex];
            $selectedEpisodeTitle = $selectedEpisodeData['name'];

            $rating = readline("Enter your rating for '{$selectedEpisodeTitle}' (1-10): ");
            if (!is_numeric($rating) || $rating < 1 || $rating > 10) {
                echo "Invalid rating. Please enter a number between 1 and 10.\n";
                continue;
            }

            $this->storeRating($selectedEpisodeTitle, $rating);
            echo "Rating for '{$selectedEpisodeTitle}' has been saved.\n";
        }
    }

    public function viewRatings() : void
    {
        if (empty($this->rating)) {
            echo "No ratings available.\n";
        } else {
            echo "Current Ratings:\n";
            foreach ($this->rating as $episodeTitle => $rating) {
                echo "Episode: {$episodeTitle}, Rating: {$rating}\n";
            }
        }
    }
}
