// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//check if current user is following any user then display btn accordingly
$(document).ready(function()    {
    //DISPLAY ALL USERS
    getAllUsers(); 
    function getAllUsers() {
        var output;
        requestURL = "scripts/ajax/userlist.php";
        $.getJSON(requestURL,   {
                dataType: 'json',
                },  function(data)  {
                        // console.log(data);    
                        $.each(data, function(i, user)    {
                            console.log(user);
                            output =`
                            <tr>
                                <td>`+user.name+`</td>
                                <td>`+user.group_name+`</td>
                                <td>`+user.num_followers+`</td>
                            `
                            if (user.is_following) {
                                output += `<td><button type="button" id="`+user.id+`" class="following followbtn btn-lg">Following</button></td></tr>`;
                            } else {
                                output += `<td><button type="button" id="`+user.id+`" class="follow followbtn btn-lg">Follow</button></td></tr>`;
                            }
                            //APPEND the results to ul
                            $('#result').append(output);
                        });
                        //since ajax async 
                        $('.followbtn').on('click', function(){ follow(event);});
                        //HOVER EFFECT
                        $( ".following" ).hover(
                            function() {
                            //   $( this ).append( $( "<span> ***</span>" ) );
                              $( this )
                              .css("color", "red" )
                              .text("Unfollow");
                            }, function() {
                              $( this ).css("color", "white" ).text("Follow");                              ;
                            }
                        );
                        // $( ".following" ).hover(
                        //     function() {
                        //       $( this ).addClass( "hover" );
                        //     }, function() {
                        //       $( this ).removeClass( "hover" );
                        //     }
                        //   );
                    }
        );
    }  
    //FOLLOW LOGIC 
    function follow(event) {
        //check which action we must take - class follow means user not following currently
        var follow_state;
        //ACTION - TO FOLLOW
        if($(event.target).hasClass('follow')) {
            follow_state = true;
            requestURL = "scripts/ajax/follow.php";
        } else {
        //ACTION - UNFOLLOW
            follow_state = false;
            //according to state we choose controller
            requestURL = "scripts/ajax/unfollow.php";
        }
    
        //build get req. to send with the follower and followed ids(jquery event target_id)
        requestURL += '?followed_id='+ event.target.id +'&follower_id='+ getCookie('user_id');
        //upon valid response change btn and txt
        $.getJSON(requestURL,   {
        dataType: 'json',
        },  function(data)  {
                //console.log(data);
                if ( ! data) {
                    alert('Something went wrong, Please try again');
                    //FOLLOW 
                } else if(follow_state) {
                    $(event.target)
                    .addClass('following')
                    .removeClass('follow')
                    .text('Following');
                } else {                    
                    //UNFOLLOW
                    $(event.target)
                    .addClass('follow')
                    .removeClass('following')
                    .text('Follow');
                }   
            }
        );
    }  

});  //end ready func
   
//taken from https://www.codeproject.com/Tips/1009583/How-to-use-cookies-in-jQuery-without-a-plugin
function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
} 

