
<body>
<div class="menu_left">
        <div class="menu_icon">
            <div class="menu_arrow">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.53239 11.1225L12.2249 15.6975C14.2874 16.785 16.5299 14.5875 15.4874 12.5025L14.2724 10.0725C13.9349 9.39753 13.9349 8.60253 14.2724 7.92753L15.4874 5.49753C16.5299 3.41253 14.2874 1.22253 12.2249 2.30253L3.53239 6.87752C1.82239 7.77752 1.82239 10.2225 3.53239 11.1225Z" stroke="white" stroke-opacity="0.48" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg> 
            </div>
            
<?php
foreach($h["lmenu"]["class"]->build_lvl1 as $key => $elemet_menu){
    if(($key == 0) or ((intdiv($key, 10000)) == ($key / 10000))) {
        if($h["url"]["d_array"][1] == $elemet_menu["url"]){
            $style = "icon_item_activ";
        }else{
            $style = "icon_item";
        }
        echo '
        <a href="/admin/'.$elemet_menu["url"].'/" class="'.$style.'">
        '.$elemet_menu["ico"].'
            </a>
        ';
    }
}


?>

            <a href="" class="icon_item user_menu">
                <img src="/src/admin/img/avatar.png" alt="">
            </a>
        </div>
        <div class="menu_twoo_level">
            <div class="menu_twoo_level_title">
                Каталог
            </div>
            <div class="menu_twoo_level_item">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="svg_color_blue" d="M11.3332 5.66675H5.6665V11.3334H11.3332V5.66675Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="svg_color_blue" d="M3.5415 15.5833C4.71025 15.5833 5.6665 14.627 5.6665 13.4583V11.3333H3.5415C2.37275 11.3333 1.4165 12.2895 1.4165 13.4583C1.4165 14.627 2.37275 15.5833 3.5415 15.5833Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="svg_color_blue" d="M3.5415 5.66675H5.6665V3.54175C5.6665 2.373 4.71025 1.41675 3.5415 1.41675C2.37275 1.41675 1.4165 2.373 1.4165 3.54175C1.4165 4.7105 2.37275 5.66675 3.5415 5.66675Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="svg_color_blue" d="M11.3335 5.66675H13.4585C14.6272 5.66675 15.5835 4.7105 15.5835 3.54175C15.5835 2.373 14.6272 1.41675 13.4585 1.41675C12.2897 1.41675 11.3335 2.373 11.3335 3.54175V5.66675Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="svg_color_blue" d="M13.4585 15.5833C14.6272 15.5833 15.5835 14.627 15.5835 13.4583C15.5835 12.2895 14.6272 11.3333 13.4585 11.3333H11.3335V13.4583C11.3335 14.627 12.2897 15.5833 13.4585 15.5833Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p class="name_menu_item">Сео</p>
            </div>
            <div class="menu_three_level_item">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="svg_color_grey" d="M4.95817 4.25H12.0415C12.4807 4.25 12.8703 4.26417 13.2173 4.31375C15.0803 4.51917 15.5832 5.3975 15.5832 7.79167V9.20833C15.5832 11.6025 15.0803 12.4808 13.2173 12.6862C12.8703 12.7358 12.4807 12.75 12.0415 12.75H4.95817C4.519 12.75 4.12942 12.7358 3.78234 12.6862C1.91942 12.4808 1.4165 11.6025 1.4165 9.20833V7.79167C1.4165 5.3975 1.91942 4.51917 3.78234 4.31375C4.12942 4.26417 4.519 4.25 4.95817 4.25Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="svg_color_grey" d="M12.0416 12.75C12.4808 12.75 12.8704 12.7359 13.2175 12.6863C13.2246 12.7854 13.2246 12.8775 13.2246 12.9838V13.2246C13.2246 15.1088 12.75 15.5834 10.8587 15.5834H6.14122C4.24997 15.5834 3.77539 15.1088 3.77539 13.2246V12.9838C3.77539 12.8775 3.77539 12.7854 3.78247 12.6863C4.12956 12.7359 4.51914 12.75 4.95831 12.75H12.0416Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="svg_color_grey" d="M6.14122 1.41675H10.8587C12.75 1.41675 13.2246 1.89133 13.2246 3.7755V4.01633C13.2246 4.12258 13.2246 4.21467 13.2175 4.31383C12.8704 4.26425 12.4808 4.25008 12.0416 4.25008H4.95831C4.51914 4.25008 4.12956 4.26425 3.78247 4.31383C3.77539 4.21467 3.77539 4.12258 3.77539 4.01633V3.7755C3.77539 1.89133 4.24997 1.41675 6.14122 1.41675Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                    
                <p class="name_menu_item">Общие настройки</p>
            </div>
            <div class="menu_three_level_item">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="svg_color_grey" d="M2.125 3.1875H14.875" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="svg_color_grey" d="M2.125 6.72925H14.875" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="svg_color_grey" d="M2.125 10.2708H14.875" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="svg_color_grey" d="M2.125 13.8125H14.875" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>                    
                <p class="name_menu_item">Настройки страниц</p>
            </div>
            <div class="menu_three_level_item_activ">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="svg_color_white" d="M11.3332 1.41675H5.6665C2.83317 1.41675 1.4165 2.83341 1.4165 5.66675V14.8751C1.4165 15.2647 1.73525 15.5834 2.12484 15.5834H11.3332C14.1665 15.5834 15.5832 14.1667 15.5832 11.3334V5.66675C15.5832 2.83341 14.1665 1.41675 11.3332 1.41675Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="svg_color_white" d="M6.021 8.5H10.9793" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="svg_color_white" d="M8.5 10.9791V6.02075" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>       
                <p class="name_menu_item_activ">Метрика</p>
            </div>


            <div class="menu_crm_user_info">
                <div class="menu_crm_user_info_name">[ADMIN] Алексей</div>
                <div class="menu_crm_user_info_botom">
                    <a class="menu_crm_user_info_lk" href="">Личный кабинет</a>
                    <a class="exit" href=""> Выход<br></a>
                </div>
            </div>
            






    </div>
        </div>
    </div>
    <?php /*
    <div class="crm">
        <div class="menu_crm">
            <div class="menu_crm_header">
                <img src="/src/admin/img/logogakman.svg" alt="">
                
            </div>
            <div class="menu_crm_element_box">

            <?php
    $lvl1_start = 0;
    $lvl2_start = 0;
    $father = 0;
    $type_menu = 0;
    foreach($h["lmenu"]["class"]->build_lvl1 as $key => $elemet_menu){
        if(($key == 0) or ((intdiv($key, 10000)) == ($key / 10000))) {
            $type_menu = 1;
        }
        else if((intdiv($key, 100)) == ($key / 100)){
            $type_menu = 2;
        } else{
            $type_menu = 3;
        }
        if($type_menu == 1){
            $father = $key ;
            if($lvl2_start != 0){
                echo '</div>'; 
                $lvl2_start = 0; 
            }
            if($lvl1_start != 0){
                echo '</div>';
            }
            $lvl1_start++;
            if($h["url"]["d_array"][2] == $elemet_menu["url"]) {
                $focus = "crm_link_active";
            }else{
                $focus = "";
            }
            echo '<div class="menu_crm_item">';   
            echo '<a class="menu_crm_item_link '.$focus.'">';
            echo $elemet_menu["ico"];
            echo '<p class="menu_crm_item_name">'.$elemet_menu["name_ru"].'</p>';   
            echo '</a>';  
        }else if($type_menu == 2){
            if(($h["url"]["d_array"][2] == $h["lmenu"]["class"]->build_lvl1[$father]["url"]) and ($h["url"]["d_array"][3] == $elemet_menu["url"])) {
                $focus = "crm_link_active_podmenu";
            }else{
                $focus = "";
            }
            if($lvl2_start == 0){
                echo '<div id="myDropdown" class="menu_crm_podmenu">';
            }
            $lvl2_start ++;
                echo '<div class="menu_crm_podmenu_item">';
                echo '<a class="menu_crm_podmenu_item_link '.$focus.'" href="/admin/'.$h["lmenu"]["class"]->build_lvl1[$father]["url"].'/'.$elemet_menu["url"].'/">';
                echo $elemet_menu["ico"];
                echo '<p class="menu_crm_item_name">'.$elemet_menu["name_ru"].'</p>';   
                echo '</a>'; 
                echo '</div>'; 
            
        }
    }
    echo '</div>'; 
    echo '</div>'; 
    echo '</div>'; 
            ?>

            
            <div class="menu_crm_bottom">
                <div class="menu_crm_user">
                    <img src="/src/admin/img/avatar.png" alt="">
                    <div class="menu_crm_user_info">
                        <div class="menu_crm_user_info_name">[ADMIN] Алексей</div>
                        <a class="menu_crm_user_info_lk" href="">Выход</a>
                    </div>
                    <a class="exit" href=""> <br></a>
                </div>
            </div>
        </div>*/