<?php
include ('../includes/functions.php');

$trainer = [];

$trainer[] = ['forename' => 'Anton', 'email' => 'anton@btv.de', 'password' => 'anton123', 'isTrainer' => 1, 'phonenumber' => '02524-123456'];
$trainer[] = ['forename' => 'Chris', 'email' => 'chris@btv.de', 'password' => 'chris123', 'isTrainer' => 1, 'phonenumber' => '02512-98765'];
$trainer[] = ['forename' => 'Bert', 'email' => 'bert@btv.de', 'password' => 'bert123', 'isTrainer' => 1, 'phonenumber' => '0174-123456'];

foreach($trainer as $item) {
    User::registerUser($item['forename'], $item['email'], $item['password'], $item['isTrainer'], $item['phonenumber']);
}