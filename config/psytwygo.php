<?php

/**
 * ----------------------------------------------------------------------------------------------------------------
 * Psy Twygo API
 * ----------------------------------------------------------------------------------------------------------------
 *
 * Arquivo de configuração de ambiente do Twygo API
 */

return [
    'twygoApiUrl' => env('TWYGOAPI_URL', 'http://www.twygo.com/api/'),
    'twygoApiVersao' => env('TWYGOAPI_VERSAO', 'v1'),
    'twygoApiOrgId' => env('TWYGOAPI_ORGID', '0'),
    'twygoApiGrantType' => env('TWYGOAPI_GRANTTYPE', 'password'),
    'twygoApiUsername' => env('TWYGOAPI_USERNAME', 'email@example.com'),
    'twygoApiPassword' => env('TWYGOAPI_PASSWORD', 'secret'),
];
