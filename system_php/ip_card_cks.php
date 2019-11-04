<?php
function ip_card_chk($ip_card) {
	 $sum = 0;
	 $ip_card_list = str_split($ip_card);
	for ($i=0, $k=13; $i<=11 ; $i++, $k--){
		$sum += $k*$ip_card_list[$i];
	}
	$digit_chk = $sum%11;
	if ($digit_chk <= 1){
		$digit_chk = 1-$digit_chk;
	}
	else{
		$digit_chk = 11-$digit_chk;
}
	if($digit_chk == $ip_card_list[12]){
	return true;
}
	return false;
}
?>
