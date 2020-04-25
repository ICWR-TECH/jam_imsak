<?php
//used in the terminal
date_default_timezone_set('Asia/Jakarta'); //waktu indonesia
$hari=['Monday'=>'Senin',"Tuesday"=>"Selasa",'Wednesday'=>'Rabu',"Thursday"=>"Kamis","Friday"=>"Jumat","Saturday"=>"Sabtu","Sunday"=>"Minggu"]; //hari
echo "
-----------------------------------------------------

Jadwal Muslim

-----------------------------------------------------
";
echo "Negara: ";
$country=trim(fgets(STDIN));

if(!$country){
	echo "Masukan negara dengan benar\n";
	exit;
}
echo "Kota: ";
$city=trim(fgets(STDIN));
echo "\n";
$file=file_get_contents("http://api.aladhan.com/v1/calendarByCity?city=".$city."&country=".$country."&method=8"); //url api
$asd=json_decode($file,true); //decode json menjadi array
$wasu=date("d")-1; //mengambil data array
//panggil array
        echo "Tanggal: ".$asd['data'][$wasu]['date']['readable']." Hari: ".$hari[$asd['data'][$wasu]['date']['gregorian']['weekday']['en']]."\n";
        echo "Terbit: ".$asd['data'][$wasu]['timings']['Sunrise']."\n";
        echo "Terbenam: ".$asd['data'][$wasu]['timings']['Sunset']."\n";
        echo "Tengah malam: ".$asd['data'][$wasu]['timings']['Midnight']."\n";
        echo "Subuh: ".$asd['data'][$wasu]['timings']['Fajr']."\n";
        echo "Dhuhur: ".$asd['data'][$wasu]['timings']['Dhuhr']."\n";
        echo "Ashar: ".$asd['data'][$wasu]['timings']['Asr']."\n";
        echo "Maghrib: ".$asd['data'][$wasu]['timings']['Maghrib']."\n";
        echo "Isya: ".$asd['data'][$wasu]['timings']['Isha']."\n";
        echo "Imsak: ".$asd['data'][$wasu]['timings']['Imsak']."\n\n";
?>
