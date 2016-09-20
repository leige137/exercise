<?php
date_default_timezone_set('PRC');
while(true){
	$redis1 = new Redis();
	$ret1 = $redis1->connect('10.32.26.30',6379);

	$redis2 = new Redis();
	$ret2 = $redis2->connect('10.32.26.29',6379);

	$key = 'a_now_sz000001';
	$content1 = $redis1->get($key);
	$content2 = $redis2->get($key);
	
	
	
	if($content1 == $content2){
		echo date('Y-m-d H:i:s')." 1 yes\n";
	} else {
		echo date('Y-m-d H:i:s')." 1 no\n";
		echo $content1."\n";
		echo $content2."\n";
	}
	$day = date('Y-m-d');
	$key2 = 'sz000001'.$day;
	$content3 = $redis1->get($key2);
	$content4 = $redis2->get($key2);
	
	if($content3 == $content4){
		echo date('Y-m-d H:i:s')." 2 yes\n";
	} else {
		echo date('Y-m-d H:i:s')." 2 no\n";
		echo $content3."\n";
		echo $content4."\n";
	}

	$redis1->close();
	$redis2->close();
	
	$time = date('H:i:s');
	if($time > '16:40:00')
		break;
	sleep(1);

}
?>
