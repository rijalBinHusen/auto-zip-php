<?php

$black_list_to_not_show = array(".", "..", ".git");

$dir = "./";
$directories = array();
foreach (scandir($dir) as $file) {
  $is_on_black_list = in_array($file, $black_list_to_not_show);

  if($is_on_black_list) {
  
    continue;

  }

  else if (is_dir($dir . "/" . $file)) {
    // $directories[] = $file;
    echo $file . "\n";

  } else {

    echo $file . "\n";
    
  }
}

// foreach ($directories as $directory) {
//   echo $directory . "\n";
// }


// $dir = "./";
// $files = scandir($dir);
// foreach ($files as $file) {
//   if (!is_dir($dir . "/" . $file)) {
//     echo $file . "\n";
//   }
// }

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// class ZipHelper {

//     /**
//      * Add files and sub-directories in a folder to zip file.
//      * @param string $folder
//      * @param ZipArchive $zipFile
//      * @param int $exclusiveLength Number of text to be exclusived from the file path.
//      */
//     private static function folderToZip($folder, &$zipFile, $exclusiveLength) {
//         $handle = opendir($folder);
//         while ($f = readdir($handle)) {
//             if ($f != '.' && $f != '..') {
//                 $filePath = "$folder/$f";
//                 // Remove prefix from file path before add to zip.
//                 $localPath = substr($filePath, $exclusiveLength);
//                 if (is_file($filePath)) {
//                     $zipFile->addFile($filePath, $localPath);
//                 } elseif (is_dir($filePath)) {
//                     // Add sub-directory.
//                     $zipFile->addEmptyDir($localPath);
//                     self::folderToZip($filePath, $zipFile, $exclusiveLength);
//                 }
//             }
//         }
//         closedir($handle);
//     }

//     /**
//      * Zip a folder (include itself).
//      * Usage:
//      *   HZip::zipDir('/path/to/sourceDir', '/path/to/out.zip');
//      *
//      * @param string $sourcePath Path of directory to be zip.
//      * @param string $outZipPath Path of output zip file.
//      */
//     public static function zipDir($sourcePath, $outZipPath) {
//         $pathInfo = pathInfo($sourcePath);
//         $parentPath = $pathInfo['dirname'];
//         $dirName = $pathInfo['basename'];

//         $z = new ZipArchive();
//         $z->open($outZipPath, ZIPARCHIVE::CREATE);
//         $z->addEmptyDir($dirName);
//         self::folderToZip($sourcePath, $z, strlen("$parentPath/"));
//         $z->close();
//     }

//     public static function getZipFile($dir) {
//         $zipFiles = array();
//         if (is_dir($dir)) {
//             $objects = scandir($dir);

//             foreach ($objects as $object) {
//                 if ($object != "." && $object != "..") {
//                     $path = $dir . "/" . $object;
//                     if (filetype($path) != "dir") {
//                         $info = pathinfo($path);
//                         if (strtolower($info['extension']) == 'zip') {
//                             $zipFiles[] = $object;
//                         }
//                     }
//                 }
//             }
//         }
//         return $zipFiles;
//     }

// }
?>