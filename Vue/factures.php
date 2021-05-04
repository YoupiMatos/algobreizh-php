<!doctype html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <title>Vos factures</title>
        </head>
        <body>
            <h1>Vos factures :</h1>
            <?php foreach ($factures as $facture):?>
                <h2>Commande numéro <?= $facture['id']?></h2>
                <label>Prix total: <?= $facture['total_price']?></label>
                </br><label>Statut : confirmée</label>
                <br/><a href="<?= "index.php?action=afficherCommande&commandeID={$facture['id']}" ?>">Détails de la facture</a>
            <?php endforeach; ?>
            <?php if(empty($factures)): echo 'Aucune factures!'; endif; ?>
        </body>