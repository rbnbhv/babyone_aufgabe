<?php
include('mysql.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Webseite des Bremerhavener Tennisvereins</title>
</head>
<body>
<!-- Header -->
<section id="header">
    <div class="header container">
        <div class="logo">
            <img src="../img/tennis.png"/>
        </div>
        <div class="nav-bar">
            <div class="brand">
                <a href="#hero">
                    <h1>Bremerhavener Tennisverein</h1>
                </a>
            </div>
            <div class="nav-list">
                <div class="hamburger">
                    <div class="bar"></div>
                </div>
                <ul>
                    <li><a href="../index.php#hero" data-after="Home">Home</a></li>
                    <li><a href="../index.php#members" data-after="Mitglieder">Mitglieder</a></li>
                    <li><a href="../index.php#register" data-after="register">register</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Header -->