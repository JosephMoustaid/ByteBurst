<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: index.html'); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- fontawesome icons -->  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- bootstrap icons-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<!-- my css (scss)-->
<link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
<!--cookie alert js and css-->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>

<!-- Link to favicon -->
<link rel="icon" type="image/x-icon" href="../images/favicon-logo3.png">
<!-- Optionally, provide additional sizes for better compatibility -->
<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-logo3.png">
<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-logo3.png">
<!-- Some browsers also support specifying a shortcut icon for desktop -->
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon-logo3.png">

<!-- chart.js for the dashboard -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<title>Admin Page</title>
</head>
<body class="admin-body">

  <div class="container">

      <!-- Sidebar -->
    <div class="sidebar">
      <h1>ByteBurst Admin Panel</h1>
      <ul class="nav-links">
        <li><a href="#dashboard" onclick="showSection('dashboard')">Dashboard <i class="bi bi-speedometer"></i></a></li>
        <li><a href="#users" onclick="showSection('users')">Users <i class="bi bi-people-fill"></i> </a></li>
        <li><a href="#posts" onclick="showSection('posts')">Posts <i class="bi bi-file-post"></i> </a></li>
        <li><a href="../forms/publish.php" >New Post<i class="bi bi-file-earmark-plus-fill"></i></a> </li>
        <li><a href="#settings" onclick="showSection('settings')">Settings<i class="bi bi-gear-fill"></i> </a> </li>
        <li><a href="./logout.php">Logout <i class="bi bi-box-arrow-left"></i> </a></li>
      </ul>
    </div>
    <?php include_once("../backend/admin.php"); ?>
    <!-- Main Content Area -->
    <div class="main-content ">
      <div id="presentation"  class=" presentation section">
        <h2>Welcome to <a href="../main pages/">ByteBurst</a>'s Admin Panel</h2>
        <p>This is where you can manage ByteBurst.</p>
      </div>
      <div id="dashboard" class="dashboard dashboard-section section">
        <h3>Dashboard</h3>
        <div class="dashboard-content">
          <div class="dashboard-insight dashboard-insight1">
            <span>total users  </span> 
            <span class="dashboard-insight-number"><?php echo countUsers(); ?></span>
          </div>
          <div class="dashboard-insight dashboard-insight2">
            <span>total posts  </span> 
            <span class="dashboard-insight-number"><?php echo countPosts(); ?></span>
          </div>
          <div class="dashboard-insight dashboard-insight3">
            <span>total publishers  </span> 
            <span class="dashboard-insight-number"><?php echo countPublishers(); ?></span>
          </div>
          <div class="dashboard-insight dashboard-insight4">
            <span>total views  </span> 
            <span class="dashboard-insight-number"><?php echo countViews(); ?></span>
          </div>
        </div>
        <div >
            <?php 
                global $db;
                $articleData = getAllPosts();
            ?>
            <div class="charts-container">
              <?php include_once("../admin/postingChart.php") ?>
              <?php include_once("../admin/categoriesChart.php") ?>
            </div>
           
        </div>
      </div>  
      <div id="users" class="users section">
          <h3>Users</h3>
          <?php 
          // Check if a user deletion request has been made
          if(isset($_POST['delete_user_id']) && !empty($_POST['delete_user_id'])) {
              $delete_user_id = intval($_POST['delete_user_id']);
              $delete = deleteUser($delete_user_id);

              if($delete) {
                  // User deleted successfully, redirect back to admin.php
                  header("Location: ./admin.php");
                  exit();
              } else {
                  echo "Oops! Something went wrong. Please try again later.";
              }
          }
          ?>

          <form action="./admin.php#users" class="search-form"  method="post">
              <input type="hidden" name="form_submitted" value="1"> <!-- Hidden field to indicate form submission -->
              <label for="search_user">Search by name:(search empty for all users)</label> <br> <br>
              <input type="text" name="search_user considered-input" id="search_user">
              
              <input type="submit" class="considered-input" onclick="showSection('users')" value="Search">
          </form>

          <?php 
            // Check if a search query has been submitted
            if(isset($_POST['form_submitted'])) :
              $_POST['form_submitted']=0;
              if(isset($_POST['search_user']) && !empty($_POST['search_user'])) {
                  $search_user = $_POST['search_user'];
                  $users = searchuser($search_user);

                  if($users) {
                      echo '<table border="1px">';
                      echo '<tr>';
                      echo '<th> id </th>';
                      echo '<th> firstname </th>';
                      echo '<th> lastname </th>';
                      echo '<th> email </th>';
                      echo '<th> birthdate </th>';
                      echo '<th> password </th>';
                      echo '<th> gender </th>';
                      echo '<th> action </th>';
                      echo '</tr>';

                      foreach($users as $user) {
                          echo '<tr>';
                          echo '<td>' . $user['id_user'] . '</td>';
                          echo '<td>' . $user['firstname'] . '</td>';
                          echo '<td>' . $user['lastname'] . '</td>';
                          echo '<td>' . $user['email'] . '</td>';
                          echo '<td>' . $user['birthdate'] . '</td>';
                          echo '<td>' . $user['password'] . '</td>';
                          echo '<td>' . $user['gender'] . '</td>';
                          echo '<td>';
                          echo '<form method="post" action="./admin.php">';
                          echo '<input type="hidden" name="delete_user_id" value="' . $user['id_user'] . '">';
                          echo '<input type="submit" value="Delete">';
                          echo '</form>';
                          echo '</td>';
                          echo '</tr>';
                      }

                      echo '</table>';
                  } else {
                      echo 'No users found with the first name: ' . $search_user;
                  }
              } else {
                  // Display all users if no search query is provided
                  $result = getAllUsers();
                  echo '<table border="1px">';
                  echo '<tr>';
                  echo '<th> id </th>';
                  echo '<th> firstname </th>';
                  echo '<th> lastname </th>';
                  echo '<th> email </th>';
                  echo '<th> birthdate </th>';
                  echo '<th> password </th>';
                  echo '<th> gender </th>';
                  echo '<th> action </th>';
                  echo '</tr>';

                  foreach($result as $key => $value) {
                      echo '<tr>';
                      echo '<td>' . $value['id_user'] . '</td>';
                      echo '<td>' . $value['firstname'] . '</td>';
                      echo '<td>' . $value['lastname'] . '</td>';
                      echo '<td>' . $value['email'] . '</td>';
                      echo '<td>' . $value['birthdate'] . '</td>';
                      echo '<td>' . $value['password'] . '</td>';
                      echo '<td>' . $value['gender'] . '</td>';
                      echo '<td>';
                      echo '<form  method="post" action="#users">';
                      echo '<input type="hidden" name="delete_user_id" value="' . $value['id_user'] . '">';
                      echo '<input type="submit" value="Delete">';
                      echo '</form>';
                      echo '</td>';
                      echo '</tr>';
                  }

                  echo '</table>';
              }
            endif;
          ?>
      </div>

      <div id="posts" class=" posts section">
        <h3>Posts</h3>
        
        <?php 
          // Check if a user deletion request has been made
          if(isset($_POST['id']) && !empty($_POST['id'])) {
              $delete = deletePost(intval($_POST['id']));

              if($delete) {
                  // User deleted successfully, redirect back to admin.php
                  header("Location: admin.php");
                  exit();
              } else {
                  echo "Oops! Something went wrong. Please try again later.";
              }
          }
          ?>

          <?php 
          $result = getAllPosts();
          echo '<table border="1px">';
          echo '<tr>';
          echo '<th> post date </th>';
          echo '<th> views </th>';
          echo '<th> title </th>';
          echo '<th> Image </th>';
          echo '<th> categorie </th>';
          echo '<th> publisher id </th>';
          echo '<th> action </th>';
          echo '<th> action </th>';
          echo '</tr>';

          foreach($result as $key => $value) {
              echo '<tr>';
              echo '<td>' . $value['id_post'] . '</td>';
              echo '<td>' . $value['views'] . '</td>';
              echo '<td>' . $value['title'] . '</td>';
              echo '<td><img class="table-image" src="' . $value['firstImage'] . '" alt="article image"></td>';
              echo '<td>' . $value['categorie'] . '</td>';
              echo '<td>' . $value['publisher_id'] . '</td>';
              echo '<td>';
              echo '<form method="post" action="./admin.php">';
              echo '<input type="hidden" name="id" value="' . $value['article_id'] . '">';
              echo '<input type="submit" value="Delete">';
              echo '</form>';
              echo '</td>';
              echo '<td>';
              echo '<form method="get" action="./editPost.php">';
              echo '<input type="hidden" name="id" value="' . $value['article_id'] . '">';
              echo '<input type="submit" value="edit">';
              echo '</form>';
              echo '</td>';
              echo '</tr>';
          }

          echo '</table>';
        ?>

      </div>

      <div id="settings"  class=" settings section">settings</div>
    </div>
  </div>
  <script src="../javascript/admin.js"></script>
</body>
</html>

