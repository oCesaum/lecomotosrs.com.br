

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
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3468.465377682445!2d-52.2022858!3d-29.619224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951c900f5a6815ad%3A0x4a72ce527830fc93!2sR.%20Herval%20Mirim%2C%20499%20-%20Gressler%2C%20Ven%C3%A2ncio%20Aires%20-%20RS%2C%2095800-000!5e0!3m2!1spt-BR!2sbr!4v1767893769315!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
