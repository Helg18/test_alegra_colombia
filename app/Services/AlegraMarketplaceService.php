<?php

namespace App\Services;


use GuzzleHttp\Client;

class AlegraMarketplaceService
{
    private $token;
    private $user;
    private $credentials;
    private $url;
    protected static $userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36';


    /**
     * AlegraMarketplaceService constructor.
     * @param $token
     * @param $user
     * @param $credentials
     */
    public function __construct()
    {
        $this->user        = env('MARKETPLACE_USUARIO');
        $this->token       = env('MARKETPLACE_TOKEN');
        $this->credentials = base64_encode($this->user.":".$this->token);
        $this->url         = env('MARKETPLACE_URL');
    }

    public function request($string)
    {
        $client = new Client([
            'headers' => [
                'User-Agent'     => self::$userAgent,
                'Authorization'  => 'Basic '.$this->credentials
            ]
        ]);

        $response = $client->post($this->url.'/'.$string);

        return $response;
    }
}