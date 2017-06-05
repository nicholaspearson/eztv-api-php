<?php

use PHPUnit\Framework\TestCase;
use EztvApi\Models\Episode;
use EztvApi\Models\Torrent;

/**
 * Testing the Episode class.
 * @method void beforeAll()
 * @method void testEpisode()
 * @method void testDefaultEpisode()
 */
class EpisodeTest extends TestCase
{
    /**
     * The episode object without the default parameters.
     * @var Episode
     */
    private $episode;

    /**
     * The episode object with default parameters.
     * @var Episode
     */
    private $episodeDefault;

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

        $this->episode = new Episode(1, 1, false);
        $this->episodeDefault = new Episode(1, 1, false, $this->torrent);
    }

    /**
     * Testing the Episode class without the default parameters.
     * @return void
     */
    public function testEpisode()
    {
        $this->assertInstanceOf(Episode::class, $this->episode);

        $this->assertObjectHasAttribute('season', $this->episode);
        $this->assertObjectHasAttribute('episode', $this->episode);
        $this->assertObjectHasAttribute('dateBased', $this->episode);
        $this->assertObjectHasAttribute('torrent', $this->episode);

        $this->assertEquals(1, $this->episode->getSeason());
        $this->episode->setSeason(0);
        $this->assertEquals(0, $this->episode->getSeason());

        $this->assertEquals(1, $this->episode->getEpisode());
        $this->episode->setEpisode(0);
        $this->assertEquals(0, $this->episode->getEpisode());

        $this->assertEquals(false, $this->episode->getDateBased());
        $this->episode->setDateBased(true);
        $this->assertEquals(true, $this->episode->getDateBased());

        $this->assertEquals(null, $this->episode->getTorrent());
        $this->episode->setTorrent($this->torrent);
        $this->assertEquals($this->torrent, $this->episode->getTorrent());
    }

    /**
     * Testing the Episode class with the default parameters.
     * @return void
     */
    public function testDefaultEpisode()
    {
        $this->assertInstanceOf(Episode::class, $this->episodeDefault);

        $this->assertObjectHasAttribute('season', $this->episodeDefault);
        $this->assertObjectHasAttribute('episode', $this->episodeDefault);
        $this->assertObjectHasAttribute('dateBased', $this->episodeDefault);
        $this->assertObjectHasAttribute('torrent', $this->episodeDefault);

        $this->assertEquals(1, $this->episodeDefault->getSeason());
        $this->episodeDefault->setSeason(0);
        $this->assertEquals(0, $this->episodeDefault->getSeason());

        $this->assertEquals(1, $this->episodeDefault->getEpisode());
        $this->episodeDefault->setEpisode(0);
        $this->assertEquals(0, $this->episodeDefault->getEpisode());

        $this->assertEquals(false, $this->episodeDefault->getDateBased());
        $this->episodeDefault->setDateBased(true);
        $this->assertEquals(true, $this->episodeDefault->getDateBased());

        $this->assertEquals($this->torrent, $this->episodeDefault->getTorrent());
        $this->episodeDefault->setTorrent(null);
        $this->assertEquals(null, $this->episodeDefault->getTorrent());
    }
}
