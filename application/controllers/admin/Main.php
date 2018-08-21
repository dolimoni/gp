<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 7/10/18
 * Time: 3:43 PM
 */

class Main extends BaseController
{

    public function index(){
        phpinfo();
    }

    public function error500(){

       $this->model_subject->getWithRelations(2);
    }

    public function sendmail(){
        if(true){
            $send_to = "";
            $this->load->library('email');
            $this->email->from('khalid@gp.ma', 'Contact');
            $emails = explode(";", 'khalid.essalhi8@gmail.com');
            foreach ($emails as $value) {
                if (filter_var($value, FILTER_VALIDATE_EMAIL) and $value==!NULL) {
                    $send_to .= $value.",";
                }
            }

            $this->email->to(rtrim($send_to,", "));
            //$this->email->attach(base_url($e_params['attach']), 'attachment', 'commande.pdf');
            $this->email->subject('test'." - ".date("d/m/Y"));
            $this->email->message(mb_convert_encoding('test', "UTF-8"));
            //
            //return $this->email->send();
            if ($this->email->send()) {
                echo "1";
            } else {
                echo "0";
            }
        }
    }

    public function load_lib($n, $f = null)
    {
        return extension_loaded($n) or dl(((PHP_SHLIB_SUFFIX === 'dll') ? 'php_' : '') . ($f ? $f : $n) . '.' . PHP_SHLIB_SUFFIX);
    }

}

?>