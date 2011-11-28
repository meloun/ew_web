<?php
    $competition = Competition::Get($_GET['cid']);
    //var_dump($competition);
    $kategories = Kategory::GetParCompetitionId($_GET['cid']);
    //var_dump($kategories);
    $FILTER_KATEGORY = $_GET["fk"];

    $users_count_paid = User::GetCount($competition['id'], $FILTER_KATEGORY, 1);
    $users_count_nopaid = User::GetCount($competition['id'], $FILTER_KATEGORY, $paid_filtr=0);

?>



<style type="text/css">
    #filter span{padding-left:2em;}
    #tab_galerie{text-align: center;}    
</style>


<?=($confirm != '') ? "<h3 class=\"confirm\">$confirm</h3>" : '';?>
<?=($report != '') ? "<h3 class=\"report\">$report</h3>" : '';?>

    <div id="zavod">
            
            <div class="toggle_container w600">
		<div class="block">
                            <h2><?=$competition['name']?></h2>
                            <ul class="tabnav">
                                <li><a href="#tab_ozavode">O závodě</a></li>
                                
                                <? if($kategories){?>                                
                                <li><a href="#tab_kategorie">Kategorie</a></li>                                                                           
                                <li><a href="#tab_registrace">Registrace</a></li>                                        
                                <li><a href="#tab_zavodnici">Závodníci</a></li>
                                <?}?>
                                
                                <? if($competition['results']){?>
                                <li><a href="#tab_vysledky">Výsledky</a></li>
                                <?}?>
                                
                                <? if($competition['galerie']){?>
                                <li><a href="#tab_galerie">Galerie</a></li>
                                <?}?>
                            </ul>
                            
                            <div id="tab_ozavode" class="tabdiv" >

                                    <p><b>kdy: </b><?=$competition['date']?></p>
                                    <p><b>kde: </b><?=$competition['place']?></p>                                    
                                    <div class="size90">
                                        <?if($competition['img_1'] != NULL){?>
                                            <img src="<?=$competition['img_1']?>">
                                        <?}?>
                                        <?=common_processTexy($competition['desc'])?></div>
                            </div>
                            
                            <? if($kategories){?> 
                            <div id="tab_kategorie" class="tabdiv">                                
                                Závod je rozdělen do následujících kategorií:
                                <?=Competition::Html_tableKategories($competition['id']);?>
                                <?=common_processTexy($competition['desc_cash'])?>


                            </div>
                           
                            
                            <div id="tab_registrace" class="tabdiv">
                                <?=common_processTexy($competition['desc_reg'])?>
                                
                                <big class="size150"><a href="?p=registrace&cid=<?=$competition['id']?>" class="btnC">Registrovat  &raquo;</a></big>
                                <div class="cistic"></div>                                
                            </div>
                             
                            <div id="tab_zavodnici" class="tabdiv">
                                <h3><small>Seznam plně registrovaných závodníků</small></h3>
                                <div class="size90">
                                Plná registrace sestává ze dvou kroků
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
                                    <span> Počet závodníků: <?=$users_count_paid['pocet']?></span>
                                    </form>                                    
                                 </div>
                                <?                                 
                                 Competition::Html_tableUsers($competition, $FILTER_KATEGORY, 1);
                                 ?>
                                
                                <h3><small>Seznam závodníků s nepotvrzenou registrací</small></h3>
                                
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
                                    <span> Počet závodníků: <?=$users_count_nopaid['pocet']?></span>
                                    </form>
                                 </div>
                                
                                <?
                                 Competition::Html_tableUsers($competition, $FILTER_KATEGORY, 0);
                                ?>
                            </div>
                            <?}?>
                            
                            <? if($competition['results']){?>
                            <div id="tab_vysledky" class="tabdiv" >
                                <?=common_processTexy($competition['results'])?>
                            </div>
                            <?}?>
                            
                            <? if($competition['galerie']){?>
                            <div id="tab_galerie" class="tabdiv" >
                                <?=common_processTexy($competition['galerie'])?>
                            </div>
                            <?}?>
                
		</div>
	</div>
    </div>

