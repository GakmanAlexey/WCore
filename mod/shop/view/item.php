<?php
//var_dump($h["shop"]["item_info"]);
?>
<div class="flex">
<div class="container">
       <div class="card gap_40">
        <div class="card_left_content col_6_psev">
            <div class="title_block margin_top_none">
                <?php echo $h["shop"]["item_info"]["name_s"];?>
            </div>
            <div class="card_info">
                <div class="card_info_image_box">
                    <img src="/src/img/itemshop/<?php echo $h["shop"]["item_info"]["img"];?>" alt="">
                </div>

                <div class="card_info_price_btn">
                    <div class="card_price_box">
                        <div class="card_price">
                        <?php echo $h["shop"]["item_info"]["prise_i"];?> ₽
                        </div>
                        <div class="card_old_price">
                        <?php echo $h["shop"]["item_info"]["prise_old"];?> ₽
                        </div>
                    </div>
                    
                    <a class="ct_btn aa_ct_btn aa_color_btn btn_card" onclick="myFunctionz()" >Добавить в корзину</a>
                </div>
            </div>
        </div>
        <div class="card_right_content col_6">
            <?php echo $h["shop"]["item_info"]["html_block"];?> 
        </div>
       </div>
    </div>
    </div>

    <script>

              function myFunctionz() {
                $("#card_list").load("/cardlistadd/?product=<?php echo $h["shop"]["item_info"]["id"];?>");
                $("#card_list").load("/cardlist/");
                }

                
            </script>