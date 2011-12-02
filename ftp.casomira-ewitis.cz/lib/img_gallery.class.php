<?php
class Gallery {
	public static function GetAll() {
		$res = Db::Query("
			SELECT *
			FROM galleries
			ORDER BY id ASC
		", LINK);
		
		$gals = Db::FetchTable($res);
		
		return $gals;
	}
	public static function GetParKategory($kat_id) {
		$kat_id_esc = Db::EscInteger($kat_id);
		$res = Db::Query("
			SELECT *
			FROM galleries
			WHERE kat_id = {$kat_id_esc}
			ORDER BY created_at
		", LINK);
	
		$gals = Db::FetchTable($res);

		return $gals;
	}

	public static function Get($id) {
		$id_esc = Db::EscInteger($id);
		
		$res = Db::Query("
			SELECT *
			FROM galleries
			WHERE id = {$id_esc}
		", LINK);
		
		$gal = Db::FetchRow($res);
		
		return $gal;
	}
	
	public static function Replace($post, $files) {
		$pic_name = Utils::recode_cz($post['name']);
		if ($files['picture']['error'] == 0) {
		
			$src = $files['picture']['tmp_name'];
			//move_uploaded_file($_FILES["picture"]['tmp_name'], WEB_PATH.'\galleries\tmp_thumb_gal.jpg');
			//$src = WEB_PATH.'\galleries\tmp_thumb_gal.jpg';
			
			$dst = WEB_PATH . '/galleries/' . $pic_name . '.jpeg';
			Utils::ResampleImage($src, 100, 300, $dst);
			$picture = WEB_URL . '/galleries/' . $pic_name . '.jpeg';
		} else {
			$tmp = Gallery::Get($post['id']);
			$picture = $tmp['picture'];
		}
		
		$id_esc = Db::EscInteger($post['id']);
		$name_esc = Db::EscString($post['name']);
		$name_en_esc = Db::EscString($post['name_en']);
		$link_esc = Db::EscString($post['link']);
		$kat_id_esc = Db::EscInteger($post['kat_id']);
		$text_esc = Db::EscString($post['text']);
		$text_en_esc = Db::EscString($post['text_en']);
		$picture_esc = Db::EscString($picture);
		
		Db::Query("
			REPLACE INTO galleries
			(id, kat_id, name, name_en, link, text, text_en, picture)
			VALUES
			({$id_esc}, {$kat_id_esc}, {$name_esc}, {$name_en_esc},{$link_esc}, {$text_esc}, {$text_en_esc}, {$picture_esc})
		", LINK);
		
		$id = mysql_insert_id(LINK);
		$dst_dir = $id;
		
		if (!file_exists(WEB_PATH . "/galleries/$dst_dir"))
			mkdir (WEB_PATH . "/galleries/$dst_dir", 0777);      //vysledna prava 0755
			//mkdir(WEB_PATH . "/galleries/$dst_dir");
                if (!file_exists(WEB_PATH . "/galleries/$dst_dir/pics"))
			mkdir(WEB_PATH . "/galleries/$dst_dir/pics", 0777);
			//mkdir(WEB_PATH . "/galleries/$dst_dir/pics");
	}
	
	public static function Delete($id) {
		$gal = Gallery::get($id);
		$nam = Utils::recode_cz($gal['name']);
		unlink(WEB_PATH . "/galleries/$nam.jpeg");
		Utils::delete_directory(WEB_PATH . "/galleries/$nam");
		
		$id_esc = Db::EscInteger($id);
		
		Db::Query("
			DELETE FROM galleries
			WHERE id = {$id_esc}
		", LINK);

                Db::Query("
			DELETE FROM pictures
			WHERE gallery_id = {$id_esc}
		", LINK);
	}
        //
        public static function DeleteParKategory($kat_id) {
            $gals = Gallery::GetParKategory($kat_id);
            foreach ($gals as $gal){
                Gallery::Delete($gal['id']);
            }
        }
	
	public static function RewriteLink($gal) {
		if ($gal['link']) return $gal['link'];
		//else return '?page=pictures&amp;gid=' . $gal['id'];
                else return INDEX_URL.'?gid=' . $gal['id'];
	}
	
        public static function AddPicture($post, $files) {
		$gal = Gallery::get($post['id']);
		$src = $files['picture']['tmp_name'];
		$dst_dir = $gal['id'];
		$pic_name = Utils::recode_cz($files['picture']['name']);
		
		//premapovani zdroje obrazku
		$src = WEB_PATH.'/galleries/'. $dst_dir . '/zz_tmp_pic.jpeg';
		move_uploaded_file($files["picture"]['tmp_name'], $src);
				
		$dst = WEB_PATH . '/galleries/' . $dst_dir . '/' . $pic_name . '.jpeg';
		$dst_thumb = WEB_PATH . '/galleries/' . $dst_dir . '/' . $pic_name . '-thumb.jpeg';
		Utils::ResampleImage($src, 800, 600, $dst);
		Utils::ResampleImage($src, 400, 100, $dst_thumb);
			
		$id_esc = Db::EscInteger($post['id']);
	}
	
	public static function DeletePicture($file) {
		unlink($file);
		unlink(str_replace('-thumb.jpeg', '.jpeg', $file)); 
	}
	
	public static function GetPictures($gal, $thumbs = false) {
		$dst_dir = $gal['id'];
		$dir = opendir(WEB_PATH . '/galleries/' . $dst_dir . '/');

		while ($file = readdir($dir)) {
			if ($file != '.' && $file !='..'&& $file !='.jpeg') {
				$file = WEB_URL . "/galleries/$dst_dir/$file";
				if (strpos($file, '-thumb.jpeg') && $thumbs) $files[] = $file;
				if (!strpos($file, '-thumb.jpeg') && !$thumbs) $files[] = $file;
			}
		}

		return $files;
	}
}
