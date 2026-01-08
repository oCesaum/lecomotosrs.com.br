<div class="main-container">
  <div class="container">

    <div class="list-heading">
      <?php if (!empty($search)): ?>
        <h2>CONFIRA RESULTADOS DE SUA BUSCA:</h2>
        <p>VEJA ABAIXO OS VEÍCULOS QUE ATENDEM SUA NESCESSIDADE!</p>
      <?php else: ?>
        <h2>VEÍCULOS / TODOS</h2>
        <p>CONFIRA ABAIXO O QUE ENCONTRAMOS PARA VOCÊ!</p>
      <?php endif; ?>
    </div>


    <div class="car-listing">

      <?php if (!empty($products)) foreach($products as $product): ?>

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