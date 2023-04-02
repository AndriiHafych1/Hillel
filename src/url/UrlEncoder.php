<?php

namespace andrii\PhpPro\url;

use andrii\PhpPro\url\Interfaces\IDataHandler;
use andrii\PhpPro\url\Interfaces\IUrlEncoder;


class UrlEncoder implements IUrlEncoder
{
    private IDataHandler $dataHandler;
    private UrlValidator $validator;
    private ConvertUrl $convertUrl;

    public function __construct(IDataHandler $dataHandler, UrlValidator $validator, ConvertUrl $convertUrl)
    {
        $this->dataHandler = $dataHandler;
        $this->validator = $validator;
        $this->convertUrl = $convertUrl;
    }


    public function encode(string $url): string
    {
        if ($this->validator->activeUrl($url) and $this->validator->validateUrl($url)) {
            $shortUrl = $this->convertUrl->createShortURL();
            $this->dataHandler->write($shortUrl, $url);
        } else {
            throw new \InvalidArgumentException("Invalid URL:" . $url);
        }
        return $shortUrl;
    }
}