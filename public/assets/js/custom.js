$(".progress-bar").each(function () {
	var min = $(this).attr("aria-valuemin");
	var max = $(this).attr("aria-valuemax");
	var now = $(this).attr("aria-valuenow");
	var siz = ((now - min) * 100) / (max - min);
	$(this).css("width", siz + "%");
});

// Tooltip for exp bar
$(document).ready(function () {
	$("#exp-bar").tooltip();
});

// Ajax for battle
var locationSelect = document.getElementById("locationSelect");
var mobSelectE = document.getElementById("mobSelect");

function locSelect() {
	if (locationSelect.value != "default") {
		mobSelectE.style.display = "block";
		$.ajax({
			url: "/PlayerController/findMob/" + locationSelect.value,
			success: function (data) {
				$("#mobSelect").html(data);
			}
		});
	} else {
		mobSelectE.style.display = "none";
	}
}
