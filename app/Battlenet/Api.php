<?php

namespace DiabloDB\Battlenet;

use GuzzleHttp\Client as Guzzle;

class Api
{
    /**
     * @var $region API Region.
     */
    private $region;

    /**
     * @var $locale Locale to request data in.
     */
    private $locale;

    /**
     * @var $api_key Community API Key.
     */
    private $api_key;

    public function __construct()
    {
        $this->region = \Config::get('diablo.battlenet.region');
        $this->locale = \Config::get('diablo.battlenet.locale');
        $this->api_key = \Config::get('diablo.battlenet.api_key');
    }

    /**
     * Builds the base url for requested region.
     * @return string
     */
    private function buildBaseUrl()
    {
        return "https://{$this->region}.api.battle.net/d3/";
    }

    /**
     * Build a url to request user info.
     * @return string
     */
    private function buildProfileUrl($btag)
    {
        $url = $this->buildBaseUrl();
        $url .= "profile/{$btag}/?locale={$this->locale}&apikey={$this->api_key}";
        return $url;
    }

    /**
     * Build a url to request character information.
     *
     * @param $btag
     * @param $charid
     *
     * @return string
     */
    private function buildCharUrl($btag, $charid)
    {
        $url = $this->buildBaseUrl();
        $url .= "profile/{$btag}/hero/{$charid}?locale={$this->locale}&apikey={$this->api_key}";
        return $url;
    }

    /*
    |--------------------------------------------------------------------------
    | Data Retrieval Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Retrieve the profile of a user given their battletag.
     * @param string $btag
     * @return mixed
     */
    public function getProfileInfo($btag)
    {
        $url = $this->buildProfileUrl($btag);
        return $this->requestJson($url);
    }

    public function getCharacterInfo($btag, $id)
    {
        $url = $this->buildCharUrl($btag, $id);
        return $this->requestJson($url);
    }

    /**
     * Request json data from a URL.
     * @param string $url URL.
     * @return mixed
     */
    private function requestJson($url)
    {
        $client = new Guzzle();
        $response = $client->get($url);
        return $response->json();
    }
}