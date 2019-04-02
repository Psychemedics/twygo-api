<?php

namespace PsyTwygo;


abstract class AbstractPsyTwygo implements PsyTwygoInterface
{


    protected $urlBase = null;


    public function __construct()
    {

        $this->setUrlBase();
    }

    protected function setUrlBase()
    {

        $this->urlBase = config('psytwygo.twygoApiUrl') . config('psytwygo.twygoApiVersao') . '/o/' . config('psytwygo.twygoApiOrgId') . '/';
    }

    public function getUrlBase()
    {

        return $this->urlBase;
    }
}