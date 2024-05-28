<!DOCTYPE html>
<html>
<head>
    <title>Круговая диаграмма</title>
</head>
<body>
    <h1>Круговая диаграмма</h1>
    <form method="post" action="draw.php">
        <button type="submit" name="action" value="generate">Построить</button>
        <button type="submit" name="action" value="read">Считать</button>
    </form>
    <?php if (isset($_GET['image'])): ?>
        <img src="<?php echo $_GET['image']; ?>" alt="Круговая диаграмма">
    <?php endif; ?>
</body>
</html>
