
<div class="main_crm">
            <div class="main_crm_parent">

                <div class="bread">
                    <a class="bread_element" href="/admin/system/users/user/">Список пользователей</a>
                    <a class="bread_element">Добавление пользователя</a>
                </div>

                    <div class="main_crm_content margin_20px_top ">
                    <div class="wrap_contant margin_10_30 linear_spase_between">
                    <h3 class="main_crm_content_h3">Добавление пользователя</h3>
                        <a class="icon_button blue" href="/admin/system/users/user/add/">
                            <img src="/src/admin/img/add-square.svg" alt="">
                            Обновить
                        </a>
                        
                    </div>
                </div>



                
                    <div class="stroka_info">                        
                        <div class="stroka_element_no_scroll"><br>
                        <?php
foreach($h["user"]["error"] as $item_error){
    if($item_error == "no") continue;
    echo "<div style='color:red; margin-left:35px;'>".$item_error.'</div><br>';
}
   if(isset($h["group"]["error"])) echo "<div style='color:red; margin-left:35px;'>".$h["group"]["error"] .'</div><br>';

?>
 <?php
$table_inc_group = '
<option value="1">Новый</option>
<option value="2">Почта подтверждена</option>
<option value="3">Заблокирован</option>


';
$table_inc  ="";
foreach($h["admin"]["user"]["group_list"] as $item){
    $table_inc .= '<option value="'.$item["group_name"].'">'.$item["name_ru"].'</option>';
}
$val1_def = "";
$val2_def = "";
$val3_def = "";
$val1_def2 = "";
$val2_def2 = "";
$val3_def2 = "";
$html = '
                                <div class="wrap_contant margin_30_l_r">
                                    <div class="parent_inp parent_inp_floating width_520">
                                        <input class="parent_inp_input" type="text" name="%name1%" placeholder="Admin" value="%val1%">
                                        <label class="parent_inp_label" for="text">[en] Логин</label>
                                    </div>  
                                    <div class="parent_inp parent_inp_floating width_520">
                                        <input class="parent_inp_input" type="email" name="%name2%" placeholder="admin@exemple.ru" value="%val2%">
                                        <label class="parent_inp_label" for="text">Электронная почта</label>
                                    </div>  
                                </div>  
';

$html2 = '
                                <div class="wrap_contant margin_30_l_r">
                                    <div class="parent_inp parent_inp_floating width_520">
                                        <input class="parent_inp_input" type="password" name="%name1%" placeholder="************" value="%val1%">
                                        <label class="parent_inp_label" for="text">Пароль</label>
                                    </div>  
                                    <div class="parent_inp parent_inp_floating width_520">
                                        <select name="%name2%" id=""  class="parent_inp_input" value="">
                                                    <option value="0">Без группы</option>'.$table_inc.'
                                        </select>
                                        <label class="parent_inp_label" for="text">Группа</label>
                                    </div>  
                                    
                                </div>  
';
$html3 = '
                                <div class="wrap_contant margin_30_l_r">
                                    <div class="hd" style="display: none;">
                                        <input class="parent_inp_input" type="hidden" name="%name1%" placeholder="************" value="%val1%">
                                    </div>  
                                    <div class="parent_inp parent_inp_floating width_520">
                                        <select name="%name2%" id=""  class="parent_inp_input" value="">
                                                    '.$table_inc_group.'
                                        </select>
                                        <label class="parent_inp_label" for="text">Статус</label>
                                    </div>  
                                    
                                </div>  
';
$f = new \Mod\Tools\Modul\Forma;
$f->init($h, "post", "/admin/system/users/user/add/", "", "");
$f->add_block_2($h,$html,'login',$val1_def,'mail',$val2_def);
$f->add_block_2($h,$html2,'password',$val1_def2,'roll',$val2_def2);
$f->add_block_2($h,$html3,'block',$val3_def,'status',$val3_def2);
$f->add_button($h, "add_user", "crm_button blue", "", "yes", "Сохранить");
$f->completion_block_2($h);
$f->build_block_2($h);
$f->custom($h, '<div class="parent_btn  margin_30_l_r">');
$f->add_html($h, '</div>');
$f->buils($h);
echo $f->build; 

?>       


                           
                                         
                        </div>                                                    
                    </div>

            </div>
        </div>
