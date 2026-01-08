
<div class="main-container">


  <div class="container">

    <div id="veiculo-main" class="row">

      <div class="col-md-12"><h2><em><?php echo $product->brand; ?></em> <strong><?php echo $product->meta['modelo']; ?></strong> <?php echo $product->meta['versao']; ?></h2></div>

      <div id="veiculo-fotos" class="col-md-7">

        <div id="veiculo-fotos-content">

          <ul id="slide-veiculo">

            <?php if(!empty($product->meta['fotos'])) foreach($product->meta['fotos'] as $index=>$foto_url): ?>
              <li><img src="<?php echo $foto_url; ?>" alt="<?php echo $product->title; ?>"></li>
            <?php endforeach;?>

          </ul>

          <div id="bx-pager">

          <?php if(!empty($product->meta['fotos'])) foreach($product->meta['fotos'] as $index=>$foto_url): ?>
            <a data-slide-index="<?php echo $index; ?>" href=""><img src="<?php echo $foto_url; ?>" title="<?php echo $product->title; ?>" /></a>
          <?php endforeach;?>

          </div>

          <script type="text/javascript">

            jQuery(function($) {

              $('#slide-veiculo').bxSlider({
                auto: true,
                captions: true,
                controls: true,
                pagerCustom: '#bx-pager'
              });
            });

          </script>

        </div>

        <?php if(!empty($product->meta['opcionais'])): ?>
          <div id="veiculo-opcionais">
            <h3>Opcionais</h3>
            <ul>
              <li><?php echo implode('</li><li>',explode(',',$product->meta['opcionais'])); ?></li>
            </ul>
          </div>
        <?php endif; ?>

        <?php if(!empty($product->meta['observacoes'])): ?>
          <div id="veiculo-observacoes">
            <h3>Observações</h3>
            <?php echo $product->meta['observacoes']; ?>
          </div>
        <?php endif; ?>

      </div><!-- #veiculo-fotos -->


      <div id="veiculo-info" class="col-md-5">




        <div class="vehicle-info">
          <h4>Características do Veículo:</h4>
          <ul>
            <!-- <li class="ref">Referência: <strong>72</strong></li> -->
            <li class="ano">Ano: <strong><?php echo (!empty(trim($product->meta['ano'],' -'))?$product->meta['ano'].'/':'').$product->meta['ano_modelo']; ?></strong></li>
            <li class="cor">Cor: <strong><?php echo $product->meta['cor']; ?></strong></li>
            <li class="km">KM: <strong><?php echo $product->meta['quilometragem']; ?></strong></li>
            <li class="portas">Portas: <strong><?php echo $product->meta['portas']; ?></strong></li>
            <li class="gas">Combustivel: <strong><?php echo $product->meta['combustivel']; ?></strong></li>
            <li class="cambio">Transmissão: <strong><?php echo $product->meta['cambio']; ?></strong></li>
            <li class="price">Valor: <strong>R$ <?php echo $product->price ?: 'Consulte'; ?></strong></li>
          </ul>


          <a target="_blank" href="https://api.whatsapp.com/send?phone=5551994537661" class="bt-whats">
            <i></i> GOSTEI! CONVERSAR PELO WHATS
          </a>

        </div>


        <div class="proposal-form">
          <form action="<?php echo site_url('proposta'); ?>" method="post" id="proposal-form">
            <input type="hidden" name="veiculo" value="<?php echo $product->title; ?> - <?php echo secure_url($_SERVER['REQUEST_URI']); ?>">
            <input type="hidden" name="action" value="lecomotosrs_proposta">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
            <h4>Envie sua Proposta</h4>
            <p>
              <label>Nome*:</label>
              <input name="nome" placeholder="Nome" type="text" required>
            </p>
            <p>
              <label>E-mail*:</label>
              <input name="email" placeholder="E-mail" type="email" required>
            </p>
            <p>
              <label>Telefone*:</label>
              <input name="telefone" placeholder="Telefone" type="text" required>
            </p>
            <p>
              <label>Proposta*:</label>
              <textarea name="proposta" placeholder="Proposta" class="textarea" required></textarea>
            </p>
            <p class="p-button">
              <div id="captchaSubmit" style="margin-bottom: 15px;"></div>
              <button type="submit" id="submitBtn">Enviar <strong>proposta</strong></button>
            </p>
          </form>
        </div>
      </div>

    </div>

  </div>


  <div class="veiculos-relacionados">

    <div class="container">

      <div class="list-heading">
        <h2>Veja também</h2>
        <p>OS VEÍCULOS DE MAIS DESTAQUES EM NOSSO ESTOQUE!</p>
      </div>

      <div class="car-listing">

        <?php if (!empty($related)) foreach($related as $product): ?>


          <article class="loop-veiculos">

            <div class="loop-veiculos-content">

              <div class="loop-veiculos-thumb">
                <img src="<?php echo cloudimage($product->image,'crop','600x480'); ?>" alt="<?php echo $product->model; ?>" width="600" height="480">
                <h3><?php echo $product->model; ?></h3>
              </div>

              <div class="loop-veiculos-info">
                <ul>
                  <li class="cor">Cor: <strong><?php echo $product->meta['cor']; ?></strong></li>
                  <li class="portas">Portas: <strong><?php echo $product->meta['portas']; ?></strong></li>
                  <li class="ano">Ano: <strong><?php echo $product->meta['ano_modelo']; ?></strong></li>
                  <li class="km">KM: <strong><?php echo $product->meta['quilometragem']; ?></strong></li>
                </ul>
                <p class="loop-veiculos-price"><span>R$</span> <?php echo $product->price ?: 'Consulte'; ?></p>
              </div>

              <a href="<?php echo $product->link ?>"></a>
            </div>

          </article>



        <?php endforeach; ?>

      </div>

    </div>


  </div>
</div>




<script>

  function onSubmitFn(token){
    // Quando o reCAPTCHA é validado, envia o formulário
    $('#proposal-form').trigger('submit');
  }

  /* Formulários de contato */
  $('#proposal-form').submit(function(e){
    e.preventDefault();
    var formHandler = $('#proposal-form');
    var submitBtn = formHandler.find('#submitBtn');
    submitBtn.attr('disabled','disabled').data('original',submitBtn.text()).text('Aguarde...');
    formHandler.find('[class^="alert"]').remove();
    $.post(formHandler.attr('action'),formHandler.serializeArray(),function(msg){
      formHandler.find('#submitBtn').before('<div class="alert-success">'+msg+'</div>');
      formHandler.trigger('reset');
    }).fail(function(msg) {
      formHandler.find('#submitBtn').before('<div class="alert-fail">'+msg.responseText+'</div>');
    }).always(function() {
      submitBtn.removeAttr('disabled').text(submitBtn.data('original'));
      if(typeof grecaptcha !== 'undefined' && typeof captcha_id !== 'undefined'){
        grecaptcha.reset(captcha_id);
      }
    });
  });

</script>