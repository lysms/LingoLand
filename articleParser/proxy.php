<?php
    $URL = "https://www.washingtonpost.com/nation/2020/09/03/coronavirus-covid-live-updates-us/";

    $domain = file_get_contents($URL);

    echo $domain;
?>