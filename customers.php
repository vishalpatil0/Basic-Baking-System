<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Accounts | Basic Banking System</title>
    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="assets/css/customer.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

<body>
<?php

// Username is root
$user = 'root';
$password = ''; 
$database = 'bank';
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user, 
                $password, $database);

                // Checking for connections
if ($mysqli->connect_error) 
    {
        die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
    }
$sql = "SELECT * FROM customers";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>
     <!--Navbar Starts Here-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.html">(ILB) Indian Bank Limited</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav navbar-right ml-auto">
          <li>
            <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./transfer.html">Transfer Money</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar ends here  -->
 
    
    <div class="my-info text-center">
        <h2>Name: Vishal Patil</h2>
        <h4>Net Bank Balance: Rs<span id="myAccountBalance">100000</span></h4>

        <a class="btn btn-primary btn-info btn-lg" href="userdetail.php">Send Money</a>
        <a class="btn btn-primary btn-info btn-lg" href="transaction_history.php" >Transaction History</a>
    </div>

    <!-- Modal send money -->
    <div class="modal fade" id="sendMoney" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Money</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="input-group mb-3">
                            <input type="text" id="enterName" class="form-control" placeholder="Recipient's username"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">@email.com</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" id="enterAmount" class="form-control" placeholder=" Enter Amount"
                                aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="sendMoney()" class="btn btn-success" data-dismiss="modal">Send
                        Money</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal send money ends here-->

    
    <!-- Modal transaction History-->
    <div class="modal fade" id="transactionHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transaction History</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ol id="transaction-history-body">

                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- table  -->
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="table-danger">
                        <th scope="col">Sl. No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Bank Balance(in Rs)</th>
                    </tr>
                </thead>
                <tbody>
                <?php   // LOOP TILL END OF DATA 
                $i=2;
                while($rows=$result->fetch_assoc())
                {   
                    if($i%2==0)
                    {
                ?>     
                    <tr class="table-light">
                        <td scope="row"><?php echo $rows['srno'];?></td>
                        <td><?php echo $rows['name'];?></td>
                        <td><?php echo $rows['email'];?></td>
                        <td>
                            <p id="vikasBankBalance"><?php echo $rows['balance'];?></p>
                        </td>
                    </tr>
                    <?php
                    }
                    else
                    {
                    ?>
                          <tr class="table-info">
                        <td scope="row"><?php echo $rows['srno'];?></td>
                        <td><?php echo $rows['name'];?></td>
                        <td><?php echo $rows['email'];?></td>
                        <td>
                            <p id="vikasBankBalance"><?php echo $rows['balance'];?></p>
                        </td>
                    </tr>
                    <?php
                    }
                    $i++;
                }
             ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Footer -->
  
    <script src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"></script>

    <footer class="bg-light text-center text-lg-start">
        <!-- Grid container -->
        
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(214,230,255);">
          © 2021 Copyright:
          <p class="love" style="color: black;">Made by Vishal Patil</p>
        </div>
        <!-- Copyright -->
      </footer>
</body>

</html>
