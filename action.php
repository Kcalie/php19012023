<?php 
session_start();
require('core/function.php');
switch($_GET['e'])
{
    case 'connexion':

        if(isset($_POST['submit']))
        {
            if(!empty($_POST['login']) && !empty($_POST['password']))
            {
                // regarde si le login et le password existe
                if(verifConnect($_POST['login'],$_POST['password']))
                {
                    $_SESSION['connect'] = 1;
                    setcookie('login',$_POST['login'],(time()+3600));
                    setcookie('password',$_POST['password'],(time()+3600));
                    header('location:prive.php');
                    exit;
                }  
                else
                {
                    $message = 'login ou mot de passe incorrect';
                }
            }
            else
            {
                $message = 'Veuillez renseigner un login et mot de passe incorrect';
            }
            header('location:membres.php?message='.urlencode($message));
            exit;
        }

    break;

    case 'deco':

        $_SESSION['connect'] = 0;
        setcookie('login',null,(time()-10));
        setcookie('password',null,(time()-10));
        header('location:membres.php');

        break;

    case 'upload':

        if(isset($_POST['submit']))
        {
            // verif si un fichier a été envoyer
            if(is_uploaded_file($_FILES['fichier']['tmp_name']))
            {
                $etat_fichier = uploadFichier($_FILES['fichier']);
                if($etat_fichier)
                {
                    $message = 'Fichier envoyer avec succès';
                    header('location:prive.php?message='.urlencode($message));
                }
            }
        }

        break;

    case 'deletefichier':
            if(!empty($_GET['fichier']))
            {
                unlink('upload/'.$_COOKIE['login'].'/'.$_GET['fichier']);
                header('location:prive.php');
                exit;
            }
        break;
}
?>
