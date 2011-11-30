<?php
  $nr_tab = 0;
  switch($_GET["t"]){
    case "zavody":
      $nr_tab = 0;
      break;
    case "treninky":    
      $nr_tab = 1;
      break;
  }
?>
<style type="text/css">
    
    .reference{margin-bottom:2em;}    
    .img_box_left{float:left; width:145px;text-align: center;}
    .img_box_right{float:right;width:120px;text-align: center;}                        
    .text_box_left{float:left;width:380px;}        
    .text_box_right{float:right;width:380px;}  
    .reference .img_box_left img,
    .reference .img_box_right img{float:none;margin:0 auto;}   
    html {overflow-y: scroll !important;}
</style>

<div id="ewitis"> 
         <div class="toggle_container w600">            
            <div class="block">
                <h2>Elektronická Sportovní Časomíra Ewitis</h2>
                <p>
                    <img src="gfx/stopky4_200.jpg" alt="Stopky časomíry" class="left"/>
                    .. je profesionální zařízení "ušité na míru" sportovcům a jejich potřebám. Ewitis je Naše řešení, jak měřit Vaše závodní klání a tréninkové dávky. Nabízíme vám bezdrátové elektronické měření času, které vnese jistotu, přehled a profesionalitu do vašeho závodu. Při trénincích Vám ukáže slabiny a dodá motivaci zlepšit se.
                </p>
                <blockquote><span>”</span>&nbsp; Vy závodíte, my měříme..</blockquote>
                <div class="cistic"></div>                               
                <h3>Čipová a optická časomíra</h3>
                <img src="gfx/bunka2_200.jpg" alt="Buňka tréninkové časomíry" class="right topmargin20"/>
                
                <p>
                    Disponujeme <strong>čipovou <i>"závodní"</i> časomírou</strong> pro měření rozličných sportovních disciplín jako je cyklistika, horská kola, běžecké závody ale i motoristické sporty jako motorky, fichtly, automobilové závody a další. Tato časomíra se skládá z dvou nezávisle měřících antén, terminálu pro příjem RFID tagů a aplikace v PC, která zpracovává výsledky. 
                </p>
                <p>
                    Naproti tomu <strong>optická <i>"tréninková"</i> časomíra</strong> se skládá typicky ze dvou optických bran - START a CÍL (+ případné mezičasy), které bezdrátově komunikují s terminálem. Terminál je vybaven LCD displejem a klávesnicí pro snadné ovládání a rychlé zobrazení časů. Vše zaštiťuje aplikace, která sbírá, archivuje a vyhodnocuje vaše výsledky. Tréninková časomíra se specializuje na disciplíny jako je atletika, tréninky hasičů, kondiční testy rozhodčích a několik dalších. U tohoto způsobu měření garantujeme vysokou spolehlivost a přesnost měření (0,01s). 
                </p>
                <div class="cistic"></div>                                                  
                    
            </div>
        </div>        
        <div class="toggle_container w600">            
            <div class="block">
                <h2>Naše služby</h2>                                
                <ul class="tabs">
                    <li><a href="#zavody">Závody</a></li>
                    <li><a href="#treninky">Tréninky</a></li>
                </ul>

                <div class="tab_container">
                    <div id="zavody" class="tab_content">
                        <div class="reference">                            
                            <div class="img_box_left">
                                <img src="/gfx/registrace.jpg" />
                            </div>
                            <div class="text_box_right">
                                <h3>Online registrace</h3>
                                <ul>                                    
                                <li>snadná a rychlá registrace pro každého závodníka <a href="http://ewitis.cz/?p=zavod&cid=1&tab=2">testovací závod</a></li>                                    
                                <li>ruzné závody, kategorie a podmínky registrace</li>                                    
                                <li>systém potvrzování plateb (pro poradatele)</li>                                    
                                <li>online prehled prihlášených a již platícíh závodníku</li>
                                </ul>
                            </div>
                            <div class="cistic"></div>
                        </div>
                        <div class="reference">
                            <div class="text_box_left">
                                <h3>Čipová casomíra</h3>
                                <ul>                                    
                                <li></li>
                                <li></li>
                                <li></a></li>                                    
                                </ul>                                    
                            </div>
                            <div class="img_box_right">
                                <img src="/gfx/wireless_95.jpg" />
                            </div>
                            <div class="cistic"></div>
                        </div>
                        <div class="reference">                            
                            <div class="img_box_left">
                                <img src="/gfx/cdbox.png" />
                            </div>
                            <div class="text_box_right">
                                <h3>Aplikace pro PC <small><a href="http://www.jawa50zavody.wz.cz/tremosna.htm" rel="external" target="_blank">www</a></small></h3>
                                <ul>
                                <li>import startovní listiny z naší online registrace, z excelu,.. </li>                                    
                                <li>neustálý prehled o závode</li>
                                <li>tvorba prubežných i konecných výsledku</li>                                                
                                </ul>
                            </div>
                            <div class="cistic"></div>
                        </div>
                        <div class="reference">
                            <div class="text_box_left">
                                <h3>Prezentace výsledků</h3>
                                <ul>
                                <li>LCD Monitor - pro zobrazení aktuálních mezičasů a podstatných údajů závodu  </li>                                    
                                <li>Tisk - konecné, prípadne i prubežné výsledku</li>                                    
                                <li>Web - oficiální výsledky k volnému stažení <a href="">príklad</a></li>                                  
                                </ul>                                    
                            </div>
                            <div class="img_box_right">
                                <img src="/gfx/man_finish_line.jpg" />
                            </div>
                            <div class="cistic"></div>
                        </div>                                                    

                    </div>
                    <div id="treninky" class="tab_content">
                       <div class="reference">                            
                            <div class="img_box_left">
                                <img src="/gfx/wireless.png" />
                            </div>
                            <div class="text_box_right">
                                <h3>Bezdrátová časomíra</h3>
                                <ul>                                    
                                <li>Optické brány, velmi rychlá montáž na stativy - galerie</li>
                                <li>Start, Cíl a až 10 mezičasů</li>                                    
                                <li>Centrální jednotka s klávesnicí a LCD displejem</li>                            
                                <li>Kompletně bezdrátové spolehlivé řešení(na přání drátová verze)</li>
                                <li>Napájené Li-Ion bateriemi, integrovaná nabíječka</li>
                                <li>více informací v našem <b><a href="/files/Ewitis_letak.pdf">letáku</a></b></li>
                                </ul>
                            </div>
                            <div class="cistic"></div>
                        </div>

                        <div class="reference">
                            <div class="text_box_left">
                                <h3>Aplikace pro PC</h3>
                                <p>Podstatnou součástí celého systému je naše aplikace pro PC. Naměřené časy se
                                jednoduše přenesou do počítače(USB), kde s nimi můžete dále pracovat. Vyhodnocení tréninku,
                                porovnaní s minulými dávkami, srovnání s jinými závodníky, export na web anebo prostě jen
                                tisk – vše je záležitostí několika minut a zvládne je počítačový začátečník.</p>
                            </div>
                            <div class="img_box_right">
                                <img src="/gfx/cdbox.png" />
                            </div>
                            <div class="cistic"></div>
                        </div>                    
                    </div>
                </div>
                <div class="cistic"></div> 
            </div>
        </div>
        <div class="toggle_container w600">            
            <div class="block">
               <h2>Ke Stažení</h2>
               <ul>
                   <li>technické informace k <a href="/files/Ewitis_letak.pdf">optické <i>"tréninkové"</i> Časomíře</a></li>               
                   <li>technické informace k <a href="/files/Ewitis_technicke_info_cipova.pdf">čipové <i>"závodní"</i> Časomíře</a> (doplnit)</li>
                   <li>tréninková aplikace <a href="/files/Ewitis_aplikace_trenink_v1.3.zip">verze 1.3</a> (doplnit)</li>               
               </ul>
            </div>
        </div>
        <div class="toggle_container w600">            
            <div class="block">
               <h2>Facebook</h2>
               <p>Aktuální a podrobné informace k jednotlivým závodům najdete na naší facebookové stránce</p>                            
               <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2F%25C4%258Casom%25C3%25ADra-Ewitis%2F155838077817164&amp;width=550&amp;height=395&amp;colorscheme=light&amp;show_faces=false&amp;border_color=%23ccc&amp;stream=true&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:550px; height:395px;" allowTransparency="true"></iframe>
            </div>
        </div>
</div>




