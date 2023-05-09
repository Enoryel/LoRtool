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
        generateNewPlayer();
        console.log("J'ajoute le joueur " + compteur_joueurs_old);
    };
}

function generateNewPlayer() {
    //Définition des variables de base
    var newplayerID = "player" + compteur_joueurs_old;
    var copiedPlayer = "player" + (compteur_joueurs_old - 1);
    var elem;
    var clone;

    //Création et incorporation de la nouvelle div
    var player_chara = document.getElementById("player_chara")
    var newplayerDiv = document.createElement("div");
    newplayerDiv.id = newplayerID;
    player_chara.appendChild(newplayerDiv);


    //Création et incorporation du nouvel input de nom
    var newplayerName = newplayerID + "_name";
    var newplayerNameValue = "Joueur " + newplayerID;
    var copiedPlayerName = copiedPlayer + "_name";

    elem = document.getElementById(copiedPlayerName);
    /*console.log(copiedPlayerName);
    return;*/
    clone = elem.cloneNode(true);
    clone.name = newplayerName;
    clone.value = newplayerNameValue;
    newplayerDiv.appendChild(clone);

    //Création et incorporation du nouveau sélecteur de race
    var newplayerRace = newplayerID + "_race";
    elem = document.getElementById(copiedPlayer + "_race");
    clone = elem.cloneNode(true);
    clone.name = newplayerRace;
    newplayerDiv.appendChild(clone);
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
