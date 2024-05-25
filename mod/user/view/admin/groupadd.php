
<div class="main_crm">
            <div class="main_crm_parent">

                <div class="bread">
                    <a class="bread_element" href="/admin/users/group/">Список Групп</a>
                    <a class="bread_element">Добавление группы</a>
                </div>

                    <div class="main_crm_content margin_20px_top ">
                    <div class="wrap_contant margin_10_30 linear_spase_between">
                    <h3 class="main_crm_content_h3">Добавление группы</h3>
                        
                    </div>
                </div>



                
                    <div class="stroka_info">                        
                        <div class="stroka_element_no_scroll">


<?php
$val1_def = "";
$val2_def = "";
$html = '
                                <div class="wrap_contant margin_30_l_r">
                                    <div class="parent_inp parent_inp_floating width_520">
                                        <input class="parent_inp_input" type="text" name="%name1%" placeholder="Moderator" value="%val1%">
                                        <label class="parent_inp_label" for="text">[en] Серверное название группы</label>
                                    </div>  
                                    <div class="parent_inp parent_inp_floating width_520">
                                        <input class="parent_inp_input" type="text" name="%name2%" placeholder="Модератор" value="%val2%">
                                        <label class="parent_inp_label" for="text">Локализация</label>
                                    </div>  
                                </div>  
';
$f = new \Mod\Tools\Modul\Forma;
$f->init($h, "post", "/admin/users/group/add/", "", "");
$f->add_block_2($h,$html,'group_name',$val1_def,'name_ru',$val2_def);
$f->add_block_2($h,$html,'group_name2',$val1_def,'name_ru2',$val2_def);
$f->add_button($h, "go_auth", "crm_button blue", "", "yes", "Сохранить");
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
