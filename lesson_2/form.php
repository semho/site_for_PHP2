<?php

require __DIR__ . '/config.php';

$db = new DateBase;
$db->validate();

include __DIR__ . '/views/form.php';