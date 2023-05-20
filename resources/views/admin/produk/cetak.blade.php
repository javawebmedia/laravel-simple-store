<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ $title }}</title>
	<link rel="stylesheet" href="{{ asset('assets/css/print.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('assets/css/print.css') }}" media="print">
</head>
<body>
	<div class="cetak">
		<h1 class="text-center">{{ $produk->nama_produk }}</h1>
		<?php echo $produk->isi ?>
	</div>
</body>
</html>