<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC PHP</title>
</head>

<body>
    <h1>Welcome to Home Page of PHP MVC</h1>
    <h2>Users: </h2>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li><?= $user['name']; ?></li>
            <li><?= $user['email']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>