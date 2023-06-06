<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App || Checking Web</title>
    	<!-- CSS-->
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link href="node_modules/toastr/build/toastr.min.css" rel="stylesheet" />

	<!-- Javascript-->
	<script src="node_modules/jquery/dist/jquery.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
	<script src="node_modules/toastr/build/toastr.min.js"></script>
    
</head>
<body class="bg-secondary">
    <div class="container mt-5 p-5">
        <div class="row">
            <div class="card">
                <div class="card-header p-4 fs-5 fw-semibold">
                    Detektor Keamanan Website
                </div>
                <div class="card-body p-5">
                       <!-- Loading -->
                        <?php include "loading.php"; ?>
                        <!-- Loading -->
                    <div class="row col-8 justify-content-center mx-auto" align="center">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control p-3" placeholder="Masukan URL" aria-label="Recipient's username" aria-describedby="button-addon2" id="input">
                        </div>
                    </div>
                    <div class="row col-8 justify-content-center mx-auto fw-bold" align="center">
                    <button type="button" class="btn btn-outline-secondary mt-4 p-2 fw-bold" id="sql">Hasil SQL Injection</button>
                    <button type="button" class="btn btn-outline-secondary mt-4 p-2 fw-bold" id="nmap">Hasil Scan Nmap</button>
                    <button type="button" class="btn btn-outline-secondary mt-4 p-2 fw-bold" id="whois">Hasil WhoIs</button>
                    </div>

                    <div class="row col-8 justify-content-center mx-auto fw-bold" id="isi">
                        
                    </div>
                    
	                <audio id="audio" src="notif.mp3"></audio>

                </div>
            </div>
        </div>
    </div>

 
    <script>
        $(document).ready(function(){
            $('#input').focus();

            $('#whois').click(function(){
                var input = $('#input').val();
                $('#loading').show();

                $.ajax({
					type: 'POST',
					url: "whois/whois.php",
					data: {'domain':input},
					success: function(response) {
                        $('#isi').html(response);
					},
                    complete: function(){
                        $('#loading').hide();
                        $('html, body').animate({
                            scrollTop: $("#isi").offset().top
                        }, 0);

                        var audio = $("#audio")[0];
                        audio.play();
                    },
				});
            });

            $('#nmap').click(function(){
                var input = $('#input').val();
                $('#loading').show();

                $.ajax({
					type: 'POST',
					url: "nmap/index.php",
					data: {'domain':input},
					success: function(response) {
                        $('#isi').html(response);
					},
                    complete: function(){
                        $('#loading').hide();
                        $('html, body').animate({
                            scrollTop: $("#isi").offset().top
                        }, 0);
                        var audio = $("#audio")[0];
                        audio.play();
                    },
				});
            });

            $('#sql').click(function(){
                var input = $('#input').val();
                $('#loading').show();

                $.ajax({
					type: 'POST',
					url: "sqlmap/index.php",
					data: {'domain':input},
					success: function(response) {
                        $('#isi').html(response);
					},
                    complete: function(){
                        $('#loading').hide();
                        $('html, body').animate({
                            scrollTop: $("#isi").offset().top
                        }, 0);
                        var audio = $("#audio")[0];
                        audio.play();
                    },
				});
            });

        });
    </script>

</body>
</html>
