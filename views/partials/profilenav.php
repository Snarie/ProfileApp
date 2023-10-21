<?php $id = explode('/', $_SERVER['PATH_INFO'])[2];;?>
<div class="menu" style="height:40px; ">
    <ul class="navbar">
<!--        <li class="nav link" id="/"><a href="/">Home</a></li>-->
        <li class="nav link" id="/profile"><a href="/profile/<?=$id?>">Profile</a></li>
        <li class="nav link dropdown" id="profile/details">
            <a>Details</a>
            <ul class="subbar">
                <li class="drop link" id="/profile/grades">
                    <a href="/profile/<?=$id?>/grades">Grades</a>
                </li>
                <li class="drop link" id="/profile/experience">
                    <a href="/profile/<?=$id?>/experience">Experience</a>
                </li>
                <li class="drop link" id="/profile/hobbies">
                    <a href="/profile/<?=$id?>/hobbies">Hobbies</a>
                </li>
                <li class="drop link" id="/profile/skills">
                    <a href="/profile/<?=$id?>/skills">Skills</a>
                </li>
                <!--
                <li class="drop link dropdown" id="route">
                    <a href="">Route</a>
                    <ul class="subbar">
                        <li class="drop link" id="route">
                            <a href="">Link</a>
                        </li>
                        <li class="drop link" id="route">
                            <a href="">Link</a>
                        </li>
                    </ul>
                </li>
                -->
            </ul>
        </li>
        <li class="nav link" id="profile/about">
            <a href="/profile/<?=$id?>/about">About</a>
        </li>
        <li class="nav link" id="profile/contact">
            <a href="/profile/<?=$id?>/contact">Contact</a>
        </li>
    </ul>
</div>
<script>
highlightActiveLink();
</script>