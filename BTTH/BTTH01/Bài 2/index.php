<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trắc nghiệm đạo đức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Trắc nghiệm đạo đức lối sống</h2>


    <form action="index.php" method="POST">

        <?php

        include 'display_questions.php';
        ?>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </div>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'calculate_score.php';
    }
    ?>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
