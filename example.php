<?php
require "api.php";
use HoerAPI\HoerAPI;

$podcasts = HoerAPI::getPodcasts();

echo "Podcasts:<ul>";
foreach ($podcasts as $pod) {
    echo "<li>[{$pod->slug}] {$pod->title}</li>";
}
echo "</ul>";