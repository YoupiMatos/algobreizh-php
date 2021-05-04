<!doctype html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <title>Confirmation de commandes</title>
        </head>
        <body>
            <h1>Commmandes à confirmer :</h1>
            <?php foreach ($commandes as $commande):?>
                <h2>Commande numéro <?= $commande[0]?></h2>
                <p>Passée par M. <?= $commande['name'] ?> <?= $commande['surname'] ?></p>
                <p>Adresse : <?= $commande['street_number'] ?> <?= $commande['street_name'] ?> <?= $commande['postcode'] ?> <?= $commande['city'] ?></p>
                <label>Prix total: <?= $commande['total_price']?></label>
                <a href="<?= "index.php?action=adminConfirmerCommande&commandeID={$commande[0]}" ?>">Confirmer la commande</a>
            <?php endforeach; ?>
        </body>