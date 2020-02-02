<?php


$data = (Object)[
    "data1" => 12,
    "data2" => 13
];

$rumus = "12+data1+200";

$seperatorRumus = ["+","/"];
$valueRumus = ["12","data1","200"];

$seperator = ["+","-","/","*"];
function hitungkan($rumus=null, $data=null){

    foreach ($data as $yeet => $yeet2){
        $rumus = str_replace($yeet, $yeet2, $rumus);
    }

    echo eval("return ".$rumus.";");
}


?>
