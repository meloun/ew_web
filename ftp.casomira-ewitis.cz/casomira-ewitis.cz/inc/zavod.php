<?php
    $competition = Competition::Get($_GET['cid']);
    //var_dump($competition);
    $kategories = Kategory::GetParCompetitionId($_GET['cid']);
    //var_dump($kategories);
    $FILTER_KATEGORY = $_GET["fk"];

    $users_count_paid = User::GetCount($competition['id'], $FILTER_KATEGORY, 1);
    $users_count_nopaid = User::GetCount($competition['id'], $FILTER_KATEGORY, $paid_filtr=0);
       
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
        $nr_tab = 4;
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
                      <? if($kategories){?>                                
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
                    <? if($kategories){?> 
                    <div id="kategorie" class="tab_content">                                   
                        Závod je rozdělen do následujících kategorií:
                        <?=Competition::Html_tableKategories($competition['id']);?>
                        <?=common_processTexy($competition['desc_cash'])?>
                    </div>
                                                       
                    <div id="registrace" class="tab_content">        
                        <?=common_processTexy($competition['desc_reg'])?>
                        
                        <big class="size150"><a href="?p=registrace&cid=<?=$competition['id']?>" class="btnC">Registrovat  &raquo;</a></big>
                        <div class="cistic"></div>                                
                    </div>
                                                 
                    <div id="zavodnici" class="tab_content">  
                        <h3><small>Seznam plně registrovaných závodníků</small></h3>
                        <div class="size90">
                        Plná registrace sestává ze dvou kroku
                        <ol>
                            <li>Registrace na našem webu
                            <li>Potvrzení Vašeho zaplacení od organizátora závodu
                        </ol>
                        </div>
                        <br />
                        
                         <div id="filter">
                            <form action="" method="get">
                            <input type="hidden" name="p" value="<?=$_GET['p'];?>" />
                            <input type="hidden" name="cid" value="<?=$_GET['cid'];?>" />                                   
                            <input type="hidden" name="tab" value="3" />
                            
                            <label>Kategorie:</label>
                            <select name="fk" onChange="this.form.submit()" class="size90">
                                <option value="">- - -</option>

                                <?foreach($kategories as $kategory){?>
                                    <option value="<?=$kategory['id']?>" <?=($FILTER_KATEGORY == $kategory['id']) ? 'selected':''?>><?=$kategory['name']?></option>
                                <?}?>
                            </select>
                            <span> Počet závodníku: <?=$users_count_paid['pocet']?></span>
                            </form>                                    
                         </div>
                        <?                                 
                         Competition::Html_tableUsers($competition, $FILTER_KATEGORY, 1);
                         ?>
                        
                        <h3><small>Seznam závodníku s nepotvrzenou registrací</small></h3>
                        
                        <div id="filter2">
                            <form action="" method="get">
                            <input type="hidden" name="p" value="<?=$_GET['p'];?>" />
                            <input type="hidden" name="cid" value="<?=$_GET['cid'];?>" />
                            <input type="hidden" name="tab" value="3" />

                            <label>Kategorie:</label>
                            <select name="fk" onChange="this.form.submit()" class="size90">
                                <option value="">- - -</option>

                                <?foreach($kategories as $kategory){?>
                                    <option value="<?=$kategory['id']?>" <?=($FILTER_KATEGORY == $kategory['id']) ? 'selected':''?>><?=$kategory['name']?></option>
                                <?}?>
                            </select>
                            <span> Počet závodníku: <?=$users_count_nopaid['pocet']?></span>
                            </form>
                        </div>
                        
                        <?
                         Competition::Html_tableUsers($competition, $FILTER_KATEGORY, 0);
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
