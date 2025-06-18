<?php
class Render{
    public function render($path, $params = [], $vista = ''){
        require_once(__DIR__ . '/../../public/pages/'. $path . '.page.php');
    }
}
?>