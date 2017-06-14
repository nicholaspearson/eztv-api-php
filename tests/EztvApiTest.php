<?php

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use EztvApi\EztvApi;
use EztvApi\Models\Show;

/**
 * Testing the EztvApi class.
 * @method beforeAll()
 * @method testShow()
 * @method testGetAList()
 * @method testGetShow()
 * @method testSearchShow()
 * @method testDateBasedShow()
 * @method testNoEpisodesShow()
 * @method testNoMagnetShow()
 */
class EztvApiTest extends TestCase
{
    private $eztvApi;
    private $logger;
    private $show;
    private $falseShow;
    private $dateBasedShow;
    // private $noEpisodesShow;
    private $noMagnetShow;

    /**
     * Method for setting up the test values.
     * @before
     * @return void
     */
    public function beforeAll()
    {
        $this->eztvApi = new EztvApi([
            'baseUrl' => 'https://eztv.ag/',
            'logger' => new Logger('EztvApiTest')
        ]);
        $this->show = new Show(449, '10 o\'Clock Live', '10-o-clock-live');
        $this->falseShow = new Show(12345, 'False Show Name', 'false-show-name');
        $this->dateBasedShow = new Show(817, '60 Minutes US', '60-minutes-us');
        // $this->noEpisodesShow = new Show();
        $this->noMagnetShow = new Show(556, 'Grimm', 'grimm');
    }

    /**
     * Test a show
     * @param  Show $show - The show to test.
     * @codeCoverageIgnore
     * @return null
     */
    private function testShow(Show $show)
    {
        $this->assertObjectHasAttribute('title', $show);
        $this->assertObjectHasAttribute('showId', $show);
        $this->assertObjectHasAttribute('slug', $show);
        $this->assertObjectHasAttribute('imdb', $show);
        $this->assertObjectHasAttribute('episodes', $show);
    }

    /**
     * Testing the method which retrieves a list of shows.
     * @return array - List of available shows.
     */
    public function testGetAList()
    {
        $allShows = $this->eztvApi->getAllShows();
        $this->assertNotEmpty($allShows);
        $this->assertTrue(count($allShows) > 0);

        $this->assertObjectHasAttribute('title', $allShows[0]);
        $this->assertObjectHasAttribute('showId', $allShows[0]);
        $this->assertObjectHasAttribute('slug', $allShows[0]);
    }

    /**
     * Testing the method which retrieves a show.
     * @return Show - A show.
     */
    public function testGetShow()
    {
        $show = $this->eztvApi->getShow($this->show);
        $this->testShow($show);
    }

    /**
     * Testing the method which searches for a show.
     * @return Show - A show.
     */
    public function testSearchShow()
    {
        $show = $this->eztvApi->searchShow($this->show);
        $this->testShow($show);
    }

    /**
     * Testing a datebased show.
     * @return Show - A show.
     */
    public function testDateBasedShow()
    {
        $show = $this->eztvApi->getShow($this->dateBasedShow);
        $this->testShow($show);
    }

    // /**
    //  * Testing a show with no episodes.
    //  * @return Show - A show.
    //  */
    // public function testNoEpisodesShow()
    // {
    //     $show = $this->eztvApi->getShow($this->noEpisodesShow);
    //     $this->testShow($show);
    // }

    /**
     * Testing a show with no magnet.
     * @return Show - A show.
     */
    public function testNoMagnetShow()
    {
        $show = $this->eztvApi->getShow($this->noMagnetShow);
        $this->testShow($show);
    }

}
