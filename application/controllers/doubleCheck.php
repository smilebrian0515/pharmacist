<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DoubleCheck extends CI_Controller {

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

/*		$data = array(
			"name"=>"Brian",
			"gender"=>0,
			"Doctor"=>"我我我",
			"prescription_date"=>"2017/07/23",
			"prescriptions"=>array(
				array(
					"brand_drug"=>"123",
					"generic_drug"=>"432",
					"dose"=>"666",
					"frequency"=>"777"
				),
				array(
					"brand_drug"=>"123",
					"generic_drug"=>"432",
					"dose"=>"666",
					"frequency"=>"777"
				)
			)
		);
*/
		$data=array();
		$this->parser->parse('doubleCheck',$data);
	}
	
	public function save () {
		$name = $this->input->post("name");
		$gender = $this->input->post("gender");
		$organization = $this->input->post("organization");
		$record = $this->input->post("record");
		$result = $this->input->post("result");
		$Height = $this->input->post("Height");
		$Weight = $this->input->post("Weight");
		$BMI = $this->input->post("BMI");
		$Liver = $this->input->post("Liver");
		$Kidney = $this->input->post("Kidney");
		$Tube_irrigation = $this->input->post("Tube_irrigation");
		$Doctor = $this->input->post("Doctor");
		$Attendees = $this->input->post("Attendees");
		$Suggest = $this->input->post("Suggest");
		$Medical_respone = $this->input->post("Medical_respone");
		$prescription_date = $this->input->post("prescription_date");
		$Date = $this->input->post("Date");
		$response_date = $this->input->post("response_date");
		$print_date = $this->input->post("print_date");
		
		
		
		
		
	//	$str1 = "INSERT INTO `person` ( `name` , `gender` , `organization` )
//VALUES ( ' " .$name. " ',' ".$gender . " ',' " . $organization . " '); 
		
	//	$str2 = "INSERT INTO `prescription` ("欄位1", "欄位2", ...)
//VALUES ("值1", "值2", ...);";
		
	//	$str3 = "";
		
	//	$str4 = "";
		
	//	$this->db->query($str1);
		
		$data=array();
		$this->parser->parse('doubleCheck',$data);
	}
	
}
