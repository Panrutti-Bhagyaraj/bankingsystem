<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css_b.css">
</head>
<body style="background: #809fff;">
    <div class="container-fluid d-flex flex-wrap justify-content-center shadow" style="width:100%; background: #0066ff;">

            <div class="mr-auto mt-auto ml-2"><a href="index.php" class="shadow-lg p-3 bg-body rounded"><img src="logo.png"/></a></div> 
            <div class="d-flex  justify-content-center">
                
                <a id="users" class="align-content-center m-auto p-3" href="users.php">Users</a>        
                <a id="transfer" class="align-content-center m-auto p-3" href="transfer.php">Transfer</a>

            </div>
        </div>
        <div class="container mt-5">
            <table class="table" style="border-style: solid;">
                <tr class="thead-dark">
                <th>Trancation Id</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
                <th>Time Date</th>
                </tr>
                <?php
                    require_once "config.php";

                    $sql = "select * from transaction order by datetime desc";
                    $res  = mysqli_query($link, $sql);
                    $i=0;
                    while($row = mysqli_fetch_assoc($res))
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
                        <td>{$row['sno']}</td>
                        <td>{$row['sender']}</td>
                        <td>{$row['receiver']}</td>
                        <td>{$row['amount']}</td>
                        <td>{$row['datetime']}</td>
                        </tr>";
                        $i+=1;
                    }
                ?>
            </table>
        </div>
</body>
</html>