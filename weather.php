<?php include('include.php'); ?>


<!-- <form method="post">
  <input name="city" placeholder="city" />
  <input type = "submit" />
</form> -->



<?php
 // if($_SERVER['REQUEST_METHOD'] == "POST"){
    //$url = "http://api.openweathermap.org/data/2.5/forecast?q=".urlencode($_POST['city'])."&mode=json&appid=2de143494c0b295cca9337e1e96b00e0&units=imperial";
    //$url = "http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_POST['city'])."&mode=json&appid=2de143494c0b295cca9337e1e96b00e0&units=imperial";
	   $url = "http://api.openweathermap.org/data/2.5/weather?lat=".$_GET['lat']."&lon=".$_GET['lon']."&mode=json&appid=2de143494c0b295cca9337e1e96b00e0&units=imperial";
    $response = request($url,null, "GET");
    //print "<pre>".print_r($response->list[0]->main->temp, true)."</pre>";
    print "Longitude = ".$response->coord->lon."<br>";
    print "Latitude = ".$response->coord->lat."<br>";
    print "Location = ".$response->name."<br>";
    print "Tempature = ".ceil($response->main->temp)."° F<br>";
    print "Wind = ".$response->wind->speed." mph<br>";
    print "Humidity = ".$response->main->humidity." %<br>";

    $insta_date = $response->dt;
    $offset = 7*60*60;    // 7 hours
    $t12 =  gmdate('Y-m-d H:i:s', $insta_date-$offset);
    $d = gmdate('m-d-Y', $insta_date-$offset);
    // print "Date/Time = ".gmdate('m-d-Y H:i:s', $insta_date-$offset);
    print "Date/Time Checked = ".$d." (".date("g:i a", strtotime("$t12")).")";

    print "<pre>".print_r($response,true)."</pre>";
  //}
 ?>