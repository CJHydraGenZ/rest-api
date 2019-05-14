<?php


// untuk mengambil json
$data = file_get_contents('coba.json');

// kalao mau jdi array tambahin true
$mahasiswa = json_decode($data, true);


// var_dump($mahasiswa);


echo $mahasiswa[0]['pembingbing']['pembingbing1'];
