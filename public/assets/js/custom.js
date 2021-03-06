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
			url: "/PlayerController/FindMob/" + locationSelect.value,
			success: function (data) {
				$("#mobSelect").html(data);
			}
		});
	} else {
		mobSelectE.style.display = "none";
	}
}

// Ajax for inventory
function dblclick_equipped() {
	$.ajax({
		url: "/PlayerController/FindInventory/",
		success: function (data) {
			$("#InventoryListAjax").html(data);

			$("#iList").on("dblclick", "li", function (e) {
				var value = $(this).data("value");
				$.ajax({
					url: "/PlayerController/EquippedItem/" + value,
					success: function (data) {
						$("#InventoryListAjax").html(data);

						$.ajax({
							url: "/PlayerController/FindInventory/",
							success: function (data) {
								$("#InventoryListAjax").html(data);
							}
						});

						// Update atk and def
						$.ajax({
							url: "/PlayerController/UpdateAtkDef/",
							success: function (data) {
								$("#AtkDefAjax_Info").html(data);
								$("#AtkDefAjax_Inventory").html(data);
							}
						});
					}
				});
			});
		}
	});
}

function info_clicked() {
	// Update atk and def
	$.ajax({
		url: "/PlayerController/UpdateAtkDef/",
		success: function (data) {
			$("#AtkDefAjax_Info").html(data);
			$("#AtkDefAjax_Inventory").html(data);

			$.ajax({
				url: "/PlayerController/EquipmentInfo/",
				success: function (data) {
					$("#EquipmentInfo").html(data);

					// Remove element that has null data value in equipment info
					$(".equipment-info").filter('[data-value="null"]').remove();
				}
			});
		}
	});
}

// Update atk and def on first load
$.ajax({
	url: "/PlayerController/UpdateAtkDef/",
	success: function (data) {
		$("#AtkDefAjax_Info").html(data);
		$("#AtkDefAjax_Inventory").html(data);
	}
});

// Update equipment info on first load
$.ajax({
	url: "/PlayerController/EquipmentInfo/",
	success: function (data) {
		$("#EquipmentInfo").html(data);

		// Remove element that has null data value in equipment info
		$(".equipment-info").filter('[data-value="null"]').remove();
	}
});
