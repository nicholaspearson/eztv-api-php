<?php namespace EztvApi\Models;

/**
 * Model for the show.
 * @method int getId() : int
 * @method void setId(int $id)
 * @method string getTitle() : string
 * @method void setTitle(string $title)
 * @method string getSlug() : string
 * @method void setSlug(string $slug)
 * @method ?string getImdb() : ?string
 * @method void setImdb(string $imdb)
 * @method array getEpisodes() : array
 * @method void setEpisodes(array $episodes)
 */
class Show
{
    /**
     * The id of the show.
     * @var int
     */
    private $id;

    /**
     * The title of the show.
     * @var string
     */
    private $title;

    /**
     * The slug of the show.
     * @var string
     */
    private $slug;

    /**
     * The imdb id of the show.
     * @var string
     */
    private $imdb;

    /**
     * The episodes of the show.
     * @var array
     */
    private $episodes;

    /**
     * Create a new show object.
     * @param int $id - The id of the show.
     * @param string $title -  he title of the show.
     * @param string $slug - The slug of the show.
     * @param string $imdb - The imdb id for the show.
     */
    public function __construct(int $id, string $title, string $slug, string $imdb = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
        $this->imdb = $imdb;
        $this->episodes = [];
    }

    /**
     * Getter for id.
     * @return int - The value for id.
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Setter for id.
     * @param int $id - The value to be set for id.
     */
    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    /**
     * Getter for title.
     * @return string - The value for title.
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * Setter for title.
     * @param string $title - The value to be set for the title.
     */
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    /**
     * Getter for slug.
     * @return string - The value for slug.
     */
    public function getSlug() : string
    {
        return $this->slug;
    }

    /**
     * Setter for slug.
     * @param string $slug - The value to be set for the slug.
     */
    public function setSlug(string $slug) : void
    {
        $this->slug = $slug;
    }

    /**
     * Getter for imdb.
     * @return string - The value for imdb.
     */
    public function getImdb() : ?string
    {
        return $this->imdb;
    }

    /**
     * Setter for imdb.
     * @param string $imdb - The value to be set for the imdb.
     */
    public function setImdb(string $imdb) : void
    {
        $this->imdb = $imdb;
    }

    /**
     * Getter for episodes.
     * @return array - The value for episodes.
     */
    public function getEpisodes() : array
    {
        return $this->episodes;
    }

    /**
     * Setter for episodes.
     * @param array $episodes - The value to be set for the episodes.
     */
    public function setEpisodes(array $episodes) : void
    {
        $this->episodes = $episodes;
    }
}
