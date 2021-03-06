<?php
/**
 * Template Name: Contato
 * @package WordPress
 * @subpackage fat-uerj
 * @since FAT-UERJ 1.0
 */
get_header();
?>

    <script src="<?php echo get_template_directory_uri() ?>/js/jquery.validate.min.js"></script>
	<script>
		jQuery(function($){
			var validator = $("#form-contato").validate({  
				submitHandler: function() {
					$('.alert').addClass('hide');
					$('.send-form').html('<i class="icon-spinner icon-spin icon-large"></i> Enviando');
					
					$.ajax({
						method: "POST",
						url: '/wp-content/themes/fat-uerj/mail.php',
						data: { nome: $('.nome').val(), email: $('.email').val(), telefone: $('.telefone').val(), setor: $('.setor').val(), mensagem: $('.mensagem').val() },
						success: function(data, textStatus, jqXHR) {
							if (data == 'ok') {
								$('.alert-success').removeClass('hide');
								$('.send-form').html('Enviar');
								$('#form-contato').trigger('reset');
								
								$('.has-success').each(function () {
									$(this).removeClass('has-success');
								});
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							toastr.warning(textStatus);
						}
					});
				},		
				rules:{     
					nome: {
						required:true,
					},
					email: {  
						required:true,
						email: true,
					},
					mensagem: {
						required:true,
					}
				},
				errorPlacement: function(error,element) {
					return false;
				},
				highlight: function(element, errorClass) {
					var target = $(element).closest('.form-group');
					target.addClass('has-error')
					target.removeClass('has-success');
				},
				unhighlight: function (element, errorClass) {
					var target = $(element).closest('.form-group');
					target.removeClass('has-error');
					target.addClass('has-success');
				}
			});
		});
	</script>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron internal">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <h3 class="text-uppercase"><?php the_title() ?></h3>
            <ul class="breadcrumb">
                <li><a href="<?php bloginfo("url") ?>">Home</a></li>
              <li class="active"><?php the_title() ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container main internal">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-uppercase page-header"><?php the_title() ?></h2>
          <div class="row">
            <div class="col-md-7">
                <form class="form-horizontal" id="form-contato" method="post">
                  <fieldset>
                    <div class="form-group"><!-- <div class="form-group has-success has-feedback"> -->
                      <label for="inputName" class="col-lg-2 control-label">Nome</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control nome" id="inputName" name="nome" placeholder="Digite seu nome...">
                        <!--<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                        <span id="inputSuccess2Status" class="sr-only">(success)</span>-->
                      </div>
                    </div>
                    <div class="form-group"><!-- <div class="form-group has-error"> -->
                      <label for="inputEmail" class="col-lg-2 control-label">E-mail</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control email" id="inputEmail" name="email" placeholder="Qual seu e-mail?">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputTel" class="col-lg-2 control-label">Telefone</label>
                      <small class="col-lg-10 pull-right">Opcional</small>
                      <div class="col-lg-10">
                        <input type="text" class="form-control telefone" id="inputTel" name="telefone" placeholder="Deixe seu telefone conosco">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="select" class="col-lg-2 control-label">Setor</label>
                      <div class="col-lg-10">
                        <select class="form-control setor" id="select" name="setor">
                          <option value="geral">Geral</option>
                          <option value="direcao">Direção</option>
                          <option value="pos">PÓS</option>
                          <option value="departamentos">Departamentos</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="textArea" class="col-lg-2 control-label">Mensagem</label>
                      <div class="col-lg-10">
                        <textarea class="form-control mensagem" rows="3" id="textArea" name="mensagem"></textarea>
                        <span class="help-block">Digite uma mensagem de forma clara para que possamos responder o mais brevemente possível.</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-3 col-lg-offset-2">
						<button type="submit" class="btn btn-primary btn-lg send-form">Enviar</button>
                      </div>
                      <div class="col-xs-9 col-lg-7">
                        <div class="alert alert-success hide" role="alert"><span class="glyphicon glyphicon-ok"></span> Sua mensagem foi enviada com sucesso!</div>
                      </div>
                    </div>
                  </fieldset>
                </form>
            </div>
            <aside class="col-md-5">
              <address>
                <strong>Faculdade de Tecnologia UERJ - Resende</strong><br>
                Rodovia Presidente Dutra km 298 (sentido RJ-SP) - Pólo Industrial Resende/RJ<br>
                CEP: 27.537-000<br>
                Tel: <a href="tel:(24) 3354-7851">(24) 3354-7851</a> / <a href="tel:(24) 3354-7875">(24) 3354-7875</a><br>
                <a href="mailto:fat@uerj.br">fat@uerj.br</a>
              </address>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7374.755213825177!2d-44.38116708691656!3d-22.45244009919591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x07a64457cb8f0e28!2sCAMPUS+REGIONAL+DE+RESENDE+FACULDADE+DE+TECNOLOGIA!5e0!3m2!1spt-BR!2sbr!4v1416877131845" width="100%" height="300" frameborder="0" style="border:0"></iframe>
            </aside>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
<?php get_footer(); ?>