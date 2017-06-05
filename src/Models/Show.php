<?php namespace EztvApi\Models;

class Show
{
    private $id, $title, $slug, $imdb, $episodes;

    public function __construct(int $id, string $title, string $slug, string $imdb = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
        $this->imdb = $imdb;
        $this->episodes = [];
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function getSlug() : string
    {
        return $this->slug;
    }

    public function setSlug(string $slug) : void
    {
        $this->slug = $slug;
    }

    public function getImdb() : string
    {
        return $this->imdb;
    }

    public function setImdb(string $imdb) : void
    {
        $this->imdb = $imdb;
    }

    public function getEpisodes() : array
    {
        return $this->episodes;
    }

    public function setEpisodes(array $episodes) : void
    {
        $this->episodes = $episodes;
    }
}
