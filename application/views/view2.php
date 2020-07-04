
<!DOCTYPE html>
<html>
<head>
<?php
    $this->load->view("template/backend/header");
    ?>
  <title>Pesan Minuman</title>
</head>
<body>
  <div class="container">

<h2 style="margin-top: 0;">
    <small><a href="<?php echo base_url('login'); ?>"><< KEMBALI</a> </small>
  </h2>
<hr />

<?php echo form_open_multipart('pelayan/dashboard/simpan2') ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nama Minuman</label>
      <input type="text" name="minuman" class="form-control" id="" readonly="" value="<?php echo $minuman->minuman ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Harga</label>
      <input type="text" name="harga" class="form-control" id="harga" readonly="" value="<?php echo $minuman->harga ?>">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Jumlah pesanan</label>
      <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="total pesanan">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Tempat/Kursi</label>
      <input type="number" name="no_pesanan" class="form-control" id="" placeholder="No. Kursi">
    </div>
  </div>

    <input type="hidden" name="total" class="form-control" id="total">
    <input type="hidden" name="status" class="form-control" value="Tidak">
    <input type="hidden" name="tanggal" value="<?php echo date("d-m-Y"); ?>">

<center>
  <div>
    <button type="submit" class="btn btn-primary">Buat Pesanan</button>

  <button type="reset" class="btn btn-warning">Batal</button>
  </div>
  </center>
<?php echo form_close() ?>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#jumlah, #harga").keyup(function() {
            var harga  = $("#harga").val();
            var jumlah = $("#jumlah").val();
            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);
        });
    });
</script>
</body>
</html>