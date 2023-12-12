<?php
echo date('d/m/Y')."<br>";
echo date('d M Y')."<br>";
echo date('t ')."<br>";
echo date("o")."<br>";
echo date('h :i :s a')."<br>";
date_default_timezone_set('Asia/kolkata')."<br>";
echo date('h :i :s a')."<br>";
date_default_timezone_set('Asia/seoul')."<br>";
echo date('h :i :s a')."<br>";   

date_default_timezone_set('America/Phoenix')."<br>";
echo date('h :i :s a')."<br>"; 
?>