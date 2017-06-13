<?php namespace EztvApi\Models;

/**
 * Model for the episodes.
 * @method int getEpisode() : int
 * @method void setEpisode(int $episode)
 * @method int getSeason() : int
 * @method void setSeason(int $season)
 * @method bool isDateBased() : bool
 * @method void setDateBased(bool $dateBased)
 * @method ?Torrent getTorrent() : ?Torrent
 * @method void setTorrent(Torrent $torrent = null)
 */
class Episode
{
    /**
     * The season of the episode.
     * @var int
     */
    private $season;

    /**
     * The episode of the episode.
     * @var int
     */
    private $episode;

    /**
     * If the episode is date based.
     * @var bool
     */
    private $dateBased;

    /**
     * The torrent for the episode.
     * @var Episode
     */
    private $torrent;

    /**
     * Create a new Episode object.
     * @param int $season - The season of the episode.
     * @param int $episode - The episode of the episode.
     * @param bool$dateBased - If the episode is date based.
     * @param [type] $torrent - The torrent for the episode.
     */
    public function __construct(int $season, int $episode, bool $dateBased, Torrent $torrent = null)
    {
        $this->season = $season;
        $this->episode = $episode;
        $this->dateBased = $dateBased;
        $this->torrent = $torrent;
    }

    /**
     * Getter for season.
     * @return int - The value for season.
     */
    public function getSeason() : int
    {
        return $this->season;
    }

    /**
     * Setter for season.
     * @param int $season - The value to be set for the season.
     */
    public function setSeason(int $season) : void
    {
        $this->season = $season;
    }

    /**
     * Getter for episode.
     * @return int - The value for episode.
     */
    public function getEpisode() : int
    {
        return $this->episode;
    }

    /**
     * Setter for episode
     * @param int $episode - The value to be set for the episode.
     */
    public function setEpisode(int $episode) : void
    {
        $this->episode = $episode;
    }

    /**
     * Getter for date based.
     * @return bool - The value for date based.
     */
    public function isDateBased() : bool
    {
        return $this->dateBased;
    }

    /**
     * Setter for dateBased.
     * @param bool $dateBased - The value to be set for the date based.
     */
    public function setDateBased(bool $dateBased) : void
    {
        $this->dateBased = $dateBased;
    }

    /**
     * Getter for torrent.
     * @return Torrent - The value for torrent.
     */
    public function getTorrent() : ?Torrent
    {
        return $this->torrent;
    }

    /**
     * Setter for torrent
     * @param Torrent $torrent - The value to be set for the torrent.
     */
    public function setTorrent(Torrent $torrent = null) : void
    {
        $this->torrent = $torrent;
    }
}
