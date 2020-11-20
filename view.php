<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TSF Bank</title>
    <link rel="stylesheet" href="style_view.css">
</head>

<body>
    <header>
        <img src="tsf_logo.png" alt="bank logo">

        <h1>TSF Bank</h1>

        <nav id="nav_bar">
            <a href="index.html">Home</a>
            <a href="view.php" class="active">Customers</a>

        </nav>
    </header>
<div>
<?php
    $username="root";
    $password="Root@db123";
    $db="bankusers";
    $conn = new mysqli("localhost", $username,$password,$db) or die ("You are not Connected");

    $sqlget = 'SELECT * FROM bankusers';
    $sqldata = mysqli_query($conn,$sqlget) or die('Error Getting the data');

    echo "<table border='1'>
    <caption>The Sparks Foundation's Customers</caption>";
    echo "<tr>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Branch Number</th>
        <th>Available Balance</th>
        <th></th>
        </tr>";

    while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
        echo "<tr><td>";
            echo $row['CustomerID'];
        echo "</td><td>";
            echo $row['CustomerName'];
        echo "</td><td>";
            echo $row['Email'];
        echo "</td><td>";
            echo $row['BranchName'];
        echo "</td><td>";
            echo $row['AvailableBalance'];
        echo "</td><td class='view'>";
            echo "<button><a href='transfer.php?id=$row[CustomerID]'>View</button>";
        echo "</td></tr>";  
    }

    echo "</table>";
?>
</div>

    <footer>
        &copy;<span>sumitbajare333@gmail.com</span>
        <p>This Page is created by <b>Sumit Bajare</b> as a Web Development and Designing Intern at <u> <a href="https://www.thesparksfoundationsingapore.org">The Sparks Foundation </a></u> </p>
    </footer>
    <script src="script.js"></script>
</body>

</html>