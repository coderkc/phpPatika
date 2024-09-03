<?php
include "helper.php";
session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekillerrr</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .alert-danger {
            color: maroon;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="sekil">
            <div>

                <div class="content">

                    <div class="ucgen">
                        <?php
                        echo "<div class='sonuc'>";
                        if (cook('islemU') == 'alan') {
                            echo cook('alanU');
                        } else {
                            echo cook('cevreU');
                        }
                        echo "</div>"
                        ?>
                        <span class="a"> <?= cook('uca') ? cook('uca') : 'a' ?> </span>
                        <span class="b"> <?= cook('ucb') ? cook('ucb') : 'b' ?> </span>
                        <span class="c"> <?= cook('ucc') ? cook('ucc') : 'c' ?> </span>
                    </div>
                </div>

                <form action="hesap.php?islem=ucgen" method="post">
                    <div>
                        <label for="ucgena">Kenar a değeri</label>
                        <input type="number" name="ucgena" id="ucgena" min="1" value="<?= cook('uca') ? cook('uca') : '' ?>">
                    </div>
                    <div>
                        <label for="ucgenb">Kenar b değeri</label>
                        <input type="number" name="ucgenb" id="ucgenb" min="1" value="<?= cook('ucb') ? cook('ucb') : '' ?>">
                    </div>
                    <div>
                        <label for="ucgenc">Kenar c değeri</label>
                        <input type="number" name="ucgenc" id="ucgenc" min="1" value="<?= cook('ucc') ? cook('ucc') : '' ?>">
                    </div>
                    <div>
                        <button type="submit" name="ucgen" value="alan">Alan Hesapla</button>
                        <button type="submit" name="ucgen" value="cevre">Çevre Hesapla</button>
                    </div>
                    <?php if (session('erru')): ?>
                        <div class="alert-danger"><?= session('erru'); ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="sekil">
            <div>

                <div class="content">

                    <div class="kare">
                        <?php
                        echo "<div class='sonuc'>";
                        if (cook('islemK') == 'alan') {
                            echo cook('alanK');
                        } else {
                            echo cook('cevreK');
                        }
                        echo "</div>"
                        ?>
                        <span class="a"> <?= cook('karea') ? cook('karea') : 'a' ?> </span>
                        <span class="b"> <?= cook('karea') ? cook('karea') : 'a' ?> </span>
                        <span class="c"> <?= cook('karea') ? cook('karea') : 'a' ?> </span>
                        <span class="d"> <?= cook('karea') ? cook('karea') : 'a' ?> </span>
                    </div>
                </div>

                <form action="hesap.php?islem=kare" method="post">
                    <div>
                        <label for="karea">Kenar a değeri</label>
                        <input type="number" name="karea" id="karea" min="1" value="<?= cook('karea') ? cook('karea') : '' ?>">
                    </div>

                    <div class="btn">
                        <button type="submit" name="kare" value="alan">Alan Hesapla</button>
                        <button type="submit" name="kare" value="cevre">Çevre Hesapla</button>
                    </div>

                    <?php if (session('errk')): ?>
                        <div class="alert-danger"><?= session('errk'); ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="sekil">
            <div>

                <div class="content">

                    <div class="dikdortgen">
                        <?php
                        echo "<div class='sonuc'>";
                        if (cook('islemD') == 'alan') {
                            echo cook('alanD');
                        } else {
                            echo cook('cevreD');
                        }
                        echo "</div>"
                        ?>
                        <span class="a"> <?= cook('dika') ? cook('dika') : 'a' ?> </span>
                        <span class="b"> <?= cook('dikb') ? cook('dikb') : 'b' ?> </span>
                        <span class="c"> <?= cook('dika') ? cook('dika') : 'a' ?> </span>
                        <span class="d"> <?= cook('dikb') ? cook('dikb') : 'b' ?> </span>
                    </div>
                </div>

                <form action="hesap.php?islem=dikdortgen" method="post">
                    <div>
                        <label for="dika">Kenar a değeri</label>
                        <input type="number" name="dika" id="dika" min="1" value="<?= cook('dika') ? cook('dika') : '' ?>">
                    </div>
                    <div>
                        <label for="dikb">Kenar b değeri</label>
                        <input type="number" name="dikb" id="dikb" min="1" value="<?= cook('dikb') ? cook('dikb') : '' ?>">
                    </div>

                    <div>
                        <button type="submit" name="dikdortgen" value="alan">Alan Hesapla</button>
                        <button type="submit" name="dikdortgen" value="cevre">Çevre Hesapla</button>
                    </div>

                    <?php if (session('errd')): ?>
                        <div class="alert-danger"><?= session('errd'); ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php
$_SESSION['erru']=null;
$_SESSION['errk']=null;
$_SESSION['errd']=null;

?>