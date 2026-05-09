<?php
function listDirectories($dir) {
    // Verificar si es un directorio válido
    if (!is_dir($dir)) {
        echo "El directorio especificado no es válido.";
        return;
    }

    // Abrir el directorio
    $dirHandle = opendir($dir);

    if ($dirHandle) {
        echo "<h2>Directorios en: " . htmlspecialchars($dir) . "</h2>";
        echo "<ul>";

        // Leer los archivos y carpetas dentro del directorio
        while (($entry = readdir($dirHandle)) !== false) {
            $path = $dir . DIRECTORY_SEPARATOR . $entry;
            // Verificar si es un directorio y no es '.' o '..'
            if (is_dir($path) && $entry !== '.' && $entry !== '..') {
                echo "<li>" . htmlspecialchars($entry) . "</li>";
            }
        }
        
        echo "</ul>";
        closedir($dirHandle);
    } else {
        echo "No se pudo abrir el directorio.";
    }
}

// Directorio a listar (puedes cambiar esto según tus necesidades)
$directoryToScan = '../portafolio';

listDirectories($directoryToScan);
?>
