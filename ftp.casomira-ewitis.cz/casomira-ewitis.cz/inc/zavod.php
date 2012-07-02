<?php

    $competitions = Competition::GetAll();
    
    //z url najdu zavod
    foreach($competitions as $competition){        
        if(Utils::friendly_url($competition['name']) == $_GET["n"])
                break;
    }
           
    $categories = Kategory::GetParCompetitionId($competition['id']);
    //z url najdu kategorii   
    foreach($categories as $category){        
        if(Utils::friendly_url($category['name']) == $_GET["fk"])
                break;
        $category['id'] = NULL;
    }    
       
    $users_count_paid = User::GetCount($competition['id'], $category['id'], 1);
    $users_count_nopaid = User::GetCount($competition['id'], $category['id'], $paid_filtr=0);
       
    /* $nr_tab je pouzita v javasriptu pro vybrani zalozky */
    $nr_tab = 0;
    switch($_GET["t"]){
      case "zavod":
        $nr_tab = 0;
        break;
      case "kategorie":    
        $nr_tab = 1;
        break;
      case "registrace":    
        $nr_tab = 2;
        break;
      case "zavodnici":    
        $nr_tab = 3;
        break;
      case "vysledky":
        ($categories)?$nr_tab = 4:$nr_tab = 1;
        break;
      case "galerie":    
        $nr_tab = 5;
        break;      
    }

?>



<style type="text/css">
    #filter span{padding-left:2em;}
    #tab_galerie{text-align: center;}    
    ul.tabs li{font-size: 80%;}    
</style>

<?=($confirm != '') ? "<h3 class=\"confirm\">$confirm</h3>" : '';?>
<?=($report != '') ? "<h3 class=\"report\">$report</h3>" : '';?>

    <div id="zavod">            
        <div class="toggle_container w600">
            <div class="block">
                <h2><?=$competition['name']?></h2>                
                <ul class="tabs">
                      <li><a href="#ozavode">O závodě</a></li>
                      <? if($categories){?>                                
                      <li><a href="#kategorie">Kategorie</a></li>                                                                           
                      <li><a href="#registrace">Registrace</a></li>                                        
                      <li><a href="#zavodnici">Závodníci</a></li>
                      <?}?>
                      
                      <? if($competition['results']){?>
                      <li><a href="#vysledky">Výsledky</a></li>
                      <?}?>
                      
                      <? if($competition['galerie']){?>
                      <li><a href="#galerie">Galerie</a></li>
                      <?}?>
                </ul>
                   
                <div class="tab_container">
                    <div id="ozavode" class="tab_content">                        
                        <p><b>kdy: </b><?=$competition['date']?></p>
                        <p><b>kde: </b><?=$competition['place']?></p>                                    
                        <div class="size90">
                            <?if($competition['img_1'] != NULL){?>
                                <img src="<?=$competition['img_1']?>">
                            <?}?>
                            <?=common_processTexy($competition['desc'])?></div>
                    </div>
                    <? if($categories){?> 
                    <div id="kategorie" class="tab_content">                                   
                        Závod je rozdělen do následujících kategorií:
                        <?=Competition::Html_tableKategories($competition['id']);?>
                        <?=common_processTexy($competition['desc_cash'])?>
                    </div>
                                                       
                    <div id="registrace" class="tab_content">        
                        <?=common_processTexy($competition['desc_reg'])?>
                        
                        <big class="size150"><a href="/registrace/<?=Utils::friendly_url($competition['name'])?>" class="btnC">Registrovat  &raquo;</a></big>
                        <div class="cistic"></div>                                
                    </div>
                                                 
                    <div id="zavodnici" class="tab_content">  
                        <h3>Seznam plně registrovaných závodníků</h3>
                        <div class="size90">
                        Plná registrace sestává ze dvou kroku
                        <ol>
                            <li>Registrace na našem webu
                            <li>Potvrzení Vašeho zaplacení od organizátora závodu
                        </ol>
                        </div>
                        <br />
                        
                         <div id="filter">
                            <form action="/redirect.php" method="get">
                            <input type="hidden" name="p" value="<?=$_GET['p'];?>" />
                            <input type="hidden" name="n" value="<?=$_GET['n'];?>" />                                   
                            <input type="hidden" name="t" value="zavodnici" />
                            
                            <label>Kategorie:</label>
                            <select name="fk" onChange="this.form.submit()" class="size90">
                                <option value="">- - -</option>

                                <?foreach($categories as $aux_category){?>
                                    <option value="<?=Utils::friendly_url($aux_category['name'])?>" <?=($_GET["fk"] == Utils::friendly_url($aux_category['name'])) ? 'selected':''?>><?=$aux_category['name']?></option>
                                <?}?>
                            </select>
                            <span> Počet závodníku: <?=$users_count_paid['pocet']?></span>
                            </form>                                    
                         </div>
                        <?                                 
                         Competition::Html_tableUsers($competition, $category['id'], 1);
                         ?>
                        
                        <h3>Seznam závodníku s nepotvrzenou registrací</h3>
                        
                        <div id="filter2">
                            <form action="/redirect.php" method="get">
                            <input type="hidden" name="p" value="<?=$_GET['p'];?>" />
                            <input type="hidden" name="n" value="<?=$_GET['n'];?>" />
                            <input type="hidden" name="t" value="zavodnici" />

                            <label>Kategorie:</label>
                            <select name="fk" onChange="this.form.submit()" class="size90">
                                <option value="">- - -</option>

                                <?foreach($categories as $aux_category){?>
                                    <option value="<?=Utils::friendly_url($aux_category['name'])?>" <?=($_GET["fk"] == Utils::friendly_url($aux_category['name'])) ? 'selected':''?>><?=$aux_category['name']?></option>
                                <?}?>
                            </select>
                            <span> Počet závodníku: <?=$users_count_nopaid['pocet']?></span>
                            </form>
                        </div>
                        
                        <?
                         Competition::Html_tableUsers($competition, $category['id'], 0);
                        ?>
                    </div>
                    <?}?>
                          
                    <? if($competition['results']){?>
                    <div id="vysledky" class="tab_content">                        
                        <?=common_processTexy($competition['results'])?>
                    </div>
                    <?}?>
                    
                    <? if($competition['galerie']){?>
                    <div id="galerie" class="tab_content">
                        <?=common_processTexy($competition['galerie'])?>
                    </div>
                    <?}?>                
                </div><!-- tab_container -->
                <div class="cistic"></div>
            </div><!-- block -->
        </div><!-- toggle_container -->
    </div><!-- zavod -->
