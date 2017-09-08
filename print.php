<?php
/*
 * config.php
 *
 * Author: pixelcave
 *
 * Configuration php file. It containts variables used in the template and the main menu auto creation function
 *
 */
// Template variables

$template = array(
    'name'          => '',
    'version'       => '',
    'author'        => 'Mya Pan Yi',
    'title'         => 'AzureShoeGallery',
    'description'   => 'AzureShoeGallery is Traing Project',

    'header'        => '',
    // 'sticky'            for a sticky sidebar
    'sidebar'       => 'sticky',
    // 'hide-side-content' for hiding sidebar by default
    'side_content'  => '',
    // 'full-width'        for full width page
    // ''                  empty to remove full width from the page in large resolutions
    'page'          => 'full-width',
    // Available themes: 'fire', 'wood', 'ocean', 'leaf', 'tulip', 'amethyst',
    //                   'dawn', 'city', 'oil', 'deepsea', 'stone', 'grass',
    //                   'army', 'autumn', 'night', 'diamond', 'cherry', 'sun'
    //                   'asphalt'

    'theme'         => '',

    'active_page'   => basename($_SERVER['PHP_SELF'])
);
print_r($template["2"])
;

