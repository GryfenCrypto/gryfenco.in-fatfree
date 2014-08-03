<?php
require_once('controller/template.php');
$f3= require('lib/base.php');

$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

$f3->config('config.ini');

$f3->route('GET /',
	function($f3) {

        $page = new LandingPage($f3,View::instance());
        $page->render();
	}
);

$f3->route('GET /register',
    function($f3) {


    }
);



$f3->run();
