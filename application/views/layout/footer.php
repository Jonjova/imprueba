<!-- En este apartado es la segunda parte de las tecnologías utilizadas para este proyecto. -->
</div>
</main>
<section class="copy legal">
	<p>
		<span class="small">
			Jonathan Vanegas <br />
			<a href="#">&copy; <?php echo date('Y'); ?> </a>
			&amp;
			<a href="#">
				Derechos Reservados
			</a>
		</span>
	</p>
</section>

<!--Importante base_url() La base para poder hacer las peticiones pertinentes. -->
<script type="text/javascript">
	var url = '<?php echo base_url(); ?>';
</script>

<!--Cliente HTTP simple basado en promesas para el navegador y node.js-->
<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/axios.min.js"></script>

<!-- DATATABLES PAPA BUSQUEDA Y PAGINACION AL MOSTRAR LOS DATOS JS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.responsive.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/idiomaDatatable.js"></script>

<!-- Validaciones de campos-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script>

<!-- Para no hacer una sobrecarga de los mantenimientos enlazo en la indexación. -->

<!--Bienvenidos => Este archivo contiene el consumo de la api -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/Mensaje_bienvenida/bienvenido.js"></script>

<!-- Recursos Diseño y alertas -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.js"></script>


</html>