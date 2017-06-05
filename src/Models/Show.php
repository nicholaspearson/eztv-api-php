<?php namespace EztvApi\Models;

class Show
{
    private $id;
    private $title;
    private $slug;
    private $imdb;
    private $episodes;

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

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getSlug() : string
    {
        return $this->slug;
    }

    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }

    public function getImdb() : ?string
    {
        return $this->imdb;
    }

    public function setImdb(string $imdb)
    {
        $this->imdb = $imdb;
    }

    public function getEpisodes() : array
    {
        return $this->episodes;
    }

    public function setEpisodes(array $episodes)
    {
        $this->episodes = $episodes;
    }
}
