<?php
define("ROOT", "D:/OpenServer/domains/yii2.loc");
$path_array = array('/components/', '/controllers/', '/models/', '/modules/admin/', '/modules/admin/controllers/', '/modules/admin/models/');
foreach ($path_array as $path) {
    $p = ROOT . $path;
    $path = opendir(ROOT . $path);
    while (false !== ($filename = readdir($path))) {
        $files[] = $filename;
    }
    foreach ($files as $file => $value) {
        if(preg_match("~^(\w+)(.php)$~i", $value)) {
            $count_words = substr_count(file_get_contents($p . $value), "function");
            $total_count += $count_words;
        }
        $files = array();
    }
    $global += $total_count;
    $total_count = 0;
    closedir($path);
}
echo "<h1>Количество методов классов в массиве</h1>" . $global;
?>

