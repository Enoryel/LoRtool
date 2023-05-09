var compteur_joueurs = 2;
var compteur_joueurs_old = null ;


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

function addPlayer() {
   
    let playersToAdd = compteur_joueurs - compteur_joueurs_old;
    console.log (playersToAdd); 
    console.log("J'ajoute " + playersToAdd + " joueurs");
}

function removePlayer() {
    let playersToRemove = (compteur_joueurs_old - compteur_joueurs);
    console.log("J'enlève " + playersToRemove + " joueurs");
}
