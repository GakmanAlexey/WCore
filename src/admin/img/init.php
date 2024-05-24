<?
use Bitrix\Main\EventManager;

function mkFromStart(){
  $curMkTm = microtime(true);
  if(empty($GLOBALS['mkStart'])){
    $GLOBALS['mkStart'] = $curMkTm;
  }
  $GLOBALS['mkLast'] = $curMkTm;
  return [
    'fromStart'=> $curMkTm - $GLOBALS['mkStart'],
    'fromLast'=> $curMkTm - $GLOBALS['mkLast'],
  ];
}
mkFromStart();


function dd($condition, $data){
  // if($componentName == 'bitrix:catalog.section' && $_GET['clear_cache']){
	if($condition && $_GET['clear_cache']){
		print "<pre>";print var_dump($data);print "</pre>";
		print "<pre>";print var_dump(mkFromStart());print "</pre>";

		exit;
	}
}


header('X-Frame-Options: SAMEORIGIN');

require_once "include/SendMailSmtpClass.php";
function custom_mail($to, $subject, $message, $additional_headers='', $additional_parameters=''){
// print "<pre>"; print_r ($additional_parameters); print "</pre>";exit;
  $mailSMTP = new SendMailSmtpClass('coronamebel2013@yandex.ru', 'Denis358/358corona', 'ssl://smtp.yandex.ru', 465, "UTF-8");
  // $mailSMTP = new SendMailSmtpClass('логин', 'пароль', 'хост', 'порт', 'кодировка письма');

  preg_match('/From: (.+)\n/i', $additional_headers, $matches);
  list(, $from) = $matches;
  // print "<pre>";print_r($from);print "</pre>";
  // от кого
  if($from){

    // $from = array(
    //   "Евгений", // Имя отправителя
    //   "coronamebel2013@yandex.ru" // почта отправителя
    // );
  }else{

    // $from = COption::GetOptionString("main", "site_name").' <'.COption::GetOptionString("main", "email_from").'>';
    $from = COption::GetOptionString("main", "email_from");
    // $from = array(
    //   "Евгений", // Имя отправителя
    //   "coronamebel2013@yandex.ru" // почта отправителя
    //
    // );
  }
  // кому
  // $to = 'rap693@mail.ru';

  // отправляем письмо
  $result =  $mailSMTP->send($to, $subject, $message, $from, $additional_headers);
  return $result;
}

AddEventHandler("sale", "OnSaleComponentOrderOneStepComplete", 'AjaxOrder3');
function AjaxOrder3($orderId, $arFields, $arParams){

  $from = COption::GetOptionString("main", "site_name").' <'.COption::GetOptionString("main", "email_from").'>';
  $to = COption::GetOptionString("main", "email_from");
  // $to = 'rap693@mail.ru';
  $subj = 'Заказ';
  $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/bitrix/admin/sale_order_view.php?ID='.$orderId;
  $what = "Детальная информация по заказу: $url";
  $res = bxmail ($to, $subj, $what);
  return true;
}

AddEventHandler("iblock", "OnAfterIBlockElementAdd", 'AddSectColor');
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", 'AddSectColor');

function AddSectColor(&$arFields){
  if($arFields["ID"]>0 && $arFields["IBLOCK_ID"] == catalogBID){
    CModule::IncludeModule("iblock");
    $arFilter = Array('IBLOCK_ID'=>photoKresekBID, 'EXTERNAL_ID'=>$arFields["ID"]);
    $db_list = CIBlockSection::GetList(Array(), $arFilter);
    if($res = $db_list->GetNext()){
      if($arFields["NAME"] != $res["NAME"]){
        $bs = new CIBlockSection;
        $res = $bs->Update($res["ID"], array("NAME" => $arFields["NAME"]));
      }
    }else{
      $bs = new CIBlockSection;
      $arFields = Array(
        "ACTIVE" => 'Y',
        "IBLOCK_ID" => photoKresekBID,
        "NAME" => $arFields["NAME"],
        "EXTERNAL_ID" => $arFields["ID"],
      );
      $ID = $bs->Add($arFields);
    }
  }
  return true;
}



AddEventHandler("iblock", "OnAfterIBlockElementDelete", 'DelSectColor');
function DelSectColor($arFields){
  if($arFields["ID"]>0 && $arFields["IBLOCK_ID"] == catalogBID){
    CModule::IncludeModule("iblock");
    $arFilter = Array('IBLOCK_ID'=>photoKresekBID, 'EXTERNAL_ID'=>$arFields["ID"]);
    $db_list = CIBlockSection::GetList(Array(), $arFilter);
    if($res = $db_list->GetNext()){
      CIBlockSection::Delete($res['ID']);
    }
  }
  return true;
}

function spamProof(){
  global $DB;


// return false;

  $table = 'spam_proof';
  // $testPeroid = (time()-30)*1000;
  // $testPeroid = (time()-86400*24)*1000;
  $testPeroid = time()-86400*24*1;
  // $maxCnt = 5;
  $maxCnt = 20;
  $ip = $DB->ForSql($_SERVER['REMOTE_ADDR']);


  $err = false;
  if($_SERVER['REQUEST_METHOD'] != 'POST')
    $err = 'Не верный метод';
  if(!isset($_COOKIE['PHPSESSID']))
    $err = 'Первый запрос';
  // elseif(!isset($_COOKIE['BX_USER_ID']))
  //   $err = 'Не было запроса странице';
  elseif($ip != $_SESSION['SESS_IP'])
    $err = ' Подделка ip';
  else{
    // Создать таблицу, если не существует
    $strSql = "CREATE TABLE IF NOT EXISTS $table (ip VARCHAR(16), tm BIGINT(14))";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);

    // Вставить новую запись
    $DB->PrepareFields($table);
    $arFields = array(
      "ip" => "'".$ip."'",
      "tm" => "'".intval(microtime(true)*1000)."'"
    );
    $ID = $DB->Insert($table, $arFields, $err_mess.__LINE__);
    // Удалить устаревшие
    $strSql = "DELETE FROM $table WHERE ip='$ip' AND tm<".$testPeroid;
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    // Посчитать сколько осталось записей
    $strSql = "SELECT COUNT(*) as cnt FROM $table WHERE ip='$ip' GROUP BY ip";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    if ($row = $res->Fetch()){
      // print "<pre>";print_r($row);print "</pre>";
      if($row['cnt']>$maxCnt){
        $err = 'Большое количество запросов';
      }
    }
  }
  return $err;
}


function getDataFromB24($method, $arParams = null){
  if(!Bitrix\Main\Loader::includeModule('socialservices'))
    return '';

  $result = '';

  if($client = \Bitrix\Socialservices\ApClient::init()){
    $result = $client->call($method, $arParams);
  }
  // print "<pre>";print_r($client->getHttpClient());print "</pre>";
  // print "<pre>";print_r($client->getRequestUrl('crm.lead.list'));print "</pre>";
  // print "<pre>";print_r($client->getConnection());print "</pre>";
  // print "<pre>";print_r($client);print "</pre>";
  return $result;
}

function normPhone($phone){
  $phone = preg_replace('/[^0-9]/', '', $phone);
  $lenPhone = strlen($phone);
  if($lenPhone == 10){
    $phone = '7'.$phone;
  }elseif($lenPhone == 11){
    $phone = '7'.substr($phone, 1);
  }else{
    $phone = false;
  }
  return $phone;
}



EventManager::getInstance()->addEventHandler(
    'sale',
    'OnSaleOrderSaved',
    'addOrderToBitrix24'
);

//в обработчике получаем сумму, с которой планируются некоторые действия в дальнейшем:

function addOrderToBitrix24(Main\Event $event) {
    global $USER;
    /** @var Order $order */
    $order = $event->getParameter("ENTITY");
    $oldValues = $event->getParameter("VALUES");
    $isNew = $event->getParameter("IS_NEW");
    // print "===<pre>";print_r($oldValues);print "</pre>";
    $order = \Bitrix\Sale\Order::load($order->getId());
    // print $order->getId()."===<pre>";print_r($order);print "</pre>";
    // print "===<pre>";print_r($order->getBasket());print "</pre>";

    if ($isNew){
      $Basket = $order->getBasket();
      // print $order->getId()."===<pre>";print_r($Basket);print "</pre>";exit;
      $items = $Basket->getBasketItems();

      $strRes = '';
      foreach ($items as $key => $item) {
        $strRes .= ($key+1).') '.$item->getField('NAME').' - '.$item->getQuantity().' шт.'."\n";
      }

      $propertyCollection = $order->getPropertyCollection();

      $arPropertyCollection = $propertyCollection->getArray();
      $arP = $arPropertyCollection['properties'];
      $arPr = array();
      foreach ($arP as $v) {
        $arPr[$v['CODE']] = $v['VALUE'][0];
      }
      $namePropValue  = $arPr['FIO'];
      $emailPropValue = $USER->GetEmail();
      // $emailPropValue = $arPr['EMAIL'];
      // $locPropValue   = $arPr[''];
      $phonePropValue = $arPr['PHONE'];
      $addrPropValue  = $arPr['CITY'].', '.$arPr['ADDRESS'];

      $method='crm.lead.add';
      $arParams = [
              'fields'=> [
                  "TITLE" => 'Заказ: '.$order->getId(),
                  "NAME" => $namePropValue,
                  "STATUS_ID" => "NEW",
                  "OPENED" => "Y",
                  "ADDRESS_CITY" => $addrPropValue,
                  "SOURCE_ID" => 'STORE',
                  "COMMENTS" => $strRes,
                  "OPPORTUNITY" => $Basket->getPrice(),
                  // "EMAIL" => $emailPropValue,
                  "EMAIL" => [ [ "VALUE" => $emailPropValue, "VALUE_TYPE" => "WORK" ] ],
                  "PHONE" => [ [ "VALUE" => $phonePropValue, "VALUE_TYPE" => "WORK" ] ],
              ],
              'params' => [ "REGISTER_SONET_EVENT" => "Y" ]
          ];

      $res = getDataFromB24($method, $arParams);
    }
}


function getFromB24($method, $arParams){

}

global $updateVigodaBefore;
EventManager::getInstance()->addEventHandler('iblock', 'OnBeforeIBlockElementUpdate', 'beforeUpdateVigoda');
// EventManager::getInstance()->addEventHandler('iblock', 'OnAfterIBlockElementAdd', 'updateVigoda');
EventManager::getInstance()->addEventHandler('iblock', 'OnAfterIBlockElementUpdate', 'updateVigoda');



function beforeUpdateVigoda($arFields){
  global $updateVigodaBefore;
  if($arFields['IBLOCK_ID'] == 7){
    $res = CIBlockElement::GetByID($arFields['ID']);
    if($obRes = $res->GetNextElement()){
      $updateVigodaBefore = $obRes->GetProperties();
    }
  }
}

function updateVigoda($arFields){
  global $updateVigodaBefore;
  if(!empty($updateVigodaBefore)){

    if($arFields['IBLOCK_ID'] == 7){
      $doUpdate = false;
      $active = (!empty($arFields['PROPERTY_VALUES'][$updateVigodaBefore['vigoda']['ID']]))?'Y':false;
      // Выключается галка
      if($updateVigodaBefore['vigoda']['VALUE'] == 'vigoda' &&
      empty($arFields['PROPERTY_VALUES'][$updateVigodaBefore['vigoda']['ID']])){
        $doUpdate = true;
      }
      // Включается галка
      if($updateVigodaBefore['vigoda']['VALUE'] != 'vigoda' &&
      !empty($arFields['PROPERTY_VALUES'][$updateVigodaBefore['vigoda']['ID']])){
        $doUpdate = true;
      }
      $price = array_pop($arFields['PROPERTY_VALUES'][$updateVigodaBefore['vigoda_price']['ID']]);
      $price = intval($price['VALUE']);
      // Изменилась выгодна цена
      if($price != $updateVigodaBefore['vigoda_price']['VALUE']){
        $doUpdate = true;
      }

      if($doUpdate){
        discountVigodaSwitch($arFields['ID'], $arFields['NAME'], $price, $active);
      }
    }
  }
}

function discountVigodaSwitch($pid, $name, $price, $active){
  global $APPLICATION;
  CModule::IncludeModule("catalog");
  $dbDiscounts = CCatalogDiscount::GetList([], ["XML_ID" => $pid]);
  if ($arDiscounts = $dbDiscounts->Fetch()) {
    $arFields = [
      'SITE_ID' => 's1',
      'ACTIVE'=>($active == 'Y')?'Y':'N',
      'NAME'=> $name,
      'VALUE'=> floatval($price),
    ];
    // print "<pre>";print_r($arDiscounts['ID']);print "</pre>";
    // print "<pre>";print_r($arFields);print "</pre>";exit;
    $res = CCatalogDiscount::Update($arDiscounts['ID'], $arFields);
  } else {
    $arFields = [
      'SITE_ID' => 's1',
      'ACTIVE'=>($active == 'Y')?'Y':'N',
      'NAME'=> $name,
      'VALUE'=> floatval($price),
      "XML_ID" => $pid,
      'CURRENCY'=> 'RUB',
      'VALUE_TYPE'=> 'S',
      'CONDITIONS'=> [
        "CLASS_ID" => "CondGroup",
        'DATA' => ['All' => 'AND',  'True' => 'True'],
        "CHILDREN" => [
          [
            "CLASS_ID" => "CondIBElement",
            "DATA" => ["logic" => "Equal", "value" => [$pid]]
          ]
        ],
      ],
    ];
    // print "<pre>";print_r($arFields);print "</pre>";exit;
    $ID = CCatalogDiscount::Add($arFields);

    $res = $ID>0;
  }
  if (!$res) {
    $ex = $APPLICATION->GetException();
    $ex->GetString();
  }
}


function getResizeWmImg($imgId){
  $arWaterMark = Array(
    array(
      "name" => "watermark",
      "position" => "center", // Положение
      "type" => "image",
      "coefficient" => 0.75,
      "file" => WatermarkPath, // Путь к картинке
    )
  );
  $arImage = CFile::GetFileArray($imgId);
  $arFileBig = CFile::ResizeImageGet(
    $arImage['ID'],
    array("width" => 800, "height" => 800),
    BX_RESIZE_IMAGE_EXACT,
    true,
    $arWaterMark
  );

  return array(
    'SRC_ORIGN' => $arImage['SRC'],
    'SRC' => $arFileBig['src'],
  );
}

function updatePriceFilter($id){
  CModule::IncludeModule("iblock");
  CModule::IncludeModule("catalog");
  $dbEl = CIBlockElement::GetList([], ["IBLOCK_ID"=>catalogBID, 'ID'=>$id]);
  if($obEl = $dbEl->GetNextElement()){
    $props = $obEl->GetProperties();
    $vig = $props['vigoda']['VALUE'];
    $vigoda_price = $props['vigoda_price']['VALUE'];
    $price_filter = $props['price_filter']['VALUE'];
    $arPr = CatalogGetPriceTableEx($id);
    $price = floatval($arPr['MATRIX'][1][0]['PRICE']);
    $new_price_filter = ($vig) ? $vigoda_price : $price;
    if($new_price_filter != $price_filter){
      CIBlockElement::SetPropertyValueCode($id, "price_filter", $new_price_filter);
    }
  }
}
function onUpdatePriceFilter($arFields){
  if($arFields['IBLOCK_ID'] == catalogBID){
    updatePriceFilter($arFields['ID']);
  }
}
function onAddPriceFilter($id, $arFields){
  updatePriceFilter($arFields['PRODUCT_ID']);
}

EventManager::getInstance()->addEventHandler('iblock', 'OnAfterIBlockElementUpdate', 'onUpdatePriceFilter');
EventManager::getInstance()->addEventHandler('catalog', 'OnPriceAdd', 'onAddPriceFilter');

function testPrint($value){
  if (!empty($_COOKIE['test'])) {
    print "<pre>"; print_r ($value); print "</pre>";exit;
  }
}
