<?php
    $player_nbr = $_POST['player_nbr'];
    $players_datas = array();
    for ($compteur_joueurs = 1; $compteur_joueurs <= $player_nbr; $compteur_joueurs++){
    // $player_name[$compteur_joueurs] = $_POST['player_name' . $compteur_joueurs];
    // $player_armies[$compteur_joueurs] = $_POST['player_army' . $compteur_joueurs];
    // echo $player_name[$compteur_joueurs] . ' = ' . $player_armies[$compteur_joueurs] . '<br />';
    
    $player_name = $_POST['player_name' . $compteur_joueurs];
    $player_army = $_POST['player_army' . $compteur_joueurs];
    $players_datas[$player_name] = $player_army; 
    }
?>