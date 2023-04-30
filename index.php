<?php

$host = "172.17.0.2:3306";
$dbname = "redlock";
$username = "user1";
$password = 'pass1';

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
  die("connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$res = mysqli_query($conn,$sql);

// echo "mysqli_fetch_row: ";
// var_dump(mysqli_fetch_row($res));
// echo "mysqli_fetch_assoc: ";
// var_dump(mysqli_fetch_assoc($res));
// echo "mysqli_fetch_array: ";
// var_dump(mysqli_fetch_array($res));
// echo "mysqli_fetch_object: ";
// var_dump(mysqli_fetch_object($res));

$total  = count(mysqli_fetch_all($res));

function query($quer){
  global $conn;
  $hasil = mysqli_query($conn, $quer);
  while($row = mysqli_fetch_assoc($hasil)){
    $rows[]=$row;
  };
  // var_dump($rows);
  return $rows;
}
$result = query($sql);

echo "<table border=2 style='font-size: 1.2em; margin:0 auto;'>";
echo "<tr> <td colspan=4 style='text-align:center'>RedLock database, table users</td></tr>";
echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>Nama</th>";
  echo "<th>Alamat</th>";
  echo "<th>Jabatan</th>";
echo "</tr>";
// $conn->exec($sql);
// var_dump($datas->rowCount());



foreach($result as $data){
  // var_dump($data);
  echo "<tr>";
    echo "<th>{$data['ID']}</th>";
    echo "<th>{$data['Nama']}</th>";
    echo "<th>{$data['Alamat']}</th>";
    echo "<th>{$data['Jabatan']}</th>";
  echo "</tr>";
}
// echo "<tr><td colspan=4>Total User: {$total} </td></tr>";
echo "</table>";


mysqli_close($conn);

?>