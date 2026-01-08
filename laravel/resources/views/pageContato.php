


<div class="main-container page-contato">
  <div class="container">

    <div class="heading">
      <h2>Fale Conosco</h2>
    </div>
    <div class="row">

      <div class="col-md-6">
        <p>Utilize o formulário abaixo para entrar em contato ou pelo WhatsApp (51) 99738-0151</p>

        <form method="post" action="<?php echo site_url('contato'); ?>" class="contact-form" id="contact-form">
          <input name="action" value="jlautomoveis_contato" type="hidden">
          <input name="_token" value="<?php echo csrf_token(); ?>" type="hidden">
          <span class="trap"><input type="text" name="trap"></span>
          <h4>Fale conosco</h4>
          <p><input name="nome" type="text" placeholder="Nome" required></p>
          <p><input name="email" type="email" placeholder="E-mail" required></p>
          <p><input name="cidade" type="text" placeholder="Cidade" required></p>
          <p>
            <select name="estado">
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AM">AM</option>
            <option value="AP">AP</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MG">MG</option>
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="PR">PR</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="RS" selected="selected">RS</option>
            <option value="SC">SC</option>
            <option value="SE">SE</option>
            <option value="SP">SP</option>
            <option value="TO">TO</option>
          </select>
          </p>
          <p><input name="telefone" type="text" placeholder="Telefone" required></p>
          <p><textarea name="mensagem" placeholder="Mensagem" required></textarea></p>
          <p class="p-button">
            <button class="g-recaptcha" id="captchaSubmit">Enviar</button>
          </p>
        </form>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <h5>Lucas Automóveis</h5>
        <!-- <p>Fone: (51) 99738-0151</p> -->
        <p>Rua Senador Pinheiro Machado, 3030</p>
        <p>Bom Retiro do Sul/RS</p>
        <p><a target="_blank" href="https://api.whatsapp.com/send?phone=5551997380151" class="footer-whatsapp">(51) 99738-0151</a></p>

      </div>
    </div>
  </div>
</div>




<script>

  function valida(form) {
    if (form.Nome.value=="") {
      alert("Preencha seu nome.");
      form.Nome.focus();
      return false;
    }

    var filtro_mail = /^.+@.+\..{2,3}$/
    if (!filtro_mail.test(form.Email.value) || form.Email.value=="") {
      alert("Preencha seu e-mail corretamente.");
      form.Email.focus();
      return false;
    }

    if (form.Mensagem.value=="") {
      alert("Por favor, informe o assunto da mensagem.");
      form.Mensagem.focus();
      return false;
    }

  }

  function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
  }

  function execmascara(){
    v_obj.value=v_fun(v_obj.value)
  }

  function telefones(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca hífen entre o quarto e o quinto dígitos
    return v
  }


</script>
<script>
  function onSubmitFn(){
    $('#contact-form').trigger('submit');
  }

  /* Formulários de contato */
  $('#contact-form').submit(function(e){
    e.preventDefault();
    var formHandler = $('#contact-form');
    formHandler.find('button').attr('disabled','disabled').data('original',formHandler.find('button').text()).text('Aguarde...');
    formHandler.find('[class^="alert"]').remove();
    $.post(formHandler.attr('action'),formHandler.serializeArray(),function(msg){
      formHandler.find('button').before('<div class="alert-success">'+msg+'</div>');
      formHandler.trigger('reset');
    }).fail(function(msg) {
      formHandler.find('button').before('<div class="alert-fail">'+msg.responseText+'</div>');
    }).always(function() {
      formHandler.find('button').removeAttr('disabled').text(formHandler.find('button').data('original'));
      grecaptcha.reset(captcha_id);
    });
  });

</script>