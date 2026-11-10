<?php


function calculSalaire($heures, $tarif) {
    return $heures * $tarif;
}

if (isset($_POST["calculer"])) {
    $nom    = trim($_POST["nom"]);
    $heures = trim($_POST["heures"]);
    $tarif  = trim($_POST["tarif"]);

    // 1. Vérifier que tous les champs sont remplis
    if ($nom == "" || $heures == "" || $tarif == "") {
        echo "Veuillez remplir tous les champs.";
    } else {
        // 2. Calcul du salaire
        $brut  = calculSalaire($heures, $tarif);
        $prime = 0;

        if ($brut > 500000) {
            $prime = $brut * 0.10;
        }

        $total = $brut + $prime;

        // 3. Affichage
        echo "Nom : " . $nom . "<br>";
        echo "Salaire brut : " . $brut . " FCFA<br>";
        echo "Prime : " . $prime . " FCFA<br>";
        echo "Salaire total : " . $total . " FCFA";
    }
}