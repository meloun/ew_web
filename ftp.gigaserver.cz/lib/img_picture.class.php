<?php
class Picture {
    public static function GetAll() {
        $res = Db::Query("
            SELECT *
                FROM pictures
                ORDER BY id DESC
        ", LINK);

        $pics = Db::FetchTable($res);
	return $pics;
    }

	
    public static function Get($file) {
        $res = Db::Query("
            SELECT *
                FROM pictures
                WHERE file = '$file'
        ", LINK);

        if($res)
            $pic = Db::FetchRow($res);
       return $pic;
    }

    public static function GetParId($id) {
        $res = Db::Query("
            SELECT *
                FROM pictures
                WHERE id = '$id'
        ", LINK);

        if($res)
            $pic = Db::FetchRow($res);
        return $pic;
    }

    public static function GetParGal2($gal, $thumbs = false) {

        $gid = $gal['id'];
        $res = Db::Query("
            SELECT *
                FROM pictures
                WHERE gallery_id = '$gid'
		ORDER BY id ASC
        ", LINK);

        if($res){
            $pics = Db::FetchTable($res);
	    
	    if($thumbs){ //thumbails?
		foreach ($pics as $key => $pic)
		    $pics[$key]['file'] = str_replace('.jpeg', '-thumb.jpeg', $pics[$key]['file']);
	    }
	}
        return $pics;
    }

    public static function Replace($post, $files){
        $gal = Gallery::get($post['gid']);
        $db_pic = Picture::GetParId($post['pid']);

        if ($files['picture']['error'] == 0) {
            if($db_pic['file']) //pokud je co smazat tak smaz
                Picture::Delete($db_pic['file']);
          
            $src = $files['picture']['tmp_name'];
            $dst_dir = $gal['id'];
            $pic_name = Utils::recode_cz($files['picture']['name']);
            $dst = WEB_PATH . '/galleries/' . $dst_dir . '/pics/' . $pic_name . '.jpeg';
            $dst_thumb = WEB_PATH . '/galleries/' . $dst_dir . '/pics/' . $pic_name . '-thumb.jpeg';
            Utils::ResampleImage($src, 1000, 800, $dst);
            Utils::ResampleImage($src, 400, 100, $dst_thumb);

            $file = WEB_URL . '/galleries/' . $dst_dir . '/pics/' . $pic_name . '.jpeg'; //pro zapis do db
	}
	else{
            $file = $db_pic['file']; //cesta k obrazku zustane stejna
        }
			
        $id_esc = Db::EscInteger($post['pid']);
        $gid_esc = Db::EscInteger($post['gid']);
        $name_esc = Db::EscString($post['name']);
        $text_esc = Db::EscString($post['text']);
        $file_esc = Db::EscString($file);
		
        Db::Query("
            REPLACE INTO pictures
                (id, gallery_id, file, name, text)
                VALUES
                ({$id_esc}, ($gid_esc), {$file_esc}, {$name_esc}, {$text_esc})
        ", LINK);

        $id = mysql_insert_id(LINK);
        Picture::makeXml($gal);
    }
    public function makeXml($gal){
	
        $pics = Picture::GetParGal($gal);
        $dst_dir = $gal['id'];
        $dst = WEB_PATH . '/galleries/'.$dst_dir.'/';
        $filename = $gal['id'];
        $file=fopen("{$dst}{$filename}.xml",'w+');
        var_dump($filename);
        $string1="
<gallery
rows=\"7\"
cols=\"2\"
stage_width=\"700\"
stage_height=\"600\"
galleryMargin=\"0\"
thumb_width=\"60\"
thumb_height=\"60\"
thumb_space=\"7\"
thumbs_x=\"20\"
thumbs_y=\"20\"
large_x=\"170\"
large_y=\"20\"
nav_x=\"20\"
nav_y=\"360\"
nav_slider_alpha=\"20\"
nav_padding =\"14\"
use_flash_fonts=\"false\"
bg_alpha=\"100\"
text_bg_alpha=\"50\"
text_xoffset=\"20\"
text_yoffset=\"10\"
link_xoffset=\"-2\"
link_yoffset=\"5\"
border=\"4\"
corner_radius=\"5\"
shadow_alpha=\"40\"
shadow_offset=\"1\"
shadow_size=\"5\"
shadow_spread=\"0\"
friction=\".3\"
bg_color=\"191919\"
border_color=\"555555\"
thumb_bg_color=\"FFFFFF\"
nav_color=\"444444\"
nav_slider_color=\"000000\"
txt_color=\"FFFFFF\"
text_bg_color=\"000000\"
link_text_color=\"666666\"
link_text_over_color=\"FF9900\"
auto_size=\"true\"
showHideCaption=\"false\"
autoShowFirst=\"true\"
disableThumbOnOpen=\"false\"
>";
    foreach($pics as $pic){
        $string1.=" \n   <pic image=\"{$pic['file']}\" title=\"{$pic['name']} - {$pic['text']}\" link=\"images/flower.jpg\" link_title=\"\" />";
    }
    $string1.="\n </gallery>";    

    fwrite($file, $string1);
    fclose($file);
}

    public static function Delete($id) {
        $id_esc = Db::EscInteger($id);
        $pic_to_del =  Picture::getParId($id_esc);
        
        Db::Query("
            DELETE FROM pictures
            WHERE id = {$id_esc}
	", LINK);

        unlink($_SERVER['DOCUMENT_ROOT'].$pic_to_del['file']);
        unlink($_SERVER['DOCUMENT_ROOT'].str_replace('.jpeg', '-thumb.jpeg', $pic_to_del['file']));
    }


    public static function GetParGal($gal, $thumbs = false) {
        $dst_dir = Utils::recode_cz($gal['id']);
        $dir = opendir(WEB_PATH . '/galleries/' . $dst_dir . '/pics');
        while ($file = readdir($dir)) {
            if ($file != '.' && $file !='..') {
                $filename = $file;
                $file = WEB_URL . "/galleries/$dst_dir/pics/$file";
                if (strpos($file, '-thumb.jpeg') && $thumbs){
                    $file_s = substr($file,0,strpos($file, '-thumb.jpeg'));
                    $file_s .='.jpeg';
                    //$file_s = Db::EscString($file_s);
                    $picture = Picture::Get($file_s);
                    $pictures[] = Array("id" => $picture['id'],"file" => $file,"filename" =>$filename, "name" => $picture['name'],"text" => $picture['text']);
                }
                if (!strpos($file, '-thumb.jpeg') && !$thumbs){
                    $picture = Picture::Get($file);
                    $pictures[] = Array("id" => $picture['id'],"file" => $file,"filename" =>$filename, "name" => $picture['name'],"text" => $picture['text']);
                }
            }
        }
        return $pictures;
    }


	
}
