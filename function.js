var compteur_joueurs = 2;
var compteur_joueurs_old;
console.log("Compteur_joueurs = " . $compteur_joueurs);

function playerSelector() {
    var compteur_joueurs_old = compteur_joueurs;
    compteur_joueurs = document.getElementById('player_nbr').value;
    console.log(compteur_joueurs);
};

