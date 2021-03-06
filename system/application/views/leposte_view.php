<body>

  <header class="container-fluid">
    <div class="container-fluid span12">
      <h1><a href="#">hood</a></h1>
      
          <a class="mini_icon_hood" href="#"></a>

      <div class="btn-group pull-right">
              <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="icon-user confOptions"></i>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#"><img src="../img/img_perfil_mini.png"> Perfil</a></li>
                <li class="divider"></li>
                <li><a href="#">Cerrar sesi&oacute;n</a></li>
              </ul>
          </div>

          <form>
        <input type="text" placeholder="Buscar">
              <div class="btn-group pull-right">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="icon-user buscarOptions"></i>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                     <a href="#">@</a>
                  </li>
                  <li class="divider"></li>
                  <li>
                     <a href="#" class="icon-envelope"></a>
                  </li>
                  <li class="divider"></li>
                  <li>
                     <a href="#" class="icon-envelope"></a>
                  </li>
                </ul>
              </div>
      </form>
    </div>
  </header>

  <div class="container-fluid container_general span12">

    <div class="row-fluid">
      <div class="span4">
        <div class="clearfix">
          <img src="../img/img_perfil.png"/>
          <h1><?php echo $userData['name'];  ?></h1>
          <h2><?php echo $userData['job_position']; ?></h2>
        </div>
        <ul class="clearfix">
          <li class="span4">
            <h1>hoods</h1>
            <h2><?php echo $totalHoods; ?></h2>
          </li>
          <li class="span4">
            <h1>adjuntos</h1>
            <h2>10</h2>
          </li>
        </ul>
      </div>

      <div class="span8 content_top">
        <!-- Abrir el formulario-->
        <?php
          $attributes = array('class' => 'form-horizontal', 'id' => 'formPublishHood');
          echo form_open(base_url() . 'index.php/leposte/publishNewHood', $attributes);
        ?>


          <fieldset>

            <!-- Atributos de los inputs -->
            <?php 
              $textHood = array('name' => 'texthood', 'class' => 'span9', 'id' => 'inputTextHood', 'placeholder' => 'Escriba su hood aqui..');
              $send_button = array('value' => '', 'name' => 'publicar', 'class' => 'btn send_formRegis', 'type' => 'submit', 'id' => 'btnInsertHood');
            ?>

            <div class="span10">
              <?php echo form_textarea($textHood); ?>
              <?php echo form_error('texthood'); ?>
              <a href="#"></a>
            </div>
            <?php echo form_submit($send_button); ?>
          </fieldset>

          
      <!-- Cerrar el formulario -->
      <?php echo form_close(); ?>

      </div>

      <div class="span4">
        <h3>usuarios <span><?php echo $totalUsers; ?></span></h3>
        <ul>
        	<?php 
              foreach ($users as $clave => $valor): ?>
				<li>
					<img src="../img/img_perfil.png"/>
					<h1><?php echo $valor['name'] . ' ' . $valor['last_name']; ?></h1>
            		<h2><?php echo $valor['job_position']; ?></h2>
            		<span>@<?php echo $valor['username']; ?></span>
          		</li>
            <?php   
                endforeach;
            ?>

          
       
            
          <li></li>   
        </ul>
      </div>

      <div class="span8">
        <h3>hoods</h3>
        <section class="hoodsContainer">
            <?php 
              foreach ($hoods as $clave => $valor): ?>
                <div>
                  <a href="#">
                    <img src="../img/img_perfil.png"/>
                    <h1><?php echo $valor['user']; ?></h1>
                    <span>@<?php echo $valor['username']; ?></span>
                  </a>
                  <p><?php echo $valor['text']; ?></p>
                  <div>
                    <span><?php echo $valor['time']; ?></span>
                    <span><?php echo $valor['date']; ?></span>
                    <a href="#">Archivo adjunto.pdf</a>
                  </div>
                </div>
            <?php   
                endforeach;
            ?>
        </section>
        <div>
              <a class="btnVerMas" href="JavaScript:void(0);">Ver m&aacute;s</a>
        </div>
      </div>
    </div>

  </div>
