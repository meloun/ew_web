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
    .img_box_left{float:left; width:140px;text-align: center;}
    .img_box_right{float:right;width:120px;text-align: center;}                        
    .text_box_left{float:left;width:390px;}        
    .text_box_right{float:right;width:380px;}    
    .reference .img_box_left img,
    .img_box_right img{float:none;margin:0 auto;}
</style>


<div id="references">
    <div class="toggle_container w600">                
        <div class="block">
            <h2>Reference</h2>
            <ul class="tabs">
                <li><a href="#zavody">Závody</a></li>
                <li><a href="#treninky">Tréninky</a></li>
            </ul>

            <div class="tab_container">
                <div id="zavody" class="tab_content">                        
                    <div class="reference">
                        <div class="img_box_left">
                            <img src="/img/krapkap/jawa_logo.jpg" />
                        </div>
                        <div class="text_box_right">
                            <h3>KřápKap Třemošná <small><a href="http://www.jawa50zavody.wz.cz/tremosna.htm" rel="external" target="_blank">www</a></small></h3>
                            <ul>                                    
                            <li>Závody poionýrů Jawa 50 a vložený závod Pitbike</li>
                            <li>5 kategorií - rozjížďky + finále</li>
                            <li>shrnutí závodu v <a href="/zavod/krapkap-tremosna-2011/galerie">televizním spotu a fotografiích</a></li>                                    
                            </ul>
                        </div>
                        <div class="cistic"></div>
                    </div>
                    <div class="reference">
                        <div class="text_box_left">
                            <h3>Horažďovické kolo</h3>
                            <ul>                                    
                            <li>9. závod seriálu Pošumavská liga horských kol</li>
                            <li>závod v centru Horažďovic - historické náměstí</li>
                            <li>upoutávka v <a href="http://klatovsky.denik.cz/ostatni_region/horazdovicke-kolo-vyhral-o-pet-vterin-reeh-.html" rel="external" target="_blank">klatovském deníku</a></li>                                    
                            </ul>
                        </div>
                        <div class="img_box_right">
                            <img src="/img/horazdovice/horazdovice.png" />
                        </div>
                        <div class="cistic"></div>
                    </div>
                    <div class="reference">
                        <div class="img_box_left">
                            <img src="/img/stupno/author_team_stupno_35_r2.jpg" />
                        </div>
                        <div class="text_box_right">
                            <h3>Author MTB kritérium Stupno <small><a href="http://www.authorteam.cz/" rel="external" target="_blank">www</a></small></h3>
                            <ul>                                    
                            <li>finálový závod Poháru Plzeňského kraje <a href="http://www.beckercup.wgz.cz" rel="external" target="_blank">Becker Cup</a> </li>
                            <li>open Mistrovství Plzeňského kraje</li>
                            <li>Na video od MOABu se můžete podívat <a href="/zavod/author-mtb-stupno/galerie">ZDE</a></li>
                            <li>18 kategorií s prolínanými starty</li>                                    
                            </ul>
                        </div>

                        <div class="cistic"></div>
                    </div>
                    <div class="reference">
                        <div class="text_box_left">
                            <h3>Kralovický MTB Maraton <small><a href="http://bck.webnode.cz/maraton/" rel="external" target="_blank">www</a></small></h3>
                            <ul>
                            <li>tratě 25, 50 a 90Km</li>
                            <li>13 kategorií</li>
                            <li>téměř 300 závodníků</li>
                            </ul>
                        </div>
                        <div class="img_box_right">
                            <img src="/img/kralovice/bikeclub_kralovice_100.jpg" />
                        </div>
                        <div class="cistic"></div>
                    </div>
                    <div class="reference">
                        <div class="img_box_left">
                            <img src="/img/blizak/bcg-2010_vyrez_small.jpg" />
                        </div>
                        <div class="text_box_right">
                            <h3>Sázavský Blizák <small><a href="http://www.blizak.cz" rel="external" target="_blank">www</a></small></h3>                                    
                            <p>80km deroucích se po stráních od řeky Sázavy vzhůru aby se ve sjezdech zase vracely zpět. To je prošpikováno několika brody přes sázavské přítoky, pěšinkami, lesními cestami a tu a tam nějakým asfaltem</p>
                            <li>12 kategorií s hromadným startem</li>
                            <li>přes 300 závodníků</li>
                        </div>
                        <div class="cistic"></div>
                    </div>
                </div><!-- tab zavody -->

                <div id="treninky" class="tab_content">  
                    <div class="reference">
                        <div class="text_box_left">
                            <h3>Atletický oddíl OSTRAVA-PORUBA <small><a href="http://www.atletikaporuba.cz/" rel="external" target="_blank">www</a></small></h3>
                            <ul>                                    
                            <li>380 atletů a téměř 20 trenérů</li>
                            <li>kompletní časomíra pro měření tréninkových dávek</li>
                            <li>aplikace pro vyhodnocení a sběr výsledků</li>                                    
                            </ul>
                        </div>
                        <div class="img_box_right">
                            <img src="/img/poruba/atletika-poruba3.jpg" />
                        </div>
                        <div class="cistic"></div>
                    </div>
                    <div class="reference">   
                        <div class="img_box_left">
                            <img src="/img/icons/referee_small.gif" />
                        </div>
                        <div class="text_box_right">
                            <h3>Rozhodčí 1. a 2. Gambrinus liga</a></h3>
                            <li>povinné kondiční testy rozhodčích</li>
                            <li>40-ti metrová trať s metrovým náběhem</li>
                        </div>

                        <div class="cistic"></div>
                    </div>

                    <div class="reference">
                        <div class="text_box_left">
                            <h3>Atletický trénink extraligového oddílu AC Tepo Kladno</a></h3>
                            <li>atletický tréninky mistra republiky Honzy Hanzla.</li>
                            <li>60-ti metrové měřené úseky</li>
                        </div>                                    
                        <div class="img_box_right">
                            <img src="/img/icons/atletika_small.jpg" />
                        </div>
                        <div class="cistic"></div>
                    </div>                            
                </div> <!-- tab treninky -->
            </div>  <!-- tab_container  -->
            <div class="cistic"></div>
        </div><!-- block  -->
    </div><!-- toggle_container  -->
 </div><!-- reference  -->