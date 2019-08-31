<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("PasswordHash.php");

class Common
{
	function configPagination($baseUrl,$numRow,$numLink,$perPage,$segment){
	   $config = array();
	   $config["base_url"] = $baseUrl;
       $config["total_rows"] = $numRow;
       $config["per_page"] = $perPage;
       $config['cur_tag_open'] = '<li class="active"><a href="#">';
       $config['cur_tag_close'] = '</a></li>';
       $config['next_link'] = 'Next';
       $config['prev_link'] = 'Previous';
       $config['first_link'] = 'First';
       $config['first_tag_open'] = '<li>';
       $config['first_tag_close'] = '</li>';
       $config['last_link'] = 'Last';
       $config['last_tag_open'] = '<li>';
       $config['last_tag_close'] = '</li>';
       $config['prev_link'] = 'Previous';
       $config['prev_tag_open'] = '<li>';
       $config['prev_tag_close'] = '</li>';
       $config['next_link'] = 'Next';
       $config['next_tag_open'] = '<li>';
       $config['next_tag_close'] = '</li>';
       $config['num_tag_open'] = '<li>';
       $config['num_tag_close'] = '</li>';
       $config['full_tag_open'] = '<ul class="pagination">';
       $config['full_tag_close'] = '</ul>';
       $config["uri_segment"] = $segment;
       $config["num_links"] = $numLink;
       return $config;
	}
	function validateDate($date)
	{
		$d = DateTime::createFromFormat('Y-m-d', $date);
		return $d && $d->format('Y-m-d') === $date;
	}
 	function phonecode() {
		return '[{"name":"Israel","dial_code":"+972","code":"IL"},{"name":"Afghanistan","dial_code":"+93","code":"AF"},{"name":"Albania","dial_code":"+355","code":"AL"},{"name":"Algeria","dial_code":"+213","code":"DZ"},{"name":"AmericanSamoa","dial_code":"+1 684","code":"AS"},{"name":"Andorra","dial_code":"+376","code":"AD"},{"name":"Angola","dial_code":"+244","code":"AO"},{"name":"Anguilla","dial_code":"+1 264","code":"AI"},{"name":"Antigua and Barbuda","dial_code":"+1268","code":"AG"},{"name":"Argentina","dial_code":"+54","code":"AR"},{"name":"Armenia","dial_code":"+374","code":"AM"},{"name":"Aruba","dial_code":"+297","code":"AW"},{"name":"Australia","dial_code":"+61","code":"AU"},{"name":"Austria","dial_code":"+43","code":"AT"},{"name":"Azerbaijan","dial_code":"+994","code":"AZ"},{"name":"Bahamas","dial_code":"+1 242","code":"BS"},{"name":"Bahrain","dial_code":"+973","code":"BH"},{"name":"Bangladesh","dial_code":"+880","code":"BD"},{"name":"Barbados","dial_code":"+1 246","code":"BB"},{"name":"Belarus","dial_code":"+375","code":"BY"},{"name":"Belgium","dial_code":"+32","code":"BE"},{"name":"Belize","dial_code":"+501","code":"BZ"},{"name":"Benin","dial_code":"+229","code":"BJ"},{"name":"Bermuda","dial_code":"+1 441","code":"BM"},{"name":"Bhutan","dial_code":"+975","code":"BT"},{"name":"Bosnia and Herzegovina","dial_code":"+387","code":"BA"},{"name":"Botswana","dial_code":"+267","code":"BW"},{"name":"Brazil","dial_code":"+55","code":"BR"},{"name":"British Indian Ocean Territory","dial_code":"+246","code":"IO"},{"name":"Bulgaria","dial_code":"+359","code":"BG"},{"name":"Burkina Faso","dial_code":"+226","code":"BF"},{"name":"Burundi","dial_code":"+257","code":"BI"},{"name":"Cambodia","dial_code":"+855","code":"KH"},{"name":"Cameroon","dial_code":"+237","code":"CM"},{"name":"Canada","dial_code":"+1","code":"CA"},{"name":"Cape Verde","dial_code":"+238","code":"CV"},{"name":"Cayman Islands","dial_code":"+ 345","code":"KY"},{"name":"Central African Republic","dial_code":"+236","code":"CF"},{"name":"Chad","dial_code":"+235","code":"TD"},{"name":"Chile","dial_code":"+56","code":"CL"},{"name":"China","dial_code":"+86","code":"CN"},{"name":"Christmas Island","dial_code":"+61","code":"CX"},{"name":"Colombia","dial_code":"+57","code":"CO"},{"name":"Comoros","dial_code":"+269","code":"KM"},{"name":"Congo","dial_code":"+242","code":"CG"},{"name":"Cook Islands","dial_code":"+682","code":"CK"},{"name":"Costa Rica","dial_code":"+506","code":"CR"},{"name":"Croatia","dial_code":"+385","code":"HR"},{"name":"Cuba","dial_code":"+53","code":"CU"},{"name":"Cyprus","dial_code":"+537","code":"CY"},{"name":"Czech Republic","dial_code":"+420","code":"CZ"},{"name":"Denmark","dial_code":"+45","code":"DK"},{"name":"Djibouti","dial_code":"+253","code":"DJ"},{"name":"Dominica","dial_code":"+1 767","code":"DM"},{"name":"Dominican Republic","dial_code":"+1 849","code":"DO"},{"name":"Ecuador","dial_code":"+593","code":"EC"},{"name":"Egypt","dial_code":"+20","code":"EG"},{"name":"El Salvador","dial_code":"+503","code":"SV"},{"name":"Equatorial Guinea","dial_code":"+240","code":"GQ"},{"name":"Eritrea","dial_code":"+291","code":"ER"},{"name":"Estonia","dial_code":"+372","code":"EE"},{"name":"Ethiopia","dial_code":"+251","code":"ET"},{"name":"Faroe Islands","dial_code":"+298","code":"FO"},{"name":"Fiji","dial_code":"+679","code":"FJ"},{"name":"Finland","dial_code":"+358","code":"FI"},{"name":"France","dial_code":"+33","code":"FR"},{"name":"French Guiana","dial_code":"+594","code":"GF"},{"name":"French Polynesia","dial_code":"+689","code":"PF"},{"name":"Gabon","dial_code":"+241","code":"GA"},{"name":"Gambia","dial_code":"+220","code":"GM"},{"name":"Georgia","dial_code":"+995","code":"GE"},{"name":"Germany","dial_code":"+49","code":"DE"},{"name":"Ghana","dial_code":"+233","code":"GH"},{"name":"Gibraltar","dial_code":"+350","code":"GI"},{"name":"Greece","dial_code":"+30","code":"GR"},{"name":"Greenland","dial_code":"+299","code":"GL"},{"name":"Grenada","dial_code":"+1 473","code":"GD"},{"name":"Guadeloupe","dial_code":"+590","code":"GP"},{"name":"Guam","dial_code":"+1 671","code":"GU"},{"name":"Guatemala","dial_code":"+502","code":"GT"},{"name":"Guinea","dial_code":"+224","code":"GN"},{"name":"Guinea-Bissau","dial_code":"+245","code":"GW"},{"name":"Guyana","dial_code":"+595","code":"GY"},{"name":"Haiti","dial_code":"+509","code":"HT"},{"name":"Honduras","dial_code":"+504","code":"HN"},{"name":"Hungary","dial_code":"+36","code":"HU"},{"name":"Iceland","dial_code":"+354","code":"IS"},{"name":"India","dial_code":"+91","code":"IN"},{"name":"Indonesia","dial_code":"+62","code":"ID"},{"name":"Iraq","dial_code":"+964","code":"IQ"},{"name":"Ireland","dial_code":"+353","code":"IE"},{"name":"Israel","dial_code":"+972","code":"IL"},{"name":"Italy","dial_code":"+39","code":"IT"},{"name":"Jamaica","dial_code":"+1 876","code":"JM"},{"name":"Japan","dial_code":"+81","code":"JP"},{"name":"Jordan","dial_code":"+962","code":"JO"},{"name":"Kazakhstan","dial_code":"+7 7","code":"KZ"},{"name":"Kenya","dial_code":"+254","code":"KE"},{"name":"Kiribati","dial_code":"+686","code":"KI"},{"name":"Kuwait","dial_code":"+965","code":"KW"},{"name":"Kyrgyzstan","dial_code":"+996","code":"KG"},{"name":"Latvia","dial_code":"+371","code":"LV"},{"name":"Lebanon","dial_code":"+961","code":"LB"},{"name":"Lesotho","dial_code":"+266","code":"LS"},{"name":"Liberia","dial_code":"+231","code":"LR"},{"name":"Liechtenstein","dial_code":"+423","code":"LI"},{"name":"Lithuania","dial_code":"+370","code":"LT"},{"name":"Luxembourg","dial_code":"+352","code":"LU"},{"name":"Madagascar","dial_code":"+261","code":"MG"},{"name":"Malawi","dial_code":"+265","code":"MW"},{"name":"Malaysia","dial_code":"+60","code":"MY"},{"name":"Maldives","dial_code":"+960","code":"MV"},{"name":"Mali","dial_code":"+223","code":"ML"},{"name":"Malta","dial_code":"+356","code":"MT"},{"name":"Marshall Islands","dial_code":"+692","code":"MH"},{"name":"Martinique","dial_code":"+596","code":"MQ"},{"name":"Mauritania","dial_code":"+222","code":"MR"},{"name":"Mauritius","dial_code":"+230","code":"MU"},{"name":"Mayotte","dial_code":"+262","code":"YT"},{"name":"Mexico","dial_code":"+52","code":"MX"},{"name":"Monaco","dial_code":"+377","code":"MC"},{"name":"Mongolia","dial_code":"+976","code":"MN"},{"name":"Montenegro","dial_code":"+382","code":"ME"},{"name":"Montserrat","dial_code":"+1664","code":"MS"},{"name":"Morocco","dial_code":"+212","code":"MA"},{"name":"Myanmar","dial_code":"+95","code":"MM"},{"name":"Namibia","dial_code":"+264","code":"NA"},{"name":"Nauru","dial_code":"+674","code":"NR"},{"name":"Nepal","dial_code":"+977","code":"NP"},{"name":"Netherlands","dial_code":"+31","code":"NL"},{"name":"Netherlands Antilles","dial_code":"+599","code":"AN"},{"name":"New Caledonia","dial_code":"+687","code":"NC"},{"name":"New Zealand","dial_code":"+64","code":"NZ"},{"name":"Nicaragua","dial_code":"+505","code":"NI"},{"name":"Niger","dial_code":"+227","code":"NE"},{"name":"Nigeria","dial_code":"+234","code":"NG"},{"name":"Niue","dial_code":"+683","code":"NU"},{"name":"Norfolk Island","dial_code":"+672","code":"NF"},{"name":"Northern Mariana Islands","dial_code":"+1 670","code":"MP"},{"name":"Norway","dial_code":"+47","code":"NO"},{"name":"Oman","dial_code":"+968","code":"OM"},{"name":"Pakistan","dial_code":"+92","code":"PK"},{"name":"Palau","dial_code":"+680","code":"PW"},{"name":"Panama","dial_code":"+507","code":"PA"},{"name":"Papua New Guinea","dial_code":"+675","code":"PG"},{"name":"Paraguay","dial_code":"+595","code":"PY"},{"name":"Peru","dial_code":"+51","code":"PE"},{"name":"Philippines","dial_code":"+63","code":"PH"},{"name":"Poland","dial_code":"+48","code":"PL"},{"name":"Portugal","dial_code":"+351","code":"PT"},{"name":"Puerto Rico","dial_code":"+1 939","code":"PR"},{"name":"Qatar","dial_code":"+974","code":"QA"},{"name":"Romania","dial_code":"+40","code":"RO"},{"name":"Rwanda","dial_code":"+250","code":"RW"},{"name":"Samoa","dial_code":"+685","code":"WS"},{"name":"San Marino","dial_code":"+378","code":"SM"},{"name":"Saudi Arabia","dial_code":"+966","code":"SA"},{"name":"Senegal","dial_code":"+221","code":"SN"},{"name":"Serbia","dial_code":"+381","code":"RS"},{"name":"Seychelles","dial_code":"+248","code":"SC"},{"name":"Sierra Leone","dial_code":"+232","code":"SL"},{"name":"Singapore","dial_code":"+65","code":"SG"},{"name":"Slovakia","dial_code":"+421","code":"SK"},{"name":"Slovenia","dial_code":"+386","code":"SI"},{"name":"Solomon Islands","dial_code":"+677","code":"SB"},{"name":"South Africa","dial_code":"+27","code":"ZA"},{"name":"South Georgia and the South Sandwich Islands","dial_code":"+500","code":"GS"},{"name":"Spain","dial_code":"+34","code":"ES"},{"name":"Sri Lanka","dial_code":"+94","code":"LK"},{"name":"Sudan","dial_code":"+249","code":"SD"},{"name":"Suriname","dial_code":"+597","code":"SR"},{"name":"Swaziland","dial_code":"+268","code":"SZ"},{"name":"Sweden","dial_code":"+46","code":"SE"},{"name":"Switzerland","dial_code":"+41","code":"CH"},{"name":"Tajikistan","dial_code":"+992","code":"TJ"},{"name":"Thailand","dial_code":"+66","code":"TH"},{"name":"Togo","dial_code":"+228","code":"TG"},{"name":"Tokelau","dial_code":"+690","code":"TK"},{"name":"Tonga","dial_code":"+676","code":"TO"},{"name":"Trinidad and Tobago","dial_code":"+1 868","code":"TT"},{"name":"Tunisia","dial_code":"+216","code":"TN"},{"name":"Turkey","dial_code":"+90","code":"TR"},{"name":"Turkmenistan","dial_code":"+993","code":"TM"},{"name":"Turks and Caicos Islands","dial_code":"+1 649","code":"TC"},{"name":"Tuvalu","dial_code":"+688","code":"TV"},{"name":"Uganda","dial_code":"+256","code":"UG"},{"name":"Ukraine","dial_code":"+380","code":"UA"},{"name":"United Arab Emirates","dial_code":"+971","code":"AE"},{"name":"United Kingdom","dial_code":"+44","code":"GB"},{"name":"United States","dial_code":"+1","code":"US"},{"name":"Uruguay","dial_code":"+598","code":"UY"},{"name":"Uzbekistan","dial_code":"+998","code":"UZ"},{"name":"Vanuatu","dial_code":"+678","code":"VU"},{"name":"Wallis and Futuna","dial_code":"+681","code":"WF"},{"name":"Yemen","dial_code":"+967","code":"YE"},{"name":"Zambia","dial_code":"+260","code":"ZM"},{"name":"Zimbabwe","dial_code":"+263","code":"ZW"},{"name":"Bolivia, Plurinational State of","dial_code":"+591","code":"BO"},{"name":"Brunei Darussalam","dial_code":"+673","code":"BN"},{"name":"Cocos (Keeling) Islands","dial_code":"+61","code":"CC"},{"name":"Congo, The Democratic Republic of the","dial_code":"+243","code":"CD"},{"name":"Cote d\'Ivoire","dial_code":"+225","code":"CI"},{"name":"Falkland Islands (Malvinas)","dial_code":"+500","code":"FK"},{"name":"Guernsey","dial_code":"+44","code":"GG"},{"name":"Holy See (Vatican City State)","dial_code":"+379","code":"VA"},{"name":"Hong Kong","dial_code":"+852","code":"HK"},{"name":"Iran, Islamic Republic of","dial_code":"+98","code":"IR"},{"name":"Isle of Man","dial_code":"+44","code":"IM"},{"name":"Jersey","dial_code":"+44","code":"JE"},{"name":"Korea, Democratic People\'s Republic of","dial_code":"+850","code":"KP"},{"name":"Korea, Republic of","dial_code":"+82","code":"KR"},{"name":"Lao People\'s Democratic Republic","dial_code":"+856","code":"LA"},{"name":"Libyan Arab Jamahiriya","dial_code":"+218","code":"LY"},{"name":"Macao","dial_code":"+853","code":"MO"},{"name":"Macedonia, The Former Yugoslav Republic of","dial_code":"+389","code":"MK"},{"name":"Micronesia, Federated States of","dial_code":"+691","code":"FM"},{"name":"Moldova, Republic of","dial_code":"+373","code":"MD"},{"name":"Mozambique","dial_code":"+258","code":"MZ"},{"name":"Palestinian Territory, Occupied","dial_code":"+970","code":"PS"},{"name":"Pitcairn","dial_code":"+872","code":"PN"},{"name":"Réunion","dial_code":"+262","code":"RE"},{"name":"Russia","dial_code":"+7","code":"RU"},{"name":"Saint Barthélemy","dial_code":"+590","code":"BL"},{"name":"Saint Helena, Ascension and Tristan Da Cunha","dial_code":"+290","code":"SH"},{"name":"Saint Kitts and Nevis","dial_code":"+1 869","code":"KN"},{"name":"Saint Lucia","dial_code":"+1 758","code":"LC"},{"name":"Saint Martin","dial_code":"+590","code":"MF"},{"name":"Saint Pierre and Miquelon","dial_code":"+508","code":"PM"},{"name":"Saint Vincent and the Grenadines","dial_code":"+1 784","code":"VC"},{"name":"Sao Tome and Principe","dial_code":"+239","code":"ST"},{"name":"Somalia","dial_code":"+252","code":"SO"},{"name":"Svalbard and Jan Mayen","dial_code":"+47","code":"SJ"},{"name":"Syrian Arab Republic","dial_code":"+963","code":"SY"},{"name":"Taiwan, Province of China","dial_code":"+886","code":"TW"},{"name":"Tanzania, United Republic of","dial_code":"+255","code":"TZ"},{"name":"Timor-Leste","dial_code":"+670","code":"TL"},{"name":"Venezuela, Bolivarian Republic of","dial_code":"+58","code":"VE"},{"name":"Viet Nam","dial_code":"+84","code":"VN"},{"name":"Virgin Islands, British","dial_code":"+1 284","code":"VG"},{"name":"Virgin Islands, U.S.","dial_code":"+1 340","code":"VI"}]';
	}

    public function converttodate($toDate){	  
		return date("Y-m-d", strtotime($toDate));
    }
 	function issulgable($string) {
		if ( preg_match('/\s/',$string) ||  preg_match('/[^a-z_\-0-9]/i', $string) || ($string == "") ){
			return false;
		}else{
			return true;
		}
	} 	
	
	function create_slug_string($string) {
		$string = strtolower($string);
		$string = html_entity_decode($string);
		$string = str_replace(array('ä','ü','ö','ß'),array('ae','ue','oe','ss'),$string);
		$string = preg_replace('#[^\w\säüöß]#',null,$string);
		$string = preg_replace('#[\s]{2,}#',' ',$string);
		$string = str_replace(array(' '),array('-'),$string);
		return $string;
	}
	
	//Library untuk Controll Comment
 	function in_parent($parentid,$postid,$array_all_id) { 
		$html = "";
		$CI =& get_instance();
		$CI->load->model("content_model"); 
		$CI->load->library("settings");
		// this variable to save all concatenated html 
		$html = "";   
		// build hierarchy html structure based on ul li (parent-child) nodes 
		if (in_array($parentid,$array_all_id)) { 
		
			$result = $CI->content_model->get_post_comment_byparent($postid,$parentid);
			$resArray = $result->result_array(); 
				
			foreach ($resArray as $res) { 
				$result = $CI->content_model->get_post_comment_byparent($postid,$res['comment_id']);
				$addClassChild = ($result->num_rows()==0 && $parentid <>0 ) ? "comments-2" : "";
				$html .= "<div class='comments-1 ".$addClassChild."'>
							<div class='comments-photo'>".
							   "<img class='img-responsive' src='".base_url().$CI->settings->info->upload_path_relative."/".$res["avatar"]."' style='width:90px!important' alt=''>
							</div>
							<div class='comments-info' style='margin-bottom:20px!important'>
								<h4 class='text-blue'> ".$res["comment_name"]." <span>".$this->date_time($res["timestamp"]). 
								"</span></h4>".
								(($result->num_rows()!=0 || $parentid == 0) ?
								"<div class='port-post-social pull-right'>
									<a href='javascript:void(0)' class='replycomment' data-comment='".$res['comment_id']."'>Reply</a> 
								</div>":"")."<p>"	
								.$res['comment_body']."</p>
							</div>
						</div>
						";
				$html .=$this->in_parent($res['comment_id'],$postid, $array_all_id); 
			} 

		} 
		return $html; 
	} 
	

	public function paketname($str){
		$str = explode(" ",$str);
		return $str[0];	
	}	
	
	public function resizecropImageCI($data,$newwidth,$newheight){
		$this->CI =& get_instance();
		$namafile=explode(".",$data['full_path']);
		$newpath = $namafile[0]."_".$newwidth."x".$newheight.".".$namafile[1];
		
		//get full path to resize
		$this->resizeImageCI($data['full_path'],$newpath,$newheight,$newwidth,$data["image_height"],$data["image_width"]);
		
		//get resized path to crop
		$this->cropImageCI($newpath,$newpath,$newheight,$newwidth);
		
	}
		
	public function resizeImageCI($path,$newpath,$height,$width,$image_height,$image_width){
		$this->CI =& get_instance();
		$this->CI->load->library('image_lib');
		
		$image_config["image_library"] = "gd2";
		$image_config["source_image"] = $path;
		$image_config['create_thumb'] = FALSE;
		$image_config['maintain_ratio'] = TRUE;
		$image_config['new_image'] = $newpath;
		$image_config['quality'] = "100";
		$image_config['width'] = $width;
		$image_config['height'] = $height;
		$dim = (intval($image_width) / intval($image_height)) - ($image_config['width'] / $image_config['height']);
		$image_config['master_dim'] = ($dim > 0)? "height" : "width";
		 
		$this->CI->image_lib->clear();
		$this->CI->image_lib->initialize($image_config);
		
		if(!$this->CI->image_lib->resize()){ //Resize image
			return "error";
		}
						
	}

	public function cropImageCI($path,$newpath,$height,$width){
		$this->CI =& get_instance();
		$this->CI->load->library('image_lib');
		
		$image_config['image_library'] = 'gd2';
		$image_config["source_image"] = $path;
		$image_config['new_image'] = $newpath;
		$image_config['quality'] = "100";
		$image_config['maintain_ratio'] = false;
		$image_config['width'] = $width;
		$image_config['height'] = $height;
		$image_config['x_axis'] = '0';
		$image_config['y_axis'] = '0';
		
		 
		$this->CI->image_lib->clear();
		$this->CI->image_lib->initialize($image_config);
		
		if(!$this->CI->image_lib->crop()){ //Resize image
			return "error";
		}
						
	}
	public function generateInvoice($name,$year,$paket,$id)
	{		
		$digits = 2;
		$rand = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
		return $name.$year.sprintf('%02d',$paket).sprintf('%05d',$id)."-".$rand;
	}
	
	


function limitString($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
    if ($considerHtml) {
      // if the plain text is shorter than the maximum length, return the whole text
      if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
        return $text;
      }
      // splits all html-tags to scanable lines
      preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
      $total_length = strlen($ending);
      $open_tags = array();
      $truncate = '';
      foreach ($lines as $line_matchings) {
        // if there is any html-tag in this line, handle it and add it (uncounted) to the output
        if (!empty($line_matchings[1])) {
          // if it's an "empty element" with or without xhtml-conform closing slash
          if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
            // do nothing
            // if tag is a closing tag
          } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
            // delete tag from $open_tags list
            $pos = array_search($tag_matchings[1], $open_tags);
            if ($pos !== false) {
              unset($open_tags[$pos]);
            }
            // if tag is an opening tag
          } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
            // add tag to the beginning of $open_tags list
            array_unshift($open_tags, strtolower($tag_matchings[1]));
          }
          // add html-tag to $truncate'd text
          $truncate .= $line_matchings[1];
        }
        // calculate the length of the plain text part of the line; handle entities as one character
        $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
        if ($total_length+$content_length> $length) {
          // the number of characters which are left
          $left = $length - $total_length;
          $entities_length = 0;
          // search for html entities
          if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
            // calculate the real length of all entities in the legal range
            foreach ($entities[0] as $entity) {
              if ($entity[1]+1-$entities_length <= $left) {
                $left--;
                $entities_length += strlen($entity[0]);
              } else {
                // no more characters left
                break;
              }
            }
          }
          $truncate .= substr($line_matchings[2], 0, $left+$entities_length);
          // maximum lenght is reached, so get off the loop
          break;
        } else {
          $truncate .= $line_matchings[2];
          $total_length += $content_length;
        }
        // if the maximum length is reached, get off the loop
        if($total_length>= $length) {
          break;
        }
      }
    } else {
      if (strlen($text) <= $length) {
        return $text;
      } else {
        $truncate = substr($text, 0, $length - strlen($ending));
      }
    }
    // if the words shouldn't be cut in the middle...
    if (!$exact) {
      // ...search the last occurance of a space...
      $spacepos = strrpos($truncate, ' ');
      if (isset($spacepos)) {
        // ...and cut the text in this position
        $truncate = substr($truncate, 0, $spacepos);
      }
    }
    // add the defined ending to the text
    $truncate .= $ending;
    if($considerHtml) {
      // close all unclosed html-tags
      foreach ($open_tags as $tag) {
        $truncate .= '</' . $tag . '>';
      }
    }
    return $truncate;
  }	
	public function addDate($date,$month)
	{		
		return date('Y-m-d', strtotime("+".$month." months", strtotime($date)));
	}

	public function formatIDR($curr, $moneyCurrency=null)
	{		
		$moneyCurrency = ($moneyCurrency!=null)?$moneyCurrency:'Rp. ';
		return $moneyCurrency." ". number_format($curr,0,',','.');
	}
	


    public function theme_custome()
    {
      return base_url()."theme_costume/";
    }    
	
	public function theme_hideend()
    {
      return base_url()."theme_hideend/";
    }	
	
	
    public function slug_link($controller)
    {
	  $this->CI =& get_instance();
	  $this->CI->load->model("site_slugs_m");
	  $slugs_data = $this->CI->site_slugs_m->get_all();
      $link = "";
      foreach ($slugs_data as $key => $data){
          if($data["controller"]===$controller){
              $link = base_url().$data["slug"]; break;
          }
      };
      return ($link=="")? base_url().$controller:$link;
    }

    public function keyword_page($slugs_data,$uri)
    {
      $keyword = "";
      foreach ($slugs_data as $key => $data){
          if($data["slug"]===$uri){
              $keyword =	 $data["keywords"]; break;
          }
      };
      return ($keyword=="")?"sertifikasi, profesi, lsp bali, bali, bnsp, pariwisata, lsp pariwisata":$keyword;
    }
    public function description_page($slugs_data,$uri)
    {
      $description= "";
      foreach ($slugs_data as $key => $data){
          if($data["slug"]===$uri){
              $description =	 $data["description"]; break;
          }
      };
      return ($description=="")?"LSP Pariwisata Bali - Independent - Reliable - Traceable":$description;
    }
    public function cur_date_time()
    {
        return date("Y-m-d H:i:s",gmt_to_local(time(),"UP6"));;
    } 

	public function date_time($timestamp, $format="d/m/Y")
    {
        return date($format,$timestamp);
       // return $timestamp;
    }
	
	
	
    public function nohtml($message)
    {
        $message = trim($message);
        $message = strip_tags($message);
        $message = htmlspecialchars($message, ENT_QUOTES);
        return $message;
    }

	public function encrypt($password)
    {
        $phpass = new PasswordHash(12, false);
        $hash = $phpass->HashPassword($password);
    	return $hash;
    }

    public function get_user_role($user)
    {
        if(isset($user->user_role_name)) {
            return $user->user_role_name;
        } else {
            return lang("ctn_46");
        }
    }

    public function randomPassword()
    {
    	$letters = array(
            "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q",
            "r","s","t","u","v","w","x","y","z"
        );
    	$pass = "";
    	for($i=0;$i<10;$i++) {
    		shuffle($letters);
    		$letter = $letters[0];
    		if(rand(1,2) == 1) {
	    		$pass .= $letter;
    		} else {
	    		$pass .= strtoupper($letter);
    		}
    		if(rand(1,3)==1) {
    			$pass .= rand(1,9);
    		}
    	}
    	return $pass;
    }

    public function checkAccess($level, $required)
    {
        $CI =& get_instance();
        if($level < $required) {
            $CI->template->error(
                "You do not have the required access to use this page.
                You must be a ". $this->getAccessLevel($required)
                . "to use this page."
            );
        }
    }

	public function send_email($subject, $body, $emailt,$replayto)
    {
        $CI =& get_instance();
        $CI->load->library('email');

        //$CI->email->from($CI->settings->info->site_email, $CI->settings->info->site_name);
        
		//$CI->email->from('info@greenbiketour.com', $CI->settings->info->site_name);
		$CI->email->from('info@greenbikeadventure.com', "Greenbike Adventure");
		$CI->email->reply_to($replayto);
        $CI->email->to($emailt);
       // $CI->email->cc('greenbike.cyclingtour@gmail.com');

        $CI->email->subject($subject);
        $CI->email->message($body);

        $CI->email->send();
    }
	
   

    public function check_mime_type($file)
    {
        return true;
    }

    public function replace_keywords($array, $message)
    {
        foreach($array as $k=>$v) {
            $message = str_replace($k, $v, $message);
        }
        return $message;
    }

    public function convert_time($timestamp)
    {
        $time = $timestamp - time();
        if($time <=0) {
            $days = 0;
            $hours = 0;
            $mins = 0;
            $secs = 0;
        } else {
            $days = intval($time / (3600 * 24));
            $hours = intval( ($time - ($days * (3600*24))) / 3600);
            $mins = intval( ($time - ($days * (3600*24)) - ($hours * 3600) )
                    / 60);
            $secs = intval( ($time - ($days * (3600*24)) - ($hours * 3600)
                    - ($mins * 60)) );
        }
        return array(
            "days" => $days,
            "hours" => $hours,
            "mins" => $mins,
            "secs" => $secs
        );
    }

    public function get_time_string($time)
    {
        if(isset($time['days']) &&
            ($time['days'] > 1 || $time['days'] == 0)) {
            $days = lang("ctn_294");
        } else {
            $days = lang("ctn_295");
        }
        if(isset($time['hours']) &&
            ($time['hours'] > 1 || $time['hours'] == 0)) {
            $hours = lang("ctn_296");
        } else {
            $hours = lang("ctn_297");
        }
        if(isset($time['mins']) &&
            ($time['mins'] > 1 || $time['mins'] == 0)) {
            $mins = lang("ctn_298");
        } else {
            $mins = lang("ctn_299");
        }
        if(isset($time['secs']) &&
            ($time['secs'] > 1 || $time['secs'] == 0)) {
            $secs = lang("ctn_300");
        } else {
            $secs = lang("ctn_301");
        }

        // Create string
        $timeleft = "";
        if(isset($time['days'])) {
            $timeleft = $time['days'] . " " . $days;
        }

        if(isset($time['hours'])) {
            if(!empty($timeleft)) {
                if(!isset($time['mins'])) {
                    $timeleft .= " ".lang("ctn_302")." " . $time['hours'] . " "
                    . $hours;
                } else {
                    $timeleft .= ", " . $time['hours'] . " " . $hours;
                }
            } else {
                $timeleft .= $time['hours'] . " " . $hours;
            }
        }

        if(isset($time['mins'])) {
            if(!empty($timeleft)) {
                if(!isset($time['secs'])) {
                    $timeleft .= " ".lang("ctn_302")." " . $time['mins'] . " "
                    . $mins;
                } else {
                    $timeleft .= ", " . $time['mins'] . " " . $mins;
                }
            } else {
                $timeleft .= $time['mins'] . " " . $mins;
            }
        }

        if(isset($time['secs'])) {
            if(!empty($timeleft)) {
                $timeleft .= " ".lang("ctn_302")." " . $time['secs'] . " "
                . $secs;
            } else {
                $timeleft .= $time['secs'] . " " . $secs;
            }
        }

        return $timeleft;
    }

    public function has_permissions($required, $user)
    {
        if(!isset($user->info->user_role_id)) return 0;
        foreach($required as $permission) {
            if(isset($user->info->{$permission}) && $user->info->{$permission}) {
                return 1;
            }
        }
        return 0;
    }

    public function get_user_display($data)
    {
        if(empty($data['username'])) return "";
        if(isset($data['online_timestamp']) > 0) {
            if($data['online_timestamp'] > time() - (60*15)) {
                $class = "online-dot-user";
                $title = lang("ctn_334");
            } else {
                $class = "offline-dot-user";
                $title = lang("ctn_335");
            }
        } else {
            $class = "online-dot-user";
        }
        $CI =& get_instance();
        $html = '<div class="user-box-avatar">
                <div class="'.$class.'" data-toggle="tooltip" data-placement="bottom" title="'.$title.'"></div>
                <a href="'.site_url("hideend/profile/view/" . $data['username']).'"><img src="'. base_url() . $CI->settings->info->upload_path_relative .'/'. $data['avatar'] .'" title="'.$data['username'].'" data-toggle="tooltip" data-placement="right" /></a>
                </div>';
        return $html;
    }

}

?>
