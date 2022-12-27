<?php
    function pai($radius){
        $radius * $radius * 3.14;
    }


    $varPai = pai(3);
    echo $varPai;
    // echo pai(3);

    function paiR($radius){
        return $radius * $radius * 3.14;
    }
    $varPaiR = paiR(3);
    echo $varPaiR;
    // echo paiR(3);






    // function hello() {
    //     echo "hello";
    // }
    // $hello = hello();
    // echo "<h1>$hello</h1>";


    
?>