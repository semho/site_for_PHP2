<?php

require_once __DIR__ . '/Form.php';

class AddForm
    extends Form
{
    protected function getTable()
    {
        return 'news';
    }
} 