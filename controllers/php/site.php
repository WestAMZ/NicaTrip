
<?php
    class Site
    {
        static function getHead($page_name)
        {
            include(HTML_DIR . 'head.html');
            echo('<title>' . SITE_NAME . ' - ' . $page_name . '</title>');
            echo('</head>');
            echo('</body>');
        }
        static function getNav()
        {
            include(HTML_DIR . 'nav.html');
        }
        static function getLogin()
        {
            include(HTML_DIR . 'login.html');
        }
        static function getFooter()
        {
            include(HTML_DIR . 'footer.html');
        }
        static function getRegister()
        {
            include(HTML_DIR . 'register.html');
        }
        static function getSocialNav()
        {
            include(HTML_DIR . 'social_nav.html');
        }
        static function getSlide()
        {
            include(HTML_DIR . 'slide.html');
        }
        static function getBodyIndex()
        {
            include(HTML_DIR . 'body_index.html');
        }
        static function getModal()
        {
            include(HTML_DIR . 'modal.html');
        }
        static function getConfirmAccount()
        {
            include(HTML_DIR . 'confirm.html');
        }
        static function getGallery()
        {
            include(HTML_DIR . 'gallery.html');
        }
        static function getProfile()
        {
            include(HTML_DIR . 'profile.html');
        }
    }
?>
