

<div class="main-container">

  <div class="container">

    <div class="list-heading">
      <h2>CONFIRA NOSSO ESTOQUE:</h2>
      <!--p>OS VEÍCULOS DE MAIS DESTAQUES EM NOSSO ESTOQUE!</p-->
    </div>

    <div class="car-listing car-listing-featured">
      <?php if (!empty($featured)) foreach($featured as $product): ?>


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
  <?php /*
      <div class="col-md-2">
        <div class="sidebar-logos is-desktop">
          <a href="<?php echo site_url('busca?marca=CHEVROLET'); ?>"><img src="<?php echo site_url('images/logo-chevrolet.jpg'); ?>" alt="Chevrolet"></a>
          <a href="<?php echo site_url('busca?marca=FIAT'); ?>"><img src="<?php echo site_url('images/logo-fiat.jpg'); ?>" alt="Fiat"></a>
          <a href="<?php echo site_url('busca?marca=FORD'); ?>"><img src="<?php echo site_url('images/logo-ford.jpg'); ?>" alt="Ford"></a>
          <a href="<?php echo site_url('busca?marca=PEUGEOT'); ?>"><img src="<?php echo site_url('images/logo-peugeot.jpg'); ?>" alt="Peugeot"></a>
          <a href="<?php echo site_url('busca?marca=HYUNDAI'); ?>"><img src="<?php echo site_url('images/logo-hyundai.jpg'); ?>" alt="Hyundai"></a>
          <a href="<?php echo site_url('busca?marca=RENAULT'); ?>"><img src="<?php echo site_url('images/logo-renault.jpg'); ?>" alt="Renault"></a>
        </div>
      </div>
*/ ?>


      <!-- <div class="aligncenter"><a href="<?php echo site_url('veiculos'); ?>" class="ver-todos">Ver todos os veículos em estoque</a></div> -->



<div class="map-home">
  <iframe src="https://www.google.com/maps/embed?pb=!4v1767878712908!6m8!1m7!1sI8mu1bxRPbt71ky28YRi1A!2m2!1d-29.61920376538636!2d-52.20240701780288!3f97.94978!4f0!5f0.7820865974627469" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<?php /*
<div class="modal modal-popup">
  <div class="modal-dialog">
    <span class="modal-cancel">&times;</span>
    <div class="modal-content">
        <img src="images/600x600_jl_automoveis.jpg" alt="JL Automóveis tem exatamente o que você procura">
    </div>
  </div>
</div>

<script type="text/javascript">


  jQuery(document).ready(function(){
    jQuery('.modal-popup').addClass('active');
  });
  jQuery('.modal-cancel').click(function(){
    jQuery('.modal.active').removeClass('active');
  });

</script>
 */ ?>
