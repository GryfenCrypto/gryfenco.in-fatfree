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
        $f3->set('btnLabel','Let me know about GryfenCoin news!');
        $page = new RegisterPage($f3,View::instance());
        $page->setContent("ui/register2-content.html");
        $page->render();
    }
);

$f3->route('GET /gryfencoin-proof-of-work-mining',
    function($f3) {

        $f3->set('btnLabel','Add me to the wait list');
        $page = new LandingPage($f3,View::instance());
        $page->setContent("ui/gryfencoin-proof-of-work-mining.html");
        $page->render();
    }
);

$f3->route('GET /gryfencoin-proof-of-stake-minting',
    function($f3) {

        $f3->set('btnLabel','Add me to the wait list');
        $page = new LandingPage($f3,View::instance());
        $page->setContent("ui/gryfencoin-proof-of-stake-minting.html");
        $page->render();
    }
);

$f3->route('GET /gryfencoin-super-faucet-minting',
    function($f3) {

        $f3->set('btnLabel','Add me to the wait list');
        $page = new LandingPage($f3,View::instance());
        $page->setContent("ui/gryfencoin-super-faucet-minting.html");
        $page->render();
    }
);

$f3->route('GET /gryfencoin-stake-share-futures',
    function($f3) {

        $f3->set('btnLabel','Add me to the wait list');
        $page = new LandingPage($f3,View::instance());
        $page->setContent("ui/gryfencoin-stake-share-futures.html");
        $page->render();
    }
);

$f3->route('GET /gryfen-co-cryptocurrency-options-market-and-exchange',
    function($f3) {

        $f3->set('btnLabel','Add me to the wait list');
        $page = new LandingPage($f3,View::instance());
        $page->setContent("ui/gryfen-co-cryptocurrency-options-market-and-exchange.html");
        $page->render();
    }
);

$f3->route('GET /gryfen-options-market-cloud-multipool',
    function($f3) {

        $f3->set('btnLabel','Add me to the wait list');
        $page = new LandingPage($f3,View::instance());
        $page->setContent("ui/gryfen-options-market-cloud-multipool.html");
        $page->render();
    }
);

$f3->route('GET /gryfen-business-and-projects',
    function($f3) {

        $f3->set('btnLabel','Add me to the wait list');
        $page = new LandingPage($f3,View::instance());
        $page->setContent("ui/gryfen-business-and-projects.html");
        $page->render();
    }
);

$f3->route('GET /gryfencoin-awesome-users',
    function($f3) {

        $f3->set('btnLabel','Add me to the wait list');
        $page = new LandingPage($f3,View::instance());
        $page->setContent("ui/gryfencoin-awesome-users.html");
        $page->render();
    }
);


$f3->route('GET /client-page',
    function($f3) {

        $f3->set('btnLabel','Subscribe and stay up to date');
        $page = new LandingPage($f3,View::instance());
        $page->setContent("ui/client-page.html");
        $page->render();
    }
);

$f3->route('GET /specs',
    function($f3) {

        $f3->set('btnLabel','Subscribe and stay up to date');
        $page = new LandingPage($f3,View::instance());
        $page->setContent("ui/specs-content.html");
        $page->render();
    }
);

$f3->route('GET /@section',
    function($f3,$params) {
        $footerSections = array("privacy","terms","copyright","antispam","legal");
        $section=$params['section'];
        if(in_array($section,$footerSections))
        {
            $f3->set('btnLabel','Subscribe and stay up to date');
            $page = new LandingPage($f3,View::instance());
            $page->setContent("ui/".$section.".html");
            $page->render();
        }
        else
        {
            $f3->reroute('/');
        }
    }
);



$f3->run();
