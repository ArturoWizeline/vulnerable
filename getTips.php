<?php
	include("conn.php");

	$questions=$_POST['questions'];

	$questions=explode(",", $questions);

	$stmt = $conn->query('SELECT t.tip, t.description, t.clientsideExample, t.serversideExample FROM tips t LEFT JOIN tipsRelations r ON r.idTip=t.id WHERE r.idQuestion='.$question.' ORDER BY t.id');

	$options=array();

	$x=0;
	foreach ($questions as $question) {
		if(is_numeric($question)){
			$stmt->execute();
			$result = $stmt->get_result();

			while ($row = $result->fetch_array(MYSQLI_NUM))
			{
				if(!in_array($row, $options)){
					$options[$x]=($row);
					$x++;
				}
			}
		}
	}

	echo(json_encode($options));

	$stmt->close();
	$conn->close();
?>