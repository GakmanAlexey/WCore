
<div class="container">
        <div class="title_block">
            Статьи
        </div>
    </div>
    <div class="flex">
        <div class="container">
            <div class="statia_box wr_cont d_flex gap_40 flex_wrap">
                <?php
                foreach($h["articl"]["list"] as $item){
                    //var_dump($item);
                    echo '
                    <div class="ct_item aa_ct_item col_3">
                    <div class="ct_img_box aa_ct_img_box">
                        <img src="/src/img/articl/'.$item["img_s"].'" alt="">
                    </div>
                    <div class="par_info_tovar">
                        <div class="ct_text_box">
                            <p class="st_name aa_st_name">
                                '.$item["name_s"].'
                            </p>
                            <p class="st_name aa_st_text">
                                '.mb_strimwidth($item["text_s"], 0, 50, "...").'
                            </p>
                        </div>
                        <div class="ct_button_box d_flex gap_10">
                            <a class="ct_btn aa_ct_btn aa_color_btn" href="/statii/'.$item["url_s"].'">Подробнее</a>
                        </div>
                    </div>
                </div>
                    ';
                }
                ?>
                

                
            </div>
        </div>
    </div>

    
