<?php

// Require Config File
require_once __DIR__ . "/config/app.php";

// Set Query
$random = $mysql->prepare("SELECT * FROM users ORDER BY RAND() LIMIT 1;");

// Execute The Query
$random->execute();

// Get Data
$random = $random->get_result();
$random = $random->fetch_all(MYSQLI_ASSOC)[0];


?>
<!DOCTYPE html>
<html lang="ar" dir='rtl'>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Google Icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined">

        <!-- Favicon -->
        <link rel="shortcut icon" href="/" type="image/x-icon">

        <!-- CSS File -->
        <link rel="stylesheet" href="assets/css/winner.css">

        <!-- Page Title -->
        <title>الرابح بالمسابقة</title>
    </head>
    <body>
        
        <!-- Heading Text -->
        <h1>مبرووك!</h1>

        <!-- Paragraph Text -->
        <p class="paragraph-header">
            مرحباً,
            <?= $random['frist_name'] . " " . $random['last_name'] ?>
            نهئنك بالفوز بالمسابقة
        </p>

        <!-- Icon -->
        <span class="material-icons-outlined icon">emoji_events</span>
        <span>فائز</span>
        
        <!-- Back Page -->
        <a href="/">العودة للرئيسية</a>
        
    </body>
</html>