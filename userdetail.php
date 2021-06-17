

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>     <!--for alert box -->

    <style type="text/css">
    button {
        border: none;
        background: #777E8B;
    }

    button:hover {
        transform: scale(1.1);
        color: white;
    }

    body {
        background-color: #e0ebeb;
    }
    </style>
</head>

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
          <li>
            <a class="nav-link active" aria-current="page" href="./transfer.html">Transfer Money</a>
          </li>
          <li>
            <a class="nav-link active" aria-current="page" href="./transaction_history.php">Transaction History</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar ends here  -->


    <div class="container">
        <h2 class="text-center pt-4">Transaction</h2>
       
        <form  method="post" name="tcredit" class="tabletext"><br>        <!--begining of form code-->
            <div>
                
            </div>
            <br><br><br>
            <label>Transfer From:</label>
            <select name="from" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                //include 'db_config.php';
                //$sid=$_GET['id'];
                // $sql = "SELECT * FROM users where id!=$sid";          //display the details of account except sender's accuont
                // $result=mysqli_query($conn,$sql);
                // if(!$result)
                // {
                //     echo "Error ".$sql."<br>".mysqli_error($conn);
                // }
                $user = 'root';
                $password = ''; 
                $database = 'bank';
                $servername='localhost:3306';
                $mysqli = new mysqli($servername, $user,$password, $database);

                                // Checking for connections
                if ($mysqli->connect_error) 
                    {
                        die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
                    }
                $sql = "SELECT * FROM customers";
                $result = $mysqli->query($sql);
                $mysqli->close(); 
                while($rows=$result->fetch_assoc()) {
            ?>
                <option class="table" value="<?php echo $rows['srno'];?>">

                    <?php echo $rows['name'] ;?> (Balance:
                    <?php echo $rows['balance'] ;?> )

                </option>
                <?php 
                } 
            ?>
                <div>
            </select>
            <br><br><br>
            <label>Transfer To:</label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                //include 'db_config.php';
                //$sid=$_GET['id'];
                // $sql = "SELECT * FROM users where id!=$sid";          //display the details of account except sender's accuont
                // $result=mysqli_query($conn,$sql);
                // if(!$result)
                // {
                //     echo "Error ".$sql."<br>".mysqli_error($conn);
                // }
                $user = 'root';
                $password = ''; 
                $database = 'bank';
                $servername='localhost:3306';
                $mysqli = new mysqli($servername, $user,$password, $database);

                                // Checking for connections
                if ($mysqli->connect_error) 
                    {
                        die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
                    }
                $sql = "SELECT * FROM customers";
                $result = $mysqli->query($sql);
                $mysqli->close(); 
                while($rows=$result->fetch_assoc()) {
            ?>
                <option class="table" value="<?php echo $rows['srno'];?>">

                    <?php echo $rows['name'] ;?> (Balance:
                    <?php echo $rows['balance'] ;?> )

                </option>
                <?php 
                } 
            ?>
                <div>
            </select>
            <br>
            <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" min=1 placeholder="Enter amount" required>
            <br>
            <div class="text-center">
                <button class="btn mt-3" type ="submit" name="submit " id="submit">Transfer</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
 $user = 'root';
 $password = ''; 
 $database = 'bank';
 $servername='localhost:3306';
 $mysqli = new mysqli($servername, $user, $password, $database);
 
                 // Checking for connections
 if ($mysqli->connect_error) 
     {
         die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
     }
if (isset($_POST['from']))
{
$from = $_POST['from'];
$to = $_POST['to'];
$toid=$to;
$fromid=$from;
$tno=$from + 7000;
$amount = $_POST['amount'];



$result=$mysqli->query("select name from customers where srno=$from");
$from =  $result->fetch_assoc();
$from = $from['name'];

$result=$mysqli->query("select name from customers where srno=$to");
$to =  $result->fetch_assoc();
$to = $to['name'];


$result=$mysqli->query("select balance from customers where srno=$fromid");
$rows =  $result->fetch_assoc();
$balance = $rows['balance'];

if (($amount)<0)
{
 echo "<script> 
 swal({
   title: 'OOPS!!',
   text: 'Negative Values are not allowed',
   type: 'error'
}).then(function() {
   window.location = 'userdetail.php';
});
      </script>";
}
else if($amount >$rows['balance']) 
{
    
    echo "<script> 
    swal({
        title: 'OOPS!!',
        text: 'Insufficient balance in account',
        type: 'error'
    }).then(function() {
        window.location = 'userdetail.php';
    });
            </script>";    
} else if($amount == 0){


    echo "<script> 
    swal({
      title: 'OOPS!!',
      text: 'Zero Value cannot be transfered',
      type: 'error'
  }).then(function() {
      window.location = 'userdetail.php';
  });
         </script>";
 }
else{
$sql = "insert into transactions(tno,sender,receiver,amount) VALUES ('$tno','$from','$to',$amount)";

$mysqli->query($sql);

$result=$mysqli->query("select balance from customers where srno=$fromid");
$rows =  $result->fetch_assoc();
$balance = $rows['balance'];



$newbal=$rows-$amount;
$mysqli->query("UPDATE customers set balance=$newbal where srno=$fromid");

$result=$mysqli->query("select balance from customers where srno=$toid");
$rows =  $result->fetch_assoc();
$rows = $rows['balance'];

$newbal=$rows+$amount;
$mysqli->query("UPDATE customers set balance=$newbal where srno=$toid");



 $mysqli->close(); 
}
}


?>