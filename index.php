<?php

$black_list_to_not_show = array(".", "..", ".git");

$dir = ".";
$directories = array();
$zip_archive = new ZipArchive;

// this should be contain date now and time
$zip_file_name = "Ready to deploy.zip";

$zip_archive_open = $zip_archive->open($zip_file_name, (ZipArchive::CREATE | ZipArchive::OVERWRITE));

if ($zip_archive_open !== true) {
  die("Faild to create archive!\n");
}

foreach (scandir($dir) as $file) {
  $is_on_black_list = in_array($file, $black_list_to_not_show);
  $location = $dir . "/" . $file;

  if ($is_on_black_list) {

    continue;
  } else if (is_dir($location)) {

    // $zip_archive->addGlob($location . "/*");
    // echo $location . "\n";
  } else {
    $zip_archive->addGlob($location);
    // echo $location . "\n";
  }

  $is_failed_to_zip = $zip_archive->status != ZipArchive::ER_OK;

  if ($is_failed_to_zip) {
    echo "Failed to write " . $location . " files to zip\n";
  }
}

$zip_archive->close();
