<?php
namespace HoerAPI;
require "HoerAPI.php";

spl_autoload_register(function ($cl) {
    if (substr($cl, 0, 8) == "HoerAPI\\") {
        $cl = substr($cl, 8);
        if (file_exists("HoerAPI/" . $cl . ".php"))
            include "HoerAPI/" . $cl . ".php";
    }
});