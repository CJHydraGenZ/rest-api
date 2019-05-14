<!-- mengubah array menjadi json_decode -->

<?php

// pdo
// mengambil data di database dan mengubahnya menjadi jsnon
$dbh = new PDO('mysql:host=localhost;dbname=phpdasar', 'root', '');

$db  = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();


$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);


// mysqli
// $conn = mysqli_connect('localhost', 'root', '', 'phpdasar');
// $result =  mysqli_query($conn, 'SELECT * FROM mahasiswa');

// while ($mahasiswa = mysqli_fetch_assoc($result)) {
//     $data = json_encode($mahasiswa);

//     echo $data;
// }


// $mahasiswa = [

//     [
//         "nama" => "cahya",
//         "nim" => "170030390",
//         "email" => "cahya@"
//     ],
//     [
//         "nama" => "Tahie",
//         "nim" => "170030390",
//         "email" => "cahya@"
//     ],
//     [
//         "nama" => "cahya",
//         "nim" => "170030390",
//         "email" => "cahya@"
//     ]
// ];


// mengubah data menjadi json
$data = json_encode($mahasiswa);

echo $data;

?>