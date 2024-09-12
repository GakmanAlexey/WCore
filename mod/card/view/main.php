
<div class="container">
    <div class="title_block">
        Оформление заказа
    </div>
  </div>

  <div class="container">
    <div class="oplata_box">
        <div class="wrap_oplata col_5">
            <form action="">
                <div class="sposob_oplaty">
                    <div class="form_radio_btn">
                        <input id="radio-1" type="radio" name="radio" value="1" checked>
                        <label for="radio-1">Карта, телефон и т.д.</label>
                    </div>
                     
                    <div class="form_radio_btn">
                        <input id="radio-2" type="radio" name="radio" value="2">
                        <label for="radio-2">ОФД Кошелек (баланс 3000 ₽)</label>
                    </div>
                </div>
                <div class="all_price">
                    <div class="all_price_row">
                        <div class="all_price_row_element">
                            Стоимость
                        </div>
                        <div class="line">

                        </div>
                        <div class="all_price_row_element">
                            200₽
                        </div>
                    </div>
                    <div class="all_price_row">
                        <div class="all_price_row_element">
                            Скидка
                        </div>
                        
                        <div class="line">
                            
                        </div>
                        <div class="all_price_row_element">
                            100₽
                        </div>
                    </div>
                    
                    <div class="all_price_row">
                        <div class="all_price_row_element itog_pay">
                            К оплате
                        </div>
                        
                        <div class="line">
                            
                        </div>
                        <div class="all_price_row_element itog_pay">
                            100₽
                        </div>
                    </div>
                    <button class="btn_form btn">Оплатить</button>
                </div>
            </form>
        </div>
        
        <div class="wrap_oplata col_6">

        <?php
        foreach($h["new_arr_card"] as $item){
            var_dump($item["id_product"]);
            echo '
            <div class="oplata_tovar">
                <div class="oplata_tovar_image">
                    <img src="/src/img/1.png" alt="">
                </div>
                    <div class="oplata_tovar_name">Код активации Яндекс ОФД 1 месяц

                        <div class="delite_tovar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 5.98047C17.67 5.65047 14.32 5.48047 10.98 5.48047C9 5.48047 7.02 5.58047 5.04 5.78047L3 5.98047" stroke="#7b7b7b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="#7b7b7b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.8499 9.14062L18.1999 19.2106C18.0899 20.7806 17.9999 22.0006 15.2099 22.0006H8.7899C5.9999 22.0006 5.9099 20.7806 5.7999 19.2106L5.1499 9.14062" stroke="#7b7b7b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10.3301 16.5H13.6601" stroke="#7b7b7b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.5 12.5H14.5" stroke="#7b7b7b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Удалить из корзины
                        </div>
                    </div>
                    <div class="oplata_tovar_price_numb">
                        <div class="oplata_tovar_card_price_box">
                            <div class="oplata_tovar_card_price">
                                100 ₽
                            </div>
                            <div class="oplata_tovar_card_old_price">
                                200 ₽
                            </div>
                        </div>
                        
                        <div class="oplata_tovar_numb">
                            <div class="numb_item">
                            -
                            </div>

                            <div class="numb_count">
                                '.$item["count"].'
                            </div>

                            <div class="numb_item">
                            +
                            </div>
                        </div>
                    </div>                

            </div>
            ';
        }?>
            


        </div>
    </div>
  </div>
    
