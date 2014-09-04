<?php
/**
 * Created by PhpStorm.
 * User: stefano
 * Date: 9/3/14
 * Time: 9:59 PM
 */


class LandingPage extends Controller {


    //! HTTP route pre-processor
    function beforeroute($f3) {

    }

    //! HTTP route post-processor
    function afterroute() {
        // Render HTML layout
        echo Template::instance()->render('landing-layout.html');
    }



    private function renderLandingPage($f3,$content)
    {
        $f3->set('head','head.html');
        $f3->set('menu','menubar.html');
        $f3->set('content',$content);
        $f3->set('footer','footer.html');
        $f3->set('scripts','bottom-scripts.html');
    }

    function home($f3)
    {
        $this->renderLandingPage($f3,"landing-content.html");

    }
    function faucet($f3)
    {
        $this->renderLandingPage($f3,"faucet.html");

    }



    function sections($f3,$params)
    {
        $footerSections = array("privacy","terms","copyright","antispam","legal");
        $section=$params['section'];
        if(in_array($section,$footerSections))
        {
            $this->renderLandingPage($f3,$section.".html");
        }
        else
        {
            $f3->error('404');
        }
    }





} 