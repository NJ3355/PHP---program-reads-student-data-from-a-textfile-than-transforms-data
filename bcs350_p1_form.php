<html>
<head>
<title>Student grade Input Page</title>

<style>
td {
	padding: 5px 10px;
}

th {
	background-color: gray;
}

</style>
</head>
<body>
<fieldset>
  <legend>BCS350_21695_Project1_Nick Johnson</legend>
  <p> Nick Johnson<br>RAM: R01495898<br>I certify that this submission is my own original work.</p>
 </fieldset>
<h2>Student Grade Input Page</h2>




<?php

$linesInFile = file("project1data.txt");
$studentInfo = array();
foreach($linesInFile as $line) {
       $lineParts = explode(" ", $line);
       $studentInfo[] = array('firstName'=>$lineParts[0], 'lastName'=>$lineParts[1], 'id'=>$lineParts[2]);
}

?>
<form action="BCS350_p1_process.php" method="POST">
<input type='hidden' name='studentArray' value="<?php echo htmlentities(serialize($studentInfo)); ?>" />  

               <table border="1">
               	<th>Student Name</th>
               	<th>ID</th>
               	<th>Grade</th>
               		
                       <?php
                       $grades = array();
                       foreach($studentInfo as $info) {

                               echo "
                               <tr>
                               		<td>{$info['lastName']}, {$info['firstName']}</td>
                               		<td>{$info['id']}</td>
                               		<td><select name=\"grades[]\">
									                  <option value=\"none\">None</option>
								                    <option value=\"A+\">A+</option>
									                 <option value=\"A\">A</option>
									                 <option value=\"A-\">A-</option>
									                 <option value=\"B+\">B+</option>
								                  	<option value=\"B\">B</option>
								                  	<option value=\"B-\">B-</option>
								                  	<option value=\"C+\">C+</option>
								                  	<option value=\"C\">C</option>
								                  	<option value=\"C-\">C-</option>
								                  	<option value=\"D+\">D+</option>
								                    	<option value=\"D\">D</option>
								                  	<option value=\"D-\">D-</option>
								                  	<option value=\"F\">F</option>
								                    	</select>
								                	</td>
							                  </tr>";

                       }		
                       ?>
                   
               </table>
                <input type="submit">
                <input type="reset">
       
</form>
</body>
</html>