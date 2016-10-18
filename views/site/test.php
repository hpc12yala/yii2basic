<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo '<HR>';
echo $title;
echo '<HR>';
echo 'TEST';

echo 'DAta From Controller:' . $dog;
echo '<hr>';
print_r($ar);
print_r($p);
echo '<hr>';
foreach ($p as $key) {
    echo $key['Fname'] . ' : ' . $key['LName'] . ' : ' . $key['Age'].'<hr>';
}
echo '<hr>';
foreach ($ca as $k) {
    echo 'Car Name: '.$k[0] . ' Total: ' . $k[1] . ' Balance: ' . $k[2].'<hr>';
}


