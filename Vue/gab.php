<!doctype html>
    <html lang="fr">
          <head>
              <meta charset="UTF-8" />
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link rel="stylesheet" href="Contenu/CSS/style2.css">
              <div class="logo">
                <a href="index.php"><img src="Contenu/Images/algobreizhLogo.png" alt="logo" class="logo"></a>
                 <p><i>AlgoBreizh, votre fournisseur d'algues</i></p>
                      <article>
                                <a href="index.php">Accueil</a>
                                <?php if(isset($_SESSION['username']) and $_SESSION['admin'] == false): ?>
                                    <a href="<?= "index.php?action=commandes" ?>">Mes commandes</a>
                                    <a href="<?= "index.php?action=factures" ?>">Mes factures</a>
                                    <a href="<?= "index.php?action=commande" ?>">Nouvelle commande</a>
                                    <a href="<?= "index.php?action=disconnect" ?>">Se déconnecter</a>
                                <?php elseif($_SESSION['admin'] === true): ?>
                                    <a href="<?= "index.php?action=confirmationCommandes" ?>">Confirmer les commandes</a>
                                    <a href="<?= "index.php?action=disconnect" ?>">Se déconnecter</a>
                                <?php else: ?>
                                    <a href="<?= "index.php?action=connexion" ?>">Connexion</a>
                                    <a href="<?= 'index.php?action=registerView' ?>">Inscription</a>
                                <?php endif ?>
                      </article>
                </div>
          </head>
          <hr/>
          <body>
              <div>
                  <div class="common">
                      <?= $content ?>
                  </div>
              </div>
          </body>
            <footer>
                <hr />
                <p>AlgoBreizh, tous droits réservés 2021</p>
                <p>Besoin d'aide? <a href="documentation/doc_utilisateur.html">Documentation utilisateur</a></p>
            </footer>
    </html>
