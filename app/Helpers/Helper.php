<?php

namespace App\Helpers;
use Image;

class Helper{

	public function uploadItemImg($dir_name,$file,$name,$config=[])
	{  
		if (!$config) {
			$config = [
      			'thumb'=>[
      					'big'=>['width'=>650,'height'=>385],
      					'small'=>['width'=>350,'height'=>200],
      					],
      		];
		}
	    $uploaddir = 'uploads/'.$dir_name.'/';

	    $getMime = explode('.', $name);
	    $mime = end($getMime);

	    $mime = $this->check_mime($mime);
	    if ($mime) {
		    $data = explode(',', $file);

		    $encodedData = str_replace(' ','+',$data[1]);
		    $decodedData = base64_decode($encodedData);

		    $randomName = substr_replace(sha1(microtime(true)), '', 12).'.'.$mime;

	    	if(file_put_contents($uploaddir.$randomName, $decodedData)) {

	    		if (isset($config['thumb']['big'])) {
	    			$this->resize_img($randomName,$dir_name,$config['thumb']['big']['width'],$config['thumb']['big']['height'],'big');
	    		}

	    		if (isset($config['thumb']['small'])) {
	    			$this->resize_img($randomName,$dir_name,$config['thumb']['small']['width'],$config['thumb']['small']['height'],'small');
	    		}
	      		return $randomName;

		    }else {
		      return  FALSE;
		    }
	    }else{
	    	return FALSE;
	    }
	}
	private function checkMime($mime)
	{
	    switch ($mime) {
	      case 'jpg':  $mime = 'jpg'; break;
	      case 'JPG':  $mime = 'JPG'; break;
	      case 'jpeg': $mime = 'jpeg'; break;
	      case 'JPEG': $mime = 'JPEG'; break;
	      case 'png': $mime = 'png'; break;
	      case 'PNG': $mime = 'PNG'; break;
	      case 'gif': $mime = 'gif'; break;
	      case 'GIF': $mime = 'GIF'; break;
	      default: $mime = FALSE; break;
	    }
	    return $mime;
	}
	private function resizeImg($randomName,$dir_name,$width,$height,$thumb_dir)
	{
		$destinationPath = public_path('/uploads/'.$dir_name.'/thumb/'.$thumb_dir.'/');

		$thumb_img = Image::make(public_path('uploads/'.$dir_name.'/'.$randomName))
							->resize($width, $height);
		$thumb_img->save($destinationPath.'/'.$randomName,80);
		return TRUE;
	}

}