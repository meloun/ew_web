<?php

class File {
	public static function GetAll() {
		$dir = opendir(FILES_PATH);
		while ($file = readdir($dir)) {
			if ($file != '.' && $file !='..') {
				$files[] = $file;
			}
		}
		
		return $files;
	}
	public static function Delete($file) {
		//var_dump('File::Delete->'.'/'. $file.'KONEC');
		unlink($file);
	}
}
