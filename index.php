 <?php
  
  // for example : https://steamcommunity.com/groups/libertyailesi , your group link. All you need is the group name at the end of the link -> "libertyailesi"
  // örneğin: https://steamcommunity.com/groups/libertyailesi, grup bağlantınız olsun. İhtiyacınız olan tek şey, bağlantının sonundaki grup adı -> "libertyailesi"
  
 $name = "libertyailesi";   //only edit here
 
 echo "<b>" . $name . "</b><br>"; 
 echo cek("https://steamcommunity.com/groups/$name/memberslistxml/?xml=1");

  function cek($giris)
 {

 $c = stream_context_create(
    array(
        "http" => array(
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
        )
    )
);
 
    $giris = file_get_contents($giris, 0, $c);
    preg_match('@<membercount>(.*?)</membercount>@si',$giris,$yaz);
    preg_match('@<membersOnline>(.*?)</membersOnline>@si',$giris,$yazz);	
	  echo "Steam Members Count | Üye Sayısı ->  ". $yaz[0] . "<br>";
    echo "Steam Online Members Count | Aktif Üye Sayısı -> " . $yazz[0];
			
 }
  
?>

