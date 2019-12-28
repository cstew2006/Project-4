<?php
    session_start();
    include('inc/Phrase.php');
    include('inc/Game.php');
    if(filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING) !== NULL){
        $_SESSION['selected'][] = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING);
    }
    if(isset($_SESSION['phrase']) && isset($_SESSION['selected'])){
        $phrase = new Phrase($_SESSION['phrase'],$_SESSION['selected']);
    }else{
        $phrase = new Phrase(NULL,NULL);
    }
    $_SESSION['phrase'] = $phrase->getCurrentphrase();
    $game = new Game($phrase); 
    $_SESSION['lives'] = $game->getLives();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Phrase Hunter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
<div class="main-container">
    <div id="banner" class="section">
        <h2 class="header">Phrase Hunter</h2>
    </div>
</div>

</body>
</html>
