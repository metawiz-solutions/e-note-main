<div class="msgBoxContent" style="margin-left: -120px; margin-top:40px;" >				
  <table width="700" style="background: #18605F;">
    <tr>
      <th>Sender</th>
      <th>Subject</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
    <?php
      $sel_msg = "SELECT * FROM messages WHERE message_to='$user_id'";
      $run_msg = mysqli_query($con,$sel_msg);
      $count_msg = mysqli_num_rows($run_msg);
      
        while($row_msg=mysqli_fetch_array($run_msg)){
          $msg_id = $row_msg['message_id'];
          $msg_reciver = $row_msg['message_to'];
          $msg_sender = $row_msg['message_from'];
          $msg_sub = $row_msg['message_subject'];
          $msg_date = $row_msg['message_time'];
          
          $get_sender = "SELECT * FROM students WHERE student_id='$msg_sender'";
          $run_sender = mysqli_query($con,$get_sender);
          $row = mysqli_fetch_array($run_sender);
          
          $sender_name = $row['student_username'];
    ?>

    <tr>
      <td> <?php echo $sender_name; ?> </td>

      <td>
      <a href="messages.php?inbox&msg_id=<?php echo $msg_id; ?>">
      <?php echo $msg_sub; ?>
      </a>
      </td>

      <td><?php echo $msg_date; ?></td>
      <td><a href="messages.php?inbox&msg_id=<?php echo $msg_id; ?>">Reply</a></td>
    </tr>
    <?php } ?>
    </table>

    <?php
      if(isset($_GET['msg_id'])){
        $get_id = $_GET['msg_id'];
        
        $sel_message = "SELECT * FROM messages WHERE message_id='$get_id'";
        $run_message = mysqli_query($con,$sel_message);
        $row_message = mysqli_fetch_array($run_message);
        
        $msg = $row_message['message_subject'];
        $reply =  $row_message['message_reply'];
        
        //update the unread msg to readdir
        $update_unread = "UPDATE messages SET message_status='read' WHERE message_id='$get_id'";
        $run_unread = mysqli_query($con,$update_unread);
    ?>
    </div>
    <?php
        echo "
        <div class='replyBox ' style='margin-left: -120px; margin-top:40px; width:700px;'></br><hr>
          <div style='border: 1px solid; padding: 10px; margin-bottom: 10px;'><b>Message :</b> $msg</div>
          <div style='border: 1px solid; padding: 10px;'><b>Your Reply :</b> $reply</div>
          <form action='' method='post' class='textArea'>
            <textarea name='reply' required='required'></textarea></br>
            <input class='btn myButton' role='button' type='submit' name='msg_reply' value='Reply To This' style='float:center; margin-bottom:20px;'>
          </form>
        </div>
        ";
      }
      
      if(isset($_POST['msg_reply'])){
        
        $user_reply = $_POST['reply'];
 
        $update_msg = "UPDATE messages SET message_reply='$user_reply' WHERE 	message_id='$get_id'";
        $run_msg = mysqli_query($con,$update_msg);     
        
        if($run_msg) {
          echo "<script>alert('Your reply was Updated')</script>";
          echo "<script>window.open('messages.php','_self')</script>";
        }
      }
    ?>
    
  </div>