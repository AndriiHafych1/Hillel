<?php

namespace andrii\PhpPro\url;

class ConvertUrl{

    private $shortUrl = '';

    public function createShortURL(): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($i = 0; $i < 8; $i++) {
            $this->shortUrl .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $this->shortUrl;
    }


}