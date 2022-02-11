#!/bin/sh

while true
do
	echo nieuwe loop...
	php login.php
	php pull.php
	php push.php
	rm -r cache
	echo slapen...
	sleep 30m
	echo opnieuw...
done
