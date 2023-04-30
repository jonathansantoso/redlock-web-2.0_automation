<?php

echo "test";

// $conn = mysqli_connect(
//   '172.21.0.2',
//   'redlock',
//   'password1',
//   'user1'
// );

// $table_name = "users";
// try{
//   $query = "SELECT * FROM $table_name";
//   $res = mysqli_query($conn, $query);
//   echo"<strong>$table_name:</strong>";
//   while($i = mysqli_fetch_assoc($res)){
//     echo "<p>". $i['ID'] . "</p>";
//     echo "<p>". $i['Nama'] . "</p>";
//     echo "<p>". $i['Alamat'] . "</p>";
//     echo "<p>". $i['Jabatan'] . "</p>";
//     echo "<hr>";
//   }
// }catch(Exception){
//   throw new Exception("somethings wrong");
// }

$host = "172.17.0.2";
$port = 3306;
$dbname = "redlock";
$username = "user1";
$password = "pass1";

echo "$host:$port $username, $password, $dbname";

$sql = <<<SQL
  SELECT * FROM users
SQL;

try{
  echo "<table border=2 style='font-size: 1.2em; margin:0 auto;'>";
  echo "<tr> <td colspan=4 style='text-align:center'>RedLock database, table users</td></tr>";
  echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nama</th>";
    echo "<th>Alamat</th>";
    echo "<th>Jabatan</th>";
  echo "</tr>";
  $conn =  new PDO("mysql:host=$host:$port;dbname=$dbname",$username,$password);
  // $conn->exec($sql);
  $datas = $conn->query($sql);
  // var_dump($datas->rowCount());
  foreach($datas as $data){
    echo "<tr>";
      echo "<th>{$data['ID']}</th>";
      echo "<th>{$data['Nama']}</th>";
      echo "<th>{$data['Alamat']}</th>";
      echo "<th>{$data['Jabatan']}</th>";
    echo "</tr>";
  }
  //tambahan jenkins patch (show total jumlah user di database);
  // echo "<tr><td colspan=4 style=''>total Jumlah user: {$datas->rowCount()}</td></tr>";
  echo "</table>";
$conn =  null;
}catch(PDOException $exception){

  echo "Error connect ke mysql db: " . $exception->getMessage() . PHP_EOL;
}

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }


?>