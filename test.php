<?php
$mainDir = './poses/';
$subfolders = ['advance', 'intermediate', 'beginner'];

foreach ($subfolders as $subfolder) {
    $subDir = $mainDir . $subfolder . '/';
    $files = scandir($subDir);

    echo "Files in $subfolder subfolder with .html extension:\n";
    echo "<br>";
    $fileCount = count($files);
    for ($i = 0; $i < $fileCount; $i++) {
        $file = $files[$i];
        if (pathinfo($file, PATHINFO_EXTENSION) === 'html') {
            echo $subDir . $file . "\n";
        }
    }

    echo "Files in $subfolder subfolder with .jpg or .png extension:\n";
    echo "<br>";
    for ($i = 0; $i < $fileCount; $i++) {
        $file = $files[$i];
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if (in_array($extension, ['jpg', 'png'])) {
            echo $subDir . $file . "\n";
        }
    }

    echo "\n";
}
?>