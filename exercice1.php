<?php
// Exercice 1 : Tableaux et fonctions

// 1. Tableau des notes
$notes = [12, 15, 8, 17, 10, 14];

// 2. Fonctions
function moyenne($notes) {
    return array_sum($notes) / count($notes);
}

function noteMax($notes) {
    return max($notes);
}

function noteMin($notes) {
    return min($notes);
}

function admis($moyenne) {
    return $moyenne >= 10 ? "Admis" : "Ajourné";
}

// 3. Affichage
echo "les notes sont: ";
foreach($notes as $cle =>$valeur){
    echo $valeur. ", ";
    
}
echo "<br>";
$moyenne=moyenne($notes);
echo "La moyenne est: ".$moyenne;
echo "<br>";

$noteMax=noteMax($notes);
echo "La note maximale est: ".$noteMax;
echo "<br>";

$noteMin=noteMin($notes);
echo "la note minimale est: ".$noteMin;
echo "<br>";

$statut=admis($notes);
echo "Vous etes: ".$statut;

?>