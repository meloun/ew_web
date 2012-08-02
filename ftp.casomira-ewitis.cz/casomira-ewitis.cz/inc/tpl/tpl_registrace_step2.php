<?
    $kategories = Kategory::GetParCompetitionId($competition['id']);
?>
<div class="toggle_container w600">
    <div class="block">
        <h3><?=$competition['name']?> - <span>Registrace závodníka (2/2)</span></h3>
        <b class="size120">Vyberte Kategorii</b>
       <form action="" method="post">
           <input type="hidden" name="first_name" value="<?=$_POST['first_name']?>">
           <input type="hidden" name="last_name" value="<?=$_POST['last_name']?>">
           <input type="hidden" name="email" value="<?=$_POST['email']?>">
           <input type="hidden" name="year" value="<?=$_POST['year']?>">
           <input type="hidden" name="sex" value="<?=$_POST['sex']?>">
           <input type="hidden" name="sex" value="<?=$_POST['sex']?>">
           <input type="hidden" name="user_field_1" value="<?=$_POST['user_field_1']?>">
           <input type="hidden" name="user_field_2" value="<?=$_POST['user_field_2']?>">
           <input type="hidden" name="user_field_3" value="<?=$_POST['user_field_3']?>">
           <input type="hidden" name="user_field_4" value="<?=$_POST['user_field_4']?>">
           <input type="hidden" name="antispam" value="<?=$_POST['antispam']?>">


           <?Competition::Html_tableKategories($competition['id'], $_POST['sex'], $_POST['year']);?>
           
         <div>
            <?=common_processTexy($competition['desc_cash'])?>
        </div>       
        <input type="submit" name="submit_step2" class="size150 submit" value="<?=SUBMIT_STEP2?>">
        </form>

    </div>
</div>