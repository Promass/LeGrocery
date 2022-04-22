let count1 = document.getElementById("quantity-box-1");
let count2 = document.getElementById("quantity-box-2");
let count3 = document.getElementById("quantity-box-3");

let Price1 = document.getElementById("price-1");
let Price2 = document.getElementById("price-2");
let Price3 = document.getElementById("price-3");

let CartPrice1 = document.getElementById('cart-item-price1');
let CartPrice2 = document.getElementById('cart-item-price2');
let CartPrice3 = document.getElementById('cart-item-price3');

let Total_Items = document.getElementById('cart-total-items');
let Cart_Subtotal = document.getElementById('cart-subtotal');
let GSTID = document.getElementById('cart-gst');
let QSTID = document.getElementById('cart-qst');
let CartTotal = document.getElementById('cart-total');

var SubTotal = 0.00;
var GST = 0.00;
var QST = 0.00;
var FinalTotal = 0.00;
var Price = 0.00;

function PriceItem1(){
	total = (parseFloat(count1.value) * (parseFloat(Price1.textContent)));
	total = total.toFixed(2);
	CartPrice1.textContent = total;
	Price= total;
}

function PriceItem2(){
	total = (parseFloat(count2.value) * (parseFloat(Price2.textContent)));
	total = total.toFixed(2);
	CartPrice2.textContent = total;
	Price= total;
}

function PriceItem3(){
	total = (parseFloat(count3.value) * (parseFloat(Price3.textContent)));
	total = total.toFixed(2);
	CartPrice3.textContent = total;
	Price= total;
}

function TotalItem() {
	total = parseInt(count1.value) + parseInt(count2.value) + parseInt(count3.value);
	Total_Items.textContent = total;
}

function SubtotalPrice() {
	total = (parseFloat(count1.value) * (parseFloat(Price1.textContent))) + (parseFloat(count2.value)*parseFloat(Price2.textContent)) + (parseFloat(count3.value)*parseFloat(Price3.textContent));
	total = total.toFixed(2);
	Cart_Subtotal.textContent = total;
	SubTotal = total;
}

function gst() {
	GST = (SubTotal * 0.05).toFixed(2);
	GSTID.textContent = GST;
}

function qst() {
	QST = (SubTotal * 0.10).toFixed(2);
	QSTID.textContent = QST;
}

function finaltotal() {
	FinalTotal = (parseFloat(GST) + parseFloat(QST) + parseFloat(SubTotal));
	CartTotal.textContent = FinalTotal.toFixed(2);
}

function update() {
	TotalItem();
	SubtotalPrice();
	gst();
	qst();
	finaltotal();
	PriceItem1();
	PriceItem2();
	PriceItem3();
}

function counter(obj, id, increment) {
	temp = document.getElementById(id)
	current_qty = parseInt(temp.value)

	if (increment) {
		temp.value = current_qty + 1
		update();
	}
	else {
		if (temp.value > 1) {
			temp.value = current_qty - 1
			update();
		}
	}
}

function checkout(){
	alert("Thank you for your order, we will get it to you soon!");
}