<?php
    $player_nbr = $_POST['player_nbr'];
    for ($compteur_joueurs = 1; $compteur_joueurs <= $player_nbr; $compteur_joueurs++){
    $player_name[$compteur_joueurs] = $_POST['player_name' . $compteur_joueurs];
    $player_armies[$compteur_joueurs] = $_POST['player_army' . $compteur_joueurs];

    echo $player_name[$compteur_joueurs] . ' = ' . $player_armies[$compteur_joueurs] . '<br />';
    
    }
?>