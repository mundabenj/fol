<?php
class layouts {
    public function header($conf) {
        echo "<header><h1>" . $conf['site_name'] . "</h1></header>";
    }

    public function footer($conf) {
        echo "<footer><p>Copyright &copy; - " . $conf['site_name'] . " " . date("Y") . "</p></footer>";
    }
}