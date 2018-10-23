jQuery(document).ready(function($){
	var cartWrapper = $('.cd-cart-container');
	//product id - you don't need a counter in your real project but you can use your real product id
	var productId = 0;

	if( cartWrapper.length > 0 ) {
		//store jQuery objects
		var cartBody = cartWrapper.find('.body')
		var cartList = cartBody.find('ul').eq(0);
		var cartTotal = cartWrapper.find('.checkout').find('span');
		var cartTrigger = cartWrapper.children('.cd-cart-trigger');
		var cartCount = cartTrigger.children('.count')
		var addToCartBtn = $('.cd-add-to-cart');
		var undoTimeoutId;
		
		//add product to cart
		addToCartBtn.on('click', function(event){
			event.preventDefault();
			addToCart($(this));
		});

		//open/close cart
		cartTrigger.on('click', function(event){
			event.preventDefault();
			toggleCart();
		});

		//close cart when clicking on the .cd-cart-container::before (bg layer)
		cartWrapper.on('click', function(event){
			if( $(event.target).is($(this)) ) toggleCart(true);
		});

		//delete an item from the cart
		cartList.on('click', '.delete-item', function(event){
			event.preventDefault();
			removeProduct($(event.target).parents('.product'));
		});

		//update item quantity
		cartList.on('change', 'select', function(event){
			quickUpdateCart();
		});

	}

	if( cartList.find('li').length > 0 ) {
		
		var items_num = cartList.find('li').length;
		productTotPrice = Number(cartList.find('li .price').text());
		
		//update items count + total price
		//updateCartTotal(productTotPrice, false);
		
			var cartIsEmpty = cartWrapper.hasClass('empty');
			//update number of items 
			updateCartCount(true, items_num);
			//update total price
			//show cart
			cartWrapper.removeClass('empty');
			
			
		$( cartList.find('li') ).each(function(i) {
			var price = Number($( this ).find('.price').text());
			updateCartTotal(price, true);
		});
			
	}
		
	function toggleCart(bool) {
		var cartIsOpen = ( typeof bool === 'undefined' ) ? cartWrapper.hasClass('cart-open') : bool;
		
		if( cartIsOpen ) {
			cartWrapper.removeClass('cart-open');
			//reset undo
			cartList.find('.deleted').remove();

			setTimeout(function(){
				cartBody.scrollTop(0);
				//check if cart empty to hide it
				if( Number(cartCount.find('li').eq(0).text()) == 0) cartWrapper.addClass('empty');
			}, 500);
		} else {
			cartWrapper.addClass('cart-open');
		}
	}

	function addToCart(trigger) {
		//update cart product list
		addProduct(trigger);
	}

	function addProduct(trigger) {
		//this is just a product placeholder
		//you should insert an item with the selected product info
		//replace productId, productName, price and url with your real product info
		if($(" #product-cart-" + trigger.data('id')).length > 0) {
		  //NotePopup('Already found', 2);
		} else {
			productId = productId + 1;
			var productAdded = $('<li class="product" id="product-cart-' + trigger.data('id') + '"><div class="product-image"><a href="' + rootURL + trigger.data('url') + '"><img src="' + rootURL + trigger.data('img') + '" alt="placeholder"></a></div><div class="product-details"><h3><a href="' + rootURL + trigger.data('url') + '"> ' + trigger.data('title') + '</a></h3><span class="price">' + trigger.data('price') + '</span><div class="actions"><a href="#0"  id="item_action" data-id="' + trigger.data('id') + '" data-type="media" data-target="remove_from_cart" class="delete-item">Delete</a><div class="quantity"></span></div></div></div></li>');
			cartList.prepend(productAdded);
				
			var cartIsEmpty = cartWrapper.hasClass('empty');
			//update number of items 
			updateCartCount(cartIsEmpty);
			//update total price
			updateCartTotal(trigger.data('price'), true);
			//show cart
			cartWrapper.removeClass('empty');
		}
	}

	function removeProduct(product) {
		clearInterval(undoTimeoutId);
		cartList.find('.deleted').remove();
		
		var topPosition = product.offset().top - cartBody.children('ul').offset().top ,
			productTotPrice = Number(product.find('.price').text().replace('$', ''));
		
		product.css('top', topPosition+'px').addClass('deleted');

		//update items count + total price
		updateCartTotal(productTotPrice, false);
		updateCartCount(true, -1);
		//undo.addClass('visible');

	}

	function quickUpdateCart() {
		var quantity = 0;
		var price = 0;
		
		cartList.children('li:not(.deleted)').each(function(){
			var singleQuantity = Number($(this).find('select').val());
			quantity = quantity + singleQuantity;
			price = price + singleQuantity*Number($(this).find('.price').text().replace('$', ''));
		});

		cartTotal.text(price.toFixed(2));
		cartCount.find('li').eq(0).text(quantity);
		cartCount.find('li').eq(1).text(quantity+1);
	}

	function updateCartCount(emptyCart, quantity) {
		if( typeof quantity === 'undefined' ) {
			var actual = Number(cartCount.find('li').eq(0).text()) + 1;
			var next = actual + 1;
			
			if( emptyCart ) {
				cartCount.find('li').eq(0).text(actual);
				cartCount.find('li').eq(1).text(next);
			} else {
				cartCount.addClass('update-count');

				setTimeout(function() {
					cartCount.find('li').eq(0).text(actual);
				}, 150);

				setTimeout(function() {
					cartCount.removeClass('update-count');
				}, 200);

				setTimeout(function() {
					cartCount.find('li').eq(1).text(next);
				}, 230);
			}
		} else {
			var actual = Number(cartCount.find('li').eq(0).text()) + quantity;
			var next = actual + 1;
			
			cartCount.find('li').eq(0).text(actual);
			cartCount.find('li').eq(1).text(next);
		}
	}

	function updateCartTotal(price, bool) {
		bool ? cartTotal.text( (Number(cartTotal.text()) + Number(price)).toFixed(2) )  : cartTotal.text( (Number(cartTotal.text()) - Number(price)).toFixed(2) );
	}
});