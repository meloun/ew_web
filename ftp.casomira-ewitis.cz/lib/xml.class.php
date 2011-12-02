<?php

class Xml {

function make($gals, $pics) {
    $file=fopen("myXml.xml",'w+');
    $string2="";
    foreach($pics as $pic){
        $string2.="<photo desc=\"{$pic['name']}\" url=\"{$pic['file']}\" />";
    }

    $string = "
 
galery name: {$gals[0]['name']}
pic nr1: {$pics[0]['name']}

<!-- GALLERY : {$gals[0]['name']} -->    
<?xml version=\"1.0\" encoding=\"utf-8\"?>
<photos>
<!-- Plase your photos here -->
    <photo desc=\"{$pics[0]['name']}\" url=\"http://www.esportuj.cz/develop/polaroid/_pics/1.jpg\" />
	<photo desc=\"Picture is from stock.xchng\" url=\"http://www.esportuj.cz/develop/polaroid/_pics/2.jpg\" />
	<photo desc=\"meloun\" url=\"http://www.esportuj.cz/develop/polaroid/_pics/2.jpg\" />
	<photo desc=\"meloun3\" url=\"http://www.esportuj.cz/develop/polaroid/_pics/2.jpg\" />
	<photo desc=\"ahotos\" url=\"http://www.esportuj.cz/develop/polaroid/_pics/2.jpg\" />
    </photos>
    
";
    
    fwrite($file, $string2);
    fclose($file);
}

function make2($gal){

    $pics = Picture::GetParGal($gal);
    $dst_dir = Utils::recode_cz($gal['name']);
    $dst = WEB_PATH . '/galleries/'.$dst_dir.'/';
    $filename = Utils::recode_cz($gal['name']);
    $file=fopen("{$dst}{$filename}.xml",'w+');

    $string1="
<gallery
rows=\"7\"
cols=\"2\"
stage_width=\"700\"
stage_height=\"500\"
galleryMargin=\"15\"
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
use_flash_fonts=\"true\"
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
bg_color=\"FFFFFF\"
border_color=\"FFFFFF\"
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
        $string1.=$pic['name']." \n   <pic image=\"{$pic['file']}\" title=\"{$pic['filename']}\" link=\"images/flower.jpg\" link_title=\"{$pic['filename']}\" />";
    }
    $string1.="\n </gallery>";

    fwrite($file, $string1);
    fclose($file);

}
}

