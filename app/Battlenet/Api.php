<?php

namespace DiabloDB\Battlenet;

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
        $this->api_key = \Config::get('diablo.battlenet.apikey');
    }

    /**
     * Builds the base url for requested region.
     * @return string
     */
    public function buildBaseUrl()
    {
        return "https://{$this->region}.api.battle.net/d3/";
    }

    /**
     * Build a url to request user info.
     * @return string
     */
    public function buildProfileUrl($btag)
    {
        $url = $this->buildBaseUrl();
        $url .= "profile/{$btag}/?locale={$this->locale}&apikey={$this->api_key}";
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
     */
    public function getProfileInfo($btag)
    {
        $url = $this->buildProfileUrl($btag);
    }
}