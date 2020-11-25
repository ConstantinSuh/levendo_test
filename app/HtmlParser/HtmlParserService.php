<?php


namespace App\HtmlParser;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use PHPHtmlParser\Contracts\DomInterface;

class HtmlParserService implements HtmlParser
{

    /**
     * @var DomInterface
     */
    protected $parser;

    public function __construct(DomInterface $parser)
    {
        $this->parser = $parser;
    }

    public function loadFromUrl(string $url)
    {
        $this->parser->loadFromUrl($url, null);
    }

    public function loadStr(string $html)
    {
        $this->parser->loadStr($html);
    }

    public function getKeywords()
    {
        $results = $this->parser->find('head meta[name="keywords"]');
        if ($results->count()) {
            $tag = $results[0]->tag;
            if ($tag->hasAttribute('content')) {
                return  $tag->getAttribute('content')->getValue();
            }
        }

        return null;
    }

    public function getDescription()
    {
        $results = $this->parser->find('head meta[name="description"]');
        if ($results->count()) {
            $tag = $results[0]->tag;
            if ($tag->hasAttribute('content')) {
                return  $tag->getAttribute('content')->getValue();
            }
        }

        return null;
    }

    public function getTitle()
    {
        $results = $this->parser->find('head title');
        if ($results->count()) {
            return $results[0]->text;
        }

        return null;
    }

    public function getFaviconPath()
    {
        $results = $this->parser->find('head link');
        if ($results->count()) {
            foreach ($results as $result) {
                $tag = $result->tag;
                if ($tag->hasAttribute('rel')) {
                    $attr =  explode(' ', $tag->getAttribute('rel')->getValue());
                    if (in_array('icon', $attr)) {
                        if ($tag->hasAttribute('href')) {
                            return $tag->getAttribute('href')->getValue();
                        }
                    }
                }
            }
        }

        return null;
    }

}
