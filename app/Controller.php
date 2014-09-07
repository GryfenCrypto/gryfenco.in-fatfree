<?php

//! Base controller
class Controller {

	protected $db;



    protected  function renderHtml($html)
    {
        return View::instance()->render($html);
    }


	//! Instantiate class
	function __construct() {
		$f3=Base::instance();

        try
        {
            // Connect to the database
            $db=new DB\SQL($f3->get('db'),$f3->get('user'),$f3->get('passwd'));
            if (file_exists('setup.sql')) {
                // Initialize database with default setup
                $db->exec(explode(';',$f3->read('setup.sql')));
                // Make default setup inaccessible
                rename('setup.sql','setup.$ql');
            }
            // Use database-managed sessions
            new DB\SQL\Session($db);
            // Save frequently used variables
            $this->db=$db;
        }
        catch(Exception $ex)
        {
            $this->db=null;
        }
	}

}
