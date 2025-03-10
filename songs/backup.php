<?php
$songsDir = __DIR__; // Since the script is inside "songs/", it checks its own folder

// Get all files in the songs directory
$songFiles = scandir($songsDir);

// Filter only audio files (mp3, wav, ogg)
$songs = array_filter($songFiles, function($file) {
    return preg_match('/\.(mp3|wav|ogg)$/i', $file);
});

header('Content-Type: application/json');
echo json_encode(array_values($songs));

// Debugging logs
error_log("Scanned files: " . print_r($songFiles, true));
error_log("Filtered songs: " . print_r($songs, true));
?>
