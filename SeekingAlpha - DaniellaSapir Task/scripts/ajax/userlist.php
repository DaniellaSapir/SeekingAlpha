<?php
require_once('../../initialize.php');

//Fetch the requred fields from DB, left join allows to count rows with 0 followers
$rs = DB::query("
SELECT users.id, users.name, groups.name as group_name, sum(if(isnull(followers.followed_id), 0, 1)) as num_followers, GROUP_CONCAT(followers.follower_id) as followers
FROM users
JOIN groups ON users.group_id = groups.id
LEFT JOIN followers ON users.id = followers.followed_id
WHERE users.id != $user_id
GROUP BY users.id
ORDER BY users.name
");

//open rs obj with while and prepare users for render
$users = [];
while ($row = mysqli_fetch_assoc($rs)) {
    //create an arr of each row
    $followers = explode(",", $row['followers']);
    //each row add new field(flag) is_following
    $row['is_following'] = in_array($user_id, $followers);
    //populat users arr
    $users[] = $row;
}

echo json_encode($users);

