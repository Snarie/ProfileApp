<header>
    <div class="container row-small" style="z-index: 5">
        <div class="left">
            <a style="font-size: 30px;">ProfileApp</a>
                <button onclick="displayLinks()" style="font-size: 40px; height:40px" class="material-symbols-outlined icon-button">menu</button>
        </div>
        <div class="right">
            <div class="menu row-smaller" style="background-color: inherit">
                <ul class="navbar">
                <?php
                if(isset($_SESSION['username'])) {
                    ?>
                    <li class="nav no-padding">
                        <?php
                        $sql = "SELECT icon
					            FROM profiles
					            WHERE id = :userid AND icon IS NOT NULL";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_INT);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        if($result) {
	                        $iconName = "/public/images/profile_icons/".$result['icon'];
                        } else {
                            $iconName =  "/public/images/moveIcon_def.png";
                        }
                        ?>
                        <img class="icon-fit" src="<?=$iconName?>" alt="profile">
                    </li>
                    <li class="nav link dropdown">
                        <a href="/account">
                            <?= $_SESSION['username'];?>
                        </a>
                        <ul class="subbar">
                            <li class="drop link">
                                <a href="/profile/<?=$_SESSION['username']?>">Profile</a>
                            </li>
                            <li class="drop link">
                                <a href="/logout.php"><i class="material-symbols-outlined">logout</i>Logout</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                } else {
                    echo '
                    <li class="nav link">
                        <a href="/login">Login</a>
                    </li>
                    ';
                }
                ?>
                </ul>
            </div>
        </div>

    </div>
    <div class="menu row-default">
        <ul class="navbar menu-left">
            <li class="nav link">
                <a href="/">Home</a>
            </li>
            <li class="nav link dropdown">
                <a>Forum</a>
                <ul class="subbar">
                    <li class="drop link">
                        <a href="/forum/faq">Faq</a>
                    </li>
                </ul>
            </li>
            <li class="nav link">
                <a href="/about">About us</a>
            </li>

        </ul>
        <ul class="navbar menu-right">
            <li class="nav link">
                <a href="/help">Help</a>
            </li>
        </ul>
    </div>
</header>


