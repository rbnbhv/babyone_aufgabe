<?php
include ('../includes/functions.php');

$trainer = [];

$trainer[] = ['forename' => 'Anton', 'email' => 'anton@btv.de', 'password' => 'anton123', 'isTrainer' => 1];
$trainer[] = ['forename' => 'Chris', 'email' => 'chris@btv.de', 'password' => 'chris123', 'isTrainer' => 1];
$trainer[] = ['forename' => 'Bert', 'email' => 'bert@btv.de', 'password' => 'bert123', 'isTrainer' => 1];

foreach($trainer as $item) {
    registerUser($item['forename'], $item['email'], $item['password'], $item['isTrainer']);
}