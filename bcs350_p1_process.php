<?php


$grades = $_POST['grades'];
  
?>
<html>
<head>
  <title>Student Grade Output</title>

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
 </fieldset><br><br>
<h1>Student Grade Output Page</h1>



<?php



$linesInFile = file("project1data.txt");
$studentInfo = array();
foreach($linesInFile as $line) {
       $lineParts = explode(" ", $line);
       $studentInfo[] = array('firstName'=>trim($lineParts[0]), 'lastName'=>trim($lineParts[1]), 'id'=>trim($lineParts[2]));
}




?>



                <table border="1">
                  <th>Student Name</th>
                  <th>ID</th>
                  <th>Grade</th>
                  
                       <?php


                       $i = 0;
                       foreach($studentInfo as $info) {
                        
                        

                               echo "
                               <tr>
                                  <td>{$info['lastName']}, {$info['firstName']}</td>
                                  <td>{$info['id']}</td>
                                  <td>$grades[$i]</td>
                                   
                                  
                                </tr>";

                          $i++;
                                 
                       }    



                       ?>
                   
                </table>



                <h1>Grade Statistics</h1>
                <?php
                       
                $countingDefault = array(
                  'A+' => 0,
                  'A' => 0,
                  'A-' => 0,
                  'B+' => 0,
                  'B' => 0,
                  'B-' => 0,
                  'C+' => 0,
                  'C' => 0,
                  'C-' => 0,
                  'D+' => 0,
                  'D' => 0,
                  'D-' => 0,
                  'F' => 0,
                  'none' => 0);
               $countedArray = array_count_values($grades);

               $countedArray = array_merge($countingDefault, $countedArray);
               ?>




               <table border='1'>
                  <th>Grade</th>
                  <th>Count</th>

               <?php

               echo "<p>The number of students is ".sizeof($grades);


                foreach ($countedArray as $key => $value)
                  {
                echo "
                
                    <tr>
                       <td>$key</td>
                       <td>$value</td>
                    </tr>";

                    }

              $file = 'project1data_new.txt';
              $content ="";
              $x = 0;
                foreach ($studentInfo as $info2)
                {


                  

                $content .= "{$info2['firstName']}, {$info2['lastName']}, {$info2['id']}, {$grades[$x]} \n";
                $x++;
                
                
                }
file_put_contents($file, $content);


                ?>



                </table>

                

</body>
</html>
