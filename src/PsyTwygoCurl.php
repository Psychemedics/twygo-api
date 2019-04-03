<?php

namespace PsyTwygo;


use PsyTwygo\Exceptions\PsyTwygoException;

final class PsyTwygoCurl
{


    private $curl;

    private $url;

    private $porta;

    private $timeout;

    private $header;


    public function __construct($url, $token = null)
    {

        $this->setUrl($url);
        $this->setPorta(80);
        $this->setTimeout(30);
        $this->setHeader([
            'Accept: application/json',
            'Content-Type: application/json',
        ], $token);
    }

    public function setUrl($url)
    {

        $this->url = $url;
    }

    public function setPorta($porta)
    {

        $this->porta = $porta;
    }

    public function setTimeout($timeout)
    {

        $this->timeout = $timeout;
    }

    public function setHeader(array $header, $token = null)
    {

        if(!empty($token)) {
            
            $header[] = 'Authorization: Bearer ' . $token;
        }

        $this->header = $header;
    }

    private function iniciaCurl($opcoes)
    {

        $this->curl = curl_init();
        curl_setopt_array($this->curl, $opcoes);
    }

    private function executaCurl()
    {

        $response = curl_exec($this->curl);
        $tamanhoHeader = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);

        $statusCode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);

        if( $statusCode < 200 || $statusCode > 299 ) {

            throw new PsyTwygoException('Twygo não retornou um código de sucesso: ' . substr($response, $tamanhoHeader), $statusCode);
        }

        $dadosRetorno = json_decode(substr($response, $tamanhoHeader), true);

        $this->fechaCurl();

        return $dadosRetorno;
    }

    private function fechaCurl()
    {

        curl_close($this->curl);
    }

    public function post(array $dados)
    {

        $opcoes = [
            CURLOPT_URL => $this->url,
            CURLOPT_POST => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => 1,
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_HTTPHEADER => $this->header,
            CURLOPT_POSTFIELDS => json_encode($dados),
        ];

        $this->iniciaCurl($opcoes);

        return $this->executaCurl();
    }

    public function get()
    {

        $opcoes = [
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => 1,
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_HTTPHEADER => $this->header,
        ];

        $this->iniciaCurl($opcoes);

        return $this->executaCurl();
    }

    public function put(array $dados)
    {

        $opcoes = [
            CURLOPT_URL => $this->url,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => 1,
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_HTTPHEADER => $this->header,
            CURLOPT_POSTFIELDS => json_encode($dados),
        ];

        $this->iniciaCurl($opcoes);

        return $this->executaCurl();
    }

    public function delete()
    {

        $opcoes = [
            CURLOPT_URL => $this->url,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => 1,
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_HTTPHEADER => $this->header,
        ];

        $this->iniciaCurl($opcoes);

        return $this->executaCurl();
    }
}
