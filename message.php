<?php
include('config.php');
include('encryption.php');
session_start();

if (!isset($_SESSION['userid']) || $_SESSION['role'] != 'user') {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['userid'];
$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_text = $_POST['request_text'];

    $sql = "INSERT INTO requests (user_id, request_text) VALUES ('$user_id', '$request_text')";
    if ($conn->query($sql) === TRUE) {
        echo "Request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM requests WHERE user_id = '$user_id'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="message.css">
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <section id="sidebar">
        <div class="nav">
            <div class="logo">
                <a href="#" class="brand">Health <span>Care</span></a>
            </div>

            <ul class="side-menu">
                <li><a href="dashboard.php" class="active"><i class='bx bxl-stack-overflow'></i>overview</a></li>
                <li><a href="calendar.html"><i class='bx bx-calendar'></i>Calendar</a></li>
                <li><a href="message.php"><i class='bx bxs-chat'></i>Message</a></li>
                <li><a href="reports.php"><i class='bx bxs-report'></i>Reports</a></li>
                <li><a href="user.php"><i class='bx bxs-user'></i>User</a></li>
                <li><a href="logout.php"><i class='bx bx-log-out'></i>Logout</a> </li>
            </ul>
        </div>

        <div class="help">
            <div class="helppics">
                <img src="profile.png" alt="">
            </div>

            <h5>Help Center</h5>
            <br>
            <p><a href="">Having trouble?</a> </p>
        </div>
    </section>
    <section id="content">
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search..." id="search">
                    <i class='bx bx-search icon'></i>
                </div>

                <div class="nav-right">
                    <a href="#" class="nav-link">
                        <i class='bx bxs-bell'></i>
                        <span class="badge">5</span>
                    </a>
                    <a href="#" class="nav-link">
                        <i class="bx bxs-message-square-dots"></i>
                        <span class="badge">8</span>
                    </a>
                </div>
            </form>
        </nav>
        <main>
            <h1 class="title">Make A Request</h1>
            <div class="reference">
                <!-- <div class="card1"> -->
                <h2 class="meds">Medical Request</h2>
                <form action="" method="post">
                    <div class="inputname">
                        <div class="inputfirstname">
                            <label for="name" class="name">First Name</label>

                            <input type="text" placeholder="FirstName" name="firstname" id="firstname" required>
                        </div>
                        <div class="inputlastname">
                            <label for="name" class="name">Last Name</label>
                            <input type="text" placeholder="LastName" name="lastname" id="lastname" required>
                        </div>
                    </div>
                    <div class="mail">
                        <div class="inputemailname">
                            <label for="name" class="name">Email</label>
                            <input type="email" placeholder="Email" name="email" id="email" required>
                        </div>
                        <div class="inputnumber">
                            <label for="name" class="name">Phone Number</label>
                            <input type="tel" name="number" id="num" placeholder="### ### ####" required>
                        </div>
                    </div>
                    <div class="more">

                        <label for="date" id="birth">Date of Birth</label>
                        <input type="date" name="date" id="date" required>
                        <div class="lad">
                            <label for="medical">Medical Notes</label>
                            <textarea name="Request" id="Request" placeholder="Enter Request"></textarea>
                        </div>
                    </div>

                    <input type="submit" value="Submit" class="submit">
                </form>
                <div class="your-request">
                    <h2 class="Request-made">Your Request</h2>
                    <ul class="list">
                    <?php while ($row = $result->fetch_assoc()) { ?>
        <li class="items"><?php echo $row['request_text']; ?> - <?php echo $row['status']; ?></li>
    <?php } ?>
                    </ul>
                </div>
            </div>
            </div>
            </div>
        </main>
        <script src="script.js"></script>
</body>

</html>