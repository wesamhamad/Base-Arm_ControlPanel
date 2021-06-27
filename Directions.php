<!-- DataBase connection & Query to display the last record inserted in Directions table -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Directions</title>
</head>

<body>
    <?php

    $conn = new mysqli('localhost', 'root', '', 'ROBOT_CONTROLLERS');

    $stmt = $conn->prepare("SELECT * FROM Directions ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        echo "Direction: " . $row["Direction"];
    }

    ?>
</body>

</html>