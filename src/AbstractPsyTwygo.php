<?php

namespace PsyTwygo;

use Exception;
use PsyTwygo\Exceptions\PsyTwygoException;


abstract class AbstractPsyTwygo implements PsyTwygoInterface
{


    protected $urlBase = null;

    protected $psyTwygoCurl;

    protected $twygoToken = null;


    public function __construct()
    {

        $this->setUrlBase();
    }

    protected function setUrlBase()
    {

        $this->urlBase = config('psytwygo.twygoApiUrl') . 'api/' . config('psytwygo.twygoApiVersao') . '/o/' . config('psytwygo.twygoApiOrgId') . '/';
        $this->login();
    }

    public function getUrlBase()
    {

        return $this->urlBase;
    }

    protected function login()
    {

        $this->psyTwygoCurl = new PsyTwygoCurl(config('psytwygo.twygoApiUrl') . 'oauth/token');

        $dadosLogin = [
            'grant_type' => config('psytwygo.twygoApiGrantType'),
            'username' => config('psytwygo.twygoApiUsername'),
            'password' => config('psytwygo.twygoApiPassword'),
        ];

        try {

            $retorno = $this->psyTwygoCurl->post($dadosLogin);
        } catch (PsyTwygoException $psyTwygoException) {

            throw $psyTwygoException;
        } catch (Exception $exception) {

            throw new PsyTwygoException($exception->getMessage(), 500);
        }

        $this->twygoToken = $retorno['access_token'];
    }
}