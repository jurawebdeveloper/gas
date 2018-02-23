
    <?php 
      require_once 'layout/header.php';
    ?>


  
      <!-- Form 
      ================================================== -->
      <div class="bs-docs-section">
        <div class="row">

          <!-- Form Cliente
      ================================================== -->
          <div class="col-lg-6">
            <div class="page-header">
              <h3 id="forms">Cliente</h3>
            </div>
            <div class="bs-component">
              <form>
                <fieldset>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">Rua</label>
                    <input type="text" class="form-control " id="rua" name = "rua"  placeholder="Digite o nome da rua...">
                  </div>
                  <div hidden class="form-group">
                    <input type="text" class="form-control " id="logradouro" name = "logradouro" >
                  </div>
                  <div hidden class="form-group">
                    <label class="col-form-label" for="rua">Cep</label>
                    <input type="text" class="form-control " id="cep" name = "cep"  >
                    <label class="col-form-label" for="numero">Número</label>
                    <input type="text" class="form-control " id="numero" name = "numero"  placeholder="Digite o numero da casa...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="numero">Número</label>
                    <input type="text" class="form-control " id="numero" name = "numero"  placeholder="Digite o numero da casa...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">Nome do Cliente</label>
                    <input type="text" class="form-control " id="nome" name = "nome"  placeholder="Digite o nome do cliente...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">CPF</label>
                    <input type="text" class="form-control " id="cpf" name = "cpf"  placeholder="Digite o CPF...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="rua">Aniversário</label>
                    <input type="text" class="form-control " id="aniversario" name = "aniversario"  placeholder="Digite o dia e o mês do aniversário...">
                  </div>
                 

                </fieldset>
                
                  <button type="submit" class="btn btn-primary">Salvar</button>
              </form>
            </div>
          </div>
          <!-- Fim Form Cliente
      ================================================== -->
          
          <div class="col-lg-4 offset-lg-1">
            <div class="page-header">
              <h3 id="forms">Venda</h3>
            </div>
            <form class="bs-component">
              <div class="form-group">
                <label class="col-form-label" for="rua">Produto</label>
                <input type="text" class="form-control " id="produto" name = "rua"  placeholder="Selecione...">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="rua">Quantidade</label>
                <input type="text" class="form-control " id="quantidade" name = "quantidade"  placeholder="Selecione...">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="rua">Valor Cobrado</label>
                <input type="text" class="form-control " id="valorCobrado" name = "valorCobrado"  placeholder="Selecione...">
              </div>
              <button type="submit" class="btn btn-primary">Fechar Venda</button>
            </form>
          </div>
        </div>
      </div>



    <!-- Tables
      ================================================== -->
      <div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">Tables</h1>
            </div>

            <div class="bs-component">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Column heading</th>
                    <th scope="col">Column heading</th>
                    <th scope="col">Column heading</th>
                  </tr>
                </thead>
                <tbody>
                 <tr class="table-info">
                    <th scope="row">Info</th>
                    <td>Column content</td>
                    <td>Column content</td>
                    <td>Column content</td>
                  </tr>
               </tbody>
              </table> 
            </div><!-- /example -->
          </div>
        </div>
      </div>






      <!-- Indicators
      ================================================== -->
        <div class="bs-docs-section">

          <div class="bs-component">
            <span class="badge badge-pill badge-primary">Primary</span>
            <span class="badge badge-pill badge-secondary">Secondary</span>
            <span class="badge badge-pill badge-success">Success</span>
            <span class="badge badge-pill badge-danger">Danger</span>
            <span class="badge badge-pill badge-warning">Warning</span>
            <span class="badge badge-pill badge-info">Info</span>
            <span class="badge badge-pill badge-light">Light</span>
            <span class="badge badge-pill badge-dark">Dark</span>
          </div>
        </div>
      

      <footer id="footer">
        <div class="row">
          <div class="col-lg-12">

            <p>Based on <a href="https://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fontawesome.io/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="https://fonts.google.com/" rel="nofollow">Google</a>.</p>

          </div>
        </div>

      </footer>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="jquery_ui/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>

<script>
    $( function() {
      function log( message, message_l ) {
        $('#cep').val(message);
        $('#logradouro').val(message_l);
        $('#numero').focus();
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
