<?php

/**
 * Codes promo disponibles pour LuxeCart.
 * type  : 'percent' (pourcentage) ou 'fixed' (montant fixe en FCFA)
 * value : valeur de la réduction
 * label : texte affiché à l'utilisateur
 */
return [
    'LUXE10'    => ['type' => 'percent', 'value' => 10,    'label' => '-10 % sur votre commande'],
    'SAVE20'    => ['type' => 'percent', 'value' => 20,    'label' => '-20 % sur votre commande'],
    'BIENVENUE' => ['type' => 'percent', 'value' => 15,    'label' => '-15 % — Offre de bienvenue'],
    'FRAIS50'   => ['type' => 'fixed',   'value' => 5000,  'label' => '-5 000 FCFA sur votre commande'],
    'NOEL25'    => ['type' => 'percent', 'value' => 25,    'label' => '-25 % — Offre Noël 🎄'],
];

