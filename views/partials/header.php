<header>
    <div class="container row-small" style="z-index: 5">
        <div class="left"><a style="font-size: 30px;">ProfileApp</a></div>
        <div class="right">
            <div class="menu row-smaller" style="background-color: inherit">
                <ul class="navbar">
                <?php
                if(isset($_SESSION['username'])) {
                    echo '
                    <li class="nav no-padding">
                        <img class="icon-fit" src="/public/images/moveIcon_def.png" alt="profile">
                    </li>
                    <li class="nav link dropdown">
                        <a href="/account">';
                            echo $_SESSION['username'];
                        echo'
                        </a>
                        <ul class="subbar">
                            <li class="drop link">
                                <a href="/profile/'.$_SESSION['username'].'">Profile</a>
                            </li>
                            <li class="drop link">
                                <a href="/logout.php"><i class="material-symbols-outlined">logout</i>Logout</a>
                            </li>
                        </ul>
                    </li>
                    ';
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
                    <li class="drop link">
                        <a href="/forum/boards">Boards</a>
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


