<?php
    require_once "dbconnection.php";

    // Fetching selected flight details
    $query = mysqli_query($conn, "SELECT * FROM selected");
    if ($query && mysqli_num_rows($query) > 0) {
        $rows = mysqli_fetch_array($query);
        $flight = $rows['FLIGHT_CODE'];
    } else {
        // Handle no results
        $flight = 'Not Available';
    }

    // Fetching passport details
    $query = mysqli_query($conn, "SELECT * FROM pass");
    if ($query && mysqli_num_rows($query) > 0) {
        $rows = mysqli_fetch_array($query);
        $passportno = $rows['PASSPORT_NO'];
    } else {
        $passportno = 'Not Available';
    }

    // Fetching ticket details
    $query = mysqli_query($conn, "SELECT * FROM ticket WHERE PASSPORT_NO='$passportno'");
    if ($query && mysqli_num_rows($query) > 0) {
        $rows = mysqli_fetch_array($query);
        $ticketno = $rows['TICKET_NO'];
        $source = $rows['SOURCE'];
        $destination = $rows['DESTINATION'];
        $date = $rows['DATE_OF_TRAVEL'];
    } else {
        // Handle no results
        $ticketno = 'Not Available';
        $source = 'Not Available';
        $destination = 'Not Available';
        $date = 'Not Available';
    }

    // Fetching passenger details
    $query = mysqli_query($conn, "SELECT * FROM passenger WHERE PASSPORT_NO='$passportno'");
    if ($query && mysqli_num_rows($query) > 0) {
        $rows = mysqli_fetch_array($query);
        $fname = $rows['FNAME'];
        $lname = $rows['LNAME'];
        $age = $rows['AGE'];
        $sex = $rows['SEX'];
        $phone = $rows['PHONE'];
        $address = $rows['ADDRESS'];
    } else {
        // Handle no results
        $fname = 'Not Available';
        $lname = 'Not Available';
        $age = 'Not Available';
        $sex = 'Not Available';
        $phone = 'Not Available';
        $address = 'Not Available';
    }

    // Fetching flight details
    $query = mysqli_query($conn, "SELECT * FROM flight WHERE FLIGHT_CODE='$flight'");
    if ($query && mysqli_num_rows($query) > 0) {
        $rows = mysqli_fetch_array($query);
        $arrival = $rows['ARRIVAL'];
        $departure = $rows['DEPARTURE'];
        $duration = $rows['DURATION'];
        $airlineid = $rows['AIRLINE_ID'];
    } else {
        // Handle no results
        $arrival = 'Not Available';
        $departure = 'Not Available';
        $duration = 'Not Available';
        $airlineid = 'Not Available';
    }

    // Fetching airline details
    $query = mysqli_query($conn, "SELECT * FROM airline WHERE AIRLINE_ID='$airlineid'");
    if ($query && mysqli_num_rows($query) > 0) {
        $rows = mysqli_fetch_array($query);
        $airlinename = $rows['AIRLINE_NAME'];
    } else {
        // Handle no results
        $airlinename = 'Not Available';
    }

    // Fetching price details
    $query = mysqli_query($conn, "SELECT PRICE, TYPE FROM price");
    if ($query && mysqli_num_rows($query) > 0) {
        $rows = mysqli_fetch_array($query);
        $price = $rows['PRICE'];
        $type = $rows['TYPE'];
    } else {
        // Handle no results
        $price = 'Not Available';
        $type = 'Not Available';
    }

    // Deleting the selected flight and passenger data
    mysqli_query($conn, "DELETE FROM selected WHERE FLIGHT_CODE='$flight'");
    mysqli_query($conn, "DELETE FROM pass WHERE PASSPORT_NO='$passportno'");
    mysqli_query($conn, "DELETE FROM price WHERE PRICE='$price'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>E-Ticket Details</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Century Gothic;
        }
        body {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('Images/takeoff2.jpg');
            height: 100vh;
            background-size: cover;
            background-position: center;
        }
        .main {
            padding: 10px;
        }
        .a {
            position: absolute;
            left: 40%;
            top: 5%;
            color: #fff;
            font-size: 40px;
        }
        .ticket-details {
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 20px;
            margin: 50px auto;
            width: 80%;
            border-radius: 10px;
        }
        .ticket-details div {
            margin: 10px 0;
        }
        .choices {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }
        .a1 {
            text-decoration: none;
            background-color: #fff;
            color: #000;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            transition: 0.3s ease;
        }
        .a1:hover {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="a"><h1>E-Ticket Details</h1></div>
        <div class="ticket-details">
            <div><strong>First Name:</strong> <?php echo $fname; ?></div>
            <div><strong>Last Name:</strong> <?php echo $lname; ?></div>
            <div><strong>Age:</strong> <?php echo $age; ?></div>
            <div><strong>Gender:</strong> <?php echo $sex; ?></div>
            <div><strong>Phone Number:</strong> <?php echo $phone; ?></div>
            <div><strong>Address:</strong> <?php echo $address; ?></div>
            <div><strong>Passport Number:</strong> <?php echo $passportno; ?></div>
            <div><strong>Source:</strong> <?php echo $source; ?></div>
            <div><strong>Destination:</strong> <?php echo $destination; ?></div>
            <div><strong>Arrival:</strong> <?php echo $arrival; ?></div>
            <div><strong>Departure:</strong> <?php echo $departure; ?></div>
            <div><strong>Flight Duration:</strong> <?php echo $duration; ?></div>
            <div><strong>Travel Date:</strong> <?php echo $date; ?></div>
            <div><strong>Ticket Price:</strong> ₹<?php echo $price; ?></div>
            <div><strong>Ticket Type:</strong> <?php echo $type; ?></div>
            <div><strong>Airline Name:</strong> <?php echo $airlinename; ?></div>
            <div><strong>Flight Code:</strong> <?php echo $flight; ?></div>
            <div><strong>Ticket Number:</strong> <?php echo $ticketno; ?></div>
        </div>
        <div class="choices">
            <a href="homepage.html" class="a1">Back to Home</a>
        </div>
    </div>
</body>
</html>
