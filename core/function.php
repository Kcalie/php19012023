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
    global $motdepasse;
    if(in_array($login,$identifiants) && in_array($password,$motdepasse))
    {
        return true;
    }
    else{
        return false;
    }
}
?>