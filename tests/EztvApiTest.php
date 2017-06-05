<?php

use PHPUnit\Framework\TestCase;
use EztvApi\EztvApi;
use EztvApi\Models\Show;

/**
 * Testing the EztvApi class.
 * @method void beforeAll()
 * @method void testGetAList()
 * @method void testGetShow()
 * @method void testSearchShow()
 */
class EztvApiTest extends TestCase
{
    private $eztvApi;
    private $show;
    private $falseShow;

    /**
     * Method for setting up the test values.
     * @before
     * @return void
     */
    public function beforeAll()
    {
        $this->eztvApi = new EztvApi([
            'baseUrl' => 'https://eztv.ag/'
        ]);
        $this->show = new Show(449, '10 o\'Clock Live', '10-o-clock-live');
        $this->falseShow = new Show(12345, 'False Show Name', 'false-show-name');
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
        $this->assertObjectHasAttribute('id', $allShows[0]);
        $this->assertObjectHasAttribute('slug', $allShows[0]);
    }

    /**
     * Testing the method which retrieves a show.
     * @return Show - A show.
     */
    public function testGetShow()
    {
        $show = $this->eztvApi->getShow($this->show);

        $this->assertObjectHasAttribute('title', $show);
        $this->assertObjectHasAttribute('id', $show);
        $this->assertObjectHasAttribute('slug', $show);
    }

    /**
     * Testing the moethod which searches for a show.
     * @return Show - A show.
     */
    public function testSearchShow()
    {
        $show = $this->eztvApi->searchShow($this->show);

        $this->assertObjectHasAttribute('title', $show);
        $this->assertObjectHasAttribute('id', $show);
        $this->assertObjectHasAttribute('slug', $show);
    }
}
