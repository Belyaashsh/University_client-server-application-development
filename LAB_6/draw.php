<?php
function drawPieChart($data) {
    $width = 500;
    $height = 500;
    $image = imagecreatetruecolor($width, $height);
    $backgroundColor = imagecolorallocate($image, 255, 255, 255);
    imagefill($image, 0, 0, $backgroundColor);

    $total = array_sum(array_column($data, 'weight'));
    $angleStart = 0;
    $centerX = $width / 2;
    $centerY = $height / 2;
    $radius = min($centerX, $centerY) - 10;

    foreach ($data as $sector) {
        $angleEnd = $angleStart + ($sector['weight'] / $total) * 360;
        $color = imagecolorallocate($image, $sector['color'][0], $sector['color'][1], $sector['color'][2]);

        // Преобразование углов в целые числа
        imagefilledarc($image, (int)$centerX, (int)$centerY, (int)($radius * 2), (int)($radius * 2), (int)$angleStart, (int)$angleEnd, $color, IMG_ARC_PIE);

        $angleMiddle = deg2rad(($angleStart + $angleEnd) / 2);
        $textX = $centerX + cos($angleMiddle) * ($radius / 2);
        $textY = $centerY + sin($angleMiddle) * ($radius / 2);
        $textColor = imagecolorallocate($image, 0, 0, 0);

        // Вычисление процента и вывод текста
        $percentage = round(($sector['weight'] / $total) * 100, 2) . '%';
        imagestring($image, 3, (int)$textX, (int)$textY, $percentage, $textColor);
        $angleStart = $angleEnd;
    }

    $filename = 'pie_chart.png';
    imagepng($image, $filename);
    imagedestroy($image);

    return $filename;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'generate') {
        $sectors = rand(3, 6);
        $data = [];

        for ($i = 0; $i < $sectors; $i++) {
            $data[] = [
                'weight' => rand(1, 100),
                'color' => [rand(0, 255), rand(0, 255), rand(0, 255)]
            ];
        }

        $image = drawPieChart($data);
        header("Location: index.php?image=$image");
        exit;
    } elseif ($action === 'read') {
        $filename = 'data.txt';
        $data = [];
        
        if (file_exists($filename)) {
            $lines = file($filename);
            foreach ($lines as $line) {
                list($weight, $r, $g, $b) = sscanf($line, "%d : %d : %d : %d");
                $data[] = [
                    'weight' => $weight,
                    'color' => [$r, $g, $b]
                ];
            }

            $image = drawPieChart($data);
            header("Location: index.php?image=$image");
            exit;
        } else {
            echo "Файл не найден!";
        }
    }
}
?>
