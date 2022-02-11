This is a work in progress of a simple php script that:

* logins to the Aquarea interface using Chrome Headless (login.php)
* pulls some statistics (pull.php, work in progress)
* sends those statistics to the specified MQTT server (push.php)

You can then use the Aquarea data as sensors in Home Assistant (see below). A screenshot of the result of step 1 and 2 is saved as a .png for debugging purposes.

To get started, enter your Panasonic ID in config.php (a separate sub-account is recommended, you will be logged out in the Smart Cloud app.) Specify your MQTT broker and rename sample-config.php to config.php.

Go.sh is a simple sample script. You can also decide to login once and not remove the cache folder, so the login is persistent; I'm not sure if this is reliable. Please let me know at joost@schellevis.net!

## Requirements:

- php
- google chrome installed
- composer
- composer packages: chrome-php/chrome and php-mqtt/client
- mqtt broker

## Home Assistant Example:
```
- platform: mqtt
  name: "Temperatuur buiten"
  unit_of_measurement: '°C'
  state_topic: "aquarea/outdoor"

- platform: mqtt
  name: "Temperatuur vloerverwarming"
  unit_of_measurement: '°C'
  state_topic: "aquarea/zone"

- platform: mqtt
  name: "Temperatuur boiler"
  unit_of_measurement: '°C'
  state_topic: "aquarea/water"
```
