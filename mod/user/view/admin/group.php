
<div class="main_crm">
            <div class="main_crm_parent">

                <div class="bread">
                    <a class="bread_element">Группы</a>
                </div>

                <div class="main_crm_content margin_20px_top ">
                    <div class="wrap_contant margin_10_30 linear_spase_between">
                    <h3 class="main_crm_content_h3">Группы</h3>
                    </div>
                </div>



                
                    <div class="stroka_info">
                        <div class="stroka_info_title">
                                <div class="stroka_redactor_uprav"></div>
                                <div class="stroka_redactor_id stroka_text_title">ID</div>
                                <div class="stroka_redactor_name stroka_text_title stroka_text_elem_2in">Название</div>
                                <div class="stroka_redactor_dopoln stroka_text_title stroka_text_elem_2in">Префикс</div>
                                <div class="redact_3">
                                </div>
                        </div>
 <?php
 //   var_dump($h["user_list"]);
?>
                        <div class="stroka_element_no_scroll">
<?php
$x = 0;
foreach($h["admin"]["user"]["group_list"] as $item){
    echo '
    <div class="stroka_element">
                                <div class="stroka_redactor_uprav">
                                    <label class="parent_chek" for="checkbox">
                                        <input class="checkbox" type="checkbox" name="checkbox">
                                    </label>
                                    <a class="img_link" href=""><img src="/src/admin/img/circ_three.svg" alt=""></a>
                                </div>                                
                                <div class="stroka_redactor_id stroka_text_elem">#'.$item["id"].'</div>
                                <div class="stroka_redactor_name stroka_text_elem stroka_text_elem_2in">'.$item["name_ru"].'</div>
                                <div class="stroka_redactor_dopoln stroka_text_elem stroka_text_elem_2in">'.$item["prefix"].'</div>
                                <div class="redact_3">
                                    <a href="/admin/users/group/edit/?id='.$item["id"].'"><img src="/src/admin/img/redact.svg" alt=""></a>
                                    <a href="//admin/users/group/delet/"?id='.$item["id"].'"><img src="/src/admin/img/delet.svg" alt=""></a>
                                  
                                </div>
                            </div>
    
    
    ';
    $x++;
}
if($x == 0){
    echo '
    <div class="stroka_element">Записи не найдены</div>
    ';
}



$j = 0;
while($j < 153){
    $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `group_list` (
        group_name,
        name_ru,
        prefix,
        ico
        ) VALUES ( ?,?,?,?)');
    $sth->execute(array(
        "test",
        "test",
        "test",
        "test"
    ));
    $j++;
}
?>
                            
                                                     
                        </div>                                                    
                    </div>

                    
                <div class="main_crm_content">
                    <div class="linear_spase_between">
                        <div class="wrap_element_flex">
                            

                            <p class="element_text_value">Всего страниц: 1</p>
                        </div>

                        
                        <div class="wrap_element_flex">
                            <div class="pagination">
                                <a href="" class="pagination_element"><img src="/src/admin/img/pagi_left.svg" alt=""></a>
                                <a href="" class="pagination_element">1</a>
                                <a href="" class="pagination_element"><img src="/src/admin/img/pagi_right.svg" alt=""></a>
                                <a href="" class="pagination_element">...</a>
                            </div>

                        </div>
                    </div>
                </div>





 <!--- 
                
                <div class="main_crm_content margin_20px_top ">
                    <div class="wrap_contant margin_10_30 linear_spase_between">
                    <h3 class="main_crm_content_h3">Пользовательские страницы</h3>
                        <a class="icon_button blue" href="/admin/shop/kategor/addcategor/">
                            <img src="/src/admin/img/add-square.svg" alt="">
                            Добавить страницу
                        </a>
                    </div>
                </div>



              
                    <div class="stroka_info">
                        <div class="stroka_info_title">
                                <div class="stroka_redactor_uprav"></div>
                                <div class="stroka_redactor_image_box"></div>
                                <div class="stroka_redactor_id stroka_text_title">ID</div>
                                <div class="stroka_redactor_name stroka_text_title">Название</div>
                                <div class="stroka_redactor_dopoln stroka_text_title">ЮРЛ блок</div>
                                <div class="stroka_redactor_dopoln stroka_text_title">Количество продуктов</div>
                                <div class="redact_3">
                                </div>
                        </div>
                        <div class="stroka_element_no_scroll">

                            <div class="stroka_element">
                                <div class="stroka_redactor_uprav">
                                    <label class="parent_chek" for="checkbox">
                                        <input class="checkbox" type="checkbox" name="checkbox">
                                    </label>
                                    <a class="img_link" href=""><img src="/src/admin/img/circ_three.svg" alt=""></a>
                                </div>                                
                                <div class="stroka_redactor_image_box"><img src="/src/imgkategor/'.$item["url_block"].'.webp" alt=""></div>
                                <div class="stroka_redactor_id stroka_text_elem">#1</div>
                                <div class="stroka_redactor_name stroka_text_elem">О компании</div>
                                <div class="stroka_redactor_dopoln stroka_text_elem">/ocompoanie/</div>
                                <div class="stroka_redactor_dopoln stroka_text_elem">В разработке</div>
                                <div class="redact_3">
                                    <a href="/catalog/'.$item["url_block"].'/" target="_blank"><img src="/src/admin/img/glaznew.svg" alt=""></a>
                                    <a href="/admin/shop/kategor/redcategor/?id='.$item["id"].'"><img src="/src/admin/img/redact.svg" alt=""></a>
                                    <a href="/admin/shop/kategor/deletcategor/?id='.$item["id"].'"><img src="/src/admin/img/delet.svg" alt=""></a>
                                </div>
                            </div>
                                                     
                        </div>                                                    
                    </div>

                    
                <div class="main_crm_content">
                    <div class="linear_spase_between">
                        <div class="wrap_element_flex">
                            

                            <p class="element_text_value">Всего страниц: 1</p>
                        </div>

                        
                        <div class="wrap_element_flex">
                            <div class="pagination">
                                <a href="" class="pagination_element"><img src="/src/admin/img/pagi_left.svg" alt=""></a>
                                <a href="" class="pagination_element">1</a>
                                <a href="" class="pagination_element"><img src="/src/admin/img/pagi_right.svg" alt=""></a>
                                <a href="" class="pagination_element">...</a>
                            </div>

                        </div>
                    </div>
                </div>

!-->



            </div>
        </div>