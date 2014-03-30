#!/usr/bin/env php
<?php

require "vendor/autoload.php";

use Indatus\Callbot\ConfigReader;
use Indatus\Callbot\Commands\CallCommand;
use Symfony\Component\Console\Application;
use Indatus\Callbot\Factories\FileStoreFactory;
use Indatus\Callbot\Factories\CallServiceFactory;

$application = new Application;
$application->add(
    new CallCommand(
        new CallServiceFactory,
        new FileStoreFactory,
        new ConfigReader
    )
);
$application->run();
