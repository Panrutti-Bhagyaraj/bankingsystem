<html>
<body style="background: #0066ff;">
    <?php
        require_once "config.php";
            
            if(isset($_POST['submit']))
            {
                $sender = $_POST["sender"];

                $receiver=$_POST["receiver"];
                $amount=$_POST["amount"];
                $err = 0; $err_msg="";
                

                

                if($sender == $receiver)
                {
                    $err = 1;
                    $err_msg = "Same sender and receiver";
                }

                $sql="select * from users where email='$receiver'";
                $res=mysqli_query($link,$sql);
                $row=mysqli_fetch_assoc($res);
                if(!$row)
                {
                    $err = 1;
                    $err_msg = "Receipient not exists";
                }

                $sql="select balance from users where email='$sender'";
                $res=mysqli_query($link,$sql);
                $row=mysqli_fetch_assoc($res);
                $sender_balance=$row['balance'];
                if($amount>$sender_balance)
                {
                    $err = 1;
                    $err_msg = "insufficient balance";
               
                }
                else if($amount<0)
                {   
                    $err=1;
                    $err_msg = "please enter amount greater than 0";
                    
                }
                if($err == 0)
                {
                    $sql="select balance from users where email='$receiver'";
                    $res=mysqli_query($link,$sql);
                    $row=mysqli_fetch_assoc($res);
                    $rec_balance=$row['balance']+$amount;

                    
                    $sender_balance=$sender_balance-$amount;

                    $sql="update users set balance='$sender_balance' where email='$sender'";
                    $res=mysqli_query($link,$sql);
                    

                    $sql="update users set balance='$rec_balance' where email='$receiver'";
                    $res=mysqli_query($link,$sql);
                    

                    $sql  = "insert into transaction(sender,receiver,amount) values('$sender','$receiver','$amount')";
                    $res = mysqli_query($link,$sql);
                    
                    echo " <script>alert('Transcation Successful...');location.href='history.php';</script>";
                }
                else{
                    echo "<script>alert('$err_msg')</script>";
                    echo "<script>window.history.back()</script>";
                }
            }
        ?> 



</body>
</html>
 