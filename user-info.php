<?php
	include_once 'connection.php';
// Visitor information
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Determine device type
$deviceType = '';
if (preg_match('/(android|iphone|ipad|windows phone)/i', $userAgent)) {
    $deviceType = 'Mobile';
} else {
    $deviceType = 'PC';
}

// Internet Service Provider (ISP)
$isp = gethostbyaddr($_SERVER['REMOTE_ADDR']);

// Operating System (OS)
$userOS = '';
if (preg_match('/Windows NT/', $userAgent)) {
    $userOS = 'Windows';
} elseif (preg_match('/Macintosh/', $userAgent)) {
    $userOS = 'MacOS';
} elseif (preg_match('/(iPhone|iPad)/', $userAgent)) {
    $userOS = 'iOS';
} elseif (preg_match('/Android/', $userAgent)) {
    $userOS = 'Android';
} else {
    $userOS = 'Unknown';
}

// IP Address
$userIP = $_SERVER['REMOTE_ADDR'];

// Prepare and execute the SQL statement to check for duplicate IP addresses
$sqlCheckDuplicate = "SELECT COUNT(*) as count FROM user_info WHERE ip_address = '$userIP'";
$resultCheckDuplicate = $conn->query($sqlCheckDuplicate);
$rowCheckDuplicate = $resultCheckDuplicate->fetch_assoc();
$countDuplicate = $rowCheckDuplicate['count'];

// Save visitor information to the database if IP address is not a duplicate
if ($countDuplicate == 0) {
    $sqlInsert = "INSERT INTO user_info (device_type, user_agent, isp, user_os, ip_address) VALUES ('$deviceType', '$userAgent', '$isp', '$userOS', '$userIP')";
    if ($conn->query($sqlInsert) === TRUE) {
        echo "Data inserted successfully!<br>";
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
} else {
    echo "Duplicate IP address. Skipping insertion.<br>";
}

// Displaying the data in a table with a simple design
$sqlSelect = "SELECT * FROM user_info";
$resultSelect = $conn->query($sqlSelect);

if ($resultSelect->num_rows > 0) {
    echo "<table style='border-collapse: collapse; width: 100%;'>
            <tr>
                <th style='border: 1px solid black; padding: 8px;'>Device Type</th>
                <th style='border: 1px solid black; padding: 8px;'>User Agent</th>
                <th style='border: 1px solid black; padding: 8px;'>ISP</th>
                <th style='border: 1px solid black; padding: 8px;'>Operating System</th>
                <th style='border: 1px solid black; padding: 8px;'>IP Address</th>
            </tr>";
    while ($rowSelect = $resultSelect->fetch_assoc()) {
        echo "<tr>
                <td style='border: 1px solid black; padding: 8px;'>" . $rowSelect['device_type'] . "</td>
                <td style='border: 1px solid black; padding: 8px;'>" . $rowSelect['user_agent'] . "</td>
                <td style='border: 1px solid black; padding: 8px;'>" . $rowSelect['isp'] . "</td>
                <td style='border: 1px solid black; padding: 8px;'>" . $rowSelect['user_os'] . "</td>
                <td style='border: 1px solid black; padding: 8px;'>" . $rowSelect['ip_address'] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}

// Close the database connection
$conn->close();
?>