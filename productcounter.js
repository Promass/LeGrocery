let minus = document.getElementById("minus");
let plus = document.getElementById("plus");
let count = document.getElementById("quantity-box");
let conf = false;
let price = document.getElementById("price");
var numberString = price.textContent;
var x = Number(numberString.replace(/[^0-9\.]+/g, ""));
var initialPrice = x.toFixed(2);
let resetValues = document.getElementById("resetAll");

function initprice(pid) {
	count.value = 1;
	price.textContent = initialPrice;
	if (localStorage.getItem((pid + "counter")) > 1){
		memoryload(pid);
	}
}

function memoryload(pid) {
	count.value = localStorage.getItem((pid + "counter"));
	price.textContent = localStorage.getItem((pid + "price"));
}

function counterOfMinus(pid) {
	let data = new Number(localStorage.getItem(pid + "counter"));
	

	if (data <= 1) {
		data++;
	}
	data = data - 1;
	count.value = data;
	localStorage.setItem(pid + "counter", data);
	localStorage.setItem(pid + "price", (Math.round(data * x * 100) / 100).toFixed(2));
	price.textContent = (Math.round(data * x * 100) / 100).toFixed(2);
}

function counterOfPlus(pid) {
	let data = new Number(localStorage.getItem(pid + "counter"));

	if (data % 10 === 0) {
		conf = true;
	}

	if (data >= 10 && conf === true) {
		window.confirm("You chose the same product " + data + " times. Are you sure you would like to continue?");
		conf = false;
	}

	data = data + 1;
	count.value = data;
	localStorage.setItem(pid + "counter", data);
	localStorage.setItem(pid + "price", (Math.round(data * x * 100) / 100).toFixed(2)); // The price should br just two decimals after the point.
	price.textContent = (Math.round(data * x * 100) / 100).toFixed(2);

}



function resetEverything() {

	/* 
		This function delete the localStorage.
	*/
	window.localStorage.clear();
	count.value = localStorage.setItem("counter", 1);
	price.textContent = localStorage.setItem("price", initialPrice);
}

resetValues.addEventListener("click", resetEverything);



