/**********************SCRIPTS LORTOOL**********************/
var compteur_joueurs = 2;
var compteur_joueurs_old = null;
var isPlayerSelected = [];
var unitsDatas = [];
var protagonists = [];

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
    let copiedPlayerID = "player1";
    let newPlayerID = "player" + ID;
    let newPlayerValue = "Joueur " + ID;
    let newPlayerName = `player${ID}_name`;
    let newPlayerArmy = `player${ID}_army`;

    let copiedPlayer = document.getElementById(copiedPlayerID);
    let clone = copiedPlayer.cloneNode(true);  
    clone.id = newPlayerID;

    let playerName = clone.querySelector('[name="player1_name"]');
    playerName.name = newPlayerName;
    playerName.value = newPlayerValue;

    let playerArmy = clone.querySelector('[name="player1_army"]');
    playerArmy.name = newPlayerArmy;

    document.getElementById('player_entries').appendChild(clone);
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

function generatePlayersEntries(){
    let fighter = document.getElementsByClassName(fighter).innerHTML;
    
    for(let compteur_playerForm = 0; compteur_playerForm < compteur_joueurs; compteur_playerForm++){  
        fighter += `<option value =>${usernames[compteur_playerForm]}</option>`;
    }
}

//SELECTION DES JOUEURS

function playerIsSelected(playerID) {

    let clickedPlayer = document.getElementById(playerID);
    let selectedPlayerNbr = isPlayerSelected.length;
    console.log("Le nombre de joueur selectionné est de : " + selectedPlayerNbr);


    if (isPlayerSelected[playerID] == true){
        isPlayerSelected.splice(playerID, 1);
        isPlayerSelected[playerID] = false;
        clickedPlayer.setAttribute("class", "btn btn-outline-dark mx-3"); 
        console.log(playerID + " passe à faux -> " + isPlayerSelected[playerID]);
    }
    else if (selectedPlayerNbr < 2){
        isPlayerSelected.push(playerID);
        isPlayerSelected[playerID] = true;
        clickedPlayer.setAttribute("class", "btn btn-dark mx-3");
        console.log(playerID + " passe à vrai -> " + isPlayerSelected[playerID]);
    };

    toogleShowUnitSelectors(playerID, isPlayerSelected[playerID]);
}

//AFFICHER OU MASQUER JOUEURS

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

function getUnitsStats(unit, combat){
    unitsDatas[unit] = combat;
}

function unitSelector(player) {
    unitSelected = document.getElementById(player + '_units').value;
    unitCombat = unitsDatas[unitSelected];
    if (protagonists.length <= 2){
        protagonists.push(unitCombat);
    }
    else if (protagonists.length >= 2){
        protagonists.pop();
        protagonists.push(unitCombat);
    }
    protagonists.forEach(element => {
        console.log("protagoniste = " + element);  
    });
    resolveFight(protagonists[0], protagonists[1])   
}

function resolveFight(A, B) {
    let result = document.getElementById('result');
    let keyValue = A - B;
    switch (keyValue) {
        case keyValue >= 2 :
            result.innerHTML = '3';
            console.log("RESULTAT = " + 3);
            console.log("-------------------");
            break;
        case keyValue = 0 || 1 :
            result.innerHTML = '4';
            console.log("RESULTAT = " + 4);
            console.log("-------------------");
            break;
        case keyValue = -2 || -1 :
            result.innerHTML = '5';
            console.log("RESULTAT = " + 5);
            console.log("-------------------");
            break;
        case keyValue = -4 || -3 :
            result.innerHTML = '6';
            console.log("RESULTAT = " + 6);
            console.log("-------------------");
            break;
        case keyValue = -6 || -5 :
            result.innerHTML = '6 & 4';
            console.log("RESULTAT = 6/4");
            console.log("-------------------");
            break;
        case keyValue = -8 || -7 :
            result.innerHTML = '6 & 5';
            console.log("RESULTAT = 6/5");
            console.log("-------------------");
            break;
        case keyValue <= -9 :
            result.innerHTML = '6 & 6';
            console.log("RESULTAT = 6/6");
            console.log("-------------------");
            break;
    }
}