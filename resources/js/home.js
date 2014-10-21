$(document).ready(function(){
	$(".switch_content").hide();
	$("#cs").show();

	$("#cs-icon").click(function(){
		$(".switch_content").hide();
		$("#cs").show();
	});

	$("#mrktg-icon").click(function(){
		$(".switch_content").hide();
		$("#mrktg").show();
	});

	$("#it-icon").click(function(){
		$(".switch_content").hide();
		$("#it").show();
	});

	$("#hr-icon").click(function(){
		$(".switch_content").hide();
		$("#hr_admin").show();
	});

	$("#mngmnt-icon").click(function(){
		$(".switch_content").hide();
		$("#mngmnt").show();
	});
});
