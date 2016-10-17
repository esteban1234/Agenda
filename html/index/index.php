
<link rel="stylesheet" href="views/app/css/estiloss.css">
<link rel="stylesheet" href="views/app/fonts/style.css">
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto" rel="stylesheet">
<!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->

<body>

<article class="panel">

 <article class="panelizquierda">
	<!-- <figure class="contienelogo">
        <img class="logo" src="views/app/images/logo.png" alt="">
    </figure> -->
    <article class="ppanel">
       <!-- <p class="ppanel3">Quantto</p> -->
        <p class="ppanel2">Agenda de Tareas</p>
    </article>
  </article>

   <article class="panelderecha">
	<div class="wrap">
			<div class="widget">
				<div class="fecha">
					<p id="diaSemana" class="diaSemana">Martes</p>
					<p id="dia" class="dia">27</p>
					<p>de </p>
					<p id="mes" class="mes">Octubre</p>
					<p>del </p>
					<p id="year" class="year">2015</p>
				</div>

				<div class="reloj">
					<p id="horas" class="horas">11</p>
					<p>:</p>
					<p id="minutos" class="minutos">48</p>
					<p>:</p>
					<div class="caja-segundos">
						<p id="ampm" class="ampm">AM</p>
						<p id="segundos" class="segundos">12</p>
					</div>
				</div>
			</div>
		</div>
	</article>
	</article>

	<article class="contenedor">

	<article class="menu">

		<nav>
			<ul>
				<li><a href="#"><span class="icon-list"></span>Menú</a></li>
		</nav>

	</article>

		<article class="contpanel">

			<article class="contpanelizqui">

				<ul id="accordion" class="accordion">
					<li>
					 <li class="link"><a href="#"><i class="icon-new-message"></i>Agregar una Tarea</a><!-- <i class="icon-chevron-down"></i> --></li>
					</li>

					<li>
					 <li class="link"><a href="#"><i class="icon-add-to-list"></i>Lista de Tareas</a><!-- <i class="icon-chevron-down"></i> --></li>
					</li>
					<li>
					 <li class="link"><a href="?view=logout"><i class="icon-lock"></i>Cerrar Sesion</a><!-- <i class="icon-chevron-down"></i> --></li>
					</li>
	            </ul>

			</article>

			<article class="contpaneldere">

			<form class="formuno" 	action="" method="POST">
				<h1 class="agrega">Agrega una nueva tarea</h1>
				<!-- <div class="dos">
						<label class="ema">Fecha</label><br>
						<input id="user_fec" type="date" class="emai" value="<?=date("Y-m-d");?>">
			    </div> -->

			    <div id="cote">
			        <div class="izq">
			            <label class="ema">Asunto:</label><br>
			            <!-- <input class="emai" type="select" name="correo" size="30" maxlength="40" placeholder= "ejemplo@correo.com" required/> -->
			            <input class="emai" name="" placeholder= "Escoja su Asunto" required list="listaasunto">

						<datalist id="listaasunto">
						  <option value="Cita con Marcelo">
						  <option value="Cita con Noel">
						  <option value="Cita con Gabriela">
						  <option value="Cita con Gilsa">
						  <option value="Cita con Carolina">
						  <option value="Cita con Gerardo">
						  <option value="Cita con Winne">
						  <option value="Cita con Marissa">
						  <option value="Cita con Mirian">
						  <option value="Cita con Romeo">
						</datalist>

			        </div>
			        <div class="der">
			           <label class="ema">Hora a realizarla:</label><br>
			           <input class="emai" type="time" name="hora" value="" max="" min="" step="1">
			        </div>
   				</div> <br>

   				<div id="cote">
			        <div class="izq">
			            <label class="ema">Fecha de alta:</label><br>
			            <input class="emai" type="date" required/>
			        </div>
			        <div class="der">
			           <label class="ema">Fecha a realizar:</label><br>
			           <input class="emai" type="date" required/>
			        </div>
   				</div> <br>

   				<label class="ema">Agrega tu tarea:</label><br>
				    <textarea id="areac" class="emai"  name="textarea" rows="" cols="" placeholder="Escríbe tu tarea" required/></textarea><br>
				    <!-- <input  id="enviar2" class="enviar" type="submit" value="AGREGAR"> -->
				    <!-- <button>Hover Me</button> -->
				    <button class="button" style="vertical-align:middle"><span>Agregar</span></button>

			</form>



			</article>

		</article>


	</article>

	<!-- <a href="?view=logout">Cerrar Sesion</a> -->

	<script src="views/app/js/jquery.js"></script>
	<script src="views/app/js/reloj.js"></script>
    <!-- <script src="views/app/js/main.js"></script> -->
</body>
