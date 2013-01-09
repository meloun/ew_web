<?php
  $nr_tab = 0;
  switch($_GET["t"]){
    case "registrace":
      $nr_tab = 0;
      break;
    case "mereni":    
      $nr_tab = 1;
      break;
    case "vysledky":    
      $nr_tab = 1;
      break;
    case "zvuceni":    
      $nr_tab = 1;
      break;
  }
?>


<script type="text/javascript">      
jQuery(document).ready(function() {  
    
    $('#mycarousel_1').jcarousel({               
        scroll:1        
    });
    $('#mycarousel_2').jcarousel({               
        scroll:1        
    });
    
    $('.fancybox').fancybox({
        loop:false,
        beforeLoad: function() {
            this.title = $(this.element).attr('caption');
        } 
    });
    
    /*
     *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
    */
    $('.fancybox-media')
            .attr('rel', 'media-gallery')
            .fancybox({
                    openEffect : 'none',
                    closeEffect : 'none',
                    prevEffect : 'none',
                    nextEffect : 'none',

                    arrows : false,
                    helpers : {
                            media : {},
                            buttons : {}
                    }
            });
            

    $(".various").fancybox({
            maxWidth	: 800,
            maxHeight	: 600,
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

<style type="text/css">
    
    .reference{margin-bottom:2em;}    
    .img_box_left{float:left; width:145px;text-align: center;}
    .img_box_right{float:right;width:120px;text-align: center;}                        
    .text_box_left{float:left;width:380px;}        
    .text_box_right{float:right;width:380px;}  
    .reference .img_box_left img,
    .reference .img_box_right img{float:none;margin:0 auto;}   
    /*html {overflow-y: scroll !important;}*/
    #mycarousel_1 img,
    #mycarousel_2 img{            
            margin: 0;
            padding: 0;            
            border: none;
    }
    .jcarousel-skin-ie7{text-align: center;margin:auto;margin-bottom:2em;}    
</style>

<div id="ewitis"> 
         <div class="toggle_container w600">            
            <div class="block">
                <h1>Elektronická Čipová Časomíra Ewitis</h1>
                <p>
                    <img src="/gfx/stopky4_200.jpg" alt="Stopky časomíry" class="left"/>
                    .. je profesionální zařízení "ušité na míru" sportovcům a jejich potřebám. Ewitis je Naše řešení, jak měřit Vaše závodní klání a tréninkové dávky. Nabízíme vám bezdrátové elektronické měření času, které vnese jistotu, přehled a profesionalitu do vašeho závodu. Při trénincích Vám ukáže slabiny a dodá motivaci zlepšit se.
                </p>
                <blockquote><span>&bdquo;</span>&nbsp; Vy závodíte, my měříme..<span>&ldquo;</span></blockquote>
                <div class="cistic"></div>
            </div>
        </div>
        <div class="toggle_container w600">            
            <div class="block">
                <h2>Čipová časomíra</h2>
                <img src="/gfx/antena_120.jpg" alt="Anténa čipové časomíry" class="right"/>
                
                <p>
                    Disponujeme <i>"závodní"</i>  <strong>čipovou časomírou</strong> pro měření rozličných sportovních disciplín jako je cyklistika, horská kola, běžecké závody ale i motoristické sporty jako motorky, fichtly, automobilové závody a další.
                </p>
                <p>
                    Naše závodní časomíra se skládá z nosné konstrukce a dvou nezávislých antén, které snímají RFID tagy projíždějících závodníků.
                    Dále potom z aplikace pro PC, která zpracovává a vyhodnocuje výsledky.                    
                </p>
                
                <div class="cistic"></div>                              
                <br/>
                <ul id="mycarousel_1" class="jcarousel-skin-ie7">
                    <li><a class="fancybox" href="/gfx/fancybox/antena_m.jpg" caption="Anténa čipové časomíry" rel="gallery"><img src="/gfx/fancybox/antena_s.jpg" width="75" height="75" border="0" alt="Anténa čipové časomíry" /></a></li>
                    <li><a class="fancybox" href="/gfx/fancybox/zerovice_m.jpg" caption="Brána čipové časomíry - Žerovice 2012" rel="gallery"><img src="/gfx/fancybox/zerovice_s.jpg" width="75" height="75" border="0" alt="Brána čipové časomíry" /></a></li>                                        
                    <li><a class="fancybox" href="/gfx/fancybox/brana_m.jpg" caption="Brána čipové časomíry - Hustá Rubárna 2012" rel="gallery"><img src="/gfx/fancybox/brana_s.jpg" width="75" height="75" border="0" alt="Brána čipové časomíry" /></a></li>
                    <li><a class="fancybox" href="/gfx/fancybox/blato2_m.jpg" caption="Test odolnosti čipů proti bahnu" rel="gallery"><img src="/gfx/fancybox/blato2_s.jpg" width="75" height="75" border="0" alt="Anténa čipové časomíry" /></a></li>                    
                    <li><a class="fancybox" href="/gfx/fancybox/brana-test_m.jpg" caption="Plné rozpětí brány 6 x 4m" rel="gallery"><img src="/gfx/fancybox/brana-test_s.jpg" width="75" height="75" border="0" alt="Brána čipové časomíry" /></a></li>
                    <li><a class="fancybox" href="/gfx/fancybox/kamera_m.jpg" caption="Cílová kamera" rel="gallery"><img src="/gfx/fancybox/kamera_s.jpg" width="75" height="75" border="0" alt="Anténa čipové časomíry" /></a></li>                    
                    <li><a class="fancybox" href="/gfx/fancybox/registrace_m.jpg" caption="Online registrace - povinné a volitelné údaje" rel="gallery"><img src="/gfx/fancybox/registrace_s.jpg" width="75" height="75" border="0" alt="Online registrace - povinné a volitelné údaje" /></a></li>                    
                    <li><a class="fancybox" href="/gfx/fancybox/registrace_m_2.jpg" caption="Online registrace - výběr kategorie" rel="gallery"><img src="/gfx/fancybox/registrace_s_2.jpg" width="75" height="75" border="0" alt="Online registrace - výběr kategorie" /></a></li>                    
                    <li><a class="fancybox" href="/gfx/fancybox/vysledky_m.jpg" caption="Průběžné a konečné výsledky" rel="gallery"><img src="/gfx/fancybox/vysledky_s.jpg" width="75" height="75" border="0" alt="Průběžné a konečné výsledky" /></a></li>                    
                    <li><a class="fancybox" href="/gfx/fancybox/admin_m.jpg" caption="Administrátorské prostředí pro pořadatele - potvrzování plateb" rel="gallery"><img src="/gfx/fancybox/admin_s.jpg" width="75" height="75" border="0" alt="Administrátorské prostředí pro pořadatele - potvrzování plateb" /></a></li>                    
                </ul>                

            </div>
        </div>
        
        <div class="toggle_container w600">            
            <div class="block">
                <h2>Naše služby</h2>
                <ul class="tabs">
                    <li><a href="#registrace">Registrace</a></li>
                    <li><a href="#mereni">Měření</a></li>
                    <li><a href="#vysledky">Výsledky</a></li>
                    <li><a href="#zvuceni">Zvučení</a></li>                        
                </ul>

                <div class="tab_container">
                    <div id="registrace" class="tab_content">
                         <div class="reference">                            
                            <div class="img_box_left">
                                <img src="/gfx/registrace.jpg" />
                            </div>
                            <div class="text_box_right">
                                <h3>Online registrace</h3>
                                Registrace na našem webu nabízí snadnou a rychlou registraci pro každého závodníka. 
                                Pro pořadatele potom rychlý přehled o přihlášených závodnících a pohodlný systém potvrzovaní plateb.
                                Registrace je navržena tak, že jsme připraveni na různé závody, kategorie a podmínky registrace.                                
                            </div>
                            <div class="cistic"></div>
                        </div>
                    </div>
                    
                    <div id="mereni" class="tab_content">

                        <div class="reference">
                            <div class="text_box_left">
                                <h3>Čipová casomíra</h3>
                                <p>
                                Naše závodní časomíra se skládá z nosné konstrukce a dvou nezávislých antén, 
                                které snímají RFID tagy projíždějících závodníků.
                                </p>                                
                            </div>
                            <div class="img_box_right">
                                <img src="/gfx/rfid-logo3_110.jpg" />
                            </div>
                            <div class="cistic"></div>
                        </div>
                        <div class="reference">                            
                            <div class="img_box_left">
                                <img src="/gfx/cdbox_110.jpg" />
                            </div>
                            <div class="text_box_right">
                                <h3>Aplikace pro PC</h3>
                                <p>
                                Podstatnou součástí celého systému je naše aplikace pro PC. Časy dobíhajících závodníků 
                                se průběžně přenášejí do počítače, kde s nimi můžeme dále pracovat, podle 
                                importované listiny se k časům automaticky přiřadí jména a další údaje - vše rychle dohledatelné a 
                                upravitelné. Tisk průběžných i konečných výsledků je potom záležitost několika kliknutí. 
                                </p>
                            </div>
                            <div class="cistic"></div>
                        </div>                                                                           
                    </div>
                    <div id="vysledky" class="tab_content">
                        <div class="reference">
                            <div class="text_box_left">
                                <h3>Prezentace výsledků</h3>
                                <p>
                                Zobrazení průběžných výsledků a podstatných údajů během závodu probíhá na velkém LCD Monitoru.
                                </p>
                                <p>Finální výsledky jsme schopni vytisknout během několi minut po skončení závodu,
                                tentýž den jsou přístupné na našem webu a odeslány na váš email. 
                                </p>
                            </div>
                            <div class="img_box_right">
                                <img src="/gfx/man_finish_line.jpg" />
                            </div>
                            <div class="cistic"></div>
                        </div>                         
                    </div>
                    <div id="zvuceni" class="tab_content">
                        <div class="reference">
                            <p>
                            Jeden člen našeho týmu je profesionální zvukař.
                            Není tedy pro nás problém poskytnout potřebné zázemí pro ozvučení celého závodu a pro Vašeho moderátora.
                            </p>
                            <p>
                            Informace o našem zvuku naleznete na <a href="http://www.p-sound.cz">http://www.p-sound.cz</a>
                            </p>
                        </div>                         
                    </div>
                </div>
                <div class="cistic"></div> 
            </div>
        </div>
        <div class="toggle_container w600">            
            <div class="block">                
                <h2>Optická časomíra</h2>                
                <img src="/gfx/ir_kufr_150.jpg" alt="Buňka tréninkové časomíry" class="right"/>    
                
                <p>
                    Naproti tomu <i>"tréninková"</i> <strong>optická  časomíra</strong> se skládá typicky ze dvou optických bran - START a CÍL (+ případné mezičasy), které bezdrátově komunikují s terminálem. Terminál je vybaven LCD displejem a klávesnicí pro snadné ovládání a rychlé zobrazení časů. Vše zaštiťuje aplikace, která sbírá, archivuje a vyhodnocuje vaše výsledky. Tréninková časomíra se specializuje na disciplíny jako je atletika, tréninky hasičů, kondiční testy rozhodčích a několik dalších. U tohoto způsobu měření garantujeme vysokou spolehlivost a přesnost měření (0,01s). 
                </p>
                <div class="cistic"></div>
                
                <div class="three_items">
                <ul id="mycarousel_2" class="jcarousel-skin-ie7">
                    <li><a class="fancybox" href="/gfx/fancybox/ir_bunka_m.jpg" caption="Test odolnosti čipů proti bahnu" rel="gallery_2"><img src="/gfx/fancybox/ir_bunka_s.jpg" width="75" height="75" border="0" alt="Anténa čipové časomíry" /></a></li>                    
                    <li><a class="fancybox" href="/gfx/fancybox/ir_kufr_m.jpg" caption="Anténa čipové časomíry" rel="gallery_2"><img src="/gfx/fancybox/ir_kufr_s.jpg" width="75" height="75" border="0" alt="Anténa čipové časomíry" /></a></li>
                    <li><a class="fancybox" href="/gfx/fancybox/ir_set_m.jpg" caption="Brána čipové časomíry - Žerovice 2012" rel="gallery_2"><img src="/gfx/fancybox/ir_set_s.jpg" width="75" height="75" border="0" alt="Brána čipové časomíry" /></a></li>                                                                                                    
                </ul>
                    
                </div>
                    
            </div>
        </div>

        <div class="toggle_container w600">            
            <div class="block">
               <h2>Facebook</h2>
               <p>Aktuální a podrobné informace k jednotlivým závodům najdete na naší facebookové stránce</p>                            
               <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2F%25C4%258Casom%25C3%25ADra-Ewitis%2F155838077817164&amp;width=550&amp;height=395&amp;colorscheme=light&amp;show_faces=false&amp;border_color=%23ccc&amp;stream=true&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:550px; height:395px;" allowTransparency="true"></iframe>
            </div>
        </div>
        <div class="toggle_container w600">            
            <div class="block">
               <h2>Ke Stažení</h2>
               <ul>
                   <li>technické informace k <a href="/files/casomira_treninkova_letak.pdf">optické <i>"tréninkové"</i> Časomíře</a></li>               
                   <li>technické informace k <a href="/files/casomira_cipova_letak.pdf">čipové <i>"závodní"</i> Časomíře</a></li>                               
               </ul>                                         
            </div>            
        </div>
</div>




