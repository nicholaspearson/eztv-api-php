<?php

use PHPUnit\Framework\TestCase;
use EztvApi\Models\Torrent;

/**
 * Testing the Torrent class.
 * @method void beforeAll()
 * @method void testTorrent()
 * @method void testDefaultTorrent()
 */
class TorrentTest extends TestCase
{
    /**
     * The torrent object without the default parameters.
     * @var Torrent
     */
    private $torrent;

    /**
     * The torrent object with default parameters.
     * @var Torrent
     */
    private $torrentDefault;

    /**
     * Method for setting up the test values.
     * @before
     * @return void
     */
    public function beforeAll() : void
    {
        $this->torrent = new Torrent('url', 'quality', 1, 1);
        $this->torrentDefault = new Torrent('url', 'quality');
    }

    /**
     * Testing the Torrent class without the default parameters.
     * @return void
     */
    public function testTorrent() : void
    {
        $this->assertInstanceOf(Torrent::class, $this->torrent);

        $this->assertObjectHasAttribute('url', $this->torrent);
        $this->assertObjectHasAttribute('quality', $this->torrent);
        $this->assertObjectHasAttribute('seeds', $this->torrent);
        $this->assertObjectHasAttribute('peers', $this->torrent);

        $this->assertEquals('url', $this->torrent->getUrl());
        $this->torrent->setUrl('changed');
        $this->assertEquals('changed', $this->torrent->getUrl());

        $this->assertEquals('quality', $this->torrent->getQuality());
        $this->torrent->setQuality('changed');
        $this->assertEquals('changed', $this->torrent->getQuality());

        $this->assertEquals(1, $this->torrent->getSeeds());
        $this->torrent->setSeeds(0);
        $this->assertEquals(0, $this->torrent->getSeeds());

        $this->assertEquals(1, $this->torrent->getPeers());
        $this->torrent->setPeers(0);
        $this->assertEquals(0, $this->torrent->getPeers());
    }

    /**
     * Testing the Torrent class with the default parameters.
     * @return void
     */
    public function testDefaultTorrent() : void
    {
        $this->assertInstanceOf(Torrent::class, $this->torrentDefault);

        $this->assertObjectHasAttribute('url', $this->torrentDefault);
        $this->assertObjectHasAttribute('quality', $this->torrentDefault);
        $this->assertObjectHasAttribute('seeds', $this->torrentDefault);
        $this->assertObjectHasAttribute('peers', $this->torrentDefault);

        $this->assertEquals('url', $this->torrentDefault->getUrl());
        $this->torrentDefault->setUrl('changed');
        $this->assertEquals('changed', $this->torrentDefault->getUrl());

        $this->assertEquals('quality', $this->torrentDefault->getQuality());
        $this->torrentDefault->setQuality('changed');
        $this->assertEquals('changed', $this->torrentDefault->getQuality());

        $this->assertEquals(0, $this->torrentDefault->getSeeds());
        $this->torrentDefault->setSeeds(1);
        $this->assertEquals(1, $this->torrentDefault->getSeeds());

        $this->assertEquals(0, $this->torrentDefault->getPeers());
        $this->torrentDefault->setPeers(1);
        $this->assertEquals(1, $this->torrentDefault->getPeers());
    }
}
