<?php
// Connecting to Database


use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

include("../database/database.php");
include("../../vendor/autoload.php");

// Student Sign up
function getQuestions() {

    global $con;
    $per_page = 5;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $start_from = ($page - 1) * $per_page;

    $get_questions = "SELECT * FROM questions ORDER by 1 DESC LIMIT $start_from, $per_page"; // WHERE status = '1' (to show only approved)
    $run_questions = mysqli_query($con, $get_questions);

    while ($row_questions = mysqli_fetch_array($run_questions)) {

        $question_id = $row_questions['question_id'];
        $user_id = $row_questions['question_from'];
        $question_content = $row_questions['question_content'];
        $question_date = $row_questions['question_date'];

        $students = "SELECT * FROM students WHERE student_id='$user_id'";

        $run_students = mysqli_query($con, $students);
        $row_students = mysqli_fetch_array($run_students);

        $student_username = $row_students['student_username'];

        echo "
      <div class='questionsBox'>
        <div class='questionContent'>
          $question_content
        </div>
        <div class='questionFooter'>
          <a href='./singleQuestionPage.php?question_id=$question_id'> <button class='btn'>View Answer</button></a>
          <span>Posted by @ $student_username on $question_date </span>
        </div>
      </div> 
      ";
    }
    include("pagination.php");
}


function getNotes() {
    global $con;
    $per_page = 5;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $start_from = ($page - 1) * $per_page;

    $get_questions = "SELECT * FROM notes where status=5 or status=1 ORDER by 1 DESC"; // WHERE status = '1' (to show only approved)
    $run_questions = mysqli_query($con, $get_questions);

    while ($row_notes = mysqli_fetch_array($run_questions)) {
        $id = $row_notes['id'];
        $grade = $row_notes['grade'];
        $title = $row_notes['title'];
        $summarized_text = utf8_encode($row_notes['scraped_text']);
        $subject = $row_notes['subject'];

        echo "
      <div class='questionsBox'>
        <div class='questionContent'>
        <h4>$title</h4>
          $summarized_text
        </div>
        <div class='questionFooter'>
        <a href='note.php?note_id=$id' class='btn btn-outline-warning mt-2'>Summarize Note</a>
          <span>Grade $grade | $subject</span>
        </div>
      </div> 
      ";
    }
}

function summarize() {
    global $con;
    $note = mysqli_query($con, 'SELECT * FROM notes WHERE id=' . $_GET['note_id']);
    if (mysqli_num_rows($note)) {
        while ($row = mysqli_fetch_assoc($note)) {
            $client = new Client();
            try {
                $res = $client->post('http://ec2-13-58-156-104.us-east-2.compute.amazonaws.com:8100/summarize', [
                    RequestOptions::JSON => ['text' => utf8_encode($row['scraped_text'])]
                ]);
                if ($res->getStatusCode() === 200) {
                    $result = json_decode($res->getBody()->getContents())->result;
                    $grade = $row['grade'] !== null ? $row['grade'] : 'GRADE_UNKNOWN';
                    $subject = $row['subject'] !== null ? $row['subject'] : 'SUBJECT_UNKNOWN';
                    $title = $row['title'] !== null ? $row['title'] : 'TITLE_UNKNOWN';
                    echo "<h5>" . $title . "</h5>";
                    echo "<div class='card'><div class='card-body'>" . $result . "<br><h5><span class='badge badge-info'>Subject: $subject | Grade: $grade</span></h5></div></div>";
                } else
                    echo "ERROR";
            } catch (Exception $exception) {
                var_dump($exception);
            }
        }
    } else
        echo "ERROR-NUM_ROWS";
}