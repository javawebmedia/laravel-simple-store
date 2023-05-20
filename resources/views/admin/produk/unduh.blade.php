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
		<h1 class="text-center">{{ $title }}</h1>

		<table class="printer">
			<thead>
				<tr>
					<th width="5%">No</th>
					<th width="25%">Produk</th>
					<th width="15%">Kategori</th>
					<th width="15%">Periode Diskon</th>
					<th width="15%">Harga Reguler</th>
					<th width="15%">Harga Diskon</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach($produk as $produk) { ?>
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $produk->nama_produk }}</td>
						<td>{{ $produk->nama_kategori }}</td>
						<td>{{ date('d-m-Y',strtotime($produk->tanggal_mulai)) }} sd {{ date('d-m-Y',strtotime($produk->tanggal_selesai)) }}</td>
						<td>{{ number_format($produk->harga) }}</td>
						<td>{{ number_format($produk->harga_diskon) }}</td>
					</tr>
				<?php $no++; } ?>
			</tbody>
		</table>
		
	</div>
</body>
</html>