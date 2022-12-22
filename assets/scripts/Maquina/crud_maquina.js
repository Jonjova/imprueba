/****************************************************************************
                        Configuraciones iniciales para dinámica de tabs.
****************************************************************************/
$('button[data-toggle="tab"]').on("shown.bs.tab", function (e) {
	var idx = $(this).index('button[data-toggle="tab"]');
	$("#clickedTab").text(idx + 1);
	var indextab = idx + 1;
	if (indextab == 1) {
		// Si regresamos al primer tab entonces hacemos lo siguiente:
		$("#crear_editar").trigger("reset"); // Reseteo el formulario
		$("#nuevo_editar").html("Registro de datos"); // El valor de la cabecera del tab cambia
		$("#titulo").html("Nuevo registro de máquina"); // El título del formulario cambia
		$(".form-control").removeClass("is-valid is-invalid"); // Limpio las alertas de los inputs formulario
		$(".custom-select").removeClass("is-valid is-invalid"); // Limpio las alertas de los select formulario
		$("#Maquina").DataTable().ajax.reload(null, false); // Actualiza la tabla en tiempo real
		var validaCreateMaquina = $("#crear_editar").validate(); // Reseteo las validaciones del formulario
		validaCreateMaquina.resetForm();
	}
});
// Cargar select de tipos de maquinas
$(document).ready(function () {
	select_tipo_maquina();
	data_maquina();
});

$("#add").click(function () {
	// Select last tab
	$(".nav-tabs button:last").tab("show");
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

			if ($("#M_ID").val() != "") {
				editar();
			} else {
				crear();
			}
			$("#M_ID").val(null);
		}
	});
});
/****************************************************************************
                        Accion crear.
****************************************************************************/
function crear() {
	axios
		.post(url + "Maquina/Guardar", $("#crear_editar").serialize())
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
		.post(url + "Maquina/Actualizar", $("#crear_editar").serialize())
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
                        llenar select de Maquina
****************************************************************************/
function select_tipo_maquina() {
	axios
		.get(url + "Maquina/obt_maquinaxid")
		.then((res) => {
			var options =
				"<option selected disabled value=''>Seleccionar... </option><option value=''>Todos</option>";
			res.data.forEach((elem) => {
				options +=
					'<option value="' +
					elem.TIPO_ID +
					'">' +
					elem.TIPO_NOMBRE +
					"</option>";
			});
			$("#M_TIPO_ID").html(options);
			$("#M_TIPO_ID_").html(options);
		})
		.catch((error) => {
			console.error(error);
		});
}
/****************************************************************************
                        Mostrar listado de Máquinas.
****************************************************************************/
//Versión datatable y ajax.
function data_maquina() {
	//Mostrar elementos de la tabla Alumno.
	$("#Maquina").DataTable({
		ajax: {
			url: url + "Maquina/mostrar_maquina", 
			type: "post",
			data: { M_TIPO_ID_: $("#M_TIPO_ID_").val() },
		},
		bDestroy: true,
		responsive: true,
		order: [],

		language: idioma_espanol,
	});
}
//Cuando cambien al seleccionar un tipo de máquina se filtrara 
$("#M_TIPO_ID_").change(function () {
	data_maquina();
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
			.get(url + "Maquina/obtener_maquina/" + id)
			.then((res) => {
				const obt = res.data;
				$("#M_ID").val(obt.M_ID);
				$("input[name='M_CODIGO']").val(obt.M_CODIGO);
				$("input[name='M_NOMBRE']").val(obt.M_NOMBRE);
				$("#M_TIPO_ID").val(obt.M_TIPO_ID);
				$("input[name='M_DESCRIPCION']").val(obt.M_DESCRIPCION);
				//  console.log(obt);
			})
			.catch((error) => {
				console.error(error.response.status);
			});
	}
}
/****************************************************************************
                        Acción de Eliminar Maquina.
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
				.post(url + "Maquina/Eliminar/" + id)
				.then((res) => {
					$("#Maquina").DataTable().ajax.reload(null, false);
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

/****************************************************************************
            Validación de campos con la librería de jquery.validate.
****************************************************************************/
$(function () {
	//Valida formulario de maquinas
	$("#crear_editar").validate({
		rules: {
			M_CODIGO: { required: true, minlength: 3, maxlength: 100 },
			M_NOMBRE: { required: true, minlength: 3, maxlength: 250 },
			M_TIPO_ID: { required: true },
			M_DESCRIPCION: { required: true },
		},
		messages: {
			M_CODIGO: {
				required: "El campo de código es requerido",
				minlength: "El mínimo permitido son 3 caracteres",
				maxlength: "El máximo permitido son 100 caracteres",
			},
			M_NOMBRE: {
				required: "El campo de nombre es requerido",
				minlength: "El mínimo permitido son 3 caracteres",
				maxlength: "El máximo permitido son 250 caracteres",
			},
			M_TIPO_ID: { required: "El campo de tipo máquina es requerido" },
			M_DESCRIPCION: { required: "El campo de descripción es requerido" },
		},
	});
	// LETRAS Y ESPACIOS
	jQuery.validator.addMethod("alfaOespacio", function (value, element) {
		return this.optional(element) || /^[ a-záéíóúüñ]*$/i.test(value);
	});
});

//validación de campos con la libreria de jquery.mask
$("input[name='alm_edad']").mask("999");

//validación ingresar solo numeros
$("input[name='alm_edad']").keyup(function (e) {
	if (/\D/g.test(this.value)) {
		// Filter non-digits from input value.
		this.value = this.value.replace(/\D/g, "");
	}
});
