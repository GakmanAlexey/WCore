
<div class="container">
    <div class="title_block">
        Личный кабинет
    </div>
    <div class="razdel_box">
                <a href="/lc/" class="razdel_item ">Мои данные</a>
                <a href="/lc/balance/" class="razdel_item">Кошелек</a>
                <a href="/lc/cods/" class="razdel_item razdel_item_active" >Мои коды</a>
    </div>
  </div>
     <div class="cody_par flex">
        <div class="container">
            <div class="cody ">
                <?php
                $js = "";
                $x = 0;
                $ar = array_reverse($h["lc_cods"]);
                foreach($ar as $item){
                    echo '
                    <div class="cody_item col_10">
                    <div class="cody_elem zkaz_nomber">
                        Заказ № '.$item["id_zakaz"].'
                    </div>
                    
                    <div class="cody_elem" >
                        '.$item["id_product"].'
                    </div>
                    
                    <div class="cody_elem"  id="cpt'.$x.'">'.$item["kod"].'</div>
                    
                    <a class="cody_copy" id="cpb'.$x.'">
                        Копировать код
                    </a>
                </div>
                    ';

                $js .='
                document.querySelector("#cpb'.$x.'").addEventListener("click", function() { 
                    var copyText = document.getElementById("cpt'.$x.'").innerHTML ;
                    console.log(copyText);
                    navigator.clipboard.writeText(copyText);
                    //navigator.clipboard.writeText(document.querySelector("#cpt'.$x.'"))
                });
                ';
                $x++;
                }
                ?>
                
            </div>
        </div>
    </div>

    <script>
<?php echo $js; ?>
        </script>



