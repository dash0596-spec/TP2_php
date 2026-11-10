<form  method ="POST">
    <input type= "text" name="nom" placeholder="Le nom"><br>
    <input type="number" name="heures" step="any" placeholder="heures"><br>
    <input type="number" name="tarifs" step="any" placeholder="tarifs"><br>
    <input type="submit" name="Calculer">
</form>
<?php
require ("exercice.php");
function calculSalaire(float $heures, float $tarifs){
    return $heures * $tarifs;
}
$erreur = "";
$resultat = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom    = trim($_POST["nom"] ?? "");
    $heures = trim($_POST["heures"] ?? "");
    $tarif  = trim($_POST["tarif"] ?? "");

    // 1. Vérifier que tous les champs sont remplis
    if ($nom === "" || $heures === "" || $tarif === "") {
        $erreur = "Veuillez remplir tous les champs.";
    } elseif (!is_numeric($heures) || !is_numeric($tarif)) {
        $erreur = "Les heures et le tarif doivent être des nombres.";
    } else {
        // 2. Calcul du salaire
        $brut  = calculSalaire((float)$heures, (float)$tarif);
        $prime = 0;

        // 3. Prime de 10 % si le salaire dépasse 500 000 FCFA
        if ($brut > 500000) {
            $prime = $brut * 0.10;
        }

        $resultat = [
            "nom"   => $nom,
            "brut"  => $brut,
            "prime" => $prime,
            "total" => $brut + $prime
        ];
    }
}
 
?>
