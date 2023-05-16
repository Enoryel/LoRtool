var compteur_joueurs = 2;
var compteur_joueurs_old = null;

//GÉNÉRATIONS DES SLOTS JOUEURS
function generateNewPlayer(ID) {
    //Définition des variables de base
    var copiedPlayer = "player" + (ID - 1);
    var newPlayerID = "player" + ID;
    var newPlayerName = newPlayerID + "_name";
    var newPlayerNameValue = "Joueur " + ID;
    var newPlayerRace = newPlayerID + "_race";

    // console.log(copiedPlayer);
    // console.log("Nouveau joueur = " + newPlayerID);     

    var elem = document.getElementById(copiedPlayer);
    var clone = elem.cloneNode(true);
    clone.id = newPlayerID;
    clone.style.display ="none";
    
    clone.firstElementChild.name = newPlayerName;
    clone.firstElementChild.value = newPlayerNameValue;
    clone.lastElementChild.id = newPlayerRace;

    elem.after(clone);
    console.log("Joueur " + newPlayerID + " généré");
};

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
        HidePlayer();
    };
}

function HidePlayer(){
    playerToHideID = "player" + compteur_joueurs_old;
    playerToHide = document.getElementById(playerToHideID);
    playerToHide.style.display = "block";
};
    

//FONCTIONS SUPPRESSION DE JOUEURS·EUSE·S

function removePlayer() {
    while (compteur_joueurs_old > compteur_joueurs){  
        hidePlayer();
        console.log("Je supprime le joueur " + compteur_joueurs_old);
        compteur_joueurs_old--;
    };
}

function hidePlayer() {
    playerToHideID = "player" + compteur_joueurs_old;
    playerToHide = document.getElementById(playerToHideID);
    playerToHide.style.display = "none";
};

//VALIDATION LISTE DES JOUEUR·EUSE·S

function playersForm_submit() {

    // Switch de page
    document.getElementById("page1").style.display="none";
    document.getElementById("page2").style.display="block";

    const form = document.getElementById('playersForm');
    const formData = new FormData(form);

    let playerList = document.getElementById("PlayerList");
    
    for (var [name, value] of formData) {
        PlayerList.innerHTML += (name + ': ' + value + '<br />'); //PREND EN COMPTE LES JOUEURS INVISIBLES
    }
};

//AFFICHER LISTE DES JOUEUR·EUSE·S
function displayPlayers() {
    document.getElementById("PlayerList").style.display = "block";
}