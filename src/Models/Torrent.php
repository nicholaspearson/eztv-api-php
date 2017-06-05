<?php namespace EztvApi\Models;

class Torrent
{
    private $url;
    private $quality;
    private $seeds;
    private $peers;

    public function __construct(string $url, string $quality, int $seeds = 0, int $peers = 0)
    {
        $this->url = $url;
        $this->quality = $quality;
        $this->seeds = $seeds;
        $this->peers = $peers;
    }

    public function getUrl() : string
    {
        return $this->url;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    public function getQuality() : string
    {
        return $this->quality;
    }

    public function setQuality(string $quality)
    {
        $this->quality = $quality;
    }

    public function getSeeds() : int
    {
        return $this->seeds;
    }

    public function setSeeds(int $seeds)
    {
        $this->seeds = $seeds;
    }

    public function getPeers() : int
    {
        return $this->peers;
    }

    public function setPeers(int $peers)
    {
        $this->peers = $peers;
    }
}
