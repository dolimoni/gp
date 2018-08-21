<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BaseController extends CI_Controller
{

    private $params;

    private $acl;




    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_params');
       // ini_set('error_log', '/home/gpma/public_html/application/logs/errors_log.txt');
        $controller = $this->router->fetch_class();

        $this->params = $this->model_params->config(); // getting user configuration
        // load language file
        $this->lang->load('common', $this->getParams()["language"]);
        $this->lang->load(strtolower($controller), $this->params["language"]);
    }

    public function pageControlle($controller,$action,$user_id){
        $this->acl = $this->model_params->acl($controller, $action,$user_id);
        return $this->acl;
    }

    /**
     * @return mixed
     */
    public function getAcl()
    {
        return $this->acl;
    }

    /**
     * @param mixed $acl
     */
    public function setAcl($acl)
    {
        $this->acl = $acl;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }


    public function log_begin()
    {
        log_message('info', "dolimoni=>Log_begin: " . $this->router->fetch_class() . " " . $this->router->fetch_method());
        $data= print_r($this->input->post(NULL, TRUE), TRUE);
        log_message('info', ($data));
    }

    public function log_middle($data)
    {
        log_message('info', "dolimoni=>Log_middle: " . json_encode($data));
    }

    public function log_end($data)
    {
        log_message('info', "dolimoni=>Log_end: " . json_encode($data));
    }


    protected  function updateImage(){
        ini_set('memory_limit', '-1');
        //$this->load->library('uploadHandler');
        require_once(APPPATH.'libraries/UploadHandler.php');

        $data=array(
            'print_response'=>false,
            'param_name'=>'img',
        );
        $upload_handler1=new UploadHandler($data);

        $response1=$upload_handler1->get_response();

        ini_set('memory_limit', '256');


        $response=array(
            'files'=>$response1['img'],
            'type'=>'img'
        );

        return $response;
    }




}

?>