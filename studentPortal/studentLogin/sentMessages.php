<div class="msgBoxContent" style="margin-left: -120px; margin-top:40px;">				
  <table width="700" style="background: #18605F;">
    <tr>
      <th>Send to</th>
      <th>Subject</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
    <?php
      $sel_msg = "SELECT * FROM messages WHERE message_from='$user_id'";
      $run_msg = mysqli_query($con,$sel_msg);
      $count_msg = mysqli_num_rows($run_msg);
      
        while($row_msg=mysqli_fetch_array($run_msg)){
          $msg_id = $row_msg['message_id'];
          $msg_reciver = $row_msg['message_to'];
          $msg_sender = $row_msg['message_from'];
          $msg_sub = $row_msg['message_subject'];
          $msg_date = $row_msg['message_time'];
          
          $get_reciver = "SELECT * FROM teachers WHERE teacher_id='$msg_reciver'";
          $run_reciver = mysqli_query($con,$get_reciver);
          $row = mysqli_fetch_array($run_reciver);
          
          $reciver_name = $row['teacher_username'];
    ?>

    <tr>
      <td> <?php echo $reciver_name; ?> </td>

      <td>
      <a href="messages.php?sentMessages&msg_id=<?php echo $msg_id; ?>">
      <?php echo $msg_sub; ?>
      </a>
      </td>

      <td><?php echo $msg_date; ?></td>
      <td><a href="messages.php?sentMessages&msg_id=<?php echo $msg_id; ?>">View Reply</a></td>
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
        $update_unread = "update messages set status ='read' WHERE msg_id='$get_id'";
        $run_unread = mysqli_query($con,$update_unread);
    ?>
    </div>
    <?php
        echo "
        <div class='replyBox ' style='margin-left: -120px; margin-top:40px; width:700px;'></br><hr>
          <div style='border: 1px solid; padding: 10px; margin-bottom: 10px;'><b>Your Message :</b> $msg</div>
          <div style='border: 1px solid; padding: 10px;'><b>Reply from $reciver_name :</b> $reply</div>
          
        </div>
        ";
      }
      // <form action='' method='post' class='textArea'>
      //       <textarea name='reply' required='required'></textarea></br>
      //       <input class='btn myButton' role='button' type='submit' name='msg_reply' value='Reply To This' style='float:center; margin-bottom:20px;'>
      //     </form>
      
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