<?php

$f = fopen("E:/History.csv", "rt") or die("ќшибка!");

$k=0;

for ($i=0; $data=fgetcsv($f,1000,";"); $i++) {  

    $type[$i] = "$data[3]<br>"; 
    $type2[$i] = "$data[4]<br>";
    $type3[$i] = "$data[5]<br>"; 
    $k+=1;
}
//echo $k;
$y=0;
$u=0;
$p=0;

for ($i=1;$i< $k ; $i++) {

 if ($type[$i]==1) {
  
   if ( $type2[$i] == 1) {

      $p=$p+1;
      $r[i]=$type3[$i];
      $t[i]=($r[i]/60)+1;
      $int[i] = intval($t[i]);
      $int[i];   
      $u+=$int[i];
      
    }

   else $y+=1;

  }

 //else echo "<br>Ѕесплатный прием звонка<br>";

}
//echo $u,$y,$p;

$f2 = fopen("E:/Plans.csv", "rt") or die("ќшибка!");

$k2=0;

for ($n=1; $da=fgetcsv($f2,1000,";"); $n++) {

    $plan0[$n] = "$da[0]<br>";
    $plan1[$n] = "$da[1]<br>"; 
    $plan2[$n] = "$da[2]<br>";
    $plan3[$n] = "$da[3]<br>"; 
    $plan4[$n] = "$da[4]<br>";
    $plan5[$n] = "$da[5]<br>"; 
    $plan6[$n] = "$da[6]<br>";  
    //echo $plan2[$n];

$k2+=1;
    
}
//echo $k2;
//echo $plan2[1];
 
    for ($n=2; $n<=$k2; $n++) {

        if ( ($u >= $plan5[$n]) && ($y >= $plan6[$n]) ) {
         
         $l[$n] =  $plan1[$n]+$plan2[$n]*($p) + $plan3[$n]*($u-$p-$plan5[$n]) + $plan4[$n]*($y-$plan6[$n]);

         echo "затраты на тарифном плане $plan0[$n] составл€ют : $l[$n]<br>";
        }

        if ( ($u >= $plan5[$n]) && ($y < $plan6[$n] )) {
         
         $l[$n] =  $plan1[$n]+$plan2[$n]*$p + $plan3[$n]*($u-$p-$plan5[$n]) ;

         echo "затраты на тарифном плане $plan0[$n] составл€ют : $l[$n]<br>";
        }

        if ( ($u < $plan5[$n]) && ($y >= $plan6[$n])) {
         
         $l[$n] =  $plan1[$n]+$plan4[$n]*($y-$plan6[$n]) ;

         echo "затраты на тарифном плане $plan0[$n] составл€ют : $l[$n]<br>";
        }   


        if ( ($u < $plan5[$n]) && ($y < $plan6[$n] )) {
         
         $l[$n] =  $plan1[$n] ;

         echo "затраты на тарифном плане $plan0[$n] составл€ют : $l[$n]<br>";
        }   
      
}
           
fclose($f2);
fclose($f);

?>