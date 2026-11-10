<?php
session_start();

if (!isset($_SESSION["panier"])) {
    $_SESSION["panier"] = [];
}

$erreur = "";

    if (isset($_POST["vider"])) {
        $_SESSION["panier"] = [];
    }

    elseif (isset($_POST["quitter"])) {
        $_SESSION = [];
        session_destroy();
        echo "<p>Session terminée. À bientôt !</p>";
        echo '<p><a href="exo3.php">Recommencer</a></p>';
        exit;
    }

    elseif (isset($_POST["ajouter"])) {
        $produit  = trim($_POST["produit"] ?? "");
        $prix     = trim($_POST["prix"] ?? "");
        $quantite = trim($_POST["quantite"] ?? "");

        if ($produit === "" || $prix === "" || $quantite === "") {
            $erreur = "Veuillez remplir tous les champs.";
        } elseif (!is_numeric($prix) || !is_numeric($quantite) || $prix < 0 || $quantite < 1) {
            $erreur = "Prix et quantité invalides.";
        } else {
            $_SESSION["panier"][] = [
                "produit"  => $produit,
                "prix"     => (float)$prix,
                "quantite" => (int)$quantite,
            ];
        }
    }

$total = 0;
foreach ($_SESSION["panier"] as $article) {
    
 += $article["prix"] * $article["quantite"];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 3 - Panier</title>
</head>
<body>
    <h1>Mon panier</h1>

    <form method="post" action="">
        <p><label>Nom du produit : <input type="text" name="produit"></label></p>
        <p><label>Prix (FCFA) : <input type="number" step="any" name="prix"></label></p>
        <p><label>Quantité : <input type="number" name="quantite" min="1" value="1"></label></p>
        <button type="submit" name="ajouter">Ajouter</button>
        <button type="submit" name="vider">Vider le panier</button>
        <button type="submit" name="quitter">Quitter</button>
    </form>

    <?php if ($erreur): ?>
        <p style="color:red;"><?= $erreur ?></p>
    <?php endif; ?>

    <?php if (!empty($_SESSION["panier"])): ?>
        <table>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Sous-total</th>
            </tr>
            <?php foreach ($_SESSION["panier"] as $a): ?>
                <tr>
                    <td><?= htmlspecialchars($a["produit"]) ?></td>
                    <td><?= number_format($a["prix"], 0, ",", " ") ?> FCFA</td>
                    <td><?= $a["quantite"] ?></td>
                    <td><?= number_format($a["prix"] * $a["quantite"], 0, ",", " ") ?> FCFA</td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total du panier</strong></td>
                <td><strong><?= number_format($total, 0, ",", " ") ?> FCFA</strong></td>
            </tr>
        </table>
    <?php else: ?>
        <p>Le panier est vide.</p>
    <?php endif; ?>
</body>
</html>