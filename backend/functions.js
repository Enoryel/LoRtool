/**********************SCRIPTS LORTOOL**********************/
var compteur_joueurs = 2;
var compteur_joueurs_old = null;
var usernames;
var armies;
var isPlayerSelected = [];

//MODIFICATION EN FONCTION DU SELECTEUR DE NOMBRE DE JOUEURS
function playerNbrSelector() {
    compteur_joueurs_old = compteur_joueurs;
    compteur_joueurs = document.getElementById('player_nbr').value;

    console.log("Compteur_joueurs = " + compteur_joueurs);
    console.log("Compteur_joueurs_old = " + compteur_joueurs_old);  
    
    if (compteur_joueurs > compteur_joueurs_old){   //Pourquoi ça déconne en montant à 10 joueurs ?
        console.log("Il faut ajouter des joueurs");
        addPlayer();
    }
    else if (compteur_joueurs_old > compteur_joueurs){
        console.log("Il faut supprimer des joueurs");
        removePlayer();
    }
    else {
        console.log("ERROR");
    }

};

//FONCTIONS AJOUTS DE JOUEURS·EUSE·S

function addPlayer() {      
    while (compteur_joueurs_old < compteur_joueurs){
        compteur_joueurs_old++;
        console.log("J'ajoute le joueur " + compteur_joueurs_old);
        generatePlayer(compteur_joueurs_old);
    };
}

function generatePlayer(ID) {
    //Définition des variables de base
    let copiedPlayer = "player1";
    let newPlayerID = "player" + ID;
    let newPlayerValue = "Joueur " + ID;
    let newPlayerPseudo = "player_name" + ID;
    let newPlayerArmy = "player_army" + ID;

    let elem = document.getElementById(copiedPlayer);
    let clone = elem.cloneNode(true);
    clone.id = newPlayerID;

    clone.firstElementChild.name = newPlayerPseudo;
    clone.firstElementChild.value = newPlayerValue;
    clone.lastElementChild.name = newPlayerArmy;

    // document.getElementById('playersForm').appendChild(clone);
    parentNode = document.getElementById('playersForm');
    referenceNode = document.getElementById('submit_button');
    parentNode.insertBefore(clone, referenceNode);
    console.log(newPlayerID + " généré");
};
    

//FONCTIONS SUPPRESSION DE JOUEURS·EUSE·S

function removePlayer() {
    while (compteur_joueurs_old > compteur_joueurs){  
        deletePlayer(compteur_joueurs_old);
        console.log("Je supprime le joueur " + compteur_joueurs_old);
        compteur_joueurs_old--;
    };
}

function deletePlayer(ID) {
    playerToDeleteID = "player" + ID;
    playerToDelete = document.getElementById(playerToDeleteID);
    playerToDelete.remove();
};

//VALIDATION LISTE DES JOUEUR·EUSE·S

function playersForm_submit() {

    var form = document.getElementById('playersForm');
    var formData = new FormData(form);

    // //SOLUTION 1
    // for(let compteur_playerForm = 1; compteur_playerForm <= compteur_joueurs; compteur_playerForm++){
    //     let playerToGet = 'player' + compteur_playerForm; //elementToGet = `player${compteur_playerForm}_name`
    //     let playerToGet_name = formData.get(playerToGet + '_name');
    //     let playerToGet_Armee = formData.get(playerToGet + '_armee');

    //     infosJoueurs[playerToGet_name] = playerToGet_Armee;
    //     console.log(playerToGet_name + ' = ' + infosJoueurs[playerToGet_name]);
    // }

    // SOLUTION 2
    // let armee_jouee_bool = false;
    // let nom_joueur_temp;
    // let armee_jouee_temp; 
    // for (var [name, value] of formData) {    
    //     if (!armee_jouee_bool){
    //         nom_joueur_temp = `${value}`;
    //         armee_jouee_bool = true;
    //     }
    //     else if (armee_jouee_bool){
    //         armee_jouee_temp = `${value}`;
    //         infosJoueurs[nom_joueur_temp] = armee_jouee_temp;
    //         armee_jouee_bool = false;

    //         console.log(nom_joueur_temp + ' = ' + infosJoueurs[nom_joueur_temp]);
    //     }
    // }

    // for (const pair of formData.entries()) {
    //     console.log(`${pair[0]}, ${pair[1]}`);
    // }

    // SOLUTION 3

    usernames = formData.getAll('player_name');
    armies = formData.getAll('player_army');
    

};

function generatePlayersEntries(){
    let fighter = document.getElementsByClassName(fighter).innerHTML;
    
    for(let compteur_playerForm = 0; compteur_playerForm < compteur_joueurs; compteur_playerForm++){  
        fighter += `<option value =>${usernames[compteur_playerForm]}</option>`;
    }
}

function playerIsSelected(playerID) {

    let clickedPlayer = document.getElementById(playerID);
    let selectedPlayerNbr = isPlayerSelected.length;
    console.log("Le nombre de joueur selectionné est de : " + selectedPlayerNbr);


    if (isPlayerSelected[playerID] == true){
        isPlayerSelected.splice(playerID, 1);
        isPlayerSelected[playerID] = false;
        clickedPlayer.style.backgroundColor = "#D0D0D7"; 
        console.log(playerID + " passe à faux -> " + isPlayerSelected[playerID]);
    }
    else if (selectedPlayerNbr < 2){
        isPlayerSelected.push(playerID);
        isPlayerSelected[playerID] = true;
        clickedPlayer.style.backgroundColor = "red";
        console.log(playerID + " passe à vrai -> " + isPlayerSelected[playerID]);
    };

    toogleShowUnitSelectors(playerID, isPlayerSelected[playerID]);
}


function toogleShowUnitSelectors(playerID, flag){
    let selectToShow = document.getElementById(playerID + '_units') ;
    console.log(selectToShow);
    if (flag) {
        selectToShow.style.display = "block";
        console.log("J'affiche la liste du " + playerID)
    }
    else if (!flag) {
        selectToShow.style.display = "none";
        console.log("Je masque la liste du " + playerID)
    }
}