<?php

class Movie
{
    public string $title;
    public string $studio;
    public string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public static function GetPG(array $movies): array
    {
        $pgMovies = [];
        foreach ($movies as $movie) {
            if ($movie->rating === "PG") {
                $pgMovies[] = $movie;
            }
        }
        return $pgMovies;
    }
}

$movie1 = new Movie("Movie 1", "Studio 1", "PG-13");
$movie2 = new Movie("Movie 2", "Studio 2", "PG");
$movie3 = new Movie("Movie 3", "Studio 3", "PG");

$movies = [$movie1, $movie2, $movie3];

$pgRatedMovies = Movie::GetPG($movies);

foreach ($pgRatedMovies as $pgMovie) {
    echo "Title: " . $pgMovie->title . "\n";
    echo "Studio: " . $pgMovie->studio . "\n";
    echo "Rating: " . $pgMovie->rating . "\n\n";
}
