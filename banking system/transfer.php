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
        <div class="container-fluid  mt-5 p-5">
            <center>
        <form action="payment.php" method="post">
            <?php
            echo "<table>
                <tr>
                    <td><h4>Sender:</h4></td> ";
                    
                    require_once "config.php";
                    if(!isset($_POST['sender_name']))
                    {
                        echo "<script>window.history.back();</script>";
                    }
                        $s_id = $_POST['sender_name'];
                        $sql = "SELECT email from users where id='$s_id'";
                        $res = mysqli_query($link,$sql);
                        $row = mysqli_fetch_assoc($res);
                        $sender = "{$row['email']}";
                    echo "<td><input class='form-control m-3' style='cursor: not-allowed;' type='text' value='$sender' readonly><input class='form-control' type='text' name='sender' id='sender' value='$sender' style='display:none;'></td>
                
                </tr>

                <tr>
                    <td><h4>Receiver:</h4></td>
                    <td>
                        <input class='form-control m-3' list='receivers' name='receiver' name='receiver' id='receiver'>
                        <datalist id='receivers'>";
    
                                
                                $sql = "select email from users where email !='$sender'";
                                $result = mysqli_query($link,$sql);
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<option value='{$row['email']}'>";
                                }
                                
                            
                       echo "</datalist></td>
                        
                <tr>   
                    <td><h4>Amount:</h4></td>
                    <td><input class='form-control m-3' type='text' name='amount' id='amount'></td>
                </tr>
                <tr>
                    <td colspan='2'><center><input class='btn m-4' type='submit' id='submit' value='Transfer' name='submit'></center></td>

                </tr>
        </table>";
        ?>
        </form>
        </center>
        </div>
    </body>
</html>