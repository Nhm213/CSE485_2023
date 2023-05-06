<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="all.css">
</head>
<body >

    <form action="bai4.php" method="post" >
        Id: <input type="text"  name="id">
        Name:<input type="text" name="name" >
        Age: <input type="text" name="age">
        Grade:<input type="text" name="grade">
        <button type="submit" style="width:100%"></button>
</form>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];
        $add = fopen('list-student.txt', 'a');


// Write the form data to the file
$data = $id.",".$name.",".$age.",".$grade. "\n";
fwrite($add, $data);

// Close the file
fclose($add);
    }
    ?>  
   <?php

$handle = fopen('list-student.txt', 'r');
$table = '<table>';
while (!feof($handle)) {
  
    $line = fgets($handle);

    $data = explode(',', $line);


    $table .= '<tr>';
    foreach ($data as $cell) {
        $table .= '<td>' . $cell . '</td>';
    }
    $table .= '</tr>';
}
fclose($handle);

$table .= '</table>';

echo $table;
?>
</body>
</html>