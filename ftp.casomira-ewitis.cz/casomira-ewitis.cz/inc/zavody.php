<?
    $subtitle = "Registrace";
    $competitions = Competition::GetAll();
?>
<style type="text/css">    

</style>
<div id="zavody">
     <div class="toggle_container w600">
            <div class="block">
                <h2>Závody</h2>
                <table id="tablesorter-demo" class="tablesorter" cellpadding="0" cellspacing="1">
                    <thead>
                        <tr>
                            <th class="id">nr</th>
                            <th>jméno</th>
                            <th>datum</th>
                            <th>místo</th>
                            <th>R</th>
                        </tr>
                    </thead>
                    <tbody>
                <?foreach($competitions as $competition){?>
                        <tr>
                            <td class="id"><?=$competition['id']?></td>
                            <td class="name"><a href="/zavod/<?=Utils::friendly_url($competition['name']);?>"><?=$competition['name']?></a></td>
                            <td><?=$competition['date']?></td>
                            <td><?=$competition['place']?></td>
                            
                            <? if($competition['registration_en']){ ?>
                                <td><a href="/registrace/<?=Utils::friendly_url($competition['name']);?>"><strong>Registrace &raquo;</strong></a></td>
                            <?}else if($competition['results']){ ?>
                                <td><a href="/zavod/<?=Utils::friendly_url($competition['name']);?>/vysledky"><strong>Výsledky &raquo;</strong></a></td>
                            <?}?>
                        </tr>
                <?}?>
                    </tbody>
                </table>

            </div>
        </div>
</div>




