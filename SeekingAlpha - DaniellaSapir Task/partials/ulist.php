<div class="container">
    <div class="jumbotron">
      <h1 class="display-3">FOLLOWMENTOR</h1>
      <p class="lead">Advanced Followers Manager</p>
      <hr class="my-4">
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
      </p>
    </div>
    <h3>All Mentors</h3>
    <table border="" cellspacing="3" class="table table-hover" style="max-width:100%">
        <thead class="thead-inverse">
            <tr>
                <th>Mentor Name</th>
                <th>Expertise Group</th>
                <th>Number of Followers</th>
                <th>Follow</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($users as $user) { ?>
                <tr>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['group_name']; ?></td>
                    <td><?php echo $user['num_followers']; ?></td>
                    <td>
                        <button type="button" id="followbtn" class="follow btn btn-warning btn-lg">Follow</button>
                        <!-- <button type="button" id="fbtn" class="follow btn btn-success btn-lg">Following</button> -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>   
</div>

<script>

$(document).ready(function()    {
        //verify with DB the follow state
        $('#followbtn').on('click',function(){ follow()});
        function follow() {
            var is_follower, is_following;
            var output;
            requestURL = "ajax_res.php?isfollowing=";
           $.getJSON(requestURL,   {
                      dataType: 'json',
                    },  function(data)  {
                                console.log(data);
                            //to be continued
                          })
                        }
                     );
        
            }
     
            
            
        });
           

</script>