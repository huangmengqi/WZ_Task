<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!--link type="text/css" href="css/main.css" rel="stylesheet"-->
	<title>管理员</title>
	<link type="text/css" href="css/person.css" rel="stylesheet">
	<style type="text/css">
		#store {
			float: left;
			position: absolute;
			left: 700px;
			top: -200px;
		}
		
		.login1 {
			position: relative;
			top: 100px;
		}
	</style>
</head>

<body>
	
    <form type="file" action="import_user_action.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file" /> 
        <br/>
        <input type="submit" name="submit" value="上传" />
    </form>
</body>
</html>