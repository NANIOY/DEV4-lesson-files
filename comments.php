<?php
    $conn = new PDO('mysql:host=localhost;dbname=netflix', 'root', '');

    if (!empty($_POST)) {
        // save comment
        $statement = $conn->prepare(("INSERT INTO comments (text) VALUES (:text)"));
        $statement->bindValue(":text", $_POST['comment']);
        $result = $statement->execute();
    }

    $statement = $conn->prepare("SELECT * FROM comments");
    $statement->execute();
    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
</head>
<body>
    <form action="" method="post">
        <label for="comment">Comment</label>
        <input type="text" id="comment" name="comment">
        <input type="submit" value="Post comment">
    </form>

    <ul>
        <?php foreach($comments as $c): ?>
        <li><strong>USER</strong> <?php echo htmlspecialchars($c['text']); ?></li> <!-- htmlspecialchars is used to prevent XSS attacks -->
        <?php endforeach; ?>
    </ul>
</body>
</html>