/** Applicant Home/Profile **/

function calculateAge(val) {

	alert(val);
	var today = new Date();
    var birthDate = new Date(val);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    	document.getElementById('age').value = age;
}

function showCity() {
	var country = document.getElementById("country");
	var city = document.getElementById('city-div');

	if (country.options[country.selectedIndex].text == "Philippines") {
		city.style.display = 'block';
		document.getElementById("country-div").className = "col-md-2";

	} else {
		city.style.display = 'none';
		document.getElementById("country-div").className = "col-md-4";
		document.getElementById("city-option").value = "";
	}
}

function showOtherCountry() {
	var country = document.getElementById("school_country");
	var other_country = document.getElementById('schoolcountryother-div');

	if (country.options[country.selectedIndex].text == "Others") {
		other_country.style.display = 'block';
		document.getElementById("school-country-div").className = "col-md-2";

	} else {
		other_country.style.display = 'none';
		document.getElementById("school-country-div").className = "col-md-4";
		document.getElementById("other-country").value = "";
	}
}

function showOtherFieldIndustry() {
	var field_industry = document.getElementById("field_of_industry");
	var other_field_industry = document.getElementById('field_of_industry_other_div');

	if (field_industry.options[field_industry.selectedIndex].text == "Others") {
		other_field_industry.style.display = 'block';
		document.getElementById("field_of_industry_div").className = "col-md-2";

	} else {
		other_field_industry.style.display = 'none';
		document.getElementById("field_of_industry_div").className = "col-md-4";
		document.getElementById("other_field_industry").value = "";
	}
}

function showOtherFieldIndustry1() {
	var field_industry = document.getElementById("field_of_industry1");
	var other_field_industry = document.getElementById('field_of_industry_other_div1');

	if (field_industry.options[field_industry.selectedIndex].text == "Others") {
		other_field_industry.style.display = 'block';
		document.getElementById("field_of_industry_div1").className = "col-md-2";

	} else {
		other_field_industry.style.display = 'none';
		document.getElementById("field_of_industry_div1").className = "col-md-4";
		document.getElementById("other_field_industry1").value = "";
	}
}

function showOtherWorkIndustry() {
	var work_industry = document.getElementById("work_industry");
	var other_work_industry = document.getElementById('work_industry_other_div');

	if (work_industry.options[work_industry.selectedIndex].text == "Others") {
		other_work_industry.style.display = 'block';
		document.getElementById("work_industry_div").className = "col-md-2";

	} else {
		other_work_industry.style.display = 'none';
		document.getElementById("work_industry_div").className = "col-md-4";
		document.getElementById("other_work_industry").value = "";
	}
}

// function imageChange(id) {
// 	var imageToReplacesrc = document.getElementById(id).src;
// 	var imagesrc = document.getElementById('image1').src

// 	document.getElementById('image1').src = imageToReplacesrc;
// 	document.getElementById(id).src = imagesrc;
// }

$(document).ready(function () { 
	$('#personal-submit').click( function() {

		if ($('#email').val() == "") {
			$('#email').next('.error-modal-val').show();
			$('#email').focus();
			return false;
		}  else if ($('#height').val() == "" || $('#height').val() == 0) {
			$('#height').next('.error-modal-val').show();
			$('#height').focus();
			return false;
		} else if ($('#weight').val() == "" || $('#weight').val() == 0) {
			$('#weight').next('.error-modal-val').show();
			$('#weight').focus();
			return false;
		} else if ($('#mobile').val() == "") {
			$('#mobile').next('.error-modal-val').show();
			$('#mobile').focus();
			return false;
		} else if ($('#qq').val() == "") {
			$('#qq').next('.error-modal-val').show();
			$('#qq').focus();
			return false;
		} else if ($('#skype').val() == "") {
			$('#skype').next('.error-modal-val').show();
			$('#skype').focus();
			return false;
		}  else if ($('#country').val() == "Philippines") {
			if ($('#city-option').val() == "") {
				$('#city-option').next('.error-modal-val').show();
				$('#city-option').focus();
				return false;
			} 
		} else if ($('#visa_type').val() == "") {
			$('#visa_type').next('.error-modal-val').show();
			$('#visa_type').focus();
			return false;
		} else {
			$('#personal-submit').submit();
			return true;
		}
	});

	$('#educ-submit').click( function() {

		if ($('#school_name').val() == "") {
			$('#school_name').next('.error-modal-val').show();
			$('#school_name').focus();
			return false;
		} else if ($('#field_of_industry').val() == "") {
			$('#field_of_industry').next('.error-modal-val').show();
			$('#field_of_industry').focus();
			return false;
		} else if ($('#educ_level').val() == "") {
			$('#educ_level').next('.error-modal-val').show();
			$('#educ_level').focus();
			return false;
		} else if ($('#major').val() == "") {
			$('#major').next('.error-modal-val').show();
			$('#major').focus();
			return false;
		} else if ($('#year_graduated').val() == "") {
			$('#year_graduated').next('.error-modal-val').show();
			$('#year_graduated').focus();
			return false;
		} else if ($('#school_country').val() == "") {
			$('#school_country').next('.error-modal-val').show();
			$('#school_country').focus();
			return false;
		} else if ($('#school_country').val() == "Others") {
			if ($('#other-country').val() == "") {
				$('#other-country').next('.error-modal-val').show();
				$('#other-country').focus();
				return false;
				}
		} else {
			$('#educ-submit').submit();
			return true;
		}
	});

	$('#work-submit').click( function() {

		if ($('#company_name').val() == "") {
			$('#company_name').next('.error-modal-val').show();
			$('#company_name').focus();
			return false;
		} else if ($('#company_address').val() == "") {
			$('#company_address').next('.error-modal-val').show();
			$('#company_address').focus();
			return false;
		} else if ($('#position_title').val() == "") {
			$('#position_title').next('.error-modal-val').show();
			$('#position_title').focus();
			return false;
		} else if ($('#years_of_experience').val() == "") {
			$('#years_of_experience').next('.error-modal-val').show();
			$('#years_of_experience').focus();
			return false;
		} else if ($('#work_industry').val() == "") {
			$('#work_industry').next('.error-modal-val').show();
			$('#work_industry').focus();
			return false;
		} else if ($('#salary').val() == "") {
			$('#salary').next('.error-modal-val').show();
			$('#salary').focus();
			return false;
		} else if ($('#work_description').val() == "") { 
			$('#work_description').next('.error-modal-val').show();
			$('#work_description').focus();
			return false;
		} else {
			$('#work-submit').submit();
			return true;
		}
	});

	//Personal Edit Regex
	$('#height').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	$('#weight').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	$('#mobile').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	$('#phone').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	$('#visa_type').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s]/g, '')
	});

	//Add Education Regex
	$('#school_name').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
	});
	$('#major').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
	});
	$('#other-country').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
	});
	$('#year_graduated').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});

	//Add Work Regex
	$('#company_name').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s 0-9]/g, '');
	});
	$('#company_address').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s\.\,\'\- 0-9]/g, '');
	});
	$('#position_title').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
	});
	$('#years_of_experience').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]/g, '');
	});
	$('#salary').on('input', function(event) {
		this.value = this.value.replace(/[^0-9]\./g, '');
	});
	$('#work_description').on('input', function(event) {
		this.value = this.value.replace(/[^a-zA-Z\s\.\,\'\ 0-9]/g, '');
	});

	$("[rel='tooltip']").tooltip();
	$('#mypopover').popover();

	$('#image1').contenthover({
		slide_speed: 300,
		overlay_height: 25,
		slide_direction:'left',
		overlay_background: '#8B8B8B',
		overlay_opacity: 0.9
	});

	$('.carousel').carousel({
			interval: 0
	});
});


/** Applicant Registration Upload Photo **/

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#' + input.name).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function imageChange(id) {
	var otherImage = document.getElementById(id).id;
	var otherImageSrc = document.getElementById(id).src;

	if (otherImage == 'image2.jpg') {
		var image3 = otherImageSrc.replace("image2.jpg", "image3.jpg");

		$('#changephoto-modal #primary-img').attr('src', otherImageSrc);
		$('#changephoto-modal #other-img').attr('src', image3);

		$('#nav-pills a:last').tab('show');
		$('#changephoto-modal').modal('show');

	} else {
		var image2 = otherImageSrc.replace("image3.jpg", "image2.jpg");

		$('#changephoto-modal #primary-img').attr('src', otherImageSrc);
		$('#changephoto-modal #other-img').attr('src', image2);

		$('#nav-pills a:last').tab('show');
		$('#changephoto-modal').modal('show');

	}
}

function show_primary_img() {
	var primary_img = document.getElementById("changephoto-btn");
}


/** Applicant Registration Online **/

function checkLocation(){

	var location = document.getElementById("country");

	if (location.options[location.selectedIndex].text == "Philippines") {
		var city = document.getElementById('city_div');
		city.style.display = 'block';

	} else {
		var city = document.getElementById('city_div');
		city.style.display = 'none';

		document.getElementById("city_option").value = "";
	}
}

function checkSchoolLocation(){

	var visa = document.getElementById("school_country");

	if (visa.options[visa.selectedIndex].text == "Others") {
		var city = document.getElementById('schoollocation_other_div');
		city.style.display = 'block';

	} else {
		var city = document.getElementById('schoollocation_other_div');
		city.style.display = 'none';

		document.getElementById("school_location_other").value = "";
	}
}

function checkVisaType(){

    var visa = document.getElementById("visa_type");

    if (visa.options[visa.selectedIndex].text == "Others") {
        var city = document.getElementById('visa_others_div');
        city.style.display = 'block';

    } else {
        var city = document.getElementById('visa_others_div');
        city.style.display = 'none';

        document.getElementById("visa_others").value = "";
    }
}


