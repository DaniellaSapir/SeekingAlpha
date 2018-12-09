<div class="container">
    <div class="jumbotron">
      <h1 class="display-3">FOLLOWMENTOR</h1>
      <p class="lead">Advanced Followers Manager</p>
      <hr class="my-4">
      <p class="lead">
        <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
        <p conteneditable='true' class="welcome">Welcome, <?php echo $current_user['name'] ?>! Please choose users to follow:</p>
      </p>
    </div>
    <h3>All Mentors</h3>
    <table border="2" cellspacing="3" class="table table-hover table-inverse" style="max-width:100%">
        <thead class="thead-inverse">
            <tr>
                <th>Mentor Name</th>
                <th>Expertise Group</th>
                <th>Number of Followers</th>
                <th>Follow</th>
            </tr>
        </thead>
        <tbody id="result"></tbody>
    </table>   
</div>
