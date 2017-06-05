<?php namespace EztvApi\Models;

/**
 * Model for the episodes.
 * void getEpisode() : int
 * void setEpisode(int $episode)
 * void getSeason() : int
 * void setSeason(int $season)
 * void getDateBased() : bool
 * void setDateBased(bool $dateBased)
 * void getTorrent() : ?Torrent
 * void setTorrent(Torrent $torrent = null)
 */
class Episode
{
    private $season;
    private $episode;
    private $dateBased;
    private $torrent;

    public function __construct(int $season, int $episode, bool $dateBased, Torrent $torrent = null)
    {
        $this->season = $season;
        $this->episode = $episode;
        $this->dateBased = $dateBased;
        $this->torrent = $torrent;
    }

    public function getEpisode() : int
    {
        return $this->episode;
    }

    public function setEpisode(int $episode)
    {
        $this->episode = $episode;
    }

    public function getSeason() : int
    {
        return $this->season;
    }

    public function setSeason(int $season)
    {
        $this->season = $season;
    }

    public function getDateBased() : bool
    {
        return $this->dateBased;
    }

    public function setDateBased(bool $dateBased)
    {
        $this->dateBased = $dateBased;
    }

    public function getTorrent() : ?Torrent
    {
        return $this->torrent;
    }

    public function setTorrent(Torrent $torrent = null)
    {
        $this->torrent = $torrent;
    }
}
