<?php namespace EztvApi\Models;

class Episode
{
    private $season, $episode, $dateBased, $torrent;

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

    public function setEpisode(int $episode) : void
    {
        $this->episode = $episode;
    }

    public function getSeason() : int
    {
        return $this->episode;
    }

    public function setSeason(int $season) : void
    {
        $this->season = $season;
    }

    public function getDateBased() : bool
    {
        return $this->dateBased;
    }

    public function setDateBased(bool $dateBased) : void
    {
        $this->dateBased = $dateBased;
    }

    public function getTorrent() : Torrent
    {
        return $this->torrent;
    }

    public function setTorrent(Torrent $torrent) : void
    {
        $this->torrent = $torrent;
    }
}
