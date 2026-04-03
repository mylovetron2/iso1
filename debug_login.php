<?php
// Debug login system
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ("select_data.php");

echo "<h2>Debug Hệ thống đăng nhập</h2>";

// Test connection
echo "<h3>1. Test Database Connection:</h3>";
if ($link) {
    echo "<p style='color: green;'>✓ Database connected successfully</p>";
    
    // Test users table
    $result = mysqli_query($link, "SHOW TABLES LIKE 'users'");
    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color: green;'>✓ Table 'users' exists</p>";
        
        // Show users
        $users_result = mysqli_query($link, "SELECT username, madv, phanquyen FROM users");
        echo "<h3>2. Users trong database:</h3>";
        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr><th>Username</th><th>Madv</th><th>Phanquyen</th></tr>";
        while ($row = mysqli_fetch_assoc($users_result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['madv']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phanquyen']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "<p style='color: red;'>✗ Table 'users' not found</p>";
        
        // Show all tables
        $tables_result = mysqli_query($link, "SHOW TABLES");
        echo "<h3>Available tables:</h3>";
        echo "<ul>";
        while ($row = mysqli_fetch_array($tables_result)) {
            echo "<li>" . $row[0] . "</li>";
        }
        echo "</ul>";
    }
    
} else {
    echo "<p style='color: red;'>✗ Database connection failed</p>";
}

// Test form
echo "<h3>3. Test Login Form:</h3>";
if ($_POST) {
    echo "<p><strong>POST Data received:</strong></p>";
    echo "<pre>" . print_r($_POST, true) . "</pre>";
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Test login logic (updated for mysqli)
    if ($link) {
        $result = mysqli_query($link, "SELECT username, password, madv, phanquyen FROM users WHERE username='$username'");
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            echo "<p style='color: green;'>✓ User found: " . htmlspecialchars($user['username']) . "</p>";
            
            if ($user['password'] == $password) {
                echo "<p style='color: green;'>✓ Password correct</p>";
                echo "<p><strong>User info:</strong></p>";
                echo "<ul>";
                echo "<li>Username: " . htmlspecialchars($user['username']) . "</li>";
                echo "<li>Madv: " . htmlspecialchars($user['madv']) . "</li>";
                echo "<li>Phanquyen: " . htmlspecialchars($user['phanquyen']) . "</li>";
                echo "</ul>";
                
                if ($user['madv'] == 'XDT') {
                    echo "<p style='color: green;'>✓ Login should be successful!</p>";
                } else {
                    echo "<p style='color: orange;'>⚠ User not in XDT division</p>";
                }
            } else {
                echo "<p style='color: red;'>✗ Password incorrect</p>";
                echo "<p>Expected: " . htmlspecialchars($user['password']) . "</p>";
                echo "<p>Received: " . htmlspecialchars($password) . "</p>";
            }
        } else {
            echo "<p style='color: red;'>✗ User not found</p>";
        }
    }
} else {
    echo '<form method="post">
        <p>Username: <input type="text" name="username" value="admin"></p>
        <p>Password: <input type="password" name="password" value=""></p>
        <p><input type="hidden" name="submit" value="login"></p>
        <p><button type="submit">Test Login</button></p>
    </form>';
}

echo "<hr>";
echo "<p><a href='index.php'>← Back to Index</a></p>";
?>