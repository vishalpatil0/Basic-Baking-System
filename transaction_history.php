<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

</head>
<style>
h5 {
    text-align: center;
}

th {
    background-color: #4f4d49;
    color: white;
}
</style>

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
<body style="background-color:#e0ebeb;">

   

    <div class="container">
        <h2 class="text-center pt-4">Transaction History</h2>

        <br>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">T.No.</th>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
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
   
    $result=$mysqli->query("select * from transactions order by datetime desc");
while($rows = $result->fetch_assoc())           //display whole transaction table
{
?>

        <tr>
            <td class="py-2"><?php echo $rows['tno']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['amount']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>

            <?php
}

?>
                </tbody>
            </table>

        </div>
    </div>
    <br> <br> <br> <br> <br> <br> <br> <br> <br>
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