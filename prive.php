<?php 
session_start();
require('core/function.php');
if($_SESSION['connect'] != 1 && (empty($_COOKIE['login']) || empty($_COOKIE['password'])))
{
    $message = 'Vous devez vous reconnectez';
    header('location:membres.php?message='.urlencode($message));
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur l'espace membres</title>
</head>
<body>
    
    <?php include('inc/header.php'); ?>
    <h1>bonjour <?php echo $_COOKIE['login']; ?></h1>

    <?php 
    // on recup l'ensemble des fichiers
    $liste_fichiers = scandir('upload/'.$_COOKIE['login']);
    if($liste_fichiers)
    {
        echo '<ul>';
        $i=0;
        foreach($liste_fichiers as $fichier)
        {
            if($i>1)
            {
                echo '<li><a href="upload/'.$_COOKIE['login'].'/'.$fichier.'" target="_blank">'.$fichier.'</a><a href="action.php?e=deletefichier&fichier='.$fichier.'"><img src="assets/images/corbeille.png"><a/></li>';
            }
            
            $i++;
        }
        echo '<ul>';
    }
    ?>

    <form method="post" action="action.php?e=upload" enctype="multipart/form-data">
        <label for="fichier">ajouter un fichier</label>
        <input type="file" name="fichier" />
        <br />
        <button type="submit" name="submit">Envoyer</button>
    </form>

    <a href="action.php?e=deco">Se deconnecter</a>
    <?php include('inc/footer.php'); ?>
    
</body>
</html>