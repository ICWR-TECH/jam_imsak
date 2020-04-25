<?php
// used on the website
error_reporting(0);
date_default_timezone_set('Asia/Jakarta'); //waktu indonesia
$hari=['Monday'=>'Senin',"Tuesday"=>"Selasa",'Wednesday'=>'Rabu',"Thursday"=>"Kamis","Friday"=>"Jumat","Saturday"=>"Sabtu","Sunday"=>"Minggu"]; //hari
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Jam muslim</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="shortcut icon" href="https://ecs7.tokopedia.net/blog-tokopedia-com/uploads/2019/05/Blog_Masjid-Terbesar-di-Indonesia-untuk-Ibadah-sambil-Wisata-Religi.jpeg">
	</head>
	<body class="container" style="margin-top:50px">
		<h1 class="text-center">Jam muslim</h1>
		<br>
		<form class="form-group" action="/" method="post">
			<label for="negara">Negara</label>
			<input type="text" name="country" value="" placeholder="Negara..." class="form-control" id="negara">
			<br>
			<label for="kota">Kota</label>
			<input type="text" name="city" value="" placeholder="Kota..." class="form-control" id="kota">
			<br>
			<input type="submit" value="Submit" class="btn btn-primary">
		</form>
		<?php
		$kotane=$_POST['city'];
		$negarane=$_POST['country'];

		if($_POST){
			function req($url){
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    $output = curl_exec($ch);
		    curl_close($ch);
		    return $output;
			}
			$file=req("http://api.aladhan.com/v1/calendarByCity?city=".$kotane."&country=".$negarane."&method=8"); //url api
			$asd=json_decode($file,true); //decode json menjadi array
			$wasu=date("d")-1;
			echo '<div class="card bg-light mb-3">';
			echo '<div class="card-header"><b>Kota: </b>'.$kotane.'<br><b>Negara: </b>'.$negarane.'</div>';
			echo "<div class='card-body'><b>Tanggal:</b> ".$asd['data'][$wasu]['date']['readable']." Hari: ".$hari[$asd['data'][$wasu]['date']['gregorian']['weekday']['en']]."<br>";
			echo "<hr><b>Terbit:</b> ".$asd['data'][$wasu]['timings']['Sunrise']."</hr><br>";
			echo "<hr><b>Terbenam:</b> ".$asd['data'][$wasu]['timings']['Sunset']."</hr><br>";
			echo "<hr><b>Tengah malam:</b> ".$asd['data'][$wasu]['timings']['Midnight']."</hr><br>";
			echo "<hr><b>Subuh:</b> ".$asd['data'][$wasu]['timings']['Fajr']."</hr><br>";
			echo "<hr><b>Dhuhur:</b> ".$asd['data'][$wasu]['timings']['Dhuhr']."</hr><br>";
			echo "<hr><b>Ashar:</b> ".$asd['data'][$wasu]['timings']['Asr']."</hr><br>";
			echo "<hr><b>Maghrib:</b> ".$asd['data'][$wasu]['timings']['Maghrib']."</hr><br>";
			echo "<hr><b>Isya:</b> ".$asd['data'][$wasu]['timings']['Isha']."</hr><br>";
			echo "<hr><b>Imsak:</b> ".$asd['data'][$wasu]['timings']['Imsak']."</hr></div></div><br><br>";
		}
		 ?>
		 <footer class="page-footer font-small blue" style="opacity:0.5">

     <!-- Copyright -->
     <div class="footer-copyright text-center py-3">
         Powered by :
         <a href="https://github.com/ICWR-TECH/" target="_blank">ICWR-TECH</a><br>
         Data from <a href="https://aladhan.com/" target="_blank">aladhan.com</a>
     </div>
     <!-- Copyright -->

     </footer>

	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
