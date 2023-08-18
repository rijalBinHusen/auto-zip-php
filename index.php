<?php

// $black_list_to_not_show = array(".", "..", ".git");

// $dir = ".";
// $directories = array();
// $zip_archive = new ZipArchive;

// // this should be contain date now and time
// $zip_file_name = "Ready to deploy.zip";

// $zip_archive_open = $zip_archive->open($zip_file_name, (ZipArchive::CREATE | ZipArchive::OVERWRITE));

// if ($zip_archive_open !== true) {
//   die("Faild to create archive!\n");
// }

// foreach (scandir($dir) as $file) {
//   $is_on_black_list = in_array($file, $black_list_to_not_show);
//   $location = $dir . "/" . $file;

//   if ($is_on_black_list) {

//     continue;
//   } else if (is_dir($location)) {

//     // $zip_archive->addGlob($location . "/*");
//     // echo $location . "\n";
//   } else {
//     $zip_archive->addGlob($location);
//     // echo $location . "\n";
//   }

//   $is_failed_to_zip = $zip_archive->status != ZipArchive::ER_OK;

//   if ($is_failed_to_zip) {
//     echo "Failed to write " . $location . " files to zip\n";
//   }
// }

// $zip_archive->close();

// ============== This function is working very well

function getDirContents($dir, &$results = array()) {
    $black_list_to_not_show = array(".", "..", ".git");

    $files = scandir($dir);

    foreach ($files as $file) {
      $is_on_black_list = in_array($file, $black_list_to_not_show);

        $location = $dir . "/" . $file;
        
        if (!is_dir($location)) {

            $results[] = $location;

        } else if ($is_on_black_list === false) {

            getDirContents($location, $results);

            $results[] = $location;

        }
    }

    return $results;

}


var_dump(getDirContents("."));
