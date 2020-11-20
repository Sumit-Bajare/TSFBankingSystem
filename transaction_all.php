<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TSF Bank</title>
    <link rel="stylesheet" href="style_transfer.css">
</head>

<body>
    <header>
        <img src="tsf_logo.png" alt="bank logo">

        <h1>TSF Bank</h1>

        <nav id="nav_bar">
            <a href="index.html">Home</a>
            <a href="view.php">Customers</a>

        </nav>
    </header>
    <section class="transfer">
<?php
         
         
    $tid = $_GET['tn'];
    $rname = $_GET['rn'];
    $transfer = $_GET['cashtransfer'];
    $msg = $_GET['msg'];

    $username="root";
    $password="Root@db123";
    $db="bankusers";
    $conn = new mysqli("localhost", $username,$password,$db) or die ("You are not Connected");


    $query1 = "SELECT * FROM bankusers WHERE CustomerID = '$tid'";
    $sqldata1 = mysqli_query($conn,$query1) or die('Error Getting the data');
    
    while($row = mysqli_fetch_array($sqldata1, MYSQLI_ASSOC)){
        $tbalance = $row['AvailableBalance'];
        $custoname = $row['CustomerName'];
        $tranid = $row['AccountNumber'];
        $withdrawals = $row['TotalWithdrawal'];
    }

    $query2 = "SELECT * FROM bankusers WHERE CustomerName = '$rname'";
    $sqldata2 = mysqli_query($conn,$query2) or die('Error Getting the data');

    while($row = mysqli_fetch_array($sqldata2, MYSQLI_ASSOC)){
        $receid = $row['CustomerID'];
        $rbalance = $row['AvailableBalance'];
        $deposits = $row['TotalDeposist'];
    }

    if(($transfer > 0)&&($rname != '-- Select Receiver Name --')&&($tbalance>=50)){
        $tbalance = $tbalance - $transfer;
        $rbalance = $rbalance + $transfer;

        $deposits = $deposits + $transfer;
        $withdrawals = $withdrawals + $transfer;

        $sql3 = "UPDATE bankusers SET AvailableBalance=$tbalance,TotalWithdrawal=$withdrawals WHERE CustomerID = '$tid'";
        $sql4 = "UPDATE bankusers SET AvailableBalance=$rbalance,TotalDeposist=$deposits WHERE CustomerID = '$receid'";
        mysqli_query($conn, $sql3);

        mysqli_query($conn, $sql4);
        

    $username="root";
    $password="Root@db123";
    $db="transaction";
    $conn2 = new mysqli("localhost", $username,$password,$db) or die ("You are not Connected");

        $sql1 = "SELECT * FROM transaction";
        $data = mysqli_query($conn2,$sql1) or die('Error Getting the data');
        $transid = mysqli_num_rows($data);
        
        $transid = $transid +1;
        
                
        $date = date("Y-m-d h:i:s");
        
        
        $sql = "INSERT INTO transaction VALUES($transid,$tid,'$custoname',$receid,'$rname',$transfer,$tbalance,$rbalance,'$date','$msg')";
        if(mysqli_query($conn2, $sql)){
            echo 'Transaction Successful';
        }

    
        $sqlget = "SELECT * FROM transaction WHERE from_cust_id = '$tid'";
        $sqldata = mysqli_query($conn2,$sqlget) or die('Error Getting the data');
        echo "<table border='1'>";
        echo "<caption>Withdrawals</caption>";
        echo "<tr>
            <th>Receiver's ID</th>
            <th>Receiver's Name</th>
            <th>Cash transfer</th>
            <th>Date</th>
            <th>Comment</th>
            </tr>";
        $rowcount=mysqli_num_rows($sqldata);
        for($i=1 ;$i <= $rowcount;$i++){
        while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
            echo "<tr><td>";
                echo $row['to_cust_id'];
            echo "</td><td>";
                echo $row['receivername'];
            echo "</td><td>";
                echo $row['cashtransfer'];
            echo "</td><td>";
                echo $row['date'];
            echo "</td><td>";
                echo $row['msgforreceiver'];
            echo "</td></tr>";
           }
        }
    

          echo "</table>";
        echo "<br/>";
        
        $sqlget1 = "SELECT * FROM transaction WHERE to_cust_id = '$tid'";
        $sqldata1 = mysqli_query($conn2,$sqlget1) or die('Error Getting the data');
    

        echo "<table border='1'>";
        echo "<caption>Deposists</caption>";
        echo "<tr>
            <th>Transferer's ID</th>
            <th>Transferer's Name</th>
            <th>Cash transfer</th>
            <th>Date</th>
            <th>Comment</th>
            </tr>";
        $rowcount=mysqli_num_rows($sqldata1);
        for($i=1 ;$i <= $rowcount;$i++){
         while($row = mysqli_fetch_array($sqldata1, MYSQLI_ASSOC)){
            echo "<tr><td>";
                echo $row['from_cust_id'];
            echo "</td><td>";
                echo $row['transferername'];
            echo "</td><td>";
                echo $row['cashtransfer'];
            echo "</td><td>";
                echo $row['date'];
            echo "</td><td>";
                echo $row['msgforreceiver'];
            echo "</td></tr>";
        }
    }

          echo "</table>";
        echo "<br/>";
        echo '<form action="transfer.php">';
        echo  "<input type='hidden' name='id' value='$tid'>";
        echo "<button>Back</button>
        </form>";
}  
else if($rname == '-- Select Receiver Name --'){
    echo '<script>
        alert("Enter the Receiver Name or Enter the Amount greater than 0");
        window.history.back();
    </script>';
}
else if($transfer <= 0){
    echo '<script>
        alert("Enter the Receiver Name or Enter the Amount greater than 0");
        window.history.back();
    </script>';
}
else if($tbalance<50){
    echo '<script>
        alert("You do not have the base amount");
        window.history.back();
    </script>';
}


        
        

       
        ?>
    </section>

    <footer>
        &copy;sumitbajare333@gmail.com
        <p>This Page is created by <b>Sumit Bajare</b> as a Web Development and Designing Intern at <u> <a href="https://www.thesparksfoundationsingapore.org">The Sparks Foundation </a></u> </p>
    </footer>
</body>
</html>

?>