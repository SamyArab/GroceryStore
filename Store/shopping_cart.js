


function buttonHandling(button, sessionQuantity){
   var x = button.parentNode;
   var itemType = x.getElementsByClassName("itemDescription").item(0).innerText;
 
   var intQuantity = parseInt(x.getElementsByClassName("itemQuantity").item(0).value);


   var rawPrice = x.getElementsByClassName("itemPrice").item(0).innerText;
   var price = parseFloat(rawPrice.substring(1, rawPrice.length));
   var totalPriceOfAllItems = 0;
   
  
    


   if(button.className == "buttonHandlingMinus"){
       if(intQuantity > 0){
        intQuantity -= 1;
        
       
        
       }
       
   }
   if(button.className == "buttonHandlingPlus"){
       intQuantity += 1;
       
       
       
      
   }

   
   var quantity  = intQuantity.toString();

   x.getElementsByClassName("itemQuantity").item(0).value =  quantity;
  

   
   var summaryList = document.getElementsByClassName("scrollableMoneyList").item(0);

   for(i = 0; i < summaryList.getElementsByClassName("totalItems").length; i++){
       
        if(summaryList.getElementsByClassName("totalItems").item(i).innerText.includes(itemType)){
            
            

            summaryItems = "" + itemType + " x" + quantity + " $" + (parseFloat(quantity)*price).toFixed(2).toString();
            summaryList.getElementsByClassName("totalItems").item(i).innerText = summaryItems;
        }
        var value = summaryList.getElementsByClassName("totalItems").item(i).innerText;
        totalPriceOfAllItems += parseFloat(value.substring(value.indexOf("$")+1, value.length));


   }

//Total Items section

   var totalQuantityOfItems = 0;

   for(i = 0; i < document.getElementsByClassName("item").length; i++){
       var quantityText = document.getElementsByClassName("item").item(i).getElementsByClassName("itemQuantity").item(0).value;
       totalQuantityOfItems += parseInt(quantityText);
   }

   document.getElementsByClassName("totalQuantityOfItems").item(0).innerText = "Total Items: " + totalQuantityOfItems;

//QST section
var QST = (totalPriceOfAllItems * 0.0975).toFixed(2);
document.getElementsByClassName("QST").item(0).innerText = "QST: $" + QST.toString();

//GST section
var GST = (totalPriceOfAllItems * 0.05).toFixed(2);
document.getElementsByClassName("GST").item(0).innerText = "GST: $" + GST.toString();

//Total Amount section
var total = (totalPriceOfAllItems + (totalPriceOfAllItems * 0.0975) + (totalPriceOfAllItems * 0.05)).toFixed(2);
document.getElementsByClassName("totalSum").item(0).innerText = "Total: $" + total.toString();

}


function update(){
    
}











