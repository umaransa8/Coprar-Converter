<?php
error_reporting(0);
$inputValues = array();
$inputValues['recv_code'] = 'RECEIVER';
$inputValues['call_sign_code'] = 'XXXXX';
?>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Export Booking Excel to Coprar Converter</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-MZ64JYQW8L"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-MZ64JYQW8L');
    </script>
  </head>
  <body>          
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>

          parseExcel = function(file) {
            var reader = new FileReader();

            reader.onload = function(e) {
			//	alert("sdf");
				 var file_data = $('#my_file_input').prop('files')[0];   
					var form_data = new FormData();                  
					form_data.append('file', file_data);
					form_data.append('recv_code', $("#recv_code").val());
					form_data.append('call_sign_code', $("#callsign_code").val());
				
				//	alert(form_data);                             
					$.ajax({
						url: 'upload.php', // <-- point to server-side PHP script 
						cache: false,
						contentType: false,
						processData: false,
						data: form_data,                         
						type: 'post',
						success: function(php_script_response){
							
							$("#my_file_output").html(php_script_response.replace(/<br\/>/g, "\n")); // <-- display response from the PHP script, if any
						}
					 });
            };

            reader.onerror = function(ex) {
              console.log(ex);
            };

            reader.readAsBinaryString(file);
          };
        
        var oFileIn;

        $(function() {
            oFileIn = document.getElementById('my_file_input');
            if(oFileIn.addEventListener) {
                oFileIn.addEventListener('change', filePicked, false);
            }
        });


        function filePicked(oEvent) {
            // Get The File From The Input
            var oFile = oEvent.target.files[0];
            var sFilename = oFile.name;
            parseExcel(oFile)
            
        }
        
       
  

      
</script>
<div class="container">
    <div class="card" style="">
        <div class="card-body">
            <h5 class="card-title">Export Booking Excel to Coprar Converter</h5>
            <div class="form-group">
                <label for="recv_code">Receiver Code:</label><input class="form-control" type="text" name='recv_code' id="recv_code" value="<?php echo $inputValues['recv_code'] ?>">
                <p><small>Please change before file select.</small></p>
            </div>
            <div class="form-group">
                <label for="recv_code">Callsign Code:</label><input class="form-control" type="text" id="callsign_code" value="<?php echo $inputValues['call_sign_code'] ?>">
                <p><small>Please change before file select.</small></p>
            </div>
            <div class="form-group">
                <label for="my_file_input">Export booking excel file:</label><input class="form-control" type="file" id="my_file_input">
                <p><small><a href="sample2.php">Sample Excel</a></small></p>
            </div>
            <div class="form-group"><textarea class="form-control" rows="20" cols="40" id="my_file_output"></textarea></div>
        </div>
    </div>
</div>


</body></html>