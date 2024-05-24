
<body>
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
            if($lvl2_start == 0){
                if(($h["url"]["d_array"][2] == $h["lmenu"]["class"]->build_lvl1[$father]["url"]) and ($h["url"]["d_array"][3] == $elemet_menu["url"])) {
                    $focus = "crm_link_active_podmenu";
                }else{
                    $focus = "";
                }
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
        </div>