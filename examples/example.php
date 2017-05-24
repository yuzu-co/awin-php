<?php

require_once __DIR__.'/../vendor/autoload.php';

use Yuzu\Awin\Client;

$client = new Client('YOURAPITOKEN');

// Retrieve all your account
$accounts = $client->getAccounts();
// with filter
$accounts = $client->getAccounts(['type' => \Yuzu\Awin\Enum\AccountTypeEnum::PUBLISHER]);

// Retrieve all your programmes
$publisherId = 403655;
$programmes = $client->getProgrammes($publisherId, ['countryCode' => 'FR']);
// with filters
$programmes = $client->getProgrammes($publisherId, ['countryCode' => 'FR', 'relationship' => \Yuzu\Awin\Enum\RelationshipTypeEnum::JOINED]);

// Retrieve programmes detail
$advertiserId = 7476;
$programmeDetail = $client->getProgrammeDetail($publisherId, ['advertiserId' => $advertiserId]);

var_dump($accounts->getBody());
var_dump($programmes->getBody());
var_dump($programmeDetail->getBody());
