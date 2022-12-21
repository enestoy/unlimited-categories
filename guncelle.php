<?php
require_once("baglan.php");
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>Sınırsız Kategori Sistemi</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<?php
			$GelenID = Filtrele($_GET["id"]);
			$Sorgu 			= $VeritabaniBaglantisi->prepare("SELECT * FROM menuler WHERE id = ? LIMIT 1");
			$Sorgu->execute([$GelenID]);
			$KayitSayi	= $Sorgu->rowCount();
			$Kaydi 		= $Sorgu->fetch(PDO::FETCH_ASSOC);

			function AcilirListeIcinMenuYaz($MenuUstIdDegeri = 0, $BoslukDegeri = 0)
			{
				global $VeritabaniBaglantisi;
				$Sorgu             = $VeritabaniBaglantisi->prepare("SELECT * FROM menuler WHERE ustid = ?");
				$Sorgu->execute([$MenuUstIdDegeri]);
				$KayitSayisi    = $Sorgu->rowCount();
				$Kayitlar         = $Sorgu->fetchAll(PDO::FETCH_ASSOC);
				if ($KayitSayisi > 0) {
					foreach ($Kayitlar as $Kayit) {
						$MenuId         = $Kayit["id"];
						$MenuUstId         = $Kayit["ustid"];
						$MenuMenuAdi    = $Kayit["menuadi"];

						echo "<option value='" . $MenuId . "'>" . str_repeat("&nbsp;", $BoslukDegeri) . $MenuMenuAdi . "</option>";

						AcilirListeIcinMenuYaz($MenuId, $BoslukDegeri + 5);
					}
				}
			}


			function MenuYaz($MenuUstIdDegeri = 0, $BoslukDegeri = 0)
			{
				global $VeritabaniBaglantisi;
				$Sorgu             = $VeritabaniBaglantisi->prepare("SELECT * FROM menuler WHERE ustid = ?");
				$Sorgu->execute([$MenuUstIdDegeri]);
				$KayitSayisi    = $Sorgu->rowCount();
				$Kayitlar         = $Sorgu->fetchAll(PDO::FETCH_ASSOC);
				if ($KayitSayisi > 0) {
					foreach ($Kayitlar as $Kayit) {
						$MenuId         = $Kayit["id"];
						$MenuUstId         = $Kayit["ustid"];
						$MenuMenuAdi    = $Kayit["menuadi"];

						echo str_repeat("&nbsp;", $BoslukDegeri);
						echo $MenuMenuAdi . " <a href='guncelle.php?id=" . $MenuId . "' class='link-warning text-decoration-none'>[Güncelle]</a> <a href='sil.php?id=" . $MenuId . "' class='link-danger text-decoration-none'>[Sil]</a><br> ";

						MenuYaz($MenuId, $BoslukDegeri + 10);
					}
				}
			}
			?>
			<div class="col-12 mt-3 mb-5">
				<h3 class="text-info">Menü Güncelleme Formu</h3>

				<form action="guncellesonuc.php?id=<?php echo $GelenID ?>" method="post">
					<label class="form-label">Üst Menü:</label>
					<select class="form-select form-select-lg mb-3" name="UstMenuSecimi">
						<option selected>Ana Menü</option>
						<?php AcilirListeIcinMenuYaz(); ?>
					</select>
					<label class="form-label">Menü Adı:</label>
					<input class="form-control" type="text" name="MenuAdi" value='<?php echo $Kaydi["menuadi"]?>'><br>
					<input type="submit" class="btn btn-success" value="Menüyü Güncelle">
				</form>
			</div>
			<?php
			$VeritabaniBaglantisi         = null;
			?>
		</div>
	</div>

</body>

</html>