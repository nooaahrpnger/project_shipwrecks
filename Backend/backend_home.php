<?php
/* Rippinger Noah */






// Simulating content fetching from a database or configuration file
$siteContent = [
    'title' => 'Welcome to Our Shipwreck Research Hub',
    'description' => 'Explore the mysteries of sunken ships, participate in quizzes, browse our specialized shop, and use our search function to discover fascinating historical shipwrecks around the globe.'
];

// Return JSON content when requested
header('Content-Type: application/json');
echo json_encode($siteContent);
