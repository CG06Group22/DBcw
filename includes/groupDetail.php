<?php

echo "<div id='friend'>
    <h3>Friends</h3>
    <div class='list-group'>";
            
    $target=$_SESSION['email'];
    $friend = "friend";
    $sql = "SELECT guestUserID FROM relationship WHERE relationship = '$friend' AND hostUserID = '$target'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if(!$count>0){
        echo "Your friend list is empty";
    }else{
        while($row=mysqli_fetch_array($result)){
            $guestUserID = $row['guestUserID'];
            $sql2 = "SELECT firstName, lastName FROM users WHERE email = '$guestUserID'";
            $result2 = mysqli_query($conn, $sql2);
            if (!$row = mysqli_fetch_assoc($result2)){
                echo "Can't find user.";
            } else {
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
            }
            $fullName = $firstName ." ".$lastName;

            echo "<li class='list-group-item'><a href='others-profile.php?$guestUserID'>";
            echo $fullName;

            $sql3 = "SELECT gid FROM usersgroup WHERE gid = '$gid' AND uid = '$guestUserID'";
            $result3 = mysqli_query($conn, $sql3);
            if ($row = mysqli_fetch_assoc($result3)){
                echo "<a href='../includes/addToGroup.php?u=$guestUserID&g=$gid'>Add</a>";
            }
        }
    }

echo "</div> </div>";

?>