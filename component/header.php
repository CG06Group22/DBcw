<!-- navbar -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">FakeBook</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../sandbox/profile.php">Home</a></li>
            <li><a href="../sandbox/search_test.php">Search</a></li>
            <li><a href="../sandbox/chat.php">Chat</a></li>



            <li class="dropdown pull-right">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Welcome,<?php
                    if (isset($_SESSION['first'])){
                        echo $_SESSION['first'];
                        echo " ";
                        echo $_SESSION['last'];
                    } else {
                        header("Location: ../index.php");
                    };
                    ?>!<strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="../sandbox/upload-avatar.php">Upload my avatar</a>
                    </li>

                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">Change password</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">My information</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="../sandbox/profile-privacy.php">More privacy settings</a>
                    </li>
                </ul>
            </li>






            <li><a href="../includes/logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
