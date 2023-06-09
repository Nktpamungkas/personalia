<script>
	$(document).ready(function() {

		$("#sepreated").click(function() {
			var nik = $("#nik").val();

			if (nik == '') {
				toastr.error("Masukan Nik anda !");
			} else {
				$.ajax({
					type: 'POST',
					url: '<?= base_url() . "Recruitment/get_data_karyawan" ?>',
					data: {
						nik: nik
					},
					dataType: 'json',
					success: function(result) {
						if (result == null) {
							toastr.error("Nik tidak ditemukan !");
						} else {
							$("#nama").val(result.nama);
							$("#jabatan").val(result.jabatan);
							$("#dept_bagian").val(result.dept);
							$("#Tgl_masuk").val(result.tgl_masuk);
							$("#lokasi_kerja").val("Jl. Gatot subroto Km. 3, Kel. Uwung Jaya, Cibodas, Kota Tanggerang 15138");
							$("#jen_kel").val(result.jenis_kelamin);
							$("#Status").val(result.status_kel);
							$(this).css("background-color", "#ddd");
							$("#nik").prop("readonly", true);
						}

					},
					error: function() {
						toastr.error("Nik tidak ditemukan !");
					}
				});
			}

		});

		$('#btn-start').click(function() {
			var nik = $("#nik").val();
			var tgl_surat_resign = $("#tgl_surat_resign").val();
			var nama = $("#nama").val();
			if (nik == '') {
				toastr.error("Masukan Nik anda !");
			} else if (tgl_surat_resign == '') {
				toastr.error("Masukan Tanggal surat resign !");
			} else if (nama == '') {
				toastr.error("Generate Nik, dengan click tombol di sebelah nik anda !")
			} else {
				$('div.adv-table').show();
				$('#div-btn-done').show();
				toastr.success("Anda di persilahkan mengisi FORM EXIT INTERVIEW")
			}
		})

		// insert data begin
		var form1 = $('#myform');
		var error1 = $('.alert-danger', form1);

		form1.validate({
			errorElement: 'span',
			errorClass: 'help-block help-block-error',
			focusInvalid: false,
			invalidHandler: function(form, validator) {

				if (!validator.numberOfInvalids())
					return;

				$('html, body').animate({
					scrollTop: $(validator.errorList[0].element).offset().top
				}, 2000);

			},
			ignore: "",
			rules: {

			},
			// invalidHandler: function(event, validator) { //display error alert on form submit
			// 	// success1.hide();
			// 	error1.show();
			// 	// App.scrollTo(error1, -200);
			// },

			errorPlacement: function(error, element) { // render error placement for each input type
				var cont = $(element).parent('.input-group');
				if (cont.size() > 0) {
					cont.after(error);
				} else {
					element.after(error);
				}
			},

			highlight: function(element) { // hightlight error inputs

				$(element)
					.closest('.form-group').addClass(
						'has-error'); // set error class to the control group
			},

			unhighlight: function(element) { // revert the change done by hightlight
				$(element)
					.closest('.form-group').removeClass(
						'has-error'); // set error class to the control group
			},

			submitHandler: function(form) {
				error1.hide();
			}
		});
		$.validator.setDefaults({
			debug: true,
			success: 'valid'
		});

		$('#btn-done').click(function(e) {
			e.preventDefault();

			if ($(form1).valid()) {
				fn_inserting_radio_button();
			}
		});

		function fn_inserting_radio_button() {
			var tgl_surat_resign = $('#tgl_surat_resign').val();
			var nik = $("#nik").val();
			var title_quest = $('.title_quest').val();
			$.ajax({
				type: 'POST',
				url: '<?= base_url() . "Recruitment/inserting_tgl_surat_resign" ?>',
				data: {
					nik: nik,
					tgl_surat_resign: tgl_surat_resign
				},
				dataType: 'json',
				success: function(result) {
					console.log(result.message);
				},
				error: function() {
					toastr.error("Ajax error !");
				}
			});

			$("input[type='radio']:checked").each(function() {
				$.ajax({
					type: 'POST',
					url: '<?= base_url() . "Recruitment/insert_multiple_choice" ?>',
					data: {
						nik: nik,
						id_question: this.id,
						id_choice: $(this).attr('attr'),
						title_quest: title_quest,
						choice: $(this).val()
					},
					dataType: 'json',
					success: function(result) {
						console.log(result.message);
					},
					error: function() {
						toastr.error("AJax error !");
					}
				});
			})
			fn_inserting_textarea()
		}

		function fn_inserting_textarea() {
			var nik = $("#nik").val();
			var title_quest = $('.title_quest').val();
			$("textarea.form-control").each(function() {
				$.ajax({
					type: 'POST',
					url: '<?= base_url() . "Recruitment/insert_answer_essay" ?>',
					data: {
						nik: nik,
						id_question: this.id,
						jenis_jawaban: $(this).attr('attr'),
						title_quest: title_quest,
						text_area: $(this).val()
					},
					dataType: 'json',
					success: function(result) {
						console.log(result.message);
					},
					error: function() {
						toastr.error("Ajax Error !");
					}
				});
			});
			toastr.success("form berhasil terinput !");
			$('#btn-done').prop('disabled', true);
			var delay = 5000;
			var url = '<?= base_url() . 'Recruitment/List_form_exit_interview' ?>'
			setTimeout(function() {
				window.location = url;
			}, delay);

		}
	});
</script>