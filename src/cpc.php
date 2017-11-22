<?


$cpc_titles=array(
    '501' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">MasterSeal 501</span> ?',
    '531' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">MasterSeal 531</span> ?',
    '550' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">MasterSeal 550</span> ?',
    '588' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">MasterSeal 588</span> ?',
    '590' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">MasterSeal 590</span> ?',
    'lamposilex' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">Lamposilex</span> ?',
    'Pronto' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">Idrosilex Pronto</span> ?',
    'Sika109' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">Sika 109 ElastoCem</span> ?',
    'Sika150' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">Sikalastic - 150</span> ?',
    'Sika1' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">Sika 1</span> ?',
    'Sika101a' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">Sika 101a</span> ?',
    'Sika4a' => 'ВЫ ИСКАЛИ АНАЛОГ <span class="main-screen__price">Sika-4a Pulver</span> ?',


);
function changeTitle()
{
    global $cpc_titles;
    if( isset($_GET['tema']) && array_key_exists(trim($_GET['tema']),$cpc_titles) )
        return $cpc_titles[trim($_GET['tema'])];
    elseif ( isset($_GET['tema']) && array_key_exists(trim(iconv('cp1251','utf-8',$_GET['tema'])),$cpc_titles) )
        return $cpc_titles[trim(iconv('cp1251','utf-8',$_GET['tema']))];
    else
        return 'metacrete гидроизоляционные составы';
}
    function timeUtm()
    {
        $now = new DateTime("now", new DateTimeZone('Europe/Moscow'));

        $morning = clone $now;
        $morning->setTime(6, 30);

        $evening = clone $now;
        $evening->setTime(15, 0);

        $isWeekend = $now->format('N') >= 6;
        if ($now >= $morning && $now < $evening && !$isWeekend) {
            return 'Перезвоним в течение 4 минут';
        } else {
            return 'Мы перезвоним Вам в рабочее время';
        }


    }
	
?>