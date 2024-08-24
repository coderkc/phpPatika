<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnPHP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />

</head>

<body>


    <div>

        <?php

        function ucgen($n)
        {
            for ($k = 0; $k < $n; $k++) {
                for ($i = 0; $i < $k; $i++) {
                    echo "0 ";
                }
                echo "0 " . "<br>";
            }
        }

        ucgen(5);



        function ucg($n)
        {
            $i = 0;
            while ($i < $n) {
                $k = 0;
                while ($k < $i) {
                    echo "k ";
                    $k++;
                }
                echo "i " . "<br>";
                $i++;
            }
        }

        ucg(5)

        ?>

    </div>

</body>

</html>