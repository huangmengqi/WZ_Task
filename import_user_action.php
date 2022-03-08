<?php
    ini_set("display_errors", "On");
    error_reporting(E_ALL | E_STRICT);
    require_once 'mysql_connect.php';

    $file = $_FILES['file']['name'];
    $filetempname = $_FILES['file']['tmp_name'];

    require_once('/web/nginx/www/vendor/autoload.php');

    $objPHPExcel = PHPExcel_IOFactory::load($filetempname);
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow(); // 取得总行数
    $highestColumn = $sheet->getHighestColumn(); // 取得总列数
    
    
    for($j=2;$j<=$highestRow;$j++){
        $str = "";
        for($k='A';$k<=$highestColumn;$k++){
            // echo $k;
            $str .= iconv("UTF-8","gbk",$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue()).'\\';//读取单元格
        }
        $strs = explode("\\",$str);
        // print_r($strs);
        $sql = "insert ignore into users(user_id,pwd,user_name,ID,date) 
        value('" .$strs[0] ."','" .$strs[1] ."','" .$strs[2] ."','" .$strs[3]."',now()" .")";
        // echo $sql;
        $result = mysqli_query($link,$sql) or die("导入失败：" .mysqli_error($link));
        if(!$result){
            echo "<script language='javascript'>";
            echo "alert('导入失败！');";
            echo "window.location.href='admin.php';";
            echo "</script>";
        }else{
            
            echo "<script language='javascript'>";
            echo "alert('导入成功！');";
            echo "window.location.href='admin.php';";
            echo "</script>";
        }
    }
    
 ?>