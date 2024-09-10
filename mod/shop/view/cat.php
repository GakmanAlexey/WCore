

    <div class="flex">
    <div class="container">
        <div class="title_block">
            Все коды
        </div>

        <div class="wr_cont d_flex gap_40 flex_wrap katalog">
<?php
foreach($h["shop"]["item_list"] as $item){
   // var_dump($item);
echo 
    '
    <div class="ct_item aa_ct_item col_3">
                <div class="ct_img_box aa_ct_img_box">
                    <img src="/src/img/itemshop/'.$item["img"].'" alt="">
                </div>
                <div class="par_info_tovar">
                    <div class="ct_text_box">
                        <p class="ct_name aa_ct_name">
                            '.$item["name_s"].'
                        </p>
                        <div class="price_parent">
                            <div class="ct_price aa_ct_price">
                                '.$item["prise_i"].' ₽
                            </div>
                            <div class="ct_price aa_ct_price old_price">
                                '.$item["prise_old"].' ₽
                            </div>
                        </div>
                    </div>
                    <div class="ct_button_box d_flex gap_10">
                        <a class="ct_btn aa_ct_btn aa_color_btn" href="/'.$h["url"]["d_array"][1].'/'.$item["url"].'/">Подробнее</a>
                        <a class="ct_btn aa_ct_btn aa_border_btn" href="/?add_card='.$item["id"].'">В корзину</a>
                    </div>
                </div>
            </div>

    ';
}
?>
            

        </div>
    </div>
    </div>