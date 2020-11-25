<?php

namespace App\HtmlParser;

interface HtmlParser
{

    public function getKeywords();

    public function getDescription();

    public function getTitle();

    public function loadFromUrl(string $url);

    public function loadStr(string $html);

    public function getFaviconPath();
}
