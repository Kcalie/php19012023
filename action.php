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
            header('membres.php?message='.urlencode($message));
            exit;
        }

    break;
}
?>
