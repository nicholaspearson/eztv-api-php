<?php namespace EztvApi;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

use EztvApi\Models\Episode;
use EztvApi\Models\Show;
use EztvApi\Models\Torrent;

/**
 * The eztv API class.
 * @method Crawler get(string $uri, array $query = []) : Crawler
 * @method Show getShowData(Crawler $crawler, Show $show) : Show
 * @method array getAllShows() : array
 * @method Show getShow(Show $show) : Show
 * @method Show searchShow(Show $show) : Show
 */
class EztvApi
{
    /**
     * The base url for the eztv API.
     * @var string
     */
    private $baseUrl;

    /**
     * The client for the eztv API.
     * @var Client
     */
    private $client;

    /**
     * The logger for the eztv API.
     * @var Logger
     */
    private $logger;

    /**
     * Create a new eztv API object.
     * @param array $config - The configuration array for the eztv API.
     */
    public function __construct(array $config = ['baseUrl' => 'https://eztv.ag/'])
    {
        $this->baseUrl = $config['baseUrl'];
        $this->client = new Client();
        $this->logger = $config['logger'] ?? null;
    }

    /**
     * Send a GET request to eztv.ag
     * @param  string $uri - The endpoint to send the request to.
     * @param  array $query - Optional parameters to send.
     * @return Crawler - Crawler object to extract data.
     */
    private function get(string $uri, array $query = []) : Crawler
    {
        if ($this->logger) {
            $this->logger->info("Making request to: {$this->baseUrl}{$uri}?" . http_build_query($query));
        }

        // XXX: `http_build_query` shouldn't be used, queries should be handled with
        // a third parameter
        return $this->client->request('GET', "{$this->baseUrl}{$uri}?" . http_build_query($query));
    }

    /**
     * Get show data with a crawler and a show object.
     * @param  Crawler $crawler - The crawler to get data from.
     * @param  Show $show - The show to attach the data to.
     * @return Show - The show enriched with more data.
     */
    private function getShowData(Crawler $crawler, Show $show) : Show
    {
        $episodes = $crawler->filter('tr.forum_header_border[name="hover"]')->each(function (Crawler $node) {
            $title = $node->children('td')->eq(1);
            if ($title->count() !== 0) {
                $title = preg_replace('/x264/i', '', $title->text());
            }

            $magnet = $node->children('td')->eq(2);
            if ($magnet->count() !== 0) {
                $magnet = $magnet->children('a.magnet');
            }
            if ($magnet->count() === 0) {
                return;
            }
            $magnet = $magnet->first()->attr('href');

            $seasonBased = '/S?0*(\d+).[xE]0*(\d+)/';
            $dateBased = '/(\d{4}).(\d{2}.\d{2})/';
            $vtv = '/(\d{1,2})[x](\d{2})/';

            if (preg_match($seasonBased, $title, $match) || preg_match($vtv, $title, $match)) {
                $episode = new Episode($match[1], $match[2], false);
            } else if (preg_match($dateBased, $title, $match)) {
                $episode = new Episode($match[1], preg_replace('/\s/', '', $match[2]), true);
            }
            
            if (empty($episode)) {
                return;
            }
            
            preg_match('/(\d{3,4})p/', $title, $matchQual);
            $quality = $matchQual ? $matchQual[1] : '480p';

            $torrent = new Torrent($magnet, $quality);

            $episode->setTorrent($torrent);
        });

        array_filter($episodes, function ($value) {
            return $value !== null;
        });

        $show->setEpisodes($episodes);

        return $show;
    }

    /**
     * Get an array with all the shows.
     * @return array - An array with all the shows.
     */
    public function getAllShows() : array
    {
        $crawler = $this->get('showlist/');

        return $crawler->filter('.thread_link')->each(function (Crawler $node) {
            preg_match('/\/shows\/(.*)\/(.*)\//i', $node->attr('href'), $match);
            return new Show($match[1], $node->text(), $match[2]);
        });
    }

    /**
     * Get a show from the shows page.
     * @param  Show $show - The show to enrich.
     * @return Show - The show enriched with more data.
     */
    public function getShow(Show $show) : Show
    {
        $crawler = $this->get("shows/{$show->getShowId()}/{$show->getSlug()}/");

        $imdb = $crawler->filter('div[itemtype="http://schema.org/AggregateRating"]')->filter('a[target="_blank"]');

        if ($imdb->count() !== 0) {
            $imdb = $imdb->attr('href');
            preg_match('/\/title\/(.*)\//', $imdb, $match);
            $show->setImdb($match[1]);
        }

        return $this->getShowData($crawler, $show);
    }

    /**
     * Search for a show.
     * @param  Show $show - The show to enrich.
     * @return Show - The show enriched with more data.
     */
    public function searchShow(Show $show) : Show
    {
        $crawler = $this->get('search/', ['q2' => $show->getShowId()]);

        return $this->getShowData($crawler, $show);
    }
}
