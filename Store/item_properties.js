

function getSavedVal(product, price){
    var quantity = localStorage.getItem(product);
    if (quantity == null){
        quantity = 1;
    }
    document.getElementsByName("quantity").item(0).value = quantity; // There is only 1 quantity field
    document.getElementById("price").innerHTML = "Total: $" + (quantity * price).toFixed(2);
}

function buttonHandling(button, product, price){
   var quantityField = document.getElementsByName("quantity").item(0); // There is only 1 quantity field
   var quantity = parseInt(quantityField.value);

   if(button.nodeName == "INPUT") {
       if(isNaN(quantity) || quantity < 1){
           quantity = 1;
       }else if(quantity > 200) {
           quantity = 200;
       }
   }else if(button.className == "quantity--sign minus" && quantity > 1){
       quantity -= 1;
   }else if(button.className == "quantity--sign plus" && quantity < 200){
       quantity += 1;
   }
   quantityField.value = parseInt(quantity);
   document.getElementById("price").innerHTML = "Total: $" + (quantity * price).toFixed(2);

   localStorage.setItem(product, quantity);
}
