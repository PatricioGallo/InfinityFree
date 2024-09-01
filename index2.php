<?php
function listFolders($dir) {
    $items = array_diff(scandir($dir), array('.', '..'));
    $folders = [];

    foreach ($items as $item) {
        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            $folders[$item] = filemtime($path);
        }
    }
    arsort($folders);

    return array_keys($folders);
}

$baseDir = 'files/cnea';
$folders = listFolders($baseDir);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMTECH | Coverage Reports</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.prod.website-files.com/5bb751323ccf2691d96882bc/5cb092e971c2a703f9601b16_iconos%20isotipo-02%20-%2032x32.jpg" rel="shortcut icon" type="image/x-icon"/>
    <meta name="description" content="EmTech S.A. En esta web podrás ver los reportes de coverage, de verificación">
</head>
<body>
    <header>
        <a href="index.php"><img src="img/logo.webp" alt="EmTech Logo"> </a>
        <a href="index.php"><h2>Home</h2></a> 
        <h1>Coverage reports</h1>
    </header>
    <main>
        <h1>Report Lists</h1>
        <ul>
            <?php foreach ($folders as $folder): ?>
                <li><a href="files/<?php echo $folder; ?>/"><?php echo $folder; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </main>
    <footer>
        <p>© 2024 EmTech S.A. Todos los derechos reservados. Design by PG.</p>
    </footer>
</body>
</html>
