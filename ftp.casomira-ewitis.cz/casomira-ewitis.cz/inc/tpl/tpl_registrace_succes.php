<?php
?>

<div class="toggle_container">
    <div class="block">

    <h2><?=$competition['name']?></h2>
    <div>
        <?=Ewitis::getUserString($_POST, $competition);?>        
    </div>

    <br />
    
    <div>
        <?=Ewitis::getPayString($_POST, $competition);?>
        <p> Poznamenejte si platební údaje, případně zkontrolujte, zda Vám byly záslány na Váš email.</p>
    </div>
    
    <br/>

    </div>
</div>
