<style>
    body{
        background: #f5f5f5;
    }
    .danger{
        color: red;
    }
    .info{
        color: limegreen;
    }
</style>
<form action="ucebol.php" method="post">
    <label for="sayi">Bir sayı giriniz...</label>
    <input type="number" name="sayi" id="sayi">

    <button type="submit">Gönder</button>

</form>
<?php


function uceBolunen($n)
{
    if ($n == "" || $n == null) {
        echo "<div class='danger'>Değer boş bırakılamaz...</div>";
    } else {

        echo "<h3> Girilen Sayı : $n</h3>";
        if ($n % 3 == 0) {
            echo "$n sayısı 3'e tam bölünür.";
        } else {

            $en = $n + (3 - $n % 3);

            echo "$n sayısı 3'e tam bölünemez. Tam bölünebilecek ilk sayi $en";
        }
    }
}

uceBolunen($_POST["sayi"]);

?>