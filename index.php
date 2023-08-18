<?php
// ============== This function is working very well

function getDirContents($dir, &$results = array()) {
    $black_list_to_not_zip = array(".", "..", ".git");

    $files = scandir($dir);

    foreach ($files as $file) {
      $is_on_black_list = in_array($file, $black_list_to_not_zip);

        $location = $dir . "/" . $file;
        
        if (!is_dir($location)) {

          $results[] = $location;
        } 
        else if ($is_on_black_list === false) {

          $results[] = $location;
          getDirContents($location, $results);
        }
    }

    return $results;

}

function zip_all_file_and_folder () {

  $locations = getDirContents(".");

  $zip_archive = new ZipArchive;

  $zip_file_name = "Ready_to_deploy.zip";

  $zip_archive_open = $zip_archive->open($zip_file_name, (ZipArchive::CREATE | ZipArchive::OVERWRITE));

  if ($zip_archive_open !== true) {
    die("Faild to create archive!\n");
  }

  foreach ($locations as $location) {

    if (is_dir($location)) {

      $zip_archive->addEmptyDir($location);
    } else {

      $zip_archive->addGlob($location);
    }

    $is_failed_to_zip = $zip_archive->status != ZipArchive::ER_OK;

    if ($is_failed_to_zip) {
      echo "Failed to write " . $location . " files to zip\n";
    }
  }

  $zip_archive->close();
}

zip_all_file_and_folder();