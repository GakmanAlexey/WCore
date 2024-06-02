
<div class="main_crm">
            <div class="main_crm_parent">

                <div class="bread">
                    <a class="bread_element" href="/admin/system/users/user/">Список Пользователей</a>
                    <a class="bread_element">Удаление пользователя</a>
                </div>

                    <div class="main_crm_content margin_20px_top ">
                    <div class="wrap_contant margin_10_30 linear_spase_between">
                    <h3 class="main_crm_content_h3">Подтверждение удаление пользователя</h3>
                        <a class="icon_button blue" href="/admin/system/users/user/add/">
                            <img src="/src/admin/img/add-square.svg" alt="">
                            Создать нового пользователя
                        </a>
                        
                    </div>
                </div>



                
                    <div class="stroka_info">                        
                        <div class="stroka_element_no_scroll"><br>

 <?php
$f = new \Mod\Tools\Modul\Forma;
$f->init($h, "post", "/admin/system/users/user/delet/", "", "");
$f->add_input($h, "id", "hidden", "input", "","", $h["url"]["get"]["id"]);
$f->add_button($h, "go_del", "crm_button red", "", "yes", "Удалить");
$f->completion_block_2($h);
$f->build_block_2($h);
$f->completion($h);
$f->custom($h, '<div class="parent_btn  margin_30_l_r">');
$f->add_html($h, '</div>');
$f->buils($h);
echo $f->build; 

?>       


                           
                                         
                        </div>                                                    
                    </div>

            </div>
        </div>
