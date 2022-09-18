<?php

namespace App\Services;

use Symfony\Component\DomCrawler\Crawler;

class DataParser
{
    public function run($source, $tableName):array
    {
        $XMLData = file_get_contents($source);
        $crawler = new Crawler($XMLData);
        $xpath = '//table[contains(@name, "'.$tableName.'")]';

        $dataArray = $crawler
            ->filterXPath($xpath)
            ->each(function (Crawler $node) {
            return $node->filter('column')->extract(['_text']);
        });

        return $dataArray;
    }

}
