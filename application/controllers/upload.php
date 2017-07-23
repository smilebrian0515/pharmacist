<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array("result"=>"");
		$this->parser->parse('upload',$data);
	}

	public function fileUpLoad () {
		$tmp_name = $_FILES["UpFile"]["tmp_name"];
		$name = $_FILES["UpFile"]["name"];
		$type = $_FILES["UpFile"]["type"];
		$size = $_FILES["UpFile"]["size"];
		$error = $_FILES["UpFile"]["error"];
		$data = array("result"=>"");
//		echo $tmp_name.",".$name.",".$type.",".$size.",".$error;
		
		if($error== UPLOAD_ERR_OK){
			$fname5 = iconv("UTF-8","BIG5",$name);
			$fname8 = iconv("UTF-8","UTF-8",$name);
			if(move_uploaded_file($tmp_name,"./public/pic/".$name)){
				
								
				
				
				$data["result"]="上傳成功";
			}	
		}else {
			$data["result"]="上傳失敗";
		}
		
		$this->parser->parse('upload',$data);
	}
}
