<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDM Event Discovery</title>
</head>
<body>
    <h1>Discover EDM events near you!</h1>
    <form action="index.php" method="POST">

        <label for="genre">Genre</label>
        <select id="genre" name="genre">
        <?php foreach ($genres as $genre) {
        echo '<option value="' . htmlspecialchars($genre) . '">' . htmlspecialchars($genre) . '</option>';
        } ?>
        </select>

        <label for="type">Type</label>
        <select id="type" name="type">
        <?php foreach ($types as $type) {
        echo '<option value="' . htmlspecialchars($type) . '">' . htmlspecialchars($type) . '</option>';
        } ?>
        </select>

        <label for="location">Location</label>
        <select id="location" name="location">
        <?php foreach ($locations as $location) {
        echo '<option value="' . htmlspecialchars($location) . '">' . htmlspecialchars($location) . '</option>';
        } ?>
        </select>

</body>
</html>