<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	// $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=GWCourses', 'postgres', 'phamkhoa391999');
	$db = parse_url(getenv("DATABASE_URL"));

    $pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
    ));


	$sql = "SELECT studentname, course, dob, gender, fav FROM registercourse";
	$stmt = $pdo->prepare($sql);
	//Thiết lập kiểu dữ liệu trả về
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$resultSet = $stmt->fetchAll();
	?>
	<ul>
	  <?php
		foreach ($resultSet as $row) {
			echo '<li>'.
			$row['studentname'] . ' -- ' . $row['course'] . ' -- ' . $row['dob'] . ' -- ' . $row['gender'] . ' -- ' . $row['fav'] . '</li>';
		}
	  ?>
	</ul>
</body>
</html>