# hoerapi.php

(Inspired by https://github.com/hoersuppe/hoerapi.py)

## Usage
```
<?php
require "hoerapi.php";
use HoerAPI\HoerAPI;

$podcasts = HoerAPI::getPodcasts();
foreach ($podcasts as $pod) {
    echo $pod->slug . "<br />";
}
```