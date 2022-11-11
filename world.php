<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = (!isset($_GET['lookup'])) ? $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'") : $conn->query("SELECT * FROM countries JOIN cities on countries.code=cities.country_code where countries.name='$country'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
  <thead>
    <th>Name</th>
    <?php if(!isset($_GET['lookup'])){ ?>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of State</th>
    <?php } else { ?>
      <th>District</th>
      <th>Population</th>
    <?php } ?>
  </thead>
  <tbody>
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name'] ?></td>
        <?php if(!isset($_GET['lookup'])) { ?>
          <td><?= $row['continent'] ?></td>
          <td><?= $row['independence_year'] ?></td>
          <td><?= $row['head_of_state'] ?></td>
        <?php } else { ?>
          <td><?= $row['district'] ?></td>
          <td><?= $row['population'] ?></td>
        <?php } ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
