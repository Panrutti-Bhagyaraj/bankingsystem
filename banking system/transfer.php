<html>
    <head>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css_b.css">
  <style type="text/css">
  tr,td,h4
  {
    color: white;
    font-weight: bolder;
  }
  #submit
  {
    background: #002699;
    color: white;
    transition: background,color 1s;
    transition-timing-function: ease-in-out;
    font-weight: bolder;
  }
  #submit:hover{
    transform: none;
    background: white;
    color: #002699;
    font-size: large;
  }
  </style>
    </head>
    <body style="background:#3385ff;">
        <div class="container-fluid d-flex flex-wrap justify-content-center shadow" style="width:100%; background: #0066ff;">

            <div class="mr-auto mt-auto ml-2"><a href="index.php" class="shadow-lg p-3 bg-body rounded"><img src="logo.png"/></a></div> 
            <div class="d-flex  justify-content-center">
                
                <a id="users" class="align-content-center m-auto p-3" href="users.php">Users</a>        
                <a id="history" class="align-content-center m-auto p-3" href="history.php" >History</a></div>

            </div>
        </div>
        <?php
        require_once "config.php";
            if(isset($_POST["submit"]))
            {
                $sender=$_POST["sender"];
                $receiver=$_POST["receiver"];
                $amount=$_POST["amount"];
                $err = "";
                if($sender == $receiver)
                {
                    $err = "Same sender and Receiver";
                }

                $sql="select email from users where email='$sender'";
                $res=mysqli_query($link,$sql);
                $row=mysqli_fetch_assoc($res);
                if(!$row)
                {
                    $err = "sender not exists";
                }

                $sql="select email from users where email='$receiver'";
                $res=mysqli_query($link,$sql);
                $row=mysqli_fetch_assoc($res);
                if(!$row)
                {
                    $err = "receiver not exists";
                }

                $sql="select balance from users where email='$sender'";
                $res=mysqli_query($link,$sql);
                $row=mysqli_fetch_assoc($res);
                $sender_balance=$row['balance'];
                if($amount>$sender_balance)
                {
                    $err = "insufficient balance";
                }
                if($err == "")
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
                    echo "<script>alert('$err')</script>";
                }
            }
        ?>
        <div class="container-fluid  mt-5 p-5">
            <center>
        <form action="transfer.php" method="post">
            <table>
                <tr>
                    <td><h4>Sender:</h4></td> 
                    <td><input type="text" name="sender" id="sender"></td>
                </tr>

                <tr>
                    <td><h4>Receiver:</h4></td>
                    <td><input type="text" name="receiver" id="receiver"></td>
                <tr>   
                    <td><h4>Amount:</h4></td>
                    <td><input type="text" name="amount" id="amount"></td>
                </tr>
                <tr>
                    <td colspan="2"><center><input class="btn" type="submit" id="submit" value="Transfer" name="submit"></center></td>

                </tr>
        </table>
        </form>
        </center>
        </div>
    </body>
</html>