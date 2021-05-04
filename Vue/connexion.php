<!doctype html>
    <head>
        <meta charset="UTF-8" />
        <title>AlgoBreizh - Connexion</title>
        <link rel="stylesheet" href="Contenu/CSS/style2.css">
    </head>
    <body>
        <div id="connexionForm" class="connexion">
        <h1>Connexion à Algobreizh</h1>
            <form action="index.php?action=verification" method="POST">
                <label><b>Nom d'utilisateur</b></label><br/>
                <input type="text" placeholder="Nom d'utilisateur" name="username" required>
                <br/>

                <label><b>Mot de passe</b></label><br/>
                <input type="password" placeholder="Mot de passe" name="password" required>
                <br/>

                <button type="submit" id="submit" value="login">Se connecter</button>

                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2) echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
                
            </form>
        </div>
    </body>
</html>