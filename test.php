<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

// This assumes that you have placed the Firebase credentials in the same directory
// as this PHP file.
$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/logistics-car-94e09b126562.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://logistics-car.firebaseio.com')
    ->create();

$database = $firebase->getDatabase();
$reference = $database->getReference('/Cars');
$referencetime = $database->getReference('/Time');

$snapshot = $reference->getSnapshot();
$snapshottime = $referencetime->getSnapshot();

$value = $snapshot->getValue();
$valuetime = $snapshottime->getValue();

//$myarray = array_shift($value); ออกค่าบนสุด
//$myarraytime = array_shift($valuetime); ออกค่าบนสุด

// $newPost = $database
//     ->getReference('blog/posts')
//     ->push([
//         'title' => 'Post title',
//         'body' => 'This should probably be longer.'
//     ]);

//$newPost->getChild('title')->set('Changed post title');
//$newPost->getValue(); // Fetches the data from the realtime database
//$newPost->remove();
echo "<pre>";
print_r($value);
print_r($valuetime);
?>