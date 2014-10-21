$(document).ready(function () { 

	$('#jobUpdate-submit').click( function() {
		if ($('#position').val() == "") {
			$('#position').next('.error-modal-val').show();
			$('#position').focus();
			return false;
		} else {
			$('#position').next('.error-modal-val').hide();
		}
		if ($('#industry').val() == "") {
			$('#industry').next('.error-modal-val').show();
			$('#industry').focus();
			return false;
		} else {
			$('#industry').next('.error-modal-val').hide();
		}
		if ($('#job_description').val() == "") {
			$('#job_description').next('.error-modal-val').show();
			$('#job_description').focus();
			return false;
		} else {
			$('#job_description').next('.error-modal-val').hide();
		}
		if ($('#range_min').val() == 0) {
			$('#range_min').next('.error-modal-val').show();
			$('#range_min').focus();
			return false;
		} else {
			$('#range_min').next('.error-modal-val').hide();
		}
		if ($('#range_max').val() == 0) {
			$('#range_max').next('.error-modal-val').show();
			$('#range_max').focus();
			return false;
		} else {
			$('#range_max').next('.error-modal-val').hide();
		}
		if ($('#position_level').val() == "") {
			$('#position_level').next('.error-modal-val').show();
			$('#position_level').focus();
			return false;
		} else {
			$('#position_level').next('.error-modal-val').hide();
		}
		if ($('#company_location').val() == "") {
			$('#company_location').next('.error-modal-val').show();
			$('#company_location').focus();
			return false;
		} else {
			$('#company_location').next('.error-modal-val').hide();
		}
		if ($('input[type=checkbox]:checked').length == 0) {
			$('#benefits_chk').next('.error-modal-val').show();
			$('#benefits_chk').focus();
			return false;
		} else {
            $('#jobUpdate-submit').submit();
            return true;
        }
	});

});

// function myFunction(param) {
//     if (param.val() == "") {
//         $(param).next('.error-modal-val').show();
//         $(param).focus();
//         return false;
//     } else {
//         $(param).next('.error-modal-val').hide();
//         return true;
//     }
// }

// $('#jobUpdate-submit').click( function(e) {
//     alert(myFunction($('#position')));
//     if (myFunction($('#position')) == "false") {
//         return false;
//         alert("false");
//     } else {
//         return true;
//     }
//     // myFunction($('#position'));
//     // myFunction($('#industry'));
// });