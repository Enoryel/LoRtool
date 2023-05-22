/**********************SCRIPTS LORTOOL**********************/
var compteur_joueurs = 2;
var compteur_joueurs_old = null;
var usernames;
var armies;

//MODIFICATION EN FONCTION DU SELECTEUR DE NOMBRE DE JOUEURS
function playerSelector() {
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
    let copiedPlayer = "player0";
    let newPlayerID = "player" + ID;
    let newPlayerValue = "Joueur " + ID;   

    let elem = document.getElementById(copiedPlayer);
    let clone = elem.cloneNode(true);
    clone.id = newPlayerID;

    clone.firstElementChild.value = newPlayerValue;

    document.getElementById('player_chara').appendChild(clone);
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

    // // Switch de page
    // document.getElementById("page1").style.display="none";
    // document.getElementById("page2").style.display="block";

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



//AFFICHER LISTE DES JOUEUR·EUSE·S
function displayPlayers() {
    for(let compteur_playerForm = 0; compteur_playerForm < compteur_joueurs; compteur_playerForm++){  
        console.log(usernames[compteur_playerForm]+ ' = ' + armies[compteur_playerForm]);
    }
};