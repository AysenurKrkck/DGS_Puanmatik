<html>
<title>DGS Puanmatik</title>
<body>

  <form action=" " method="post">
    <table>
      <tr><th colspan="3" class="baslik">DGS Puanmatik</th></tr>
      <tr><td></td><td>Doğru</td><td>Yanlış</td></tr>
      
      <tr>
        <td>Sayısal Testi</td>
        <td><input type="number" name="sayisal_d" min="0"></td>
        <td><input type="number" name="sayisal_y" min="0"></td>
      </tr>
      <tr>
        <td>Sözel Testi</td>
        <td><input type="number" name="sozel_d" min="0"></td>
        <td><input type="number" name="sozel_y" min="0"></td>
      </tr>
      <tr>
        <td>Önlisans Başarı Puanı</td>
        <td><input type="text" name="obp"></td>
        <td></td>
      </tr>
      <tr>
        <td>Alanınız</td>
        <td colspan="2">
          <label><input type="radio" name="alan" value="sayisal"> Sayısal</label>
          <label><input type="radio" name="alan" value="sozel"> Sözel</label>
          <label><input type="radio" name="alan" value="esit_agirlik" checked> Eşit Ağırlık</label>
        </td>
      </tr>
      <tr>
        <td>2025 öncesinde DGS ile bir programa yerleştirildiniz mi?</td>
        <td><label><input type="radio" name="yerlesme" value="evet"> Evet</label></td>
        <td><label><input type="radio" name="yerlesme" value="hayir" checked> Hayır</label></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:center;">
          <input type="submit" name="hesap" value="Hesapla">
          <input type="reset" name="temizle" value="Temizle">
        </td>
      </tr>
    </table>
  </form>

</body>
</html>

<?php
if(isset($_POST['hesap']))//hesap butonuna basılınca şunları yap:
{
    $obp = $_POST['obp'];

    // ÖBP kısmı boş mu diye kontrol eden kısım
    if(empty($obp))
    {
        echo "ÖBP alanını boş bıraktığınızdan puanınız hesaplanamamıştır.";
    }
    else
    {
        $sayisal_d = $_POST['sayisal_d'];
        $sayisal_y = $_POST['sayisal_y'];
        $sozel_d   = $_POST['sozel_d'];
        $sozel_y   = $_POST['sozel_y'];
        $alan      = $_POST['alan'];
        $yerlesme  = $_POST['yerlesme'];

        // Net Hesaplama 4 yanlış 1 doğruyu götürür kuralı ile
        $sayisal_net = $sayisal_d - ($sayisal_y / 4);
        $sozel_net   = $sozel_d - ($sozel_y / 4);

        // 2025 öncesinde yerleştiyse ÖBP katsayısının durumu
        if($yerlesme == "evet")
            $obp_katsayi = 0.3;
        else
            $obp_katsayi = 0.6;

        //alan kontrolü ve puan hesaplama
        switch($alan)
        {
            case "sayisal":
                $puan_adi = "Sayısal Puanı";
                $puan = ($sayisal_net * 3) + ($sozel_net * 0.6) + ($obp * $obp_katsayi) + 250;
                break;

            case "sozel":
                $puan_adi = "Sözel Puanı";
                $puan = ($sayisal_net * 0.6) + ($sozel_net * 3) + ($obp * $obp_katsayi) + 120;
                break;

            case "esit_agirlik":
                $puan_adi = "Eşit Ağırlık Puanı";
                $puan = ($sayisal_net * 1.8) + ($sozel_net * 1.8) + ($obp * $obp_katsayi) + 222;
                break;
        }

        //ekran çıktıları
        echo "Sayısal Testi Neti: $sayisal_net <br>";
        echo "Sözel Testi Neti: $sozel_net <br>";
        echo "Alanına Göre $puan_adi: $puan <br>";
    }
}
?>