<?php
   $host = "ec2-34-227-135-211.compute-1.amazonaws.com";
   $db = "de0tp7utge4rrd";
   $dbusr = "dndnxbczzejamz";
   $dbpwd = "de31f9eff45c0983cc6170e86ddbf8f1d6c34d2857f66e979d1827b8e7130300";   
   $dsn = "pgsql:host=".$host.";port=5432;dbname=".$db.";user=".$dbusr.";password=".$dbpwd;
   $loginName="";
   
   try
   {
	   $pdo = new PDO($dsn, $usr, $pwd);
	   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_BOTH);
	   $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   $sql = 'select * from loginTable';
	   $stmt = $pdo->prepare($sql);
	   $stmt->execute();
	   $details = $stmt->fetch();
		$usr = $_POST["usr"];
		$pwd = $_POST["pwd"];
		if($usr == $details[0] && $pwd == $details[1])
		{
			$loginName = "Welcome Admin";
		}
		else
		{
			$loginName = "Login Failed";
		}
   }
   catch (PDOException $e) {
	   echo 'Connection failed: ' . $e->getMessage();
   }	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>	
		<link rel="stylesheet" href="sitestyle.css">	
	</head>
	<body>		
		<header>
			<h1>Cloud Login Result</h1>
		</header>	
		<hr>
		<article>			
			<section>
				<h2> <?php echo $loginName ?></h1>
			</section>
		</article>
		<footer>
			Developed by K Anbarasan
		</footer>
	</body>
</html>


