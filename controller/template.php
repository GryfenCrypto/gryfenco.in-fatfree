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



    protected function renderContent($html_content)
    {


        echo $this->view->render($html_content);


    }

    abstract public function render();

}

class LandingPage extends AbstractTemplate
{

    public function render()
    {
        $this->renderContent("ui/head.html");
        echo "<div class=\"content\">\n";
        $this->renderContent("ui/menubar.html");
        $this->renderContent("ui/landing-content.html");
        echo "</div>\n";
        $this->renderContent("ui/footer.html");
        $this->renderContent("ui/bottom-scripts.html");
        echo "<script>initStylio();</script>";
        echo "</body></html>";
    }
}