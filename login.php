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
    $page->keyboard()->setKeyInterval(rand(8,11));
    $page->keyboard()
        ->typeRawKey('Tab')
        ->typeRawKey('Tab')
        ->typeText($config["panasonic_id"])
        ->typeRawKey('Tab')
        ->typeText($config["panasonic_ww"]);


    $page->mouse()->find('#check-omit')->click();
    $page->mouse()->find('#btn-login')->click();
    $page->mouse()->find('#btn-login')->click();

    sleep(15);

    $page->screenshot()->saveToFile('login.png');

    $browser->close();
