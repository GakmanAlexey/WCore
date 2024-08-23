
<div class="main_contant">
    <div class="etap_block">
        <a href="#" class="etap_element">
            <svg width="12" height="25" viewBox="0 0 12 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="etap_start etap_blue" d="M11.499 25L2.8284 25C1.04659 25 0.154265 22.8457 1.41419 21.5858L9.52807 13.4719C10.3313 12.6687 10.3051 11.3586 9.47041 10.5881L1.75872 3.4696C0.42092 2.23471 1.29466 8.42111e-08 3.11528 -2.71115e-07L11.499 -1.90735e-06L11.499 25Z" fill="#E4E5E6"/>
            </svg>
            <p class="etap_element_name etap_blue">Привелегии пользователей</p>
            <svg width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="etap_start etap_blue" d="M0 0H2.1438C3.00593 0 3.82639 0.370903 4.39594 1.01812L12.7559 10.5181C13.7531 11.6512 13.7531 13.3488 12.7559 14.4819L4.39594 23.9819C3.82639 24.6291 3.00593 25 2.1438 25H0V0Z" fill="#E4E5E6"/>
            </svg>   
        </a>


        <a href="#" class="etap_element">
            <svg width="12" height="25" viewBox="0 0 12 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="etap_start etap_blue" d="M11.499 25L2.8284 25C1.04659 25 0.154265 22.8457 1.41419 21.5858L9.52807 13.4719C10.3313 12.6687 10.3051 11.3586 9.47041 10.5881L1.75872 3.4696C0.42092 2.23471 1.29466 8.42111e-08 3.11528 -2.71115e-07L11.499 -1.90735e-06L11.499 25Z" fill="#E4E5E6"/>
            </svg>
            <p class="etap_element_name etap_blue">Добавление пользователя</p>
            <svg width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="etap_start etap_blue" d="M0 0H2.1438C3.00593 0 3.82639 0.370903 4.39594 1.01812L12.7559 10.5181C13.7531 11.6512 13.7531 13.3488 12.7559 14.4819L4.39594 23.9819C3.82639 24.6291 3.00593 25 2.1438 25H0V0Z" fill="#E4E5E6"/>
            </svg>   
        </a>

    </div>


<div class="tablica_title_box margin_top_30 margin_bottom_10px">

        <p class="tablica_title_element width_flex">
            Создание привелегий
        </p>
        <a class="icon_button blue" href="/admin/system/users/permisonus/add/">
            <img src="/src/admin/img/add-square.svg" alt="">
                Создать 
        </a>
    </div>

<div class="main_contant_box">     
 <?php
 $test_arr=[];
 foreach($h["admin"]["user"]["full_list_gp_pex"] as $item){
    $test_arr[$item["id"]]=$item["login"];
 }
    $af = new \Mod\Tools\Modul\Aforma;
    $h = $af->init($h, "post", "", "form_flex", "");
    $h = $af->add_selecter($h,"add_selecter", "parent_inp_input", "id3", "Название группы", "el1", $test_arr);
    $h = $af->add_emp($h);
    $h = $af->add_input($h, "aloow", "text", "parent_inp_input", "", 8, "", "Разрешенные привелегии (через запятую)");
    $h = $af->add_input($h, "disaloow", "text", "parent_inp_input", "", 8, "", "Запрещенные привелегии (через запятую)");
    $h = $af->add_button($h, "go_save_pex_us", "form_button blue", "", "yes", "Добавить");
    $h = $af->build($h);
    $h = $af->render($h);
    ?>      
</div>
</div>

<div class="notification">
    
</div>
</body>
</html>