<?php

$connect = mysqli_connect('localhost','root','','polly');


if(!$connect){
    echo "Error with db";
}