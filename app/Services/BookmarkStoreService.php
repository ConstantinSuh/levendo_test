<?php

namespace App\Services;

use App\Exceptions\IncorrectUrlException;
use App\HtmlParser\HtmlParser;
use App\Models\Bookmark;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Support\Facades\Http;

class BookmarkStoreService
{

    /**
     * @var HtmlParser
     */
    protected $parser;

    protected $client;

    /**
     * BookmarkStoreService constructor.
     * @param HtmlParser $parser
     * @param Http $httpClient
     */
    public function __construct(HtmlParser $parser, Http $httpClient)
    {
        $this->parser = $parser;
        $this->client = $httpClient;
    }

    public function storeFromUrl(string $url)
    {
        $bookmark = new Bookmark();

        $html = $this->getHtml($url);
        $this->parser->loadStr($html);

        $bookmark->url = $url;
        $bookmark->meta_keywords = $this->parser->getKeywords();
        $bookmark->meta_description = $this->parser->getDescription();
        $bookmark->title = $this->parser->getTitle();

        $faviconPath = $this->parser->getFaviconPath();
        if ($faviconPath !== null) {
            $bookmark->favicon_path = $this->getFormattedUrl($faviconPath);
        }

        $bookmark->save();

        return $bookmark;
    }

    /**
     * @param $url
     * @return string
     */
    protected function getFormattedUrl($url)
    {
        $urlInfo = parse_url($url);
        if (isset($urlInfo['host'])) {
            $host = $urlInfo['host'];
        } else {
            $host = parse_url($url)['host'] ?? '';
        }
        $scheme = $urlInfo['scheme'] ?? 'https';

        return $scheme . '://' . $host . ($urlInfo['path'] ?? '');
    }

    /**
     * @param $url
     * @return string
     * @throws IncorrectUrlException
     */
    protected function getHtml($url)
    {
        try {
            return Http::get($url)->body();
        } catch (HttpClientException $exception) {
            throw new IncorrectUrlException('Incorrect Url', 0, $exception);
        }
    }
}
