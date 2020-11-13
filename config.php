<?php

if(isset($_SERVER['IS_DEVEL']))
{
    $aConfig = [
        'PROTOCOL' => 'http',
        'ADMIN_PROTOCOL' => 'http',
        'CUSTOM_FOLDER' => 'NovumJenv',
        'ABSOLUTE_ROOT' => '/home/anton/Documents/sites/hurah',
        'DOMAIN' => 'justitie.demo.novum.nuidev.nl',
        /* Je zoekt waarschijnlijk Config::getDataDir() */
        'DATA_DIR' => '../'
    ];
}
else
{
    $aConfig = [
        'PROTOCOL' => 'https',
        'ADMIN_PROTOCOL' => 'https',
        'CUSTOM_FOLDER' => 'NovumJenv',
        'DOMAIN' => 'justitie.demo.novum.nu',
        /* Je zoekt waarschijnlijk Config::getDataDir() */
        'ABSOLUTE_ROOT' => '/home/nov_jenv/platform/system',
        'DATA_DIR' => '/home/nov_jenv/platform/data'
    ];
}

$aConfig['CUSTOM_NAMESPACE'] = 'NovumJenv';
return $aConfig;


