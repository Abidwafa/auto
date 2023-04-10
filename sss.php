$image_file = $_FILES["foto"];

// Move the temp image file to the images/ directory
move_uploaded_file(
    // Temp image location
    $image_file["tmp_name"],

    // New image location, __DIR__ is the location of the current PHP file
    __DIR__ . "/fotos/" . $image_file["name"]
);