<?php
header('Content-Type: application/json');
$dir = 'guias_disparadoras';
if (is_dir($dir)) {
    $files = array_diff(scandir($dir), array('.', '..'));

    $csvFiles = array_filter($files, function($file) use ($dir) {
        return pathinfo($dir . '/' . $file, PATHINFO_EXTENSION) === 'csv';
    });

    echo json_encode(array_values($csvFiles));
} else {
    echo json_encode([]);
}
?>
