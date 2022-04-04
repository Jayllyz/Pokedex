<?php
  //source et destination
  $source = 'uploadsPokemons/'.$selectPoke["image"].'';
  $dest = 'uploadsPokemons/'.$selectPoke["image"].'';

  //resolution voulue
  $size = getimagesize($source);
  $width = $size[0];
  $height = $size[1];

  //resize
  $rwidth = 700;
  $rheight = 500;

  //ouverture de l'image
  $original = imagecreatefromjpeg($source);

  //resize
  $resized = imagecreatetruecolor($rwidth, $rheight);
  imagecopyresampled(
    $resized, $original,
    0, 0, 0, 0,
    $rwidth, $rheight,
    $width, $height
  );

  //sauvegarder l'image redimensionner
  imagejpeg($resized, $dest);

?>
