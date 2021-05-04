<!doctype html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8" />
            <title>Nouvelle commande</title>
        </head>
        <body>
            <form action="index.php?action=confirmerCommande" method="post">
                <?php foreach ($produits as $product):?>
                    <label><?= $product['name'] ?> |</label>
                    <label><?= $product['price']?>€/kg</label>
                    <input type="number" placeholder="Quantité" name="Quantite<?= $product['id'] ?>" value="0" max=50> <br/>
                <?php endforeach; ?>
                <button type="submit" id="submit" value="confirmerCommande">Confirmer</button>
            </form>
        </body>