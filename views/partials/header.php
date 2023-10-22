<header>
    <div class="banner row-small">
        <a class="left" style="font-size: 36px; font-weight:1000;">ProfileApp</a>
        <?php
        if(isset($_SESSION['username'])){

            echo "<a class='right'>".$_SESSION['username']."</a>";
        }
        ?>

    </div>
    <div class="menu row-small">
        <ul class="navbar menu-left">
            <li class="nav link" id="/"><a href="/">Home</a></li>
            <li class="nav link dropdown" id="/forum">
                <a>Forum</a>
                <ul class="subbar">
                    <li class="drop link" id="/forum/faq">
                        <a href="/forum/faq">Faq</a>
                    </li>
                    <li class="drop link" id="/forum/boards">
                        <a href="/forum/boards">Boards</a>
                    </li>
                </ul>
            </li>
            <li class="nav link" id="/about">
                <a href="/about">About us</a>
            </li>

        </ul>
        <ul class="navbar menu-right">
            <li class="nav link" id="/help">
                <a href="/help">Help</a>
            </li>
        </ul>
    </div>
</header>