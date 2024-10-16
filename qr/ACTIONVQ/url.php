<?php
	$ru0 = '../';
	//----------------------
	require_once($ru0.'config/constant.php');
	require_once($ru0.'vendor/autoload.php');
	//----------------------
	use Endroid\QrCode\Color\Color;
	use Endroid\QrCode\Encoding\Encoding;
	use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
	use Endroid\QrCode\QrCode;
	use Endroid\QrCode\Label\Label;
	use Endroid\QrCode\Logo\Logo;
	use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
	use Endroid\QrCode\Writer\PngWriter;
	use Endroid\QrCode\Writer\ValidationException;
	//----------------------
	$json = new stdClass();
	//----------------------
	function buscar($cadena, $palabra){
		$busc = strpos($cadena, $palabra);
		if ($busc === false) {
			$exist = false;
		} else {
			$exist = true;
		}
		//----------------------
		return $exist;
	}
	//----------------------
	if (isset($_POST['get'])){
		header("Content-type: application/json; Charset: utf8;");
		//----------------------
		$url = '';
		//----------------------
		$_dominio = $dominio	= $_POST['dominio'];
		$id	= $_POST['id']; 
		$source	= $_POST['source']; 
		$medium	= $_POST['medium']; 
		$campaign	= $_POST['campaign']; 
		$content	= $_POST['content']; 
		$term	= $_POST['term'];
		$viewwww	= $_POST['viewwww'];
		$viewport	= $_POST['viewport'];
		$medida	= (isset($_POST['medida']) ? $_POST['medida'] : 300);
		$parms	= $_POST['parms'];
		//----------------------
		if(!is_null($dominio)){
			$json->result = true;
			//----------------------
				if(buscar($dominio, 'https://') == false){
					if (buscar($dominio, 'http://') == false) {
						$dominio = 'https://'.$dominio;
					}else{
						$dominio = str_replace('http://', 'https://', $dominio);
					}
				}
				if(buscar($dominio, 'www.') == false) {
					if ($viewwww == 1) {
						$dominio = str_replace('https://', 'https://www.', $dominio);
					}else{
						$dominio = str_replace('https://www.', 'https://', $dominio);
					}
				}
			//----------------------
				if (
					strlen($id) > 0 ||
					strlen($source) > 0 ||
					strlen($medium) > 0 ||
					strlen($campaign) > 0 ||
					strlen($content) > 0 ||
					strlen($term) > 0
				){
					$adic = '?';
				}else{
					$adic = '';
				}
			//----------------------
				if (substr($dominio, -1, 1) == '/') {
					$url .= $dominio.$adic;
				}else{
					$url .= $dominio.'/'.$adic;
				}
			//----------------------
				$exist_parms = false;
				if(strlen($id) > 0){
					$exist_parms = true;
					$url .= 'utm_id='.$id.'&';
				}
				if(strlen($source) > 0){
					$exist_parms = true;
					$url .= 'utm_source='.urlencode($source).'&';
				}
				if(strlen($medium) > 0){
					$exist_parms = true;
					$url .= 'utm_medium='.urlencode($medium).'&';
				}
				if(strlen($campaign) > 0){
					$exist_parms = true;
					$url .= 'utm_campaign='.urlencode($campaign).'&';
				}
				if(strlen($content) > 0){
					$exist_parms = true;
					$url .= 'utm_content='.urlencode($content).'&';
				}
				if(strlen($term) > 0){
					$exist_parms = true;
					$url .= 'utm_term='.urlencode($term).'&';
				}
			//----------------------
				if (substr($url, -1, 1) == '&') {
					$url = substr($url, 0 , -1);
				}
			//----------------------
				if (strlen($parms) > 0) {
					if ($exist_parms) {
						$url = $url.'&'.$parms;
					}else{
						$url = $url.'?'.$parms;
					}
				}
			//----------------------
			$json->url = $url;
			//----------------------
				// Create generic label
				$label = str_replace(
					array(
						'http://',
						'https://',
						'www.'
					),
					'',
					$dominio
				);
				$exp = explode('/', $label);
				if(is_array($exp) && count($exp) > 0){
					switch ($exp[0]) {
						case 'facebook.com':
							if (buscar($_dominio, '?id=') == true) {
								$tmp_label = explode("=", $exp[1]);
								$tmp_label2 = ((buscar($_dominio, '&') == true) ? explode("&", $tmp_label[1]) : $tmp_label[1]);
								if (is_array($tmp_label2)) {
									$tmp_label3 = $tmp_label2[0];
								}else{
									$tmp_label3 = $tmp_label2;
								}
								$label = $tmp_label3;
							}else{
								$label = $exp[1];
							}
						break;
						case 'instagram.com':
						case 'tiktok.com':
							$label = $exp[1];
						break;
						case 'linkedin.com':
							$label = $exp[2];
						break;
						default:
							$label = str_replace('/', '', $label);
						break;
					}
				}else{
					$label = str_replace('/', '', $label);
				}
			//----------------------
				$_camp = preg_replace('/[^a-zA-Z0-9]/u', '', $campaign);
				$_labe = preg_replace('/[^a-zA-Z0-9]/u', '', $label);
				$filename = $ru0.'img/qr/qr_n_'.$_labe.'_cmp_'.$_camp.'_dt_'.date('YmdHis').'.png';
				$filename2 = 'img/qr/qr_n_'.$_labe.'_cmp_'.$_camp.'_dt_'.date('YmdHis').'.png';
			//----------------------
			$writer = new PngWriter();
			//----------------------
			// Create QR code
			$qrCode = QrCode::create($url)
				->setEncoding(new Encoding('UTF-8'))
				->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
				->setSize($medida)
				->setMargin(10)
				->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
				->setForegroundColor(new Color(0, 0, 0))
				->setBackgroundColor(new Color(255, 255, 255));
			//----------------------
			// Create generic logo
			$rut_logo = $ru0.'img/logo/'.$label.'.png';
			if (file_exists($rut_logo)) {
				$logo = Logo::create($rut_logo)
					->setResizeToWidth(50)
					->setPunchoutBackground(true)
				;
			} else {
				$logo = null;
			}
			//----------------------
			if ($viewport == 1) {
				$label = Label::create($label)
					->setTextColor(new Color(255, 0, 0));
			}else{
				$label = null;
			}
			//----------------------
			$result = $writer->write($qrCode, $logo, $label);
			//----------------------
			$result->getString();
			$result->saveToFile($filename);
			//----------------------
			$dataUri = $result->getDataUri();
			//----------------------
			$json->qr_src = $filename2;
		}else{
			$json->result = false;
		}
		//----------------------
		echo json_encode($json);
	}