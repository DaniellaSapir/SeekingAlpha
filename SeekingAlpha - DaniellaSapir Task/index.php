<?php

require_once 'initialize.php';
//change the page title
if(!isset($page_title)) {
    $page_title="Daniella's Task-Homepage";
}
include "partials/header.php"; 
//Homepage->if cookie exists, show users, if not show login page (enough to check if there is any cookie)
if(!isset($_COOKIE[COOKIE_NAME])) {
    header('Location: login.php'); 
    die;
}

//if there is a cookie for user, show the users list to follow
$rs = DB::query("
SELECT users.name, groups.name as group_name, sum(if(isnull(followers.followed_id), 0, 1)) as num_followers
FROM users
JOIN groups ON users.group_id = groups.id
LEFT JOIN followers ON users.id = followers.followed_id
WHERE users.id != ".$_COOKIE[COOKIE_NAME]."
GROUP BY users.id
ORDER BY users.name
");

//prepare users for render
$users = [];
while ($row = mysqli_fetch_assoc($rs)) {
    $users[]=$row;
}


?>



  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container">

    <div class="ulist">
        <?php
        include "partials/ulist.php";
        ?>
    </div>
</div>

<footer class="container-fluid">
  <p>@Daniella</p>
</footer>

</body>
</html>
