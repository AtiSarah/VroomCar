<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Account</title>
    <link rel="stylesheet" href="dashvehicle.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
    <i class="#"></i>
      <span class="logo_name">VROOMCAR</span>
    </div>
    <ul class="nav-links">
    <li> <!--DASHBOARD -->
        <div class="iocn-link">
          <a href="#">
          <i class='bx bx-grid-alt' ></i>
            <span class="link_name">Dashboard</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
        <li><a href="../user/dashuser.php">User</a></li>
          <li><a href="../driver/dashdriver.php">Driver</a></li>
          <li><a href="../manager/dashmanager.php">Manager</a></li>
          <li><a href="dashvehicle.php">Vehicle</a></li>
        </ul>
      </li>
      <li> <!--ADD --> 
        <div class="iocn-link">
          <a href="#">
          <i class="fa-solid fa-plus"></i>
            <span class="link_name">ADD</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
        <li><a href="../user/user.php">User</a></li>
          <li><a href="vehicle.php">Vehicle</a></li>
        </ul>
      </li>
     <li> <!--DELETE -->     
       <div class="iocn-link">
         <a href="#">
         <i class="fa-solid fa-minus"></i>
           <span class="link_name">DELETE</span>
         </a>
         <i class='bx bxs-chevron-down arrow' ></i>
       </div>
       <ul class="sub-menu">
         <li><a href="../driver/deletedriver.php">Driver</a></li>
         <li><a href="../manager/deletemanager.php">Manager</a></li>
         <li><a href="deletevehicle.php">Vehicle</a></li>
       </ul>
     </li>
     <li>     
      <li> <!--EDIT --> 
       <div class="iocn-link">
         <a href="#">
         <i class="fa-regular fa-pen-to-square"></i>
           <span class="link_name">EDIT</span>
         </a>
         <i class='bx bxs-chevron-down arrow' ></i>
       </div>
       <ul class="sub-menu">
       <li><a href="../user/updateuser.php">User</a></li>
         <li><a href="../driver/updatedriver.php">Driver</a></li>
         <li><a href="../manager/updatemanager.php">Manager</a></li>
         <li><a href="updatevehicle.php">Vehicle</a></li>
       </ul>
     </li>
     <li>

    <div class="profile-details">
      <div class="profile-content">
      <img src="../../../html/img/admin.PNG" alt="profileImg">
      </div>
      <div class="name-job">
      <h3 id="name"></h3>
        <div class="profile_name">ADMIN</div>
      </div>
<a href="../../disconnect.php" class="logout-link">
    <i class='bx bx-log-out'></i>
</a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
<!--DASH-VEHICLE-->
 <div class="dash-vehicle">
 <?php
session_start();
include("../dbp.php"); 
if ( !isset($_SESSION['admin']) ) {
    header("Location: ../../error.php");
    exit();
}


// Sélectionnez toutes les données des véhicules depuis la base de données
$sql = "SELECT id_vehicle, immatriculation, type, license_type, brand, state FROM vehicle";
$result = $link->query($sql);
// Vérifiez s'il y a des données disponibles
if ($result->num_rows > 0) {
    echo "<h1>Vehicle:</h1>";
    // Démarrez la sortie du tableau HTML
    echo "<table border='1'>
    <tr>
    <th>ID Vehicle</th>
    <th>Immatriculation</th>
    <th>Type</th>
    <th>License Type</th>
    <th>Brand</th>
    <th>State</th>
    </tr>";

    // Sortie des données de chaque ligne
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_vehicle"] . "</td>";
        echo "<td>" . $row["immatriculation"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "<td>" . $row["license_type"] . "</td>";
        echo "<td>" . $row["brand"] . "</td>";
        echo "<td>" . $row["state"] . "</td>";
        echo "</tr>";
    }
    // Fin du tableau HTML
    echo "</table>";
} else {
    echo "0 results"; // Si aucune donnée n'est disponible
}
$link->close();

?>


</div>
 </section>

  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
</body>
</html>


