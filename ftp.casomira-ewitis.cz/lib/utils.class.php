<?php
class Utils {
	function ResampleImage($soubor, $maximalniSirka, $maximalniVyska, $souborNovy = "", $kvalita = 80) {
		if (!$souborNovy)	$souborNovy = $soubor;

		if (file_exists($soubor)) {
			$velikost = GetImageSize($soubor);

			switch ($velikost[2]) {
				case 1 :
					$data = imagecreatefromgif($soubor);
					break;

				case 2 :
					$data = imagecreatefromjpeg($soubor);
					break;

				case 3 :
					$data = imagecreatefrompng($soubor);
					break;
			}

			if ($data) {
				$pomer = $velikost[0] / $velikost[1];

				$sirka = $maximalniSirka;
				$vyska = $sirka / $pomer;
				$vyska = floor($vyska);

				if ($vyska > $maximalniVyska) {
					$vyska = $maximalniVyska;
					$sirka = $vyska * $pomer;
					$sirka = floor($sirka);
				}
			}

			$data1 = imagecreatetruecolor($sirka, $vyska);
			$done = ImageCopyResampled($data1, $data, 0, 0, 0, 0, $sirka, $vyska, $velikost[0], $velikost[1]);
			$vytvoreni = ImageJpeg($data1, $souborNovy, $kvalita);
			chmod($souborNovy,0777);
			ImageDestroy($data1);
			ImageDestroy($data);
		}
	}
	
	function recode_cz($in) {
		$divider = '_';
		$out = Utils :: Utf2ascii(strip_tags(mb_strtolower($in)));
		$out = eregi_replace('&[a-z]+;', ' ', $out);
		$out = eregi_replace('[^a-z0-9-]', ' ', $out);
		$out = str_replace(" ", $divider, trim($out));
		$out = eregi_replace($divider . '+', $divider, $out);
		return $out;
	}
	
	public static function Utf2ascii($string) {
		$trans = array (
			'á' => 'a',
			'Á' => 'A',
			'č' => 'c',
			'Č' => 'C',
			'ď' => 'd',
			'Ď' => 'D',
			'é' => 'e',
			'É' => 'E',
			'ě' => 'e',
			'Ě' => 'E',
			'í' => 'i',
			'Í' => 'I',
			'ľ' => 'l',
			'Ľ' => 'L',
			'ň' => 'n',
			'Ň' => 'N',
			'ó' => 'o',
			'Ó' => 'O',
			'ř' => 'r',
			'Ř' => 'R',
			'š' => 's',
			'Š' => 'S',
			'ť' => 't',
			'Ť' => 'T',
			'ú' => 'u',
			'Ú' => 'U',
			'ů' => 'u',
			//     'ö'=>'o', 'Ö'=>'O',    //TODO doplnit znaky mimo český jazyk
			'Ů' => 'U',
			'ý' => 'y',
			'Ý' => 'Y',
			'ž' => 'z',
			'Ž' => 'Z',
                        ' ' => '_'
		);
		return strtr($string, $trans);
	}
	
	function delete_directory($dirname) {
	    if (is_dir($dirname))
	        $dir_handle = opendir($dirname);
	    if (!$dir_handle)
	        return false;
	    while($file = readdir($dir_handle)) {
	      if ($file != "." && $file != "..") {
	            if (!is_dir($dirname."/".$file))
	                unlink($dirname."/".$file);
	            else
	                delete_directory($dirname.'/'.$file);          
	        }
	    }
	    closedir($dir_handle);
	    rmdir($dirname);
	    return true;
	}
}
?>
