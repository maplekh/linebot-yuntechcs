<?php 
namespace Conpoz\Controller;

class Index extends \stdClass
{
    public function indexAction () 
    {

        // $rh = $this->bag->dbquery->execute("SELECT * FROM questions WHERE 1");
        $rh = $this->model->Questions->getListRh();
        $this->view->addView('/htmlTemplate');
        $this->view->addView('/index/index');
        require($this->view->getView());
    }
}