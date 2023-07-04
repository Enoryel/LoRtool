<?php
$players_datas = array();

function console_log($debug){
  echo "<script>console.log('{$debug}');</script>";
}
function accessDB() {
  //Configuration accès database
  $ser="localhost:3306";
  $user="root";
  $pass="";
  $db="test";
  $conn = mysqli_connect($ser ,$user ,$pass ,$db) or die("Connection Failed");

  $conn->query("SET NAMES 'utf8'"); 
  $conn->query("SET CHARACTER SET utf8");  
  $conn->query("SET SESSION collation_connection = 'utf8_unicode_ci'");

  return $conn;
};

function getMinPlayers() {
  $conn = accessDB();

  //Récupération nombre de joueurs min
  $requete = "SELECT valeur FROM setup WHERE option = 'nbr_joueurs_min'";
  $resultat = mysqli_query($conn, $requete);
  $row = mysqli_fetch_row($resultat);
  $nbr_joueurs_min = $row[0];

  mysqli_close($conn);

  return $nbr_joueurs_min;
}

function getMaxPlayers() {
  $conn = accessDB();

  //Récupération nombre de joueurs max
  $requete = "SELECT DISTINCT valeur FROM setup WHERE option = 'nbr_joueurs_max'";
  $resultat = mysqli_query($conn, $requete);
  $row = mysqli_fetch_row($resultat);
  $nbr_joueurs_max = $row[0];

  mysqli_close($conn);

  return $nbr_joueurs_max;
}

function getArmies() {  
  $conn = accessDB();

  //Récupération armées
  $requete = "SELECT DISTINCT ARMEE FROM units_data";
  $resultat = mysqli_query($conn, $requete);

  $armiesList = [];
  $compteur = 0;
  while ($donnees = mysqli_fetch_array($resultat)) {
    $armiesList[$compteur] = $donnees["ARMEE"];
    $compteur ++; 
  }
    
  mysqli_close($conn);

  foreach($armiesList as $option) {
    echo '<option value="' . $option . '">' . $option . '</option>';
  };
}

function getDatasAndGeneratePlayers() {
  global $players_datas, $player_nbr;
  $newLineNext = false;
  
  //Stockage données du formulaire index.php
  $player_nbr = $_POST['player_nbr'];
  echo "<div class='row'>";

  for ($compteur_joueurs = 1; $compteur_joueurs <= $player_nbr; $compteur_joueurs++) { 
      $player_name = $_POST["player{$compteur_joueurs}_name"];
      $player_army = $_POST["player{$compteur_joueurs}_army"];
      $players_datas[$player_name] = $player_army;

      if ($compteur_joueurs == $player_nbr) //SI c'est le dernier joueur généré
      { 
        if (evenOrOdd($player_nbr) == "even")
        {
          console_log("Nombre de joueur evenOrOdd($player_nbr) : Je génère le dernier joueur " . $player_name . " à droite");
          generatePlayerButton($player_name, "text-start"); 
        }
        else if (evenOrOdd($player_nbr) == "odd")
        {
          generatePlayerButton($player_name, "text-center");
          console_log("Nombre de joueur evenOrOdd($player_nbr) : Je génère le dernier joueur " . $player_name . " au centre");
        }  
      }

      else if($newLineNext) //S'il est à DROITE (fin de ligne = une nouvelle ligne doit être générée)
      {
        generatePlayerButton($player_name, "text-start");
        echo "</div><div class='row'>";
        $newLineNext = false;
        console_log("Je génère le joueur " . $player_name . " à droite");

      }

      else if(!$newLineNext) //S'il est à GAUCHE (début de ligne)
      {
        generatePlayerButton($player_name, "text-end");
        $newLineNext = true;
        console_log("Je génère le joueur " . $player_name . " à gauche");
      }
    }

  echo "</div>";

  //Récupération des unités BDD SQL
  }

function evenOrOdd($number) {
  if ($number%2 == 1){
    return "odd";
  }
  else {
    return "even";
  }
}

function generatePlayerButton($player, $align) {
    echo "<div class='col $align'>
    <button type='button' class='btn btn-outline-dark my-2' style='width:100pt' autocomplete='off' id='$player' onclick='playerIsSelected(\"{$player}\")'>{$player}</button>
    </div>";

}
  
function generateUnitSelector() {
  global $players_datas, $player_nbr;
  

  echo "<div class='row'><div class='col-6 text-end' id='left_select'></div><div class='col-6 text-start' id='right_select'></div></div>
  <div class='row' id='hidden_select' style='display:none'>";
  foreach($players_datas as $player => $army){
    $selectID = "{$player}_units";
    echo "<div class='col text-center'>
      <select class='form-select' name='unit_selector' id='$selectID' onchange=\"unitSelector('{$selectID}')\">";
        getUnitsList($army);
      echo "</select>
    </div>";
  }
  echo "</div>";
}

function getUnitsList($army) {
  $conn = accessDB();

  //Récupération units
  $requete = "SELECT * FROM units_data WHERE ARMEE = ?";
  $statement = mysqli_prepare($conn, $requete);
  mysqli_stmt_bind_param($statement, 's', $army);
  mysqli_stmt_execute($statement);
  $resultat = mysqli_stmt_get_result($statement);

  $unitsList = [];
  $compteur = 0;
  while ($donnees = mysqli_fetch_array($resultat)) {
    $unitsList[$donnees['NOM']] = $donnees['COMBAT'];
    $compteur ++; 
  }

  foreach($unitsList as $unit => $combat) {
    echo '<option value="' . $unit . '">' . $unit . '</option>';
    echo "<script>getUnitsStats(\"{$unit}\",\"{$combat}\")</script>";
  }

}

?>