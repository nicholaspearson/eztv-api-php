<?php namespace EztvApi\Models;

/**
 * Model for the torrent.
 * @method string getUrl() : string
 * @method void setUrl(string $url)
 * @method string getQuality() : string
 * @method void setQuality(string $quality)
 * @method int getSeeds() : int
 * @method void setSeeds(int $seeds)
 * @method int getPeers() : int
 * @method void setPeers(int $peers)
*/
class Torrent
{
    /**
     * The url of the torrent.
     * @var string
     */
    private $url;

    /**
     * The quality of the torrent.
     * @var string
     */
    private $quality;

    /**
     * The amount of seeds of the torrent.
     * @var int
     */
    private $seeds;

    /**
     * The amount of peers of the torrent.
     * @var int
     */
    private $peers;

    /**
     * Create a new torrent object.
     * @param string $url - The url for the torrent.
     * @param string $quality - The quality of the torrent.
     * @param integer $seeds - The amount of seeds of the torrent.
     * @param integer $peers - The amount of peers of the torrent.
     */
    public function __construct(string $url, string $quality, int $seeds = 0, int $peers = 0)
    {
        $this->url = $url;
        $this->quality = $quality;
        $this->seeds = $seeds;
        $this->peers = $peers;
    }

    /**
     * Getter for url.
     * @return string - The value for url.
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     * Setter for url.
     * @param string $url - The value to be set for the url.
     */
    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }

    /**
     * Getter for quality.
     * @return string - The value for quality.
     */
    public function getQuality() : string
    {
        return $this->quality;
    }

    /**
     * Setter for quality.
     * @param string $quality - The value to be set for the quality.
     */
    public function setQuality(string $quality) : void
    {
        $this->quality = $quality;
    }

    /**
     * Getter for seeds.
     * @return int - The value for seeds.
     */
    public function getSeeds() : int
    {
        return $this->seeds;
    }

    /**
     * Setter for seeds.
     * @param int $seeds - The value to be set for the seeds.
     */
    public function setSeeds(int $seeds) : void
    {
        $this->seeds = $seeds;
    }

    /**
     * Getter for peers.
     * @return int - The value for peers.
     */
    public function getPeers() : int
    {
        return $this->peers;
    }

    /**
     * Setter for peers.
     * @param int $peers - The value to be set for the peers.
     */
    public function setPeers(int $peers) : void
    {
        $this->peers = $peers;
    }
}
