<?php
#amoCRM - begin
$true_phone = preg_replace('/[^0-9]/', '', $phone);
$true_phone = '+'.$true_phone;
$utm_content = trim($_POST["utm_content"]);
$utm_contentAll = trim($_POST["utm_content"]);
if ($utm_content == "||") $utm_content = "";
$utm_content = urldecode($utm_content);
$utm_source = trim($_POST["utm_source"]);
if ($utm_source == "||") $utm_source = "";
$utm_source = urldecode($utm_source);
$utm_term = trim($_POST["utm_term"]);
if ($utm_term == "||") $utm_term = "";
$utm_term = urldecode($utm_term);
$utm_medium = trim($_POST["utm_medium"]);
if ($utm_medium == "||") $utm_medium = "";
$utm_medium = urldecode($utm_medium);
$utm_campaign = trim($_POST["utm_campaign"]);
if ($utm_campaign == "||") $utm_campaign = "";
$utm_campaign = urldecode($utm_campaign);

//$true_phone = $phone;
$utm_content = explode("|", $utm_content);
$utm_content_arr = Array();
foreach ($utm_content as $val){
	$key = mb_strstr($val,'_', true);
	$val_text = substr(mb_strstr($val,'_', false), 1);
	$utm_content_arr[$key] = $val_text;
}

switch ($order_type) {
case 1:
	$order_type = 88944;
	break;
case 2:
	$order_type = 88946;
	break;
case 3:
	$order_type = 88948;
	break;
case 4:
	$order_type = 88950;
	break;
case 5:
	$order_type = 88952;
	break;
case 6:
	$order_type = 88954;
	break;
case 7:
	$order_type = 88956;
	break;
case 8:
	$order_type = 88958;
	break;
case 9:
	$order_type = 88960;
	break;
case 10:
	$order_type = 88962;
	break;
case 11:
	$order_type = 88964;
	break;
case 12:
	$order_type = 88966;
	break;
case 13:
	$order_type = 88968;
	break;
case 14:
	$order_type = 88970;
	break;
case 15:
	$order_type = 88972;
	break;
case 16:
	$order_type = 88974;
	break;
case 17:
	$order_type = 382509;
	break;
case 18:
	$order_type = 382511;
	break;
case 19:
	$order_type = 382513;
	break;
case 20:
	$order_type = 388575;
	break;
case 21:
	$order_type = 419549;
	break;
}

$user=array(
  'USER_LOGIN'=>'karpov.s@metacrete.ru', #Ваш логин (электронная почта)
  'USER_HASH'=>'c6a09ea579e277bb51c31664ccc3422c' #Хэш для доступа к API (смотрите в профиле пользователя)
);
 
$subdomain='metacrete'; #Наш аккаунт - поддомен
 
#Формируем ссылку для запроса
$link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';

$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
#Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($user));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
 
$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
curl_close($curl); #Завершаем сеанс cURL

$code=(int)$code;
$errors=array(
  301=>'Moved permanently',
  400=>'Bad request 1',
  401=>'Unauthorized',
  403=>'Forbidden',
  404=>'Not found',
  500=>'Internal server error',
  502=>'Bad gateway',
  503=>'Service unavailable'
);
try
{
  #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
  if($code!=200 && $code!=204)
	throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
}
catch(Exception $E)
{
  //die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
}
 
/**
 * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
 * нам придётся перевести ответ в формат, понятный PHP
 */
$Response=json_decode($out,true);

#Проверка совпадения телефона!
$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/list?query="'.$true_phone.'"';
$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
#Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
 
$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);

$code=(int)$code;
$errors=array(
  301=>'Moved permanently',
  400=>'Bad request 2',
  401=>'Unauthorized',
  403=>'Forbidden',
  404=>'Not found',
  500=>'Internal server error',
  502=>'Bad gateway',
  503=>'Service unavailable'
);
try
{
  #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
  if($code!=200 && $code!=204)
	throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
}
catch(Exception $E)
{
  //die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
}
 
/**
 * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
 * нам придётся перевести ответ в формат, понятный PHP
 */
$Response=json_decode($out,true);
$Response=$Response['response'];
	$resp_test = $Response;
	//echo ('<div style="display:none"> <pre>');
	$orders_list = $resp_test['contacts'][0]['linked_leads_id'];
	//var_dump($orders_list);
	//var_dump ($Response);
	//echo ('</div> </pre>');
if (empty($Response)) {
	$copy = 0;
}
else
	$copy = 1;

#Конец проверки телефона!

#Создание сделки
if ($copy == 1){
	$text_copy = 'Повторный запрос'.PHP_EOL;
}
else
	$text_copy = '';

$lead_name = "Заявка с сайта Metacrete Hydrostop";
$roistat=isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : null;

										

$leads['request']['leads']['add']=array(
  array(
	'name'=>$lead_name,
	'status_id'=>14748010,
	'price'=>0,
	'responsible_user_id'=>1475095,
	'custom_fields'=>array(
	  array(
		#Нестандартное дополнительное поле "type", которое мы создали
		'id'=>37906,
		'values'=>array(
		  array(
			'value'=>$utm_content_arr["sourcetype"]
		  )
		)
	  ),
	  array(
		"id"=> 74244,
		"values"=>  array(array("value"=> $roistat))
	  ),
	  array(
		#Нестандартное дополнительное поле "source", которое мы создали
		'id'=>37908,
		'values'=>array(
		  array(
			'value'=>$utm_content_arr["wwwsource"]
		  )
		)
	  ),
        array(
            #Нестандартное дополнительное поле "utm_medium", которое мы создали
            'id'=>206583,
            'values'=>array(
                array(
                    'value'=>$utm_medium
                )
            )
        ),
	  array(
		#Нестандартное дополнительное поле "device", которое мы создали
		'id'=>37910,
		'values'=>array(
		  array(
			'value'=>$utm_content_arr["dev"]
		  )
		)
	  ),
        array(
            #Нестандартное дополнительное поле "adid", которое мы создали
            'id'=>206589,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["adid"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "groupid", которое мы создали
            'id'=>206587,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["groupid"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "yadopphrase", которое мы создали
            'id'=>206597,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["yadopphrase"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "yatextdopphrase", которое мы создали
            'id'=>206599,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["yatextdopphrase"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "yaregion", которое мы создали
            'id'=>206603,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["yaregion"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "yaregionid", которое мы создали
            'id'=>206605,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["yaregionid"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "yapositiontype", которое мы создали
            'id'=>206601,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["yapositiontype"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "googlekwmt", которое мы создали
            'id'=>206607,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["googlekwmt"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "devicemodel", которое мы создали
            'id'=>206609,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["devicemodel"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "kategoryplace", которое мы создали
            'id'=>206611,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["kategoryplace"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "regionid", которое мы создали
            'id'=>206613,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["regionid"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "gacookie", которое мы создали
            'id'=>206595,
            'values'=>array(
                array(
                    'value'=>$_COOKIE['_ga']
                )
            )
        ),
        array(
		#Нестандартное дополнительное поле "Откуда", которое мы создали
		'id'=>37894,
		'values'=>array(
		  array(
			'value'=>$order_type
		  )
		)
	  ),
        array(
            #Нестандартное дополнительное поле "phraseid", которое мы создали
            'id'=>205465,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["phraseid"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "position", которое мы создали
            'id'=>206593,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["position"]
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "Offline сделка", которое мы создали
            'id'=> 203585,
            'values'=>array(
                array(
                    'value'=>431837
                )
            )
        ),
        array(
            #Нестандартное дополнительное поле "тип продукта", которое мы создали
            'id'=> 203229,
            'values'=>array(
                array(
                    'value'=>431323
                )
            )
        ),

        array(
		#Нестандартное дополнительное поле "utm_source", которое мы создали
		'id'=>37896,
		'values'=>array(
		  array(
			'value'=>$utm_source
		  )
		)
	  ),
	  array(
		#Нестандартное дополнительное поле "utm_campaign", которое мы создали
		'id'=>37898,
		'values'=>array(
		  array(
			'value'=>$utm_campaign
		  )
		)
	  ),
	   array(
            #Нестандартное дополнительное поле "cid", которое мы создали
            'id'=>203301,
            'values'=>array(
                array(
                    'value'=>$utm_content_arr["campaignid"]
                )
            )
        ),
	  array(
          #Нестандартное дополнительное поле "utm_term", которое мы создали
          'id'=>203299,
          'values'=>array(
              array(
                  'value'=>$utm_contentAll
              )
          )
      ),
	  array(
		#Нестандартное дополнительное поле "utm_term", которое мы создали
		'id'=>37900,
		'values'=>array(
		  array(
			'value'=>$utm_term
		  )
		)
	  )
	)
  )
);
$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/set';

$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
#Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($leads));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
 
$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);

$code=(int)$code;
$errors=array(
  301=>'Moved permanently',
  400=>'Bad request 3',
  401=>'Unauthorized',
  403=>'Forbidden',
  404=>'Not found',
  500=>'Internal server error',
  502=>'Bad gateway',
  503=>'Service unavailable'
);
try
{
  #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
  if($code!=200 && $code!=204)
	throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
}
catch(Exception $E)
{
  //die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
}
 
/**
 * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
 * нам придётся перевести ответ в формат, понятный PHP
 */
$Response=json_decode($out,true);
$Response=$Response['response']['leads']['add'];
 
$order_id = $Response[0]['id'];
/*
foreach($Response as $v)
  if(is_array($v))
	$output.=$v['id'].PHP_EOL;
return $output;
*/
if ($name == ""){
	$name = "Клиент";
}
if ($copy == 0){
	#Создание контакта
	$contacts['request']['contacts']['add']=array(
	  array(
		'name'=>$name, #Имя контакта
		'linked_leads_id'=>array(
			$order_id
		),
		'custom_fields'=>array(
		  array(
			#Телефоны
			'id'=>31732, #Уникальный индентификатор заполняемого дополнительного поля
			'values'=>array(
			  array(
				'value'=>$true_phone,
				'enum'=>'MOB' #Мобильный
			  )
			)
		  ),
		  array(
			#E-mails
			'id'=>31734,
			'values'=>array(
			  array(
				'value'=>$email,
				'enum'=>'WORK', #Рабочий
			  )
			)
		  )
		)
	  )
	);

	$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/set';
	$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
	#Устанавливаем необходимые опции для сеанса cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
	curl_setopt($curl,CURLOPT_URL,$link);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
	curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($contacts));
	curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
	curl_setopt($curl,CURLOPT_HEADER,false);
	curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
	 
	$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
	$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
}
else
{
	$orders_list = $resp_test['contacts'][0]["linked_leads_id"];
	$orders_list[] = $order_id;
	$contacts['request']['contacts']['update']=array(
	  array(
		'id'=>$resp_test['contacts'][0]['id'],
		'last_modified'=>time(),	
		'linked_leads_id'=> $orders_list
	  )
	);
	
	$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/set';
	$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
	#Устанавливаем необходимые опции для сеанса cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
	curl_setopt($curl,CURLOPT_URL,$link);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
	curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($contacts));
	curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
	curl_setopt($curl,CURLOPT_HEADER,false);
	curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
	 
	$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
	$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
}	
# Создаем "примечание"
$notes['request']['notes']['add']=array(
  array(
	'element_id'=>$order_id,
	'element_type'=>2,
	'note_type'=>4,
	'text'=>$text_copy.$amo_message,
	'responsible_user_id'=>1475095,
  )
);
$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/notes/set';
$curl=curl_init(); #Сохраняем дескриптор сеанса cURL
#Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($notes));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
 
$out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
?>	