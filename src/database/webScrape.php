<!-- This is a script that will scrape Northeastern's catalogue and add all of its classes: WIP for now -->
<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://catalog.northeastern.edu/course-descriptions/');
curl_setopt($ch, CURLOPT_CUSTOMERREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);

if (!empty($ch)) {
    
}