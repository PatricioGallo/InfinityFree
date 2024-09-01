<?php
function listFolders($dir) {
    $items = array_diff(scandir($dir), array('.', '..')); // Ignorar . y ..
    $folders = [];

    foreach ($items as $item) {
        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            // Añadir la carpeta y su fecha de modificación a un array
            $folders[$item] = filemtime($path);
        }
    }

    // Ordenar las carpetas por fecha de modificación, de más reciente a más antigua
    arsort($folders);

    return array_keys($folders); // Devolver solo los nombres de las carpetas en el orden correcto
}

$baseDir = 'files'; // Carpeta base
$folders = listFolders($baseDir);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMTECH | Coverage Report</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.prod.website-files.com/5bb751323ccf2691d96882bc/5cb092e971c2a703f9601b16_iconos%20isotipo-02%20-%2032x32.jpg" rel="shortcut icon" type="image/x-icon"/>
    <meta name="description" content="EmTech S.A. En esta web podrás ver los reportes de coverage, de verificación">
</head>
<body>
    <header>
        <a href="https://filemanager.ai/new/#"><img src="img/logo.webp" alt="EmTech Logo"> </a>
        <h2>Verificacion</h2>
        <h1>Reportes de CAMBIOS</h1>
    </header>
    <main>
        <h1>Lista de Reportes</h1>
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
