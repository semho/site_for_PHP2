<?php

require __DIR__ . '/config.php';

$db = new DateBase;
$form = new Form;
$form->validate();

include __DIR__ . '/views/form.php';