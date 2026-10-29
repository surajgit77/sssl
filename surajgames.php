
<?php
$servername = "localhost";
$username = "2458724";
$password = "University2043";
$dbname = "db2458724";

// Create connection
$conn = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve games
$sql = "SELECT * FROM games";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Games Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h1>My Favourite Games</h1>

<table>
    <tr>
        <th>Game Name</th>
        <th>Genre</th>
        <th>Price</th>
        <th>Date of Release</th>
    </tr>

    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" .
                htmlspecialchars($row['Game_name']) .
                "</td>";
            echo "<td>" .
                htmlspecialchars($row['Genre']) .
                "</td>";
            echo "<td>£" .
                number_format((float)$row['Price'], 2) .
                "</td>";
            echo "<td>" .
                date(
                    "d/m/Y",
                    strtotime($row['Date_of_release'])
                ) .
                "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No games found</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>
