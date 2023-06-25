<?php 
	include_once 'connection.php';
	// Get the visitor's IP address
$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];




// Check if the IP address already exists in the database
$sql = "SELECT COUNT(*) as count FROM visitors WHERE ip_address = '$ip_address'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$count = $row['count'];

if ($count == 0) {
	// Get the device type, OS type, and ISP information
$device_type = get_device_type();
$os_type = get_os_type();

// Insert the visitor information into the database
$sql = "INSERT INTO visitors (ip_address, device_type, os_type) VALUES ('$ip_address', '$device_type', '$os_type')";
$conn->query($sql);
			}

// Get the device type based on user agent
function get_device_type() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    
    if (strpos($user_agent, 'Mobile') !== false) {
        return 'Phone';
    } elseif (strpos($user_agent, 'Tablet') !== false) {
        return 'Tablet';
    } else {
        return 'Computer';
    }
}

// Get the OS type based on user agent
function get_os_type() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($user_agent, 'Windows') !== false) {
        preg_match('/Windows NT (\d+)/', $user_agent, $matches);
        if (isset($matches[1])) {
            $version = $matches[1];
            return 'Windows ' . $version;
        } else {
            return 'Windows';
        }
    } elseif (strpos($user_agent, 'Mac') !== false) {
        preg_match('/Mac OS X (\d+_\d+)/', $user_agent, $matches);
        if (isset($matches[1])) {
            $version = str_replace('_', '.', $matches[1]);
            return 'Mac OS ' . $version;
        } else {
            return 'Mac';
        }
    } elseif (strpos($user_agent, 'Android') !== false) {
        preg_match('/Android\s([0-9\.]+)/', $user_agent, $matches);
        if (isset($matches[1])) {
            $version = $matches[1];
            $version_parts = explode('.', $version);
            $major_version = $version_parts[0];
            $minor_version = isset($version_parts[1]) ? $version_parts[1] : 0;
            return 'Android ' . $major_version . '.' . $minor_version;
        } else {
            return 'Android';
        }
    } elseif (strpos($user_agent, 'Linux') !== false) {
        return 'Linux';
    }

    return 'Other';
}




// Fetch the visitor data from the database
$sql = "SELECT * FROM visitors";
$result = $conn->query($sql);

// Close the database connection
// $conn->close();
?>

<!-- <!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h2>Visitor Information</h2>
    <table>
        <tr>
            <th>IP Address</th>
            <th>Device Type</th>
            <th>OS Type</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['ip_address']; ?></td>
            <td><?php echo $row['device_type']; ?></td>
            <td><?php echo $row['os_type']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html> -->
<link rel="icon" type="image" href="images/Trasparent black.png">