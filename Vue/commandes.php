<!doctype html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <title>Vos commandes</title>
        </head>
        <body>
            <h1>Vos commandes :</h1>
            <?php foreach ($commandes as $commande):?>
                <h2>Commande numéro <?= $commande['id']?></h2>
                <label>Prix total: <?= $commande['total_price']?></label>
                </br><label>Statut : <?php if($commande['status'] == 'ordered'): echo 'En attente'; elseif($commande['status'] == 'confirmed'): echo 'Confirmée'; endif; ?></label>
                <br/><a href="<?= "index.php?action=afficherCommande&commandeID={$commande['id']}" ?>">Détails de la commande</a>
            <?php endforeach; ?>
            <?php if(empty($commandes)): echo 'Aucune commande!'; endif; ?>
        </body>