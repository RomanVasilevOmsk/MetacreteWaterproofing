<?


$cpc_titles=array(
    '501' => 'На АНАЛОГЕ <span class="main-screen__price">MasterSeal 501</span>',
    '531' => 'На АНАЛОГЕ <span class="main-screen__price">MasterSeal 531</span>',
    '550' => 'На АНАЛОГЕ <span class="main-screen__price">MasterSeal 550</span>',
    '588' => 'На АНАЛОГЕ <span class="main-screen__price">MasterSeal 588</span>',
    '590' => 'На АНАЛОГЕ <span class="main-screen__price">MasterSeal 590</span>',
    'lamposilex' => 'На АНАЛОГЕ <span class="main-screen__price">Lamposilex</span>',
    'Pronto' => 'На АНАЛОГЕ <span class="main-screen__price">Idrosilex Pronto</span>',
    'Sika109' => 'На АНАЛОГЕ <span class="main-screen__price">Sika 109 ElastoCem</span>',
    'Sika150' => 'На АНАЛОГЕ <span class="main-screen__price">Sikalastic - 150</span>',
    'Sika1' => 'На АНАЛОГЕ <span class="main-screen__price">Sika 1</span>',
    'Sika101a' => 'На АНАЛОГЕ <span class="main-screen__price">Sika 101a</span>',
    'Sika4a' => 'На АНАЛОГЕ <span class="main-screen__price">Sika-4a Pulver</span>',


);
function changeTitle()
{
    global $cpc_titles;
    if( isset($_GET['tema']) && array_key_exists(trim($_GET['tema']),$cpc_titles) )
        return $cpc_titles[trim($_GET['tema'])];
    elseif ( isset($_GET['tema']) && array_key_exists(trim(iconv('cp1251','utf-8',$_GET['tema'])),$cpc_titles) )
        return $cpc_titles[trim(iconv('cp1251','utf-8',$_GET['tema']))];
    else
        return '';
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