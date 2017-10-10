<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;
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

	    $mime = $this->checkMime($mime);
	    if ($mime) {
		    $data = explode(',', $file);

		    $encodedData = str_replace(' ','+',$data[1]);
		    $decodedData = base64_decode($encodedData);

		    $randomName = substr_replace(sha1(microtime(true)), '', 12).'.'.$mime;

	    	if(Storage::put($uploaddir.$randomName, $decodedData)) {

	    		if (isset($config['thumb']['big'])) {
	    			$this->resizeImg($randomName,$dir_name,$config['thumb']['big']['width'],$config['thumb']['big']['height'],'big');
	    		}

	    		if (isset($config['thumb']['small'])) {
	    			$this->resizeImg($randomName,$dir_name,$config['thumb']['small']['width'],$config['thumb']['small']['height'],'small');
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
	public static function delImg($id,$dataImg,$folder)
    {
        if ($dataImg) {
            $path = 'uploads/'.$folder.'/';
            $id = [];
            for ($i=0; $i < count($dataImg); $i++) { 

               $img[] = $path.$dataImg[$i]['img'];
               $thumb_smail[] = $path.'thumb/small/'.$dataImg[$i]['img'];
               $thumb_big[] = $path.'thumb/big/'.$dataImg[$i]['img'];
            }
            Storage::delete($img);
            Storage::delete($thumb_smail);
            Storage::delete($thumb_big);
            return TRUE;
        }else{
        	return FALSE;
        }
    }
	public static function translit($str)
	{
	  $str = trim($str);
	  $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',' ', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',' ','?','!','@','#',',','%','"',"'",'&',']','[',')','(','^',':','_','}','{','+','=','/','>','<','`','№','$','*',';','.');
	  $lat = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya','-','a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya','-');
	  return str_replace($rus, $lat, $str);
	}

}