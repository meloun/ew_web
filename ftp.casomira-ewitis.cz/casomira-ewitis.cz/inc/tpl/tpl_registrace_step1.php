<div class="toggle_container">
    <div class="block">
        <h3><?=$competition['name']?> - <span>Registrace závodníka (1/2)</span></h3>
        <form action="" method="post">
            <input type="hidden" name="noheader" value="1">
            <p>
                <label><span class="povinne">*</span>Jméno</label>
                <input type="text" name="first_name" value="<?=$_POST['first_name']?>">
            </p>

            <p>
                <label><span class="povinne">*</span>Příjmení</label>
                <input type="text" name="last_name" value="<?=$_POST['last_name']?>">
            </p>

            <p>
                <label><span class="povinne">*</span>Email</label>
                <input type="text" size="30" name="email" value="<?=$_POST['email']?>">
            </p>

            <p>
                <label><span class="povinne">*</span>Pohlaví</label>
                <input type="radio" name="sex" value="1" <?=( $_POST['sex']=='1') ? 'checked' : ''?>>muž
                <input type="radio" name="sex" value="2" <?=( $_POST['sex']=='2') ? 'checked' : ''?>>žena
            </p>
            
            <p>
                <label><span class="povinne">*</span>Rok narození</label>
                <select name="year">
                    <option value="1940">1940</option>
                    <option value="1941">1941</option>
                    <option value="1942">1942</option>
                    <option value="1943">1943</option>
                    <option value="1944">1944</option>
                    <option value="1945">1945</option>
                    <option value="1946">1946</option>
                    <option value="1947">1947</option>
                    <option value="1948">1948</option>
                    <option value="1949">1949</option>
                    <option value="1950">1950</option>
                    <option value="1951">1951</option>
                    <option value="1952">1952</option>
                    <option value="1953">1953</option>
                    <option value="1954">1954</option>
                    <option value="1955">1955</option>
                    <option value="1956">1956</option>
                    <option value="1957">1957</option>
                    <option value="1958">1958</option>
                    <option value="1959">1959</option>
                    <option value="1960">1960</option>
                    <option value="1961">1961</option>
                    <option value="1962">1962</option>
                    <option value="1963">1963</option>
                    <option value="1964">1964</option>
                    <option value="1965">1965</option>
                    <option value="1966">1966</option>
                    <option value="1967">1967</option>
                    <option value="1968">1968</option>
                    <option value="1969">1969</option>
                    <option value="1970">1970</option>
                    <option value="1971">1971</option>
                    <option value="1972">1972</option>
                    <option value="1973">1973</option>
                    <option value="1974">1974</option>
                    <option value="1975">1975</option>
                    <option value="1976">1976</option>
                    <option value="1977">1977</option>
                    <option value="1978">1978</option>
                    <option value="1979">1979</option>
                    <option value="1980">1980</option>
                    <option value="1981">1981</option>
                    <option value="1982" selected>1982</option>
                    <option value="1983">1983</option>
                    <option value="1984">1984</option>
                    <option value="1985">1985</option>
                    <option value="1986">1986</option>
                    <option value="1987">1987</option>
                    <option value="1988">1988</option>
                    <option value="1989">1989</option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>                    
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                </select>
            </p>

            
            <?if($competition['user_field_1_name'] != NULL){?>
                <p>
                    <label><?=$competition['user_field_1_duty'] ? '<span class="povinne">*</span>' : ''?><?=$competition['user_field_1_name']?> </label>
                    <input type="text" size="40" name="user_field_1" value="<?=$_POST['user_field_1']?>">
                </p>
            <?}?>
            <div class="cistic"></div>
            
            <?if($competition['user_field_2_name'] != NULL){?>
                <p>
                    <label><?=$competition['user_field_2_duty'] ? '<span class="povinne">*</span>' : ''?><?=$competition['user_field_2_name']?> </label>
                    <input type="text" size="40" name="user_field_2" value="<?=$_POST['user_field_2']?>">
                </p>
            <?}?>
            <div class="cistic"></div>

            <?if($competition['user_field_3_name'] != NULL){?>
            <p>
                <label><?=$competition['user_field_3_duty'] ? '<span class="povinne">*</span>' : ''?><?=$competition['user_field_3_name']?> </label>
                <input type="text" size="40" name="user_field_3" value="<?=$_POST['user_field_3']?>">
            </p>
            <?}?>
            <div class="cistic"></div>
            <?if($competition['user_field_4_name'] != NULL){?>
                <p>
                    <label><?=$competition['user_field_4_duty'] ? '<span class="povinne">*</span>' : ''?><?=$competition['user_field_4_name']?> </label>
                    <input type="text" size="40" name="user_field_4" value="<?=$_POST['user_field_4']?>">
                </p>
            <?}?>
            <div class="cistic"></div>
            <p>
                <label><span class="povinne">*</span>1 + 1 =<br/><span>(antispam)</span></label>
                <input type="text" name="antispam" value="" size="1" />
            </p>


            <input type="submit" name="submit_step1" class="size150 submit"  value="<?=SUBMIT_STEP1?>">
        </form>

        <br />
        <p>
        <label><span class="povinne">*</span> - Povinné položky</label>
        </p>
        
        <div class="cistic"></div>
    </div>
</div>
    