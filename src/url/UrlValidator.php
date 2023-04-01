<?php

namespace andrii\PhpPro\url;

class UrlValidator
{
     public function validateUrl($url) : bool
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }
        return true;
    }
    public function activeUrl($url)
    {
        $headers = get_headers($url);
        return str_contains($headers[0], '200');
    }

}