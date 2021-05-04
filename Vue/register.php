<!doctype html>
    <head>
        <meta charset="UTF-8" />
        <title>AlgoBreizh - Inscription</title>
        <link rel="stylesheet" href="Contenu/CSS/style2.css">
    </head>
    <body>
        <h1>Inscription à Algobreizh</h1>
        <div id="registerForm">
            <form action="index.php?action=register" method="POST">
                <label><b>Nom</b></label>
                <input type="text" placeholder="Nom" name="name" required>

                <label><b>Prénom</b></label>
                <input type="text" placeholder="Prénom" name="surname" required><br/>

                <label><b>Numéro de rue</b></label>
                <input type="text" placeholder="Numéro de rue" name="streetNb" required>

                <label><b>Nom de rue</b></label>
                <input type="text" placeholder="Nom de rue" name="streetName" required><br/>

                <label><b>Code postal</b></label>
                <input type="text" placeholder="Code postal" name="postCode" required>

                <label><b>Ville</b></label>
                <input type="text" placeholder="Ville" name="city" required> <br/>

                <label><b>Email</b></label>
                <input type="text" placeholder="email" name="email" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Mot de passe" name="password" required><br/>

                <button type="submit" id="submit" value="register"> S'inscrire </button>

                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2) echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
                
            </form>
        </div>
    <body>
</html>