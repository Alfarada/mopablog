<?php

namespace Tests;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

abstract class BrowserTestCase extends BaseTestCase
{
    use CreatesApplication, TestHelpers;

    public $baseUrl = 'http://mopablog.test';
}