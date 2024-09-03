<?php
include "helper.php";
session_start();

$sekil = get('islem'); // üçgen || kare || dikdörtgen
$islemu = post('ucgen');
$islemk = post('kare');
$islemd = post('dikdortgen');

class Sekil
{
    public $a, $b, $c;

    public function __construct($a, $b = null, $c = null)
    // ucgen ve dikdörtgen hesaplamaları hariç
    // b ve c değeri olmayacağı için kare hesabında sıkıntı çıkarıyor,
    // null eylemekte fayda var...
    {
        $this->a = (int)$a;
        $this->b = (int)$b;
        $this->c = (int)$c;
        // input type number olmasına rağmen bazenleri string ifadelerle
        // işlem yapıyorsunuz diye hata veriyor
        // bazenleri çalışıyor anlamadım onunçün (int) ile gelen değeri number eyledik

    }
}

class Ucgen extends Sekil
{
    public function cevre()
    {
        return $this->a + $this->b + $this->c;
    }
    public function alan()
    {
        $u = $this->cevre() / 2;
        return bcsqrt(abs(($u * ($u - $this->a) * ($u - $this->b) * ($u - $this->c))), 2);

        // 3 kenarı bilinen üçgenin alan hesabı böyle imiş
        // matematiğim zayıf, aşırı aralıklı değerler girince
        // bcsqrt() eksi değerler döndürdüğünden
        // abs() ile mutlak değer yaptım 😁
        // yinede aşırı aralıkta hata veriyor 🫣
    }
}

class Kare extends Sekil
{
    public function cevre()
    {
        return $this->a * 4;
    }
    public function alan()
    {
        return $this->a * $this->a;
    }
}

class Dikdortgen extends Sekil
{
    public function cevre()
    {
        return ($this->a + $this->b) * 2;
    }
    public function alan()
    {
        return $this->a * $this->b;
    }
}
// get ile gönderdiğimiz şekile göre koşul bloklarıyla işlemleri yaptık
// çok  tekrara düştük gibi, bir fonksiyonla çözülebilir miydi iş bilemedim 😵
// belki ilerleyen zemanlarda düzeltiriz burasını
if ($sekil == 'ucgen') {
    $a = post('ucgena');
    $b = post('ucgenb');
    $c = post('ucgenc');

    if (empty($a) || empty($b) || empty($c)) {

        $_SESSION["erru"] = "Lütfen tüm kenar uzunluklarını giriniz.";
        // değerler boş ise hata mesajı veriyoruz
        // ve eski değerleri boşaltıyoruz

        setcookie('alanU', '', time());
        setcookie('cevreU', '', time());
        setcookie('uca', '', time());
        setcookie('ucb', '', time());
        setcookie('ucc', '', time());

        header('Location: index.php');

        exit();
    }

    if (
        $a + $b <= $c ||
        $a + $c <= $b ||
        $b + $c <= $a
    ) {
        $_SESSION['erru'] =  "Bu kenar uzunlukları ile bir üçgen oluşturulamaz.";

        // üçgen eşitsizliği kontrolü

        setcookie('uca', '', time());
        setcookie('ucb', '', time());
        setcookie('ucc', '', time());
        setcookie('alanU', '', time());
        setcookie('cevreU', '', time());

        header('Location: index.php');

        exit();
    }
    $Ucgen = new Ucgen($a, $b, $c);
    $cevreUcgen = $Ucgen->cevre();
    $alanUcgen = $Ucgen->alan();

    setcookie('alanU', $alanUcgen, time() + 86400);
    setcookie('cevreU', $cevreUcgen, time() + 86400);
    setcookie('islemU', $islemu, time() + 86400);
    setcookie('uca', $a, time() + 86400);
    setcookie('ucb', $b, time() + 86400);
    setcookie('ucc', $c, time() + 86400);
}

if ($sekil == 'kare') {
    $a = post('karea');

    $Kare = new Kare($a);
    $cevreKare = $Kare->cevre();
    $alanKare = $Kare->alan();
    if (empty($a)) {
        $_SESSION["errk"] = "Lütfen tüm kenar uzunluklarını giriniz.";

        setcookie('alanK', '', time());
        setcookie('cevreK', '', time());
        setcookie('karea', '', time());

        header('Location: index.php');
        exit();
    }

    setcookie('alanK', $alanKare, time() + 86400);
    setcookie('cevreK', $cevreKare, time() + 86400);
    setcookie('islemK', $islemk, time() + 86400);
    setcookie('karea', $a, time() + 86400);
}

if ($sekil == 'dikdortgen') {
    $a = post('dika');
    $b = post('dikb');

    if (empty($a) || empty($b)) {

        $_SESSION["errd"] = "Lütfen tüm kenar uzunluklarını giriniz.";

        setcookie('alanD', '', time());
        setcookie('cevreD', '', time());
        setcookie('dika', '', time());
        setcookie('dikb', '', time());

        header('Location: index.php');

        exit();
    }

    $Dikdortgen = new Dikdortgen($a, $b);
    $cevreDikdortgen = $Dikdortgen->cevre();
    $alanDikdortgen = $Dikdortgen->alan();

    setcookie('alanD', $alanDikdortgen, time() + 86400);
    setcookie('cevreD', $cevreDikdortgen, time() + 86400);
    setcookie('islemD', $islemd, time() + 86400);
    setcookie('dika', $a, time() + 86400);
    setcookie('dikb', $b, time() + 86400);
}

header('Location: index.php');
