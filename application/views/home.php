<!DOCTYPE html>
<html>
<head>
<?php
    $this->load->view("template/backend/header");
    ?>
 <title>Warung Makan</title>
</head>
<body>
	<div class="container">

<h2 style="margin-top: 0;">
    <small>Selamat datang, </small>
    <?php echo $this->session->userdata('nama') ?>
</h2>
<hr />

<?php
// Cek role user
if($this->session->userdata('role') == 'kasir'){ // Jika role-nya admin
    ?>
    <div class="form-group">
        <label>Daftar Pesanan</label>
    </div>
    <?php
}else{ // Jika role-nya operator
    ?>
    <div class="form-group">
        <label>Daftar Pesanan Makanan yang tersedia</label>
    </div>

    <?php
}
?>
	<div class="container">
		 <?php
            // Cek role user
            if($this->session->userdata('role') == 'kasir'){
                ?>
        <table class="table table-striped table-bordered data">
			<thead>
				<tr>			
					<th>Kode</th>
					<th colspan="2">Nama Makanan</th>
					<th>Jumlah</th>
					<th>Total Harga</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Verifikasi</th>
				</tr>
			</thead>
			<tbody>
				<?php
			    	foreach ($data->result_array() as $hasil){
			    	$id = $hasil['id'];
			    	$jumlah = $hasil['jumlah']; 
			    	//$gambar = $hasil['gambar']; 
			    	$makanan = $hasil['makanan']; 
			    	$minuman = $hasil['minuman']; 
			    	$no_pesanan = $hasil['no_pesanan']; 
			    	$tanggal = $hasil['tanggal']; 
			    	$total = $hasil['total']; 
			    	$status = $hasil['status']; 
			    ?>
				<tr>				
					<td><?php echo $no_pesanan ?></td>
					<td><?php echo $makanan ?></td>
					<td><?php echo $minuman ?></td>
					<td><?php echo $jumlah ?></td>
					<td><?php echo $total ?></td>
					<td><?php echo $tanggal ?></td>
					<td><?php echo $status ?></td>
					<td align="center"><a href="<?php echo base_url() ?>kasir/dashboard/bayar/<?php echo $no_pesanan ?>" class="btn btn-sm btn-success">Bayar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

          <?php
            }else{
                ?>

            <table class="table table-striped table-bordered data">
			<thead>
				<tr>			
					<th>Nama Makanan</th>
					<th>Harga</th>
					<th>Status</th>
					<th>Pesan</th>
				</tr>
			</thead>
			<tbody>
				<?php
			    	foreach ($data_makanan->result_array() as $hasil){
			    	$id = $hasil['id'];
			    	$makanan = $hasil['makanan']; 
			    	//$gambar = $hasil['gambar']; 
			    	$harga = $hasil['harga']; 
			    ?>
				<tr>				
					<td><?php echo $makanan ?></td>
					<td><?php echo $harga ?></td>
					<td>Ada</td>
					<td align="center"><a href="<?php echo base_url() ?>pelayan/dashboard/viewData/<?php echo $id ?>" class="btn btn-sm btn-success">Pesan</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
            <?php
                }
            ?>
	</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
	$('#table').DataTable( {
    autoFill: true
} );
</script>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
</html>