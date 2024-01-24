var db_state = 0;
var run61_state = 0;
var run62_state = 0;
var report_state = 0;

$(document).ready(function(){
	$("#showAll").click(function(){
		if (db_state == 0) {
			db_state = 1;
			
			$("#lab61").hide();
			$("#lab62").hide();
			$("#Report").hide();
			$("#showAll").html("<a href='#' class='nav-link'><i class='fas fa-tv'></i> Show Dashboard</a>");
			run61_state = 1;
			$("#run61").html("<a href='#' class='nav-link'><i class='far fa-dot-circle'></i> Show Lab6.1</a>");
			run62_state = 1;
			$("#run62").html("<a href='#' class='nav-link'><i class='far fa-dot-circle'></i> Show Lab6.2</a>");
			report_state = 1;
			$("#report").html("<a href='#' class='nav-link'><i class='fa fa-th-large'></i> Show Report</a>");
		} else {
			db_state = 0;
			$("#lab61").show();
			$("#lab62").show();
			$("#Report").show();
			$("#showAll").html("<a href='#' class='nav-link'><i class='fas fa-home'></i> Hide Dashboard</a>");
			run61_state = 0;
			$("#run61").html("<a href='#' class='nav-link'><i class='fas fa-dot-circle'></i> Hide Lab6.1</a>");
			run62_state = 0;
			$("#run62").html("<a href='#' class='nav-link'><i class='fas fa-dot-circle'></i> Hide Lab6.2</a>");
			report_state = 0;
			$("#report").html("<a href='#' class='nav-link'><i class='fas fa-layer-group'></i> Hide Report</a>");
		}
	});
	$("#run61").click(function(){
		if (run61_state == 0) {
			run61_state = 1;
			db_state = 1;
			$("#showAll").html("<a href='#' class='nav-link'><i class='fas fa-tv'></i> Show Dashboard</a>");
			$("#lab61").hide();
			$("#run61").html("<a href='#' class='nav-link'><i class='far fa-dot-circle'></i> Show Lab6.1</a>");
		} else {
			run61_state = 0;
			db_state = 0;
			$("#showAll").html("<a href='#' class='nav-link'><i class='fas fa-home'></i> Hide Dashboard</a>");
			$("#lab61").show();
			$("#run61").html("<a href='#' class='nav-link'><i class='fas fa-dot-circle'></i> Hide Lab6.1</a>");
		}
	});
	$("#run62").click(function(){
		if (run62_state == 0) {
			run62_state = 1;
			db_state = 1;
			$("#showAll").html("<a href='#' class='nav-link'><i class='fas fa-tv'></i> Show Dashboard</a>");
			$("#lab62").hide();
			$("#run62").html("<a href='#' class='nav-link'><i class='far fa-dot-circle'></i> Show Lab6.2</a>");
		} else {
			run62_state = 0;
			$("#lab62").show();
			db_state = 0;
			$("#showAll").html("<a href='#' class='nav-link'><i class='fas fa-home'></i> Hide Dashboard</a>");
			$("#run62").html("<a href='#' class='nav-link'><i class='fas fa-dot-circle'></i> Hide Lab6.2</a>");
		}
	});
	$("#report").click(function(){
		if (report_state == 0) {
			report_state = 1;
			db_state = 1;
			$("#showAll").html("<a href='#' class='nav-link'><i class='fas fa-tv'></i> Show Dashboard</a>");
			$("#Report").hide();
			$("#report").html("<a href='#' class='nav-link'><i class='fa fa-th-large'></i> Show Report</a>");
		} else {
			report_state = 0;
			$("#Report").show();
			db_state = 0;
			$("#showAll").html("<a href='#' class='nav-link'><i class='fas fa-home'></i> Hide Dashboard</a>");
			$("#report").html("<a href='#' class='nav-link'><i class='fas fa-layer-group'></i> Hide Report</a>");
		}
	});
});
