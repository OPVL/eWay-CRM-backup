<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eWay- Backup Service - <?= $pageTitle ?? 'Evaporate' ?></title>
    <link rel="stylesheet" href="/inc/main.css">
</head>

<body>
    <nav class="mat-shad">
        <h3 id="appname">eWay Backup-er</h3>
        <ul>
            <li <?php if ($_SERVER['REQUEST_URI'] == '/') echo 'class="active"';?>><a class="navlink" href="/">Dashboard</a></li>
            <li <?php if (strstr($_SERVER['REQUEST_URI'], 'search')) echo 'class="active"';?>><a class="navlink" href="/search">Search</a></li>
            <li><a class="navlink" href="/settings">Manage</a></li>
        </ul>
    </nav>