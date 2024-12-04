<?php
namespace Views;

class JsonView {
    public function render($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}