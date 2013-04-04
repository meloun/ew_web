<script type="text/javascript">      

$(document).ready(function() {
	$('.fancybox-media').fancybox({
                loop:false,
                beforeLoad: function() {
                    this.title = $(this.element).attr('caption');
                },
		openEffect  : 'none',
		closeEffect : 'none',
                prevEffect  : 'none',
		nextEffect  : 'none',
		closeBtn    : true,
                autoCenter  : true,                
                fixed: false,
                autoSize: false,
		helpers : {
                        title	: { type : 'inside' },
			media : {}
		}                
	});
});



      
jQuery(document).ready(function() {  
                    
    $(".various").fancybox({
            maxWidth	: 800,
            maxHeight	: 700,
            fitToView	: false,
            width		: '70%',
            height		: '70%',
            autoSize	: false,
            closeClick	: false,
            openEffect	: 'none',
            closeEffect	: 'none'
    });
    
});


</script>   

<?
    $subtitle = "Registrace";
    //$competitions = Competition::GetAll();
    $competitions = Competition::GetParYear(2012);
    

      /* $nr_tab je pouzita v javasriptu pro vybrani zalozky */
    $nr_tab = 0;
    switch($_GET["t"]){
      case "2013":
        $nr_tab = 0;
        break;
      case "2012":    
        $nr_tab = 1;
        break;
      case "2011":    
        $nr_tab = 2;
        break;
      case "2010":    
        $nr_tab = 3;
        break;
      case "mapka":
        $nr_tab = 4;
        break;
      default:    
        $nr_tab = 0;
        break;      
    }
  
  function FormatCompetition($competition){
       $img = ($competition['img_1']) ? $competition['img_1'] : '';
       ?>

                        <div class="tab_container notabs">                
                            <div class="notab_content">                           
                                <div class="img_box_left">                       
                                    <!--<img src="/img/krapkap/jawa_logo.jpg">-->
                                    <img src="<?=$img?>"  style='max-width: 140px'>
                                </div>
                                <div class="text_box_right">
                                    <h3><?=$competition['name']?> <small><a href="<?=$competition['web']?>" rel="external" target="_blank">www</a></small></h3>
                                    <ul class="list_box">
                                      <li><b>kdy: </b><?=$competition['date']?></li>                                    
                                      <li><b>kde: </b><?=$competition['place']?> <small><a rel="<?$competition['name']?>" class="fancybox-media" href="http://maps.google.com/maps?q=<?=$competition['place']?>,+Czech+Republic&z=8" caption="<?=$competition['name']?>, <?=$competition['date']?>, <?=$competition['place']?>">Map</a></small></li>                                      
                                      <li><b>popis: </b><?=$competition['short_desc']?></li>
                                    </ul>
                                    <div class="buttons_box">
                                        <? if($competition['registration_en']){ ?>
                                            <a href="/registrace/<?=Utils::friendly_url($competition['name']);?>" class="btnR reg">Registrovat  &raquo;</a>
                                        <?}else if($competition['results']){ ?>
                                            <a href="/zavod/<?=Utils::friendly_url($competition['name']);?>/vysledky" class="btnR reg">Výsledky  &raquo;</a>                                            
                                        <?}?>
                                
                                      
                                      <big class="size150"><a href="/zavod/<?=Utils::friendly_url($competition['name']);?>" class="btnR more">Více  &raquo;</a></big>                          
                                    </div>                        
                                </div>
                                <div class="cistic"></div>                                      
                            </div><!-- tab zavody -->
                        </div>  <!-- tab_container  -->        
  <?}

?>
<style type="text/css">     
    
    .tab_content{padding:0;}
    
    .img_box_left{float:left; width:140px;text-align: center;}
    .img_box_right{float:right;width:120px;text-align: center;}                        
    .text_box_left{float:left;width:390px;}        
    .text_box_right{float:right;width:380px;}    
    .notab_content .img_box_left img,
    .img_box_right img{float:none;margin:0 auto;}    
    .btnR{margin-left:20px;width:90px;text-align:center;}
      .btnR.reg{margin-bottom:10px;}
    .tab_container{margin-bottom:10px;}
        .tab_container ul{margin-bottom:1em;margin-left:0;}
            .tab_container ul li{list-style-type:none;margin-left:0;}
    .buttons_box{width:105px;float:right;}
    .list_box{width:260px;float:left;}
    .notab_content{padding-bottom:10px;}
      .notab_content ul, .notab_content li{margin:0;font-size: 94%;}
      .notab_content h3{margin-bottom:5px;}

    .btnR.various{ background: #a40000;  }
</style>

<div id="references">
    
    

    <div class="toggle_container w600">                
        <div class="block">
            <h2>Závody </h2>                                    
                           
            <ul class="tabs">
                  <li><a href="#2013">2013</a></li>
                  <li><a href="#2012">2012</a></li>
                  <li><a href="#2011">2011</a></li>
                  <li><a href="#2010">2010</a></li>                                    
                  <li><a class="various fancybox.iframe" href="https://www.google.com/fusiontables/embedviz?viz=MAP&q=select+col3+from+1RqYbuWoX2ejCAxgk4pPGSjw1VC9cj2TKHr_3brw&h=false&lat=49.80&lng=15.55&z=7&t=1&l=col3&y=1&tmplt=1">mapka &raquo;&raquo;</a></li>
            </ul>
            <div class="cistic"></div>      
            <BR/>
            
            <div id="2013" class="tab_content">           
                                                         
                <?
                $competitions = Competition::GetParYear(2013);
                foreach($competitions as $competition){
                       
                        FormatCompetition($competition);
                        ?>                                                
                        <div class="cistic"></div>                    
                <?}?>
             </div>

            
             <div id="2012" class="tab_content">
                <?
                $competitions = Competition::GetParYear(2012);
                foreach($competitions as $competition){
                       
                        FormatCompetition($competition);
                        ?>                                                
                        <div class="cistic"></div>                    
                <?}?>
             </div>
            
             <div id="2011" class="tab_content">
                <?
                $competitions = Competition::GetParYear(2011);
                foreach($competitions as $competition){
                       
                        FormatCompetition($competition);
                        ?>                                                
                        <div class="cistic"></div>                    
                <?}?>
             </div>
             <div id="2010" class="tab_content">
                <?
                $competitions = Competition::GetParYear(2010);
                foreach($competitions as $competition){
                       
                        FormatCompetition($competition);
                        ?>                                                
                        <div class="cistic"></div>                    
                <?}?>
             </div>
             <div id="mapka" class="tab_content">
                 dd
             </div>

            <BR/> 
            
            
        </div><!-- block  -->
    </div><!-- toggle_container  -->
 </div><!-- reference  -->




