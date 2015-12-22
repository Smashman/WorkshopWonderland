<?php


$users = [];

function get_credit_data($profile_list) {
    include 'config.php';
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
    mysqli_set_charset($conn, 'utf8');

    $query = "SELECT * from users where account_id in (";

    $length = count($profile_list);

    for ($i=0; $i < $length; ++$i) {
        if ($i+1 < $length) {
            $query .= $profile_list[$i].", ";
        } else {
            $query .= $profile_list[$i];
        }
    }

    $query .= ")";

    $result = $conn->query($query);

    global $users;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[$row['account_id']] = ["avatar"=>$row['avatar_medium'],"name"=>htmlspecialchars($row['name']),"url"=>$row['profile_url']];
        }
    }
}

function steam_block ($user_id,$role=false,$long=false) {
    global $users;
    if ($users[$user_id]) {
        $block = '<a class="steam" href="'.$users[$user_id]['url'].'" target="_blank">
                            <div class="iconholder">
                                <img src="'.$users[$user_id]['avatar'].'" />
                            </div>
                            <div class="name'. ($role == false ? ' no_role': '') .'">'.$users[$user_id]['name'].'</div>';
        if ($role) {
            $block .= '<div class="role'.($long ? ' long': '').'">'.$role.'</div>';
        }
        $block .= '</a>';
        return $block;
    }
}