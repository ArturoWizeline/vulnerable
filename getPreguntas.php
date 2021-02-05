<?php
	include("conn.php");

	$questions=$_POST['questions'];

	$questions=explode(",", $questions);

	$stmt = $conn->query('SELECT q.id, q.question FROM questions q LEFT JOIN questionRelations r ON r.idHijo=q.id WHERE r.idPadre=?');

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