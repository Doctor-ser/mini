<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$departDate = $_POST["date"];
$from = $_POST["from"];
$to = $_POST["to"];

$sql = "SELECT * FROM businfo WHERE startingpoint='$from' AND destination='$to'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bus Search Results</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 50px;
      background-color: #f5f5f5;
      background-image: url("../home/img/bus.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #FFFFFF;
      letter-spacing: 2px;
      text-transform: uppercase;
      font-size: 36px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    table {
      border-collapse: collapse;
      width: 100%;
      background-color: transparent;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }

    th, td {
      padding: 10px;
      text-align: left;
      background-color: rgba(255, 255, 255, 0.8);
    }

    th {
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
      text-transform: uppercase;
    }

    td {
      background-color: rgba(255, 255, 255, 0.5);
    }

    tr:nth-child(even) {
      background-color: rgba(230, 230, 230, 0.8);
    }

    tr:hover {
      background-color: rgba(0, 123, 255, 0.6);
      transition: background-color 0.3s ease;
      cursor: pointer;
    }

    tr:hover td {
      color: #fff;
    }

    .btn {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
      text-transform: uppercase;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .no-buses {
      text-align: center;
      font-weight: bold;
      color: #ff0000;
    }
  </style>
</head>
<body>
  <?php if ($result->num_rows > 0): ?>
    <table>
      <tr>
        <th>Bus Name</th> <!-- Changed from Bus Number to Bus Name -->
        <th>From</th>
        <th>To</th>
        <th>Departure Date</th>
        <th>Departure Time</th>
        <th>Arrival Time</th>
        <th>Select</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row["busname"]; ?></td> <!-- Changed to busname -->
          <td><?php echo $row["startingpoint"]; ?></td>
          <td><?php echo $row["destination"]; ?></td>
          <td><?php echo $departDate; ?></td>
          <td><?php echo $row["arrtime"]; ?></td>
          <td><?php echo $row["deptime"]; ?></td>
          <td>
            <form action="../user/seat.php" method="POST">
              <input type="hidden" name="bus_name" value="<?php echo $row["busname"]; ?>"> <!-- Changed bus_number to bus_name -->
              <input type="hidden" name="date" value="<?php echo $departDate; ?>">
              <button class="btn" type="submit">Select Seat</button>
            </form>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p class="no-buses">No buses available for the selected route.</p>
  <?php endif; ?>
</body>
</html>
