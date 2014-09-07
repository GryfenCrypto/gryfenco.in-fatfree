<?php
/**
 * Created by PhpStorm.
 * User: stefano
 * Date: 9/4/14
 * Time: 12:45 AM
 */

class GRYF extends Controller
{

    private function getIp() {
        $ip = $_SERVER['REMOTE_ADDR'];

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        return $ip;
    }

    private function ipIsAlreadyRegistered($ip,$gaddress)
    {

        $faucet= new DB\SQL\Mapper($this->db,'faucet');
        $faucet->load(array('user_ip=?',$ip));
        if($faucet->user_ip==null) // add the new ip and address
        {
            $faucet->user_ip=$ip;
            $faucet->gaddress=$gaddress;
            $faucet->save();
            return false;
        }
        return true;
    }


    function error($f3)
    {
        echo Template::instance()->render('error-layout.html');
        $errorCode=$f3->get('ERROR.code');
//        if($errorCode==404)
//            $this->renderLandingPage($f3,"error.html");
//        else
//            $f3->reroute('/');
    }

    function handleFaucet($f3)
    {

        $gaddress = $f3->get('POST.gaddress');//$_POST['gaddress'];


        // Validation
        if(!$gaddress){ echo "No GryfenCoin address provided"; return;}

        if(!preg_match("/^G[a-km-zA-HJ-NP-Z1-9]{33}$/", $gaddress)) {
            echo "GryfenCoin address is invalid"; return;
        }


        if($this->ipIsAlreadyRegistered($this->getIp(),$gaddress))
        {
            echo "You already received your coins! ".$this->getIp(); return;
        }

        $address = $f3->get('faucet_email');
        $e_subject = $f3->get('faucet_email_subject');

        // Configuration option.
        // You can change this if you feel that you need to.
        // Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

        $e_body =  $f3->get('faucet_email_body').$gaddress. PHP_EOL . PHP_EOL;
        $e_content = PHP_EOL . PHP_EOL;
        $e_reply = "";

        $msg = wordwrap( $e_body . $e_content . $e_reply, 70 );


        $headers="MIME-Version: 1.0" . PHP_EOL;
        $headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
        $headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

        if(mail($address, $e_subject, $msg, $headers)) {

            // Email has sent successfully, echo a success.

            echo "Success";

        } else {

            echo 'Error sending email!';

        }



    }

} 