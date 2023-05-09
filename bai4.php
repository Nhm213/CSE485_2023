<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="includes/all.js"></script>
    <link rel="stylesheet" href="includes/all.css">


</head>

<body>

    <form action="bai4.php" method="post">
        Id: <input type="text" name="id">
        Name:<input type="text" name="name">
        Age: <input type="text" name="age" id="age" onkeypress="return checkNumber(event)">
        Grade:<input type="text" name="grade" onkeypress="return checkNumber(event)">
        <button type="submit" id="submit">submit</button>
    </form>
    <?php
if($_SERVER['REQUEST_METHOD']=='POST'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];
        
$open = fopen('list-student.txt', 'r');
$contents = fread($open, filesize('list-student.txt'));
fclose($open);

$add = fopen('list-student.txt', 'a');
$data = $id.",".$name.",".$age.",".$grade. "\n";
if (strpos($contents, $id) === false){
$add = fopen('list-student.txt', 'a');
$data = $id.",".$name.",".$age.",".$grade. "\n";
fwrite($add, $data);
fclose($add);}
else{
    echo"<h4>Dữ liệu này đã có</h4>";
}
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