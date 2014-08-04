<?php
/**
 * Created by PhpStorm.
 * User: stefano
 * Date: 7/22/14
 * Time: 5:59 PM
 */


abstract class AbstractTemplate
{
    protected $f3;
    protected $view;


    public function __construct($f3,$view)
    {
        $this->f3=$f3;
        $this->view=$view;
    }



    protected function renderHtmlFragment($html_content)
    {


        echo $this->view->render($html_content);


    }

    abstract public function render();

};




class StandardPageTemplate extends AbstractTemplate
{
    protected $header,$content,$footer,$menubar;
    protected $bodyClass;


    public function __construct($f3,$view)
    {
        parent::__construct($f3,$view);


    }
    public function render()
    {
        // render header if available
        if($this->header)
            $this->renderHtmlFragment($this->header);
        else
            echo "<head></head>";

        $bodyTag="<body>\n";
        // begin body
        if($this->bodyClass)
            $bodyTag="<body "." class='".$this->bodyClass."'>\n";
        echo $bodyTag;
        echo "<div class=\"content\">\n";

        // render menubar if available
        if($this->menubar)
            $this->renderHtmlFragment($this->menubar);
        else echo "<div></div>";

        // render content if available
        if($this->content)
            $this->renderHtmlFragment($this->content);
        else echo "<div></div>";

        echo "</div>\n"; // end of content container

        // render footer if available
        if($this->footer)
            $this->renderHtmlFragment("ui/footer.html");

        // scripts are needed anyway for stylio to work
        $this->renderHtmlFragment("ui/bottom-scripts.html");

        // init all the scripts
        echo "<script>initStylio();</script>";

        // end of the page
        echo "</body></html>";
    }

    public function setFooter($html)
    {
       $this->footer=$html;
    }

    public function setHeader($html)
    {
        $this->header=$html;
    }

    public function setContent($html)
    {
        $this->content=$html;
    }

    public function setMenubar($html)
    {
        $this->menubar=$html;
    }

    public function setBodyClass($class)
    {
        $this->bodyClass=$class;
    }
}

class LandingPage extends StandardPageTemplate
{

    public function __construct($f3,$view)
    {
        parent::__construct($f3,$view);
        $this->setHeader("ui/head.html");
        $this->setMenubar("ui/menubar.html");
        $this->setContent("ui/landing-content.html");
        $this->setFooter("ui/footer.html");

    }


};

class RegisterPage extends StandardPageTemplate
{

    public function __construct($f3,$view)
    {
        parent::__construct($f3,$view);
        $this->setHeader("ui/head.html");
        $this->setMenubar("ui/menubar.html");
        $this->setContent("ui/register-content.html");
        $this->setBodyClass("register-page");


    }


};