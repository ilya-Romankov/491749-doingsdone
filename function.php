<?php
    function output_page ($path, $massiv_data) {
        if (!file_exists($path)) {
            return '';
        }
        ob_start();
        extract($massiv_data);
        require ($path);
        return ob_get_clean();
    }