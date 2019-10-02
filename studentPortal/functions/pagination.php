<?php

	$query = "SELECT * FROM questions";
	$result = mysqli_query($con,$query);
	
	$total_questions = mysqli_num_rows($result);
	$total_pages = ceil ($total_questions/$per_page);
	
	echo "
    <center>
      <div id= 'pagination'>
        <a href= 'index.php?page=1' class='btn btn-dark' role='button' style='width:50px;'> << </a>";
        for ($i = 1; $i <= $total_pages ; $i++) {
          echo "<a href='index.php?page=$i' class='btn btn-outline-dark' role='button' >$i</a>";
        }
        echo "<a href='index.php?page=$total_pages' class='btn btn-dark' role='button' style='width:50px;'> >> </a>
      </div>
    </center>";
    
?>