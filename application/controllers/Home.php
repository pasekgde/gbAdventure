<?php
//header('Access-Control-Allow-Origin: *');

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		if (defined('REQUEST') && REQUEST == "external") {
	        return;
	    }
		$this->template->loadData("activeLink",
			array("home" => array("general" => 1)));

			$this->load->library('Frontweb');

	}

	public function index()
	{
		$this->viewHomePage();

	}

	public function testimonial()
	{
		$this->load->model('content_model');
		$this->templatefront->set_layout('layout/layout_featurefront');
		$this->templatefront->loadContent('frontpage/testimonial_view');
	}


	public function viewHomePage()
	{
		$this->load->model('content_model');


		//echo '<pre>'; print_r( $this->common->slug_link("tour/best-cycling-tour-bali") );die; //test
		//load all necessary model 
		$sliders = $this->content_model->get_sliders();
		$posts = $this->content_model->get_post_front($this->settings->info->post_front_num);

		$post_num = 3;  

		

		$contentDir = base_url(). '/theme_costume/static_content/';
		$tourOptionFiles = $contentDir . 'tour-option.json';
		$tourOptions = file_get_contents($tourOptionFiles);
		if (!empty($tourOptions)) $tourOptions = json_decode($tourOptions);

		$this->templatefront->loadData("activeLink",array("home" => 1));
		
		//echo '<pre>'; print_r( $tourOptions );die; //test
		$this->templatefront->loadContent('frontpage/home_view', array(
			"og_image" => "https://bossforexsignal.com/theme_costume//images/slider/slider-01.jpg",
 			"og_title" => "BossForexSignal",
 			"og_desc" => "Forex Signal Provider",
 			"og_url" => "https://bossforexsignal.com",
 			"tourOptions" => $tourOptions
			));

	}	

	public function tour($id)
	{
		
		$contentDir = base_url(). '/theme_costume/static_content/';
		$tourDetailFiles = $contentDir . 'tour-details.json';
		$tourDetails = file_get_contents($tourDetailFiles);
		if (!empty($tourDetails)) $tourDetails = json_decode($tourDetails,TRUE);


		$collection = collect($tourDetails);

       	$nameService= $this->input->post('activity');
		$data = $collection->where('id', $id);
		$og_image = $data->pluck("og_image")->first();
		$og_title = $data->pluck("og_title")->first();
		$og_desc = $data->pluck("og_desc")->first();
		$og_url = $data->pluck("og_url")->first();


 		
		//echo '<pre>'; print_r( $name );die; //test
			
		if($id=="classic"){
			$page="frontpage/tour/classic_option";
			$selectTour = array();
		}elseif($id=="explore"){
			$page="frontpage/tour/explore_option";
			$selectTour = array();
		}else{
				//get Tour Details
			$selectTour = $tourDetails[$id];
			if($id=="1"){
				$page="frontpage/tour/downhill";
			}elseif($id=="2"){
				$page="frontpage/tour/electric";
			}elseif($id=="3"){
				$page="frontpage/tour/comboATV";
			}elseif($id=="4"){
				$page="frontpage/tour/comboRafting";
			}elseif($id=="5"){
				$page="frontpage/tour/sunrise";
			}elseif($id=="6"){
				$page="frontpage/tour/greentrek";
			}elseif($id=="7"){
				$page="frontpage/tour/classic";
			}elseif($id=="8"){
				$page="frontpage/tour/tamblingan";
			}elseif($id=="9"){
				$page="frontpage/tour/jeep";
			}elseif($id=="10"){
				$page="frontpage/tour/vw_kintamani";
			}elseif($id=="11"){
				$page="frontpage/tour/vw_jatiluwih";
			}elseif($id=="12"){
				$page="frontpage/tour/vw_southernbeach";
			}elseif($id=="13"){
				$page="frontpage/tour/vw_rafting";
			}elseif($id=="14"){
				$page="frontpage/tour/sg_instagram";
			}elseif($id=="15"){
				$page="frontpage/tour/sg_waterfall";
			}elseif($id=="16"){
				$page="frontpage/tour/sg_kintamani";
			}elseif($id=="17"){
				$page="frontpage/tour/sg_heavengate";
			}elseif($id=="18"){
				$page="frontpage/tour/sg_uluwatu";
			}elseif($id=="19"){
				$page="frontpage/tour/sg_lovina";
			}elseif($id=="20"){
				$page="frontpage/tour/sg_jatiluwih";
			}elseif($id=="21"){
				$page="frontpage/tour/sg_springwater";
			}elseif($id=="21"){
				$page="frontpage/tour/sg_springwater";
			}
		}


		$this->templatefront->set_layout("frontpage/layout/layout_tour");
		$this->templatefront->loadData("activeLink",array("home" => 1));

		$this->templatefront->loadExternal(
				
			'<link rel="stylesheet" href="'.base_url().'/theme_costume/plugins/css/style-greenbike.css" type="text/css" media="all" />'		
		);

		$this->templatefront->loadExternalJs(
			'<script type="text/javascript" src="'.base_url().'/theme_costume/plugins/tourmaster/tourmaster-dode.js"></script>'			
		); 

	
		$this->templatefront->loadContent($page, array(
			"og_image" => $og_image,
 			"og_title" => $og_title ,
 			"og_desc" => $og_desc,
 			"og_url" => $og_url,
 			"selectTour" => $selectTour,

			));

	}	


    public function download(){
    	$this->load->helper('download');
    	$fileurl = $this->common->theme_custome()."/download/"."Brochure_Greenbike_Adventure_2019.pdf";

    	$file = file_get_contents($fileurl);
    	//echo '<pre>'; print_r( $fileurl );die; //test
    	force_download($file);
    }


     function _push_file($path, $name)
    {
      // make sure it's a file before doing anything!
      if(is_file($path))
      {
        // required for IE
        if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

        // get the file mime type using the file extension
        $this->load->helper('file');

        $mime = get_mime_by_extension($path);

        // Build the headers to push out the file properly.
        header('Pragma: public');     // required
        header('Expires: 0');         // no cache
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($path)).' GMT');
        header('Cache-Control: private',false);
        header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
        header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: '.filesize($path)); // provide file size
        header('Connection: close');
        readfile($path); // push it out
        exit();
    }
}


    public function submitTour(){
     	$this->load->library('form_validation');
		$this->load->model("tour_model");

		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
		
			$result = array();
			$config = array(
	        	array(
	        		'field' => 'fullname',
	              	'label' => 'Full Name',
	              	'rules' => 'trim|required'),
	            array(
	            	'field' => 'country',
	              	'label' => 'Country',
	              	'rules' => 'trim|required'),
	             array(
	             	'field' => 'email',
	              	'label' => 'Email',
	              	'rules' => 'required'),
	             array(
	             	'field' => 'tour_date',
	              	'label' => 'Travel Date',
	              	'rules' => 'trim|required'),
	             array(
	             	'field' => 'person_number',
	              	'label' => 'Person Number',
	              	'rules' => 'trim|required'),
	               array(
	                'field' => 'activity',
	                'label' => 'Activity',
	                'rules' => 'trim|required'
	               ),
		        array(
		             'field' => 'pickup_service',
		             'label' => 'Pickup Service',
		              'rules' => 'trim|required' ),
		        array(
		                'field' => 'pickup_area',
		                'label' => 'Pickup Area',
		                'rules' => 'trim'
		        ),
		        array(
		                'field' => 'food_request',
		                'label' => 'Food Request',
		                'rules' => 'trim'
		        ));
			$this->form_validation->set_rules($config);

	        if ($this->form_validation->run() == FALSE) {
	        	$result['error'] = true;
	            $result['msg'] = array(
	                'fullname'=> form_error('fullname'),
	                'country'=> form_error('country'),
	                'email'=> form_error('email'),
	                'tour_date'=> form_error('tour_date'),
	                'person_number'=> form_error('person_number'),
	                'activity'=> form_error('activity'),
	                'pickup_service'=> form_error('pickup_service'),
	                'pickup_area'=> form_error('pickup_area'),
	                'food_request'=> form_error('food_request'),
	                'submitdate'=> time()
	            );

	            //echo "<pre>"; print_r($result);die;
	          	echo json_encode($result);
	            
	        }else{

	        	$result['error'] = true;
	            $result['msg'] = 'Booking Success!';
	            echo json_encode($result);

	        	$date = $this->input->post('tour_date');

	        	$date = str_replace('-', '/', $date);
	        	$date = str_replace('.', '/', $date);

	        	$dt = DateTime::createFromFormat('yyyy/mm/dd', $date);

	        	


				$contentDir = base_url(). '/theme_costume/static_content/';
				$tourDetailFiles = $contentDir . 'tour-details.json';
				$tourDetails = file_get_contents($tourDetailFiles);
	       	 	$collection = collect(json_decode($tourDetails, true));
	       	 	$idTour= $this->input->post('tour_id');
	       	 	$nameService= $this->input->post('activity');
				$data = $collection->where('id', $idTour);

				$pickup = $data->pluck("pickup");
				$packages = $data->pluck("package");

	 
				$pickup = collect($pickup->first());
				$package = collect($packages->first());
				$areaSelected =  $this->input->post('pickup_service');
				$pickupLocation = $pickup->where('area', $areaSelected);

				$pickupPrice = 	collect($pickupLocation)->pluck("price")->first();
				$prices = collect($package->where('name', $nameService))->pluck("price");

				$typePrice = collect($prices->first());
				$infantPrice = $typePrice->where('type', "Infant")->pluck("price")->first(); 
				$childPrice = $typePrice->where('type', "Child")->pluck("price")->first(); 
				$adultPrice = $typePrice->where('type', "Adult")->pluck("price")->first(); 

	            //echo '<pre>'; print_r( $prices);die;  //test

				$tourPay = ($adultPrice * $this->input->post('person_number'));
				$pickupPay = ($pickupPrice * $this->input->post('person_number'));
				$totalAmountPay = $tourPay + $pickupPay;

				//echo '<pre>'; print_r( $pickupPay );die; //test
				
	            $data = array(
	                'fullname'=> $this->input->post('fullname'),
	                'country'=> $this->input->post('country'),
	                'tour_id'=> $this->input->post('tour_id'),
	                'tour_name'=> $this->input->post('tour_name'),
	                'email'=> $this->input->post('email'),
	                'tour_date'=> $this->common->converttodate($this->input->post('tour_date')),
	                'person_number'=> $this->input->post('person_number'),
	                'activity'=> $this->input->post('activity'),
	                'pickup_service'=> $this->input->post('pickup_service'),
	                'pickup_area'=> $this->input->post('pickup_area'),
	                'phone_pickup_area'=> $this->input->post('phone_pickup_area'),
	                'food_request'=> $this->input->post('food_request'),
	                'tour_pay'=> $tourPay,
	                'pickup_pay'=> $pickupPay,
	                'amount_pay'=> $totalAmountPay,
	                'booking_date'=> date("Y/m/d")                
	            );

	            
	            if($this->tour_model->add_tour($data)){
	                $page="frontpage/tour/successbooking";
	                $subject = "[NEW BOOKING]"." ".$data["fullname"]."-".$data["tour_name"]."(".$data["activity"].")";
	                $email = $data["email"];
	                $msg = $this->load->view("frontpage/layout/email/email_confirm_view",'', true);

	                //Name
	                $msg = str_replace("%_name_cust",$data["fullname"],$msg); 


	                //Activity
	                $msg = str_replace("%_activity",$data["tour_name"],$msg);

	                //Program
	                $msg = str_replace("%_program",$data["activity"],$msg);

	                //Travel Date
	                $msg = str_replace("%_traveldate",$date,$msg);

	                //Amount
	                $msg = str_replace("%_amount",$data["person_number"],$msg); 

	                //Amount
	                $tourPay= $this->common->formatIDR($tourPay);
	                $msg = str_replace("%_priceactivity",$tourPay,$msg);

	              //Transfer Service
	                $pickuparea = $data["pickup_service"]==="No, Thanks"?"":$data["pickup_area"]."(".$data["phone_pickup_area"].")";
	                $pickup =  $data["pickup_service"]."-".$pickuparea;
	                $msg = str_replace("%_transfer",$pickup,$msg);

	                //Transfer Fee
	                $pickupPay = $this->common->formatIDR($pickupPay);
	                $msg = str_replace("%_pickTransFee",$pickupPay,$msg);

	                //Total Fee
	                $totalAmountPay = $this->common->formatIDR($totalAmountPay);
	                $msg = str_replace("%_totalharga",$totalAmountPay,$msg);

	                $replayto = "greenbike.cyclingtour@gmail.com";
	                //send email to customer
	                $this->sendEmail($subject,$msg,$email,$replayto);



	                $replayto = $email;
	                $emailGreenbike = "greenbike.cyclingtour@gmail.com";
	                //send email to Admin
	                $this->sendEmail($subject,$msg,$emailGreenbike,$replayto);


	               	$result['error'] = false;
	            	$result['msg'] = 'Booking Success!';
	            	echo json_encode($result);
	                
	            }else{
	            	$result['error'] = false;
	            	$result['msg'] = 'Cant save to Database!';
	            	echo json_encode($result);
	            }
	            
	        }

	           
		}else{
		    redirect(base_url(),'refresh');
		} 
    }

	public function sendEmail($subject,$msg,$email,$replayto)
	{
		$this->common->send_email($subject, $msg, $email, $replayto);

	}
	public function about()
	{
		$this->load->model('content_model');

		$recentposts = $this->content_model->get_post_front($this->settings->info->post_front_num);
		$this->templatefront->loadData("activeLink",array("home" => 1));
		$this->templatefront->loadContent('frontpage/aboutus_view', array(
			"posts" => $recentposts->result()
			) );
	}	
	
	public function tos()
	{
		$this->load->model('content_model');

		$recentposts = $this->content_model->get_post_front($this->settings->info->post_front_num);
		$this->templatefront->loadData("activeLink",array("home" => 1));
		$this->templatefront->loadContent('frontpage/tos_view', array(
			"posts" => $recentposts->result()
			) );
	}	


	
	
}

?>
