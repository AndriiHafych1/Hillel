<?php

namespace andrii\PhpPro\url;

use andrii\PhpPro\url\Interfaces\IDataHandler;
use andrii\PhpPro\url\Interfaces\IUrlDecoder;


class UrlDecoder implements IUrlDecoder
{
    private IDataHandler $dataHandler;


    public function __construct(IDataHandler $dataHandler)
    {
        $this->dataHandler = $dataHandler;

    }

    public function decode(string $shortUrl): string
    {
        $this->dataHandler->openConnection();

        return $this->dataHandler->read($shortUrl);

    }
}