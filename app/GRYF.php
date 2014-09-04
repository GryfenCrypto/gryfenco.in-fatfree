<?php
/**
 * Created by PhpStorm.
 * User: stefano
 * Date: 9/4/14
 * Time: 12:45 AM
 */

class GRYF
{
    //! HTTP route pre-processor
    function beforeroute($f3) {

    }

    //! HTTP route post-processor
    function afterroute() {
        // Render HTML layout
        echo Template::instance()->render('error-layout.html');
    }



    function error($f3)
    {

        $errorCode=$f3->get('ERROR.code');
//        if($errorCode==404)
//            $this->renderLandingPage($f3,"error.html");
//        else
//            $f3->reroute('/');
    }

} 