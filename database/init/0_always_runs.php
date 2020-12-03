<?php
$servicename = 'justitie';
$password = 'Mkwhwm!2020'; // Makkelijker kunnen we het wel maken!

$aScripts = glob('../../_default/novum/*');

foreach ($aScripts as $sScript)
{
    echo "Importing $sScript" . PHP_EOL;
    require_once $sScript;

}

require_once '1_set_installed_menu_state.php';
