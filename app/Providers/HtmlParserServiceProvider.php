<?php


namespace App\Providers;


use App\HtmlParser\HtmlParser;
use App\HtmlParser\HtmlParserService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use PHPHtmlParser\Contracts\DomInterface;
use PHPHtmlParser\Dom;

class HtmlParserServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->app->bind(HtmlParser::class, function ($app) {
            return new HtmlParserService($app->make(Dom::class));
        });
    }
}
