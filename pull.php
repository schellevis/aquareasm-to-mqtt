<?php

require("vendor/autoload.php");
require("config.php");

use HeadlessChromium\BrowserFactory;

$browserFactory = new BrowserFactory($config["chrome_bin"]);
$browserFactory->addOptions(["userDataDir" => "cache",
"userAgent" => "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.50 Safari/537.36'"]);

$browser = $browserFactory->createBrowser();

    $page = $browser->createPage();

    $page->navigate('https://aquarea-smart.panasonic.com/')->waitForNavigation();

    sleep(10);

    $page->screenshot()->saveToFile('pull.png');

    $html = $page->getHtml();

    file_put_contents("temp.html",$html);

    $browser->close();
