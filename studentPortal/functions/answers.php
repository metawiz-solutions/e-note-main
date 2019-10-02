<?php			

			$get_id = $_GET['question_id'];
				
			$get_answers = "SELECT * FROM answers WHERE answer_for = '$get_id' ORDER by 1 DESC";
			
			$run_answer = mysqli_query($con,$get_answers);
			
			while($row=mysqli_fetch_array($run_answer)){
				
				$answer = $row ['answer_content'];
				$answerBy = $row ['answer_from'];
				$date = $row ['answer_date'];
				
				echo "
				<div id='comments'>
				<p3>$answerBy</p3> <span><kbd> $date </kbd></span>
				<p>$answer</p>
				</div>
				
				";				
			}
			
?>