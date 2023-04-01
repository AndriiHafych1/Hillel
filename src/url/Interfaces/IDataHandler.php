<?php

namespace andrii\PhpPro\url\Interfaces;

interface IDataHandler
{
    public function openConnection();
    public function closeConnection($db);
    public function write(string $shortUrl, string $url): void;
    public function read(string $shortUrl): string;

}