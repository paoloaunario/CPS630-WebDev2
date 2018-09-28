

$("#add-to-cart").click(function(event){
		 if (!Array.isArray(shoppingCart)){emptyCart();}
         event.preventDefault();
		 var nameOfPaintingVal = $('#painting').val(); 
         var nameOfPainting = $('#'+nameOfPaintingVal).attr('nameOfPainting'); 
		 var price = $("#"+nameOfPaintingVal).attr("price");
         var quantity = Number($("#quantity").val());
		 
		 document.getElementById("quantity").value = "1";
		 //document.write(price);
         addToCart(nameOfPainting, price, quantity);
         displayCart();
      
      });
	  
		function displayPrice()
		{
			var painting = document.getElementById("painting").value;
			var price = document.getElementById(painting).getAttribute("price"); 
			document.getElementById("message").innerHTML = "$" + price;
		}

		$("#clear-cart").click(function(event){
         emptyCart();
         displayCart();
		
      });

      function displayCart()	{
        var cartArray = returnArray();
        var output = "";
        for (var i in cartArray){
           output += "<li>"+cartArray[i].name+" "+cartArray[i].price+" x "+cartArray[i].quantity+" = "+cartArray[i].total.toFixed(2)+"</li>"
        }
        $("#show-cart").html(output);
        $("#total-cart").html(totalCost());
        console.log(totalCost());
      }
      
      

      //Essentially the constructor for a painting
      var Painting = function(name, price, quantity) {
         this.name = name
         this.price = price
         this.quantity = quantity
      };
      
   
      function addToCart(name, price, quantity)
	  {
		 
		 
         // if structure for if the same painting is added to the cart
         for (var i in shoppingCart){
            if (shoppingCart[i].name === name){
				
				shoppingCart[i].quantity += quantity;
			   
               save();
               return
            }
         }        
 
         var item = new Painting(name, price, quantity);
         shoppingCart.push(item);  
         save(); 
      }

      function removeFromCart(name){
         for(var i in shoppingCart){
            if (shoppingCart[i].name === name){
               shoppingCart[i].quantity --;
               if(shoppingCart[i].quantity === 0){
                  shoppingCart.splice(i, 1);
               }
               break;
            }
         }
         save();
      }

      function removeAllPainting(name){
         for (var i in shoppingCart){
            if (shoppingCart[i].name === name){
               shoppingCart.splice(i, 1);
               break;
            }
         }
         save();
      }

      function emptyCart(){
         shoppingCart = [];
		 save();
        
      }

      function returnQuantity(){
         var totalQuantity = 0;
         for (var i in shoppingCart){
             totalQuantity += shoppingCart[i].quantity;
         }
         return totalQuantity
      }

      function totalCost(){
         var totalCost = 0;
         for (var i in shoppingCart){
            totalCost += shoppingCart[i].price * shoppingCart[i].quantity;
         } 
         return totalCost.toFixed(2); 
      }
    
      function returnArray(){
         var cartCopy = [];
         for (var i in shoppingCart){
            var item = shoppingCart[i];
            var itemCopy = [];
            for (var p in item){
               itemCopy[p] = item[p];
            }
            itemCopy.total = item.price * item.quantity;
            cartCopy.push(itemCopy);
         }
         return cartCopy;
      }

      function save(){
         localStorage.setItem("shoppingCart", JSON.stringify(shoppingCart));
      }

      function load(){
         shoppingCart = JSON.parse(localStorage.getItem("shoppingCart"));
      }

      
  
      //addToCart("swag", 2000, 2);
      //addToCart("Test", 4000, 3);

      //$("#total-cart").html(totalCost());
      //console.log(totalCost());
      //console.log(returnArray());
      load();
      displayCart();
	  

      var array = returnArray();
      console.log(array);
	  

 