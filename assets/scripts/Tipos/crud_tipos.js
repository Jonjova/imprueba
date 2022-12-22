/****************************************************************************
                        Configuraciones iniciales para dinámica de tabs.
****************************************************************************/
$('button[data-toggle="tab"]').on("shown.bs.tab", function (e) {
	var idx = $(this).index('button[data-toggle="tab"]');
	$("#clickedTab").text(idx + 1);
	var indextab = idx + 1;
	if (indextab == 1) {// Si regresamos al primer tab entonces hacemos lo siguiente:
		$("#crear_editar").trigger("reset"); // Reseteo el formulario
		$("#nuevo_editar").html("Registro de datos"); // El valor de la cabecera del tab cambia 
		$("#titulo").html("Nuevo tipo de máquina"); // El título del formulario cambia 
		$(".form-control").removeClass("is-valid is-invalid"); // Limpio las alertas de los inputs formulario
		$(".custom-select").removeClass("is-valid is-invalid"); // Limpio las alertas de los select formulario
		$("#Tipo").DataTable().ajax.reload(null, false); // Actualiza la tabla en tiempo real  
		var validaCreateMaquina = $("#crear_editar").validate(); // Reseteo las validaciones del formulario
		validaCreateMaquina.resetForm();
	}
});
$("#add").click(function () {
	// Select last tab
	$(".nav-tabs button:last").tab("show");
});
/****************************************************************************
                        Mostrar listado de tipo de Máquinas.
****************************************************************************/
//Versión datatable y ajax.
$(document).ready(function () {
	//Mostrar elementos de la tabla Alumno.
	$("#Tipo").DataTable({
		ajax: url + "Tipos/mostrar_tipos_maquina",
		responsive: true,
		order: [],
        bDestroy:true,
		language: idioma_espanol,
	});
});

/****************************************************************************
                       Obtener id de máquinas para editar.
****************************************************************************/

function obtenMaquina(id) {
	if (id != null) {
		$(".nav-tabs button:last").tab("show");
		$("#nuevo_editar").html("Editar información");
		$("#titulo").html("Editar registro");
		axios
			.get(url + "Tipos/obtener_maquina/" + id)
			.then((res) => {
				const obt = res.data;
				$("#TIPO_ID").val(obt.TIPO_ID);
				$("input[name='TIPO_NOMBRE']").val(obt.TIPO_NOMBRE);
				//  console.log(obt);
			})
			.catch((error) => {
				console.error(error.response.status);
			});
	}
}

/****************************************************************************
            Validación de campos con la librería de jquery.validate.
****************************************************************************/
$(function () {
	//Valida formulario de maquinas
	$("#crear_editar").validate({
		rules: {
			TIPO_NOMBRE: { required: true, minlength: 3, maxlength: 100 },
		},
		messages: {
			TIPO_NOMBRE: {
				required: "El campo de código es requerido",
				minlength: "El mínimo permitido son 3 caracteres",
				maxlength: "El máximo permitido son 100 caracteres",
			},	
		},
	});
	// LETRAS Y ESPACIOS
	jQuery.validator.addMethod("alfaOespacio", function (value, element) {
		return this.optional(element) || /^[ a-záéíóúüñ]*$/i.test(value);
	});
});

/****************************************************************************
                        Acciones crear y editar.
****************************************************************************/
$(function () {
	$("#crear_editar").submit(function (event) {
		if (!$(this).valid()) {
			Swal.fire({
				icon: "error",
				allowEscapeKey: false,
				allowOutsideClick: false,
				toast: true,
				confirmButtonColor: "#343a40",
				text: "Campos vac\u00edos o inv\u00e1lidos!",
				title:
					'<p style="color: #343a40; font-size: 1.072em; font-weight: 600; line-height: unset; margin: 0;">Error de inserci\u00f3n</p>',
			});
		} else {
			$(".nav-tabs button:first").tab("show");
			event.preventDefault();

			if ($("#TIPO_ID").val() != "") {
				editar();
			} else {
				crear();
			}
			$("#TIPO_ID").val(null);
		}
	});
});

/****************************************************************************
                        Accion crear.
****************************************************************************/
function crear() {
	axios
		.post(url + "Tipos/Guardar", $("#crear_editar").serialize())
		.then((res) => {
			// console.log(res);
			Swal.fire({
				position: "top-end",
				icon: "success",
				toast: true,
				title: "Datos guardados correctamente",
				showConfirmButton: false,
				timer: 1500,
			});
		})
		.catch((error) => {
			console.error(error.response.status);
		});
}

/****************************************************************************
                        Accion editar.
****************************************************************************/
function editar() {
	axios
		.post(url + "Tipos/Actualizar", $("#crear_editar").serialize())
		.then((res) => {
			// console.log(res);
			Swal.fire({
				position: "top-end",
				icon: "success",
				toast: true,
				title: "Datos actualizados correctamente",
				showConfirmButton: false,
				timer: 1500,
			});
		})
		.catch((error) => {
			console.error(error.response.status);
		});
}

/****************************************************************************
                        Acción de Eliminar tipos de Maquina.
****************************************************************************/

function eliminar_maquina(id) {
	Swal.fire({
		title: "Está seguro que desea eliminar este registro?",
		text: "Se eliminará permanentemente!",
		icon: "warning",
		showCancelButton: true,
		toast: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Sí, eliminarlo!",
		cancelButtonText: "Cancelar",
	}).then((result) => {
		if (result.isConfirmed) {
			axios
				.post(url + "Tipos/Eliminar/" + id)
				.then((res) => {
                    $("#Tipo").DataTable().ajax.reload(null, false);
					Swal.fire({
						icon: "success",
						title: "El registro ha sido eliminado.",
						showConfirmButton: false,
						text: "Eliminado!",
						timer: 1500,
						target: "#custom-target",
						toast: true,
					});
				})
				.catch((error) => {
					console.error(error.response.status);
				});
		} else {
			Swal.fire({
				icon: "info",
				title: "Tu registro está a salvo :)",
				showConfirmButton: false,
				text: "Cancelado!",
				target: "#custom-target",
				timer: 1500,
				toast: true,
			});
		}
	});
}