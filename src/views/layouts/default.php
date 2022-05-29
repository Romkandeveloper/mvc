<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php require 'src/views/components/header.php' ?>
    <?php echo $content; ?>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2KuPasVz8yDJbNmtCoYaH7y8dkDhA45c&callback=initMap"></script>
</body>
</html>