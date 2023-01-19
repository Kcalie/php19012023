<?php
$menu_footer = array(
    'mentions.php' => 'Mentions légales',
    'contact.php' => 'Nous contacter'
);

function afficheMenu($emplacement='header')
{
    $str = '<ul>';
    if($emplacement=='header')
    {
        $menu_header = array(
            'index.php' => 'Accueil',
            'membres.php' => 'Espaces membres',
            'contact.php' => 'Nous Contacter'
        );
        foreach($menu_header as $lien => $titre)
        {
            $str.= '<li><a href="'.$lien.'">'.$titre.'</a></li>';
        }
    }
    else if($emplacement=='footer')
    {
        global $menu_footer;
        foreach($menu_footer as $lien => $titre)
        {
            $str.= '<li><a href="'.$lien.'">'.$titre.'</a></li>'; 
        }
    }
    $str.= '<ul>';
    return $str;
}
$identifiants = array('admin','joseph','kevin','gerald');
$motdepasses = array('12345','epad','laguna','css');
function verifConnect($login,$password)
{
    global $identifiants;
    global $motdepasses;
    if(in_array($login,$identifiants) && in_array($password,$motdepasses))
    {
        return true;
    }
    else{
        return false;
    }
}
$extensions = array('.pdf','.png','.jpg','.mp4','.gif'); // sensible a la casse !!!! mettre aussi en majuscules
function uploadFichier($fichier)
{
    global $extensions;
    $verif_extension = strrchr($fichier['name'],'.');
    if(in_array($verif_extension,$extensions))
    {
        // verif si le dossier de l'user existe
        if(!is_dir('upload/'.$_COOKIE['login']))
        {
            // si il existe âs on le créer
            mkdir('upload/'.$_COOKIE['login']);
        }
        // on transfere notre fichier dans son dossier (envoye de fichier)
        if(move_uploaded_file($fichier['tmp_name'],'upload/'.$_COOKIE['login'].'/'.$fichier['name']))
        {
            return true;
        }
    }
}
?>