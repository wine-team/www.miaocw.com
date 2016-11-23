 <?php
function js($dirname, $file_name, $version=1.0)
{
	echo '<script type="text/javascript" src="'.$dirname.'/js/'.$file_name.'.js?v='.$version.'"></script>';
}

function css($dirname, $file_name, $version=1.0)
{
	echo '<link rel="stylesheet" type="text/css" href="'.$dirname.'/css/'.$file_name.'.css?v='.$version.'"/>';
}

function pr($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

function redirectAction($uri = '', $method = 'location', $http_response_code = 302)
{
	if (!preg_match('#^https?://#i', $uri)) {
		$uri = base_url($uri);
	}

	switch($method) {
		case 'refresh' :
			header("Refresh:0;url=".$uri);
			break;
		default :
			header("Location: ".$uri, TRUE, $http_response_code);
			break;
	}
	exit;
}

/**
 * Validate mobile phone
 * @param unknown $mobile
 * @return boolean
 */
function valid_mobile($mobile)
{
	return (!preg_match('/^1[23456789]\d{9}$/', $mobile)) ? FALSE : TRUE;
}

/**
 * Validate email address
 *
 * @access	public
 * @return	bool
 */
function valid_email($address)
{
	return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $address)) ? FALSE : TRUE;
}


/**
 * 只保留字符串首尾字符，隐藏中间用*代替（两个字符时只显示第一个）
 * @param string $user_name 姓名
 * @return string 格式化后的姓名
 */
function substr_cut($user_name)
{
	$strlen   = mb_strlen($user_name, 'utf-8');
	$firstStr = mb_substr($user_name, 0, 1, 'utf-8');
	$lastStr  = mb_substr($user_name, -1, 1, 'utf-8');
	return $strlen == 2 ? $firstStr . str_repeat('*', mb_strlen($user_name, 'utf-8') - 1) : $firstStr . str_repeat('*', $strlen - 2) . $lastStr;
}



/**
 * 发送邮件
 * @param string $mail_to
 * @param string $mail_subject
 * @param string $mail_message
 * @param string $mail_from
 * @param string $mail_name
 */
function sendEmails($mail_to, $mail_subject, $mail_message, $mail_from, $mail_name='')
{
	$CI = & get_instance();
	$CI->load->library('email');
	$config['protocol'] = 'sendmail';
	$config['charset'] = 'utf-8';
	$config['wordwrap'] = TRUE;
	$config['mailtype'] = 'html';
	$CI->email->initialize($config);

	$CI->email->from($mail_from, $mail_name);
	$CI->email->to($mail_to);
	$CI->email->subject($mail_subject);
	$CI->email->message($mail_message);
	$CI->email->send();
	$CI->email->clear();
}

/**
 * 发送邮件
 * @param unknown $recipient
 * @param string $subject
 * @param string $message
 */
function send_email($recipient, $subject = 'Test email', $message = 'Hello World')
{
	return mail($recipient, $subject, $message);
}

 /**
 * 获取所有的分类
 * 菜单栏需要
 * memcache 缓存
 */
function getAllCategory() {
	
	$CI = & get_instance();
	$CI->load->model('mall_category_model','mall_category');
	if (!$CI->cache->memcached->get('categoryCache')) {
	    $allCategory = $CI->mall_category->getAllCategory();
	    $CI->cache->memcached->save('categoryCache',$allCategory,365*24*3600);
	} else {
	    $allCategory = $CI->cache->memcached->get('categoryCache');
	}
	return $allCategory;
}

/**
 * 获取url ? 后参数
 * */
function create_suffix($arr, $key='')
{
    if (!empty($key)) {
        $key_arr = explode(',', $key);
        foreach ($key_arr as $val) {
            if (isset($arr[$val])) unset($arr[$val]);
        }
    }
    return http_build_query($arr);
}

/**
 * 获取搜索价格范围
 * */
function get_priceRange()
{
    return array(
        '1'=>'0-100', 
        '2'=>'100-500', 
        '3'=>'500-1000', 
        '4'=>'1000-2500', 
        '5'=>'2500-以上'
    );
}


