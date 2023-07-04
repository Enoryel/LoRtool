/**********************SCRIPTS LORTOOL**********************/
var compteur_joueurs = 2;
var compteur_joueurs_old = null;
var isPlayerSelected = [];
var unitsDatas = [];
var protagonists = [];
var secondPlayer = false;
var displayedSelectUnits = 0;
var nextSelect;

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


    if (isPlayerSelected[playerID] == true){
        isPlayerSelected.splice(playerID, 1);
        isPlayerSelected[playerID] = false;
        clickedPlayer.setAttribute("class", "btn btn-outline-dark my-2"); 
        console.log(playerID + " passe à faux -> " + isPlayerSelected[playerID]);
    }
    else if (selectedPlayerNbr < 2){
        isPlayerSelected.push(playerID);
        isPlayerSelected[playerID] = true;
        clickedPlayer.setAttribute("class", "btn btn-dark my-2");
        console.log(playerID + " passe à vrai -> " + isPlayerSelected[playerID]);
    };

    toogleShowUnitSelectors(playerID, isPlayerSelected[playerID]);
}

//AFFICHER OU MASQUER JOUEURS

function toogleShowUnitSelectors(playerID, flag){
    let selectToToggle = document.getElementById(playerID + '_units');
    let leftSelect = document.getElementById("left_select");
    let rightSelect = document.getElementById("right_select");
    let hiddenSelect = document.getElementById("hidden_select");
    
    
    if (flag) {
        switch(displayedSelectUnits){
            case 0:
                leftSelect.appendChild(selectToToggle);
                displayedSelectUnits ++;
                nextSelect = rightSelect;
                console.log(`J'affiche la liste du ${playerID} à gauche`);
                console.log("nextSelect = " + nextSelect.id);
                break;
            case 1:
                nextSelect.appendChild(selectToToggle);
                displayedSelectUnits ++;
                console.log(`J'affiche la liste du ${playerID} à droite`);
                console.log("nextSelect = " + nextSelect.id);
                break;
        }
    }
    else if (!flag) {
        nextSelect = selectToToggle.parentElement;
        hiddenSelect.appendChild(selectToToggle);
        displayedSelectUnits --;
        console.log("Je masque la liste du " + playerID)
        console.log("nextSelect = " + nextSelect.id);
    }

    console.log("Select affichés = " + displayedSelectUnits);
}

//SÉLECTIONNER UNITÉ

function getUnitsStats(unit, combat){
    unitsDatas[unit] = combat;
}

function unitSelector(playerSelect) {
    unitSelected = document.getElementById(playerSelect).value;
    unitCombat = unitsDatas[unitSelected];
    
    protagonists.push(unitCombat);
    console.log(`Il y a ${protagonists.length} protagonistes`);
    if (protagonists.length >= 2){
        protagonists.splice(0, 1);
        resolveFight(protagonists[0], protagonists[1])
        console.log("zébarti");
    }
           
}

function resolveFight(A, B) {
    console.log(A + " - " + B)
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