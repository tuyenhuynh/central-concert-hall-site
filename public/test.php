<?php
/**
 * Created by PhpStorm.
 * User: tuyenhuynh
 * Date: 15/07/16
 * Time: 00:25
 */



$date = DateTime::createFromFormat('d.m.Y H:i', '15.07.2016 00:20');
echo $date->format('D');