function counter(obj, id, increment) {
	temp = document.getElementById(id)
	current_qty = parseInt(temp.value)

	if (increment) {
		temp.value = current_qty + 1
	}
	else {
		if (temp.value > 1) {
			temp.value = current_qty - 1
		}
	}
}