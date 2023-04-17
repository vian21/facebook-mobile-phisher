<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        body {
            background-color: #f0f2f5;
            height: 100%;
            margin: 0;
        }

        div {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            margin: auto;
            width: 80%;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }

        input {
            width: 100%;
            border-radius: 10px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        input[type="file"] {
            border: none;
        }

        #submit {
            border: none;
            background-color: #87CEEB;
            border-radius: 10px;
            color: white;
            padding: 10px;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title"><br />
            <input type="file" name="icon" placeholder="Icon"><br />
            <button id="submit" type="submit">Save and Download Zip</button>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['title']) && isset($_FILES['icon'])) {
    $title = addslashes($_POST['title']);
    $icon = $_FILES["icon"]["name"];

    $file = fopen("config.php", "w");
    fwrite($file, "<?php
    \$title=\"$title\";
    \$icon=\"$icon\";
    ?>");

    fclose($file);

    $target_file = basename($_FILES["icon"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    } else {
        if (!move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
            echo "An error occurred during the file upload. Please try again.";
        }
    }

    $zip = new ZipArchive();
    $zip->open("export.zip", ZipArchive::CREATE);
    $dir = scandir(".");
    foreach ($dir as $file) {
        if ($file != "." && $file != ".." && $file != "export.zip" && !is_dir($file)) {
            $zip->addFile($file);
        }
    }
    $zip->close();

    header("Content-Type: application/zip");
    header("Location: export.zip");
}
?>