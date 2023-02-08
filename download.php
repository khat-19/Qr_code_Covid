<?php
if (!empty($_GET = ['file'])) {
    $filename = basename($_GET['file']);
    $filePath = 'temp/' . $fileName;
    if (!empty($fileName) && file_exists($filePath)) {

        header('Content-Length: ' . filesize($filePath));
        header('Content-Encoding: none');
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("COntent-TYpe: application/zip");
        header("Content-Transfer-Encoding: binary");

        readfile($filePath);
        exit;
    } else {
        echo 'The File ' . $fileName . ' does not exist.';
    }
}
