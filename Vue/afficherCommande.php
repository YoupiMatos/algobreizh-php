<!doctype html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <title>Vos commandes</title>
        </head>
        <body>
            <h1>Commande numéro <?= $commande[0]['order_id'] ?></h1>
            <table>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité commandée</th>
                    <th>Total article</th>
                </tr>
                <?php foreach($commande as $detail): ?>
                <tr>
                    <td> <?= $detail['name'] ?> </td>
                    <td> <?= $detail['price'] ?>€ </td>
                    <td> <?= $detail['quantite'] ?> </td>
                    <td> <?= $detail['price'] * $detail['quantite'] ?>€ </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <h2>Prix total : <?= $detail['total_price'] ?>€</h2>
            <?php if($commande[0]['status'] == 'ordered'): ?>
                <p>Votre commande à été envoyée, mais n'a pas encore été confirmée par un administrateur.</p>
            <?php else: ?>
                <p>Votre commande à été confirmée.</p>
            <?php endif; ?>
        </body>