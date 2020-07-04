
<!DOCTYPE html>
<html>
<head>
<?php
    $this->load->view("template/backend/header");
    ?>
  <title>Pembayaran</title>
</head>
<body>
  <div class="container">

<h2 style="margin-top: 0;">
    <small><a href="<?php echo base_url('login'); ?>"><< KEMBALI</a> </small>
  </h2>
<hr />

<?php echo form_open_multipart('kasir/dashboard/update') ?>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Makanan</label>
      <input type="text" name="makanan" class="form-control" id="" readonly="" value="<?php echo $bayar->makanan ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Minuman</label>
      <input type="text" name="minuman" class="form-control" id="" readonly="" value="<?php echo $bayar->minuman ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Jumlah</label>
      <input type="text" name="bayar" class="form-control" id="" readonly="" value="<?php echo $bayar->jumlah ?>">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Tanggal</label>
      <input type="text" name="tanggal" class="form-control" id="" readonly="" value="<?php echo $bayar->tanggal ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Total</label>
      <input type="text" name="total" class="form-control" id="" readonly="" value="<?php echo $bayar->total ?>">
    </div>
      <input type="hidden" name="status" class="form-control" id="" readonly="" value="Bayar">
      <input type="hidden" value="<?php echo $bayar->id ?>" name="id">
  </div>
  <br>
      <br>
<center>
  <div>
    <button type="submit" class="btn btn-primary">Bayar</button>
  </div>
  </center>
<?php echo form_close() ?>
</div>

</body>
</html>