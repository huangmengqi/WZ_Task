 <?php 
    ini_set("display_errors", "On");
    error_reporting(E_ALL | E_STRICT);
    require_once 'mysql_connect.php';
    header('Content-type: text/html; charset=utf-8');
    header("Content-type:application/vnd.ms-excel;charset=UTF-8"); 
    header("Content-Disposition:filename=exportuser.xls");
    $sql="select * from users";
    $result=mysqli_query($link,$sql);
    echo "user_id\tpwd\tuser_name\tID\tdate\n";
    while($row=mysqli_fetch_array($result)){
      echo $row[0]."\t".$row[1]."\t".$row[2]."\t".$row[3]."\t".$row[4]."\n";
    }
?>