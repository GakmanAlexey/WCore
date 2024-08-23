
<div class="main_contant">
    <div class="etap_block">
        <a href="#" class="etap_element">
            <svg width="12" height="25" viewBox="0 0 12 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="etap_start etap_blue" d="M11.499 25L2.8284 25C1.04659 25 0.154265 22.8457 1.41419 21.5858L9.52807 13.4719C10.3313 12.6687 10.3051 11.3586 9.47041 10.5881L1.75872 3.4696C0.42092 2.23471 1.29466 8.42111e-08 3.11528 -2.71115e-07L11.499 -1.90735e-06L11.499 25Z" fill="#E4E5E6"/>
            </svg>

            <p class="etap_element_name etap_blue">Привелегии группы</p>

            <svg width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="etap_start etap_blue" d="M0 0H2.1438C3.00593 0 3.82639 0.370903 4.39594 1.01812L12.7559 10.5181C13.7531 11.6512 13.7531 13.3488 12.7559 14.4819L4.39594 23.9819C3.82639 24.6291 3.00593 25 2.1438 25H0V0Z" fill="#E4E5E6"/>
            </svg>                    
        </a>

    </div>

                

    <div class="tablica_title_box margin_top_30 margin_bottom_10px">
        <p class="tablica_title_element width_procent">
            id
        </p>
        <p class="tablica_title_element width_flex">
            Название группы
        </p>
        <a class="icon_button blue" href="/admin/system/users/permisongp/add/">
            <img src="/src/admin/img/add-square.svg" alt="">
                Создать 
        </a>
    </div>
        
    <?php
$x = 0;
foreach( $h["admin"]["user"]["show_list_gp"] as $item){
    echo '
    <div class="stroka_element">
                                                              
                                <div class="stroka_redactor_id width_procent">#'.$item["id"].'</div>
                                <div class="stroka_redactor_name stroka_text_elem width_flex">'.$item["id_name"].'</div>
                                
                                <div class="redact_3">
                                    <a href="/admin/system/users/permisongp/edit/?id='.$item["id"].'"><img src="/src/admin/img/redact.svg" alt=""></a>
                                    <a href="/admin/system/users/permisongp/delet/?id='.$item["id"].'"><img src="/src/admin/img/delet.svg" alt=""></a>
                                  
                                </div>
                            </div>
    
    
    ';
    $x++;
}
if($x == 0){
    echo '
    <div class="stroka_element">Записи не найдены</div>
    ';
}/*
$pag = new \Mod\Tools\Modul\Pagin;
$h = $pag ->standart($h,"group_list");*/

?>
     
            <div class="main_crm_content">
                    <div class="linear_spase_between">
                        <div class="wrap_element_flex">
                            

                            <p class="element_text_value">Всего страниц: <?php echo $h["pagin"]["page_count"];?></p>
                        </div>

                        
                        <div class="wrap_element_flex">
                            <div class="pagination">
                                <?php
                                foreach($h["pagin"]["page_line"] as $element){
                                    if($element == "l") {
                                        echo '<a href="?page=1" class="pagination_element"><img src="/src/admin/img/pagi_left.svg" alt=""></a>';
                                    }elseif($element == "r") {
                                        echo '<a href="?page='.$h["pagin"]["page_count"].'" class="pagination_element"><img src="/src/admin/img/pagi_right.svg" alt=""></a>';
                                    }else{
                                        echo '<a href="?page='.$element.'" class="pagination_element">'.$element.'</a>';
                                    }                                    
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>

<div class="notification">
    
</div>
</body>
</html>