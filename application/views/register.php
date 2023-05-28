<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Register Akun</title>
</head>
<body>
    
<div class="container" style="margin-top: 50px">
<div class="row">
    <div class="col-md-5 offset-md-3">
        <div class="card">
            <div class="card-body">
                <label>REGISTER</label>
                <hr>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                </div>
                
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                </div>
               
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                </div>

                <button class="btn btn-register btn-block btn-success">REGISTER</button>
</div>
</div>
<div class="text-center" style="margin-top: 15px">
            Sudah punya akun? <a href="<?php echo base_url() ?>index.php/login">Silahkan Login</a>
          </div>
    </div>
</div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.btn-register').click(function(){
                var nama_lengkap = $('#nama_lengkap').val();
                var username = $('#username').val();
                var password = $('#password').val();

                if (nama_lengkap.length == "") {
                    swal.fire({
                        type: 'warning',
                        title: 'opps..',
                        text: 'Nama lengkap wajib diisi !'
                    });

                } else if(username.length == "") {
                    swal.fire({
                        type: 'warning',
                        title: 'opps..',
                        text: 'Nama lengkap wajib diisi !'
                    });

                } else if(password.length == "") {
                    swal.fire({
                        type: 'warning',
                        title: 'opps..',
                        text: 'Nama lengkap wajib diisi !'
                    });
                    } else {
                        //ajax
                        $.ajax({

                            url: "<?php echo base_url() ?>index.php/register/simpam",
                            type: "POST",
                            data: {
                                "nama_lengkap": nama_lengkap,
                                "username": username,
                                "password": password
                            },

                            success:function(response) {
                                if (response == "success") {
                                    swal.fire({
                                        type: 'success',
                                        title: 'Register Berhasil',
                                        text: 'Silahkan login!'
                                });

                                $("#nama_lengkap").val('');
                                $("#username").val('');
                                $("#password").val('');
                            } else {
                                swal.fire ({
                                    type: 'error',
                                    title: 'Register Gagal!',
                                    text: 'Silakan coba lagi!'
                                });
                            }
                            console.log(response);
                        },

                        error: function(response) {
                            swal.fire({
                                type: 'error',
                                title: 'Opps!',
                                text: 'server error!'
                            });
                        }
                    })
                }
            });
            }); 
    </script>
</body>
</html>