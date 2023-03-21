
if (window.location.href.indexOf('checkout') >= 0) {

	$('.sidebar .sidebar-content .order-summary-section.order-summary-section-product-list .product-table').remove()
	$('.sidebar .sidebar-content .order-summary-section.order-summary-section-total-lines').remove()
	$('.sidebar .sidebar-content .order-summary-section.order-summary-section-discount').remove()
	$('.order-summary.order-summary-is-collapsed').remove()
	$('span.total-recap-final-price').remove()
	$('.order-summary-toggle').remove();
	$('.step-footer-previous-link').remove();
	$('.section-content-text').remove();
	$('span.radio-accessory.content-box-emphasis').hide()
	$('#customer_shipping_province').val('50');
	$("#billing_address_address1").attr('readonly','true');
	$("#billing_address_full_name").attr("placeholder", "Nhập tên người nhận...");
	$("#billing_address_phone").attr("placeholder", "Nhập số điện thoại...");
	$("[for='billing_address_full_name']").text('Người nhận');
	$("[for='billing_address_address1']").text('Giao đến');
	$('#billing_address_address1').parent().parent().css('width', '100%');

	$('.logged-in-customer-information').hide()
	
	$('#stored_addresses').parent().parent().hide()

	$('.banner').append('<div class="banner-text"><span><a href="/cart">Giỏ hàng</a><span>Thông tin giao hàng</span></span></div>')

	const existUser = JSON.parse(localStorage.getItem('info_user_logined') || '{}');
	let userName = '';
	if (existUser?.last_name || existUser?.first_name) {
		userName = existUser.last_name + ' ' + existUser.first_name;
		$('#billing_address_full_name').val(userName);
	}

	let userPhone = '';
	if (existUser?.phone) {
		userPhone = existUser?.phone?.phone_number;
		$('#billing_address_phone').val(userPhone);
		$('#billing_address_phone').focus();
	}

	const delivery_info = JSON.parse(localStorage.getItem('delivery-info'));
	$('#billing_address_address1').val(delivery_info.full_address);

	const default_delivery = {
		"province": "",
		"full_address": "",
		"district": "",
		"title": "",
		"national": "",
		"gate": "H",
		"street": "",
		"city": "Thành phố Hồ Chí Minh",
		"map_id": "",
		"house_number": "",
		"long": 0,
		"type": 0,
		"title_address": "",
		"house_detail": "",
		"distance": "",
		"ward": "",
		"note": "",
		"lat": 0,
	}
	const dataSend = {
		delivery_info: {
			...default_delivery,
			...(delivery_info || {}),
			name: userName,
			phone: existUser?.phone || {
				region_code: "",
				phone_number: ""
			},
			house_number: "",
			floor: 0,
			room: 0,
		},
		src: "TCH-WEB",
		type: "DELI",
		adjustments: [],
		orderlines: [],
		note: "",
		quantity: 0,
		payments: [
			{
				"key": "COD",
				"method": "COD"
			}
		],
	}

	var getCart = $.ajax({
		url: 'https://thecoffeehouse.com/cart.js',
		dataType: 'json',
		contentType: 'application/json'
	  }),
	  calculateOrders = getCart.then(function(data) {
		dataSend.orderlines = data.items.filter(lineItem => !lineItem.sku.startsWith('SHIP-')).map(lineItem => {
			const { item: propsItem, topping: propsTopping } = lineItem.properties;
			const product = JSON.parse(propsItem);
			const toppings = JSON.parse(propsTopping || '[]');
			return {
				id: product.sku,
				category_type: 0,
				quantity: lineItem.quantity,
				note: product.note_product,
				extra: [{
					id: product.barcode,
					code: product.barcode + '',
					group_id: 0,
				}].concat(toppings.map(topping => ({
					id: topping.barcode + '',
					code: topping.barcode + '',
					group_id: 1,
				}))),
			};
		});
		dataSend.note = data.note;
		let headers = null;
		const accessToken = localStorage.getItem('accessToken');
		if (accessToken) {
			headers = {
				'Authorization': `Bearer ${accessToken}`,
			};
		}
		return $.ajax({
			type: 'post',
			url: 'https://web-staging.thecoffeehouse.com/haravan/orders/calculate',
			contentType: 'application/json',
			processData: false,
			data: JSON.stringify(dataSend),
			headers,
		});
	});
	calculateOrders.done(function(response) {
		console.log(response);
		build(response);
		
	})




	var build = function (response) {
		const order = response.data.order;
		const {adjustments, orderlines, nationwide} = order;
		const {adjustments: adjustments_nationwide, orderlines: orderlines_nationwide} = nationwide || {orderlines: []};

		$('.sidebar .sidebar-content').append('<h2>Đơn hàng</h2>');
		if (orderlines.length > 0 && orderlines_nationwide.length > 0) {
			$('.sidebar .sidebar-content').append('<p>Đơn hàng sẽ được giao làm hai lần do sản phẩm ở hai kho khác nhau</p>');
		}
		if (orderlines.length > 0){
			var layoutOrderlines = buildLayout('orderlines', order);
			$('.sidebar .sidebar-content').append(layoutOrderlines)
		}
		if (orderlines_nationwide.length > 0){
			var layoutOrderlinesNationwide = buildLayout('orderlines_nationwide', order);
			$('.sidebar .sidebar-content').append(layoutOrderlinesNationwide)
		}

		let totalAmountLayout = '<div class="total-amount">'+
		'                            <div class="detail-money"">'+
		'								<div class="line-money">'+
		'                                    <p class="money-name">'+
		'                                        <span>Tạm tính</span>'+
		'                                        <span class="line-item-price">{total_amount}</span>'+
		'                                    </p>'+
		'                                    <p class="money-name">'+
		'                                        <span>Phí vận chuyển</span>'+
		'                                        <span class="line-item-price">{total_ship}</span>'+
		'                                    </p>'+
		'                                </div>'+
		'                                <div class="total-money">'+
		'                                    <p class="money-name">'+
		'                                        <span>Tổng tiền</span>'+
		'                                        <span class="line-item-price total">{after_discount_amount}</span>'+
		'                                    </p>'+
		'                                </div>' +
		// '                                <div class="order-note">'+
		// '                                    <p class="money-name">'+
		// '                                        <span>{order_note}</span>'+
		// '                                    </p>'+
		// '                                </div>' +
		'                            </div>'+
		'                        </div>';


		if (orderlines.length > 0 && orderlines_nationwide.length > 0) {
			totalAmountLayout = totalAmountLayout.replace(/{total_amount}/g, formatMoney(response.data.order.total_amount * 100)+"đ")
			totalAmountLayout = totalAmountLayout.replace(/{after_discount_amount}/g, formatMoney(response.data.order.after_discount_amount * 100)+"đ")
			totalAmountLayout = totalAmountLayout.replace(/{total_ship}/g, formatMoney(response.data.order.total_ship * 100)+"đ")
			// totalAmountLayout = totalAmountLayout.replace(/{order_note}/g, order.note ? 'Ghi chú đơn hàng: ' + order.note : 'Không có ghi chú')

			$('.sidebar .sidebar-content').append(totalAmountLayout)
		}
	}
	

	var buildLayout = function (typeOrder, data) {

		let orderlines;
		let fee_ship = 0;
		let time_ship;
		let price;
		let after_discount;
		let change_price = 0;

		if(typeOrder==="orderlines") {
			orderlines = data.orderlines;
			time_ship = data.schedule_time ? data.schedule_time.day.text : ''
			if (data.adjustments.length > 0){
				fee_ship = data.adjustments[0].price
			}
			price = data.total
			after_discount = data.after_discount
		} else if(typeOrder==="orderlines_nationwide") {
			orderlines = data.nationwide.orderlines;
			if (data.nationwide.adjustments.length > 0){
				fee_ship = data.nationwide.adjustments[0].price
			}
			time_ship = data.nationwide.schedule_time ? data.nationwide.schedule_time.day.text : ''
			price = data.nationwide.total
			after_discount = data.nationwide.after_discount
		}



		let common ='<div class="orderlines-list">'+
		'                            <div class="type-ship">'+
		'                            </div>'+
		'                            <div class="detail-order">'+
		'                            </div>'+
		'                            <div class="detail-money"">'+
		'                            </div>'+
		'                        </div>';
		let layoutTypeShip = '<h3>Nhận hàng trong {time}</h3>'+
		// `<p>Thời gian dự kiến giao: ${typeOrder==="orderlines_nationwide" ? '' : 'Sớm nhất có thể'}</p>`+
		'                                <p>Phí vận chuyển: {fee_ship}</p>';

		layoutTypeShip = layoutTypeShip.replace(/{time}/g, time_ship)
		layoutTypeShip = layoutTypeShip.replace(/{fee_ship}/g, formatMoney(fee_ship * 100)+"đ")

		let layoutSummary ='<div class="line-money">'+
		'                                    <p class="money-name">'+
		'                                        <span>Tạm tính</span>'+
		'                                        <span class="line-item-price">{price}</span>'+
		'                                    </p>'+
		'                                    <p class="money-name">'+
		'                                        <span>Phí vận chuyển</span>'+
		'                                        <span class="line-item-price">{fee_ship}</span>'+
		'                                    </p>'+
		'                                </div>'+
		'                                <div class="total-money">'+
		'                                    <p class="money-name">'+
		'                                        <span>Tổng tiền</span>'+
		'                                        <span class="line-item-price total">{after_discount}</span>'+
		'                                    </p>'+
		'                                </div>';

		layoutSummary = layoutSummary.replace(/{price}/g, formatMoney(price * 100)+"đ")
		layoutSummary = layoutSummary.replace(/{fee_ship}/g, formatMoney(fee_ship * 100)+"đ")
		layoutSummary = layoutSummary.replace(/{after_discount}/g, formatMoney(after_discount * 100)+"đ")

		if (data.note) {
			layoutSummary += `<div class="order-note">
								<p>
									<span>Ghi chú đơn hàng: ${data.note}</span>
								</p>
							</div>`;
		}


		let layoutListItem = '';
		const toppingRow =
				'                                    <p>'+
				'                                        <span class="line-item-quantity-invisible">0</span>'+
				'                                        <span class="line-item-topping">{topping}</span>'+
				'                                    </p>'
		const noteRow =
				'                                    <p>'+
				'                                        <span class="line-item-quantity-invisible">0</span>'+
				'                                        <span class="line-item-topping">Ghi chú: {note}</span>'+
				'                                    </p>'
		for (let i =0; i < orderlines.length; i++){
			let item = orderlines[i];
			let topping = [];
			if (item.extra.length > 1){
				for (let j = 1; j < item.extra.length ; j++){
					topping.push(item.extra[j].name)
				}
			}
			let layout = '<div class="line-item">'+
			'                                    <p>'+
			'                                        <span class="line-item-quantity">{quantity}</span>'+
			'                                        <span class="line-item-name"><b>{name}</b></span>'+
			'                                    </p>'+
			'                                    <p>'+
			'                                        <span class="line-item-quantity-invisible">0</span>'+
			'                                        <span class="line-item-size">Size: {size}</span>'+
			'                                        <span class="line-item-price">{price}</span>'+
			'                                    </p>'+
			'										{toppingRow}'+
			'										{noteRow}'+
			'                                </div>';
			layout = layout.replace(/{quantity}/g, item.quantity)
			layout = layout.replace(/{name}/g, item.name)
			layout = layout.replace(/{size}/g, item.extra.length > 0 ? item.extra[0].name : 'Mặc định')
			layout = layout.replace(/{price}/g, formatMoney(item.base_price * 100)+"đ")
			if (topping.length){
				layout = layout.replace(/{toppingRow}/g, toppingRow)
				layout = layout.replace(/{topping}/g,topping.join(','))
			} else {
				layout = layout.replace(/{toppingRow}/g,'')
			}

			if (item.note) {
				layout = layout.replace(/{noteRow}/g, noteRow)
				layout = layout.replace(/{note}/g,item.note)
			} else {
				layout = layout.replace(/{noteRow}/g,'')
			}
			layoutListItem += layout;
		}
		common = $(common);
		common.find('.type-ship').html(layoutTypeShip)
		common.find('.detail-order').html(layoutListItem)
		common.find('.detail-money').html(layoutSummary)
		return common
	}


	$('#billing_address_address1').click(function(e) {
		alert("Vui lòng quay lại giỏ hàng để thay đổi địa chỉ")
	})

    setInterval(() => {
        var delivery_info =  JSON.parse(localStorage.getItem('delivery-info'));
        $('#customer_shipping_province').val('50');
        $('#billing_address_address1').parent().parent().css('width', '100%');
        $('#billing_address_address1').val(delivery_info.full_address);
        $("#billing_address_address1").attr('readonly','true');
    }, 1000);


	var formatMoney = function(price) {
		return String(price / 100).replace(/(.)(?=(\d{3})+$)/g,'$1,');
	}
}
