<?php

namespace andrii\PhpPro\url;

use andrii\PhpPro\url\Interfaces\IDataHandler;
use Exception;


class DataHandler implements IDataHandler
{
    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->create();
    }

    public function create(): void
    {
        if (!file_exists($this->filename)) {
            $file = fopen($this->filename, "a");
            if ($file === false) {
                throw new \InvalidArgumentException("Unable to create file");
            }
            fclose($file);
        }
    }

    public function openConnection()
    {
        $fileContent = fopen($this->filename, "r+");
        if ($fileContent === false) {
            throw new \InvalidArgumentException("Unable to read file");
        }
        return $fileContent;
    }

    public function closeConnection($file)
    {
        fclose($file);
    }

    public function write($shortUrl, $url): void
    {
        try {
            $file = fopen($this->filename, "a");
            fwrite($file, $shortUrl . " => " . $url . "\n");
            fclose($file);
        } catch (\Throwable $th) {
            throw new \InvalidArgumentException("Unable to write to file");
        }
    }

    public function read(string $shortUrl): string
    {
        $file = $this->openConnection();
        while ($emails = fgets($file)) {
            $example = explode(" => ", $emails);

            if ($example[0] == $shortUrl) {
                $this->closeConnection($file);
                return $example[1];
            }
        }
        $this->closeConnection($file);
        return "Not found";
    }

}