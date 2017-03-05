var Brain = {
	Actions: {
		settings: function(rate, id) {
			var rate = parseInt(rate);
			if (rate == 1) {
				$("#img_true_" + id).removeClass("burst").addClass("burst_active");
				$("#img_false_" + id).removeClass("burst_active").addClass("burst");
				} else {
				$("#img_false_" + id).removeClass("burst").addClass("burst_active");
				$("#img_true_" + id).removeClass("burst_active").addClass("burst");
			}
			$('#target').submit();
		},
	}
};