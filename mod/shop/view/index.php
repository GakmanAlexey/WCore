<?php

//var_dump($h["shop"]["lost_cat"]);

?>
<div class="flex">
    <div class="container">
        <div class="categorii gap_40">
            <?php
            foreach($h["shop"]["lost_cat"] as $item){
                echo '
                <a href="/'.$item["url"].'/" class="ct_item aa_ct_item col_3 categ_item">
                    <div class="ct_img_box aa_ct_img_box">
                        <img src="/src/img/shop/'.$item["img"].'" alt="">
                    </div>
                </a>
                ';
            }
            ?>
            
            
        </div>
    </div>
</div>