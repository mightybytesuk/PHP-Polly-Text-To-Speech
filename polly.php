<?php
include 'config.php';
require 'vendor/autoload.php';
//AWS keys to use polly
$key = 'KEY';
$secret = 'SECRET_KEY';

$textdata = $_GET['data'];





$polly = new Aws\Polly\PollyClient(array(
  'region' => 'us-east-1',
  'version' => 'latest',
  'http'    => [         'verify' => false     ],
  'credentials' => [
        'key' => $key,
        'secret' => $secret,
  ]
));
$result = $polly->synthesizeSpeech([
    'OutputFormat' => 'mp3',
    'Text' => $textdata,
    'VoiceId' => 'Joanna',
    
]);

$newdata = $result->get('AudioStream')->getContents();

$uid = uniqid();
$myfile = fopen("downloads/".$uid."download.mp3", "w");
fwrite($myfile, $newdata);
fclose($myfile);

$file = "downloads/".$uid."download.mp3";

$sql = "INSERT INTO downloads (id, file_path) VALUES (NULL, '$file')";

$res = mysqli_query($connect,$sql);

header("location: downloads.php");
