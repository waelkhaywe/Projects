<?php
if(isset($_POST['submit'])){
  $valueconv = $_POST['valueconv'];
  $typeconv = $_POST['typeconv'];

   if($typeconv == "fahrenheit"){
       $conv = ((9/5) * $valueconv) + 32;
       echo "The initial temperature was $valueconv C. The new temperature is $conv F.";
}
   }
    else {
       $conv = ($valueconv - 32) * (5/9);
       echo "The initial temperature was $valueconv F. The new temperature is $conv C.";
   }
  


?>