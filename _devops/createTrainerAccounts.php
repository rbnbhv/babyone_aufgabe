<?php
include ('../includes/functions.php');

$trainer = [];

$trainer[] = ['forename' => 'Anton', 'email' => 'anton@btv.de', 'password' => 'anton123'];
$trainer[] = ['forename' => 'Chris', 'email' => 'chris@btv.de', 'password' => 'chris123'];
$trainer[] = ['forename' => 'Bert', 'email' => 'anton@btv.de', 'password' => 'bert123'];

foreach($trainer as $item) {
    registerUser($item['forename'], $item['email'], $item['password']);
}