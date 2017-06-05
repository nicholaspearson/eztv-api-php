<?php

use PHPUnit\Framework\TestCase;
use EztvApi\Models\{
  Episode, Show, Torrent
};

/**
 * Testing the Show class.
 * @method void beforeAll()
 * @method void testShow()
 * @method void testDefaultShow()
 */
class ShowTest extends TestCase
{
    /**
     * The episode object without the default parameters.
     * @var Episode
     */
    private $episode;

    /**
     * The show object without hte default parameters.
     * @var Show
     */
    private $show;

    /**
     * The show object with the default parameters.
     * @var Show
     */
    private $showDefault;

    /**
     * The torrent object without the default parameters.
     * @var Torrent
     */
    private $torrent;

    /**
     * Method for setting up the test values.
     * @before
     * @return void
     */
    public function beforeAll()
    {
        $this->torrent = new Torrent('url', 'quality');
        $this->episode = new Episode(1, 1, false, $this->torrent);

        $this->show = new Show(1, 'title', 'slug');
        $this->showDefault = new Show(1, 'title', 'slug', 'imdb');
    }

    /**
     * Testing the Show class without the default parameters.
     * @return void
     */
    public function testShow()
    {
      $this->assertInstanceOf(Show::class, $this->show);

      $this->assertObjectHasAttribute('id', $this->show);
      $this->assertObjectHasAttribute('title', $this->show);
      $this->assertObjectHasAttribute('slug', $this->show);
      $this->assertObjectHasAttribute('imdb', $this->show);
      $this->assertObjectHasAttribute('episodes', $this->show);

      $this->assertEquals(1, $this->show->getId());
      $this->show->setId(0);
      $this->assertEquals(0, $this->show->getId());

      $this->assertEquals('title', $this->show->getTitle());
      $this->show->setTitle('changed');
      $this->assertEquals('changed', $this->show->getTitle());

      $this->assertEquals('slug', $this->show->getSlug());
      $this->show->setSlug('changed');
      $this->assertEquals('changed', $this->show->getSlug());

      $this->assertEquals(null, $this->show->getImdb());
      $this->show->setImdb('changed');
      $this->assertEquals('changed', $this->show->getImdb());

      $this->assertEmpty($this->show->getEpisodes());
      $this->assertTrue(count($this->show->getEpisodes()) === 0);
      $this->show->setEpisodes(array($this->episode));
      $this->assertNotEmpty($this->show->getEpisodes());
      $this->assertTrue(count($this->show->getEpisodes()) === 1);
    }

    /**
     * Testing the Show class with the default parameters.
     * @return void
     */
    public function testDefaultShow()
    {
      $this->assertInstanceOf(Show::class, $this->showDefault);

      $this->assertObjectHasAttribute('id', $this->showDefault);
      $this->assertObjectHasAttribute('title', $this->showDefault);
      $this->assertObjectHasAttribute('slug', $this->showDefault);
      $this->assertObjectHasAttribute('imdb', $this->showDefault);
      $this->assertObjectHasAttribute('episodes', $this->showDefault);

      $this->assertEquals(1, $this->showDefault->getId());
      $this->showDefault->setId(0);
      $this->assertEquals(0, $this->showDefault->getId());

      $this->assertEquals('title', $this->showDefault->getTitle());
      $this->showDefault->setTitle('changed');
      $this->assertEquals('changed', $this->showDefault->getTitle());

      $this->assertEquals('slug', $this->showDefault->getSlug());
      $this->showDefault->setSlug('changed');
      $this->assertEquals('changed', $this->showDefault->getSlug());

      $this->assertEquals('imdb', $this->showDefault->getImdb());
      $this->showDefault->setImdb('changed');
      $this->assertEquals('changed', $this->showDefault->getImdb());

      $this->assertEmpty($this->showDefault->getEpisodes());
      $this->assertTrue(count($this->showDefault->getEpisodes()) === 0);
      $this->showDefault->setEpisodes(array($this->episode));
      $this->assertNotEmpty($this->showDefault->getEpisodes());
      $this->assertTrue(count($this->showDefault->getEpisodes()) === 1);
    }
}
