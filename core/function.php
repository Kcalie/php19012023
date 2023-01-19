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
}
?>