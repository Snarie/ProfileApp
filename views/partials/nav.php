<header>This is the imported header</header>
<!-- https://fonts.google.com/icons -->
<sidebar id="mySidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
    <a href="/" <?= ($_SERVER['REQUEST_URI'] == '/' ? 'active' : ''); ?>>
        <span>
            <i class="material-icons">home</i>
            <span class="icon-text">Home</span>
        </span>
    </a><br>
    <a href="/about" <?= ($_SERVER['REQUEST_URI'] == '/about' ? 'active' : ''); ?>>
        <span>
            <i class="material-icons">info</i>
            <span class="icon-text">About</span>
        </span>
    </a><br>
    <a href="/skills" <?= ($_SERVER['REQUEST_URI'] == '/skills' ? 'active' : ''); ?>>
        <span>
            <i class="material-icons">rule</i>
            <span class="icon-text">Skills</span>
        </span>
    </a><br>
    <a href="/details" <?= ($_SERVER['REQUEST_URI'] == '/details' ? 'active' : ''); ?>>
        <span>
            <i class="material-symbols-outlined">page_info</i>
            <span class="icon-text">Details</span>
        </span>
    </a><br>
    <a href="/contact" <?= ($_SERVER['REQUEST_URI'] == '/contact' ? 'active' : ''); ?>>
        <span>
            <i class="material-icons">email</i>
            <span class="icon-text">Contact</span>
        </span>
    </a>
    <a href="/profile" <?= ($_SERVER['REQUEST_URI'] == '/profile' ? 'active' : ''); ?>>
        <span>
            <i class="material-icons">person</i>
            <span class="icon-text">Profile</span>
        </span>
    </a>
</sidebar>