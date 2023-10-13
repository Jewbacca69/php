<?php

require_once "vendor/autoload.php";

use rickandmorty\VideoStore;

$videoStore = new VideoStore("https://rickandmortyapi.com/api/episode");

$videoStore->run();
