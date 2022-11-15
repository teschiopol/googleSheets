<?php

// After install composer
require 'vendor/autoload.php';

$client = new \Google_Client();
$client->setApplicationName('Google Sheet');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__.'/credentials.json');
$service = new \Google_Service_Sheets($client);
$spreadSheetId = 'ID_SPECIFIC_GOOGLE_SHEET_FIND_IN_URL';
$sheetName = 'GOOGLE_SHEET_NAME_ON_BOTTOM';
