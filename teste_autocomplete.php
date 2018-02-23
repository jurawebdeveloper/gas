<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Remote datasource</title>
  <link rel="stylesheet" href="jquery_ui/jquery-ui.css">
  <style>
  .ui-autocomplete-loading {
    background: white url("img/ui-anim_basic_16x16.gif") right center no-repeat;
  }
  </style>
  <script src="jquery_ui/external/jquery/jquery.js"></script>
  <script src="jquery_ui/jquery-ui.js"></script>
  
  
  

</head>
<body>
 
<div class="ui-widget">
  <label for="rua">Rua: </label>
  <input id="rua" name="rua">
  <input id="logradouro" name="logradouro">
  <input id="cep" name="cep" >
</div>
 

 
 <script>
    $( function() {
      function log( message, message_l ) {
        $('#cep').val(message);
        $('#logradouro').val(message_l);
      }
   
      $( "#rua" ).autocomplete({
        source: "procuraCepRua.php",
        minLength: 2,
        select: function( event, ui ) {
          let str = ui.item.value;
          let separa = str.split(" - CEP: ");
          let separa_l = separa[0].split(" - ");
          console.log(separa_l);
          log( separa[1], separa_l[0] );
        }
      });
    } );
  </script>

</body>
</html>

