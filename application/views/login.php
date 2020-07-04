<?php
    $this->load->view("template/login/index");
    ?>

    <div class="container">
        <div class="form-signin">
            <h2 class="form-signin-heading">Rumah Makan</h2>

<?php
// Cek apakah terdapat session nama message
if($this->session->flashdata('message')){ // Jika ada
	echo '<div class="alert alert-danger">'.$this->session->flashdata('message').'</div>'; // Tampilkan pesannya
}
?>

<form method="post" action="<?php echo base_url('login'); ?>">
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
        </div>
    </div>
</body>
</html>