<?php
//$route = $route ?? '/';
$id = explode('/', $_SERVER['PATH_INFO'])[2];;
?>
<div class="menu row-small">
    <ul class="navbar menu-left">
        <li class="nav link"><a href="/profile/<?=$id?>"><?=$id?>'s Profile</a></li>
        <li class="nav link dropdown">
            <a>Details</a>
            <ul class="subbar">
                <li class="drop link">
                    <a href="/profile/<?=$id?>/experience">Experience</a>
                </li>
                <li class="drop link">
                    <a href="/profile/<?=$id?>/hobbies">Hobbies</a>
                </li>
                <li class="drop link">
                    <a href="/profile/<?=$id?>/skills">Skills</a>
                </li>
            </ul>
        </li>
<!--        <li class="nav link">-->
<!--            <a href="/profile/--><?//=$id?><!--/contact">Contact</a>-->
<!--        </li>-->

    </ul>
    <?php
    if(isset($links)){
        echo $links;
    }
    ?>
</div>