<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> قاعدة بيانات الطلاب</title>
    <link rel="stylesheet" href="main.css">
</head>
<body dir="rtl">    -
<?php 
include("conact.php");
$res = mysqli_query($con,"select * from student1");
$id="";
$name ="";
$addres = "";
if (isset($_POST['id'])) {
    $id = $_POST["id"];
}
if (isset($_POST['name'] )) {
    $name= $_POST["name"];
}
if (isset($_POST['addres'] )) {
    $addres= $_POST["addres"];
}



$sqls ="";
if(isset($_POST["add"])) {
    $sqls = "insert into student1 value ($id,'$name','$addres')";
    mysqli_query($con,$sqls);
    header("location: index.php");
}
if(isset($_POST["del"])) {
    $sqls = "delete from student1 where name ='$name'";
    mysqli_query($con ,$sqls);
    header("location: index.php");
}
?>
    <div id = "main">
        <form action="" method="post">
        <aside>
            <div>
                <img src="https://www.netclipart.com/pp/m/173-1730195_student-png-high-school-student-cartoon.png" width=100px alt="لوقو الموقع" >
                <h2>لوحة التحكم</h2>
                <label for="#id">رقم هوية الطالب</label><br>
                <input type="text" name="id" id="id"><br>
                <label for="#name">اسم الطالب </label><br>
                <input type="text" name="name" id="name"><br>
                <label for="#addres">عنوان الطالب</label><br>
                <input type="text" name="addres" id="addres"><br> 
                <button name="add">اضافة</button>
                <button name="del">حذف</button>
            </div>
        </aside>

        <main>
            <table id="table">
                <tr>
                    <th>رقم الهوية</th>
                    <th>اسم الطالب</th>
                    <th>عنوان الطالب</th>
                </tr>
                <?php 
                while($row = mysqli_fetch_array($res) ){
                    echo"<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["addres"]."</td>";
                    echo"</tr>";

                }
                 ?>
                
            </table>
        </main>
        </form>
    </div>
</body>
</html>  