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
      tr,th{
        text-align: center;
      }
      .btn
      {
        border:solid 2px; color:white;
        font-weight: bold;
      }
      .btn:hover
        {
          background: white;
          color: royalblue;
        }
  </style>
    </head>
    <body style="background:#809fff;">
        <div class="container-fluid d-flex flex-wrap justify-content-center shadow" style="width:100%; background: #0066ff;">

            <div class="mr-auto mt-auto ml-2"><a href="index.php" class="shadow-lg p-3 bg-body rounded"><img src="logo.png"/></a></div> 
            <div class="d-flex  justify-content-center">
                       
                    <a id="transfer" class="align-content-center m-auto p-3" href="index.php">Home</a>
                    <a id="history" class="align-content-center m-auto p-3" href="history.php" >History</a></div>

            </div>
        </div>
        <form method="post" action="transfer.php">
            <input type="text" id="sender_name" name="sender_name" style="display: none;">
        <div class="container mt-5">
            <center style="font-size: xx-large; font-weight: bolder; color: white; text-shadow: 1px 1px 2px white;"><p>Users</p></center>
        <table class="table table-hover" style="border-style:solid;">

        <tr class="thead-dark m-auto">
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Transfer</th>
        </tr>

        <?php
            require_once "config.php";
            $sql = "select *from users";

            $res=mysqli_query($link,$sql);
            $i=0;
            while($row=mysqli_fetch_assoc($res))
            {
                if($i%2==0)
                {
                    echo "<tr class='table-dark'>";
                }
                else
                {
                    echo "<tr class='table-light'>";
                }
                echo "
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['balance']}</td>
                    <td><center><button class='btn btn-primary'  name='transfer' onclick='move({$row['id']})'>transfer</button></center></rd>
                </tr>
                ";
                $i+=1;
            }
            
        ?>
        </table>
        <input type="submit" name="submit" id="submit" style="display:none;">
        <script type="text/javascript">
            function move(id)
            {
                document.getElementById("sender_name").value=id;
                document.getElementById("submit").click();
            }
        </script>
    </div>
    </form>
    </body>
</html>