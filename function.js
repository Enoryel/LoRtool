var compteur_joueurs = 2;
var compteur_joueurs_old = null;

//MODIFICATEUR DU NOMBRE DE JOUEUR·EUSE·S
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
        generateNewPlayer();
    };
}

function generateNewPlayer() {
    //Définition des variables de base
    var copiedPlayer = "player" + (compteur_joueurs_old - 1);
    var newPlayerID = "player" + compteur_joueurs_old;
    var newPlayerName = newPlayerID + "_name";
    var newPlayerNameValue = "Joueur " + compteur_joueurs; //À MODIFIER
    var newPlayerRace = newPlayerID + "_race";

    console.log("Joueur à copier = " + copiedPlayer);
    console.log("Nouveau joueur = " + newPlayerID);

    var elem = document.getElementById(copiedPlayer);
    var clone = elem.cloneNode(true);
    clone.id = newPlayerID;
    
    clone.firstElementChild.id = newPlayerName;
    clone.firstElementChild.value = newPlayerNameValue;
    clone.lastElementChild.id = newPlayerRace;

    elem.after(clone);
}
    

//FONCTIONS SUPPRESSION DE JOUEURS·EUSE·S

function removePlayer() {
    while (compteur_joueurs_old > compteur_joueurs){  
        removePlayerDiv();
        console.log("Je supprime le joueur " + compteur_joueurs_old);
        compteur_joueurs_old--;
    };
}

function removePlayerDiv() {

};
