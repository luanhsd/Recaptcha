<?php 
$comando='slimerjs '.dirname(__FILE__).'\slimer_lattes.js';
echo $comando;
$system=System($comando);
$exec=  exec($comando);
var_dump($system);
var_dump($exec);


//

