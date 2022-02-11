<?php

require("config.php");
require("vendor/autoload.php");
require("inc/simple_html_dom.php");

use \PhpMqtt\Client\MqttClient;

$html = file_get_html("temp.html");

$info["outdoor"] = trim(str_replace("°","",$html->find('#page-a2w-status-display_outdoors-temperature',0)->plaintext));
$info["zone"] = trim(str_replace("°","",$html->find('#page-a2w-status-display_zone1-present-temperature',0)->plaintext));
$info["water"] = trim(str_replace("°","",$html->find('#page-a2w-status-display_hotwater-present-temperature',0)->plaintext));

$mqtt = new \PhpMqtt\Client\MqttClient($config["mqtt_broker"], $config["mqtt_port"], $config["mqtt_client"]);
$mqtt->connect();

foreach($info as $val=>$in) {
  $mqtt->publish("aquarea/".$val, $in, 0);
}

$mqtt->disconnect();

?>
