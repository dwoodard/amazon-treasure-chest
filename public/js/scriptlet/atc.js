/*
*                      █████╗ ███╗   ███╗ █████╗ ███████╗ ██████╗ ███╗   ██╗
*                     ██╔══██╗████╗ ████║██╔══██╗╚══███╔╝██╔═══██╗████╗  ██║
*                     ███████║██╔████╔██║███████║  ███╔╝ ██║   ██║██╔██╗ ██║
*                     ██╔══██║██║╚██╔╝██║██╔══██║ ███╔╝  ██║   ██║██║╚██╗██║
*                     ██║  ██║██║ ╚═╝ ██║██║  ██║███████╗╚██████╔╝██║ ╚████║
*                     ╚═╝  ╚═╝╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═╝  ╚═══╝
*
* ████████╗██████╗ ███████╗ █████╗ ███████╗██╗   ██╗██████╗ ███████╗     ██████╗██╗  ██╗███████╗███████╗████████╗
* ╚══██╔══╝██╔══██╗██╔════╝██╔══██╗██╔════╝██║   ██║██╔══██╗██╔════╝    ██╔════╝██║  ██║██╔════╝██╔════╝╚══██╔══╝
*    ██║   ██████╔╝█████╗  ███████║███████╗██║   ██║██████╔╝█████╗      ██║     ███████║█████╗  ███████╗   ██║
*    ██║   ██╔══██╗██╔══╝  ██╔══██║╚════██║██║   ██║██╔══██╗██╔══╝      ██║     ██╔══██║██╔══╝  ╚════██║   ██║
*    ██║   ██║  ██║███████╗██║  ██║███████║╚██████╔╝██║  ██║███████╗    ╚██████╗██║  ██║███████╗███████║   ██║
*    ╚═╝   ╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═╝  ╚═╝╚══════╝     ╚═════╝╚═╝  ╚═╝╚══════╝╚══════╝   ╚═╝
*								Created By Dustin Woodard
*/


// var script = document.createElement('script');script.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js";document.getElementsByTagName('head')[0].appendChild(script);


jQuery( document ).ready(function($) {
	loadScript('https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js');
	console.clear()
    console.log( "ready!" );




    var bodySTR = $('body').text();

	var o = {};
	o.url = window.location;

	o.product_productTitle = $("#productTitle").text();
	o.product_price = $("#priceblock_ourprice").text();
	o.product_madeBy = $("#brand").text();
	o.product_madeByLink = location.origin + $("#brand").attr('href');

	o.customers_totalCustomerReviews = /(\d+\sreview(s)?)/ig.exec(bodySTR) ? /(\d+\sreview(s)?)/ig.exec(bodySTR)[0] : null;

	o.merchantInfo_hasMerchantInfo = $("#merchant-info a").length;
	o.merchantInfo_newSellers_total = /(\d+).*new\sfrom\s(.*)/.exec(jQuery('#olp_feature_div').text()) ? /(\d+).*new\sfrom\s(.*)/.exec(jQuery('#olp_feature_div').text())[1] : null;
	o.merchantInfo_newSellers_link = jQuery("a[href*='condition=new']").length ? location.origin + jQuery(jQuery("a[href*='condition=new']")[0]).attr('href') + "&shipPromoFilter=1":null;
	o.merchantInfo_newSellers_lowestSellingPrice = /(\d+).*new\sfrom\s(.*)/.exec(jQuery('#olp_feature_div').text()) ? /(\d+).*new\sfrom\s(.*)/.exec(jQuery('#olp_feature_div').text())[2] : null;

	o.merchantInfo_soldBy = jQuery('#merchant-info').text().trim().replace(/\s\s/ig,'').replace(/\. .*/ig,'');
	o.merchantInfo_soldBySeller = jQuery("#merchant-info a[href*=seller]").text();
	o.merchantInfo_fulfilledBy = jQuery("#merchant-info a[href*=customer]").text();
	o.merchantInfo_isFBA = $("#merchant-info a[href*=customer]:contains('Fulfilled by Amazon')").length;
	o.merchantInfo_fulfilledBy = o.merchantInfo_isFBA ? $("#merchant-info a[href*=customer]").text() : false;
	o.merchantInfo_SellerFBACount = false;

	o.product_details_dimensions = /(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\s(\w+)/ig.exec(bodySTR) ? /(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\s(\w+)/ig.exec(bodySTR)[0] : null;
	o.product_details_shippingWeight = /(Shipping Weight\s?.*\d+(\.\d{1,2})?\s(ounces|pounds))/ig.exec(bodySTR) ? /(Shipping Weight\s?.*\d+(\.\d{1,2})?\s(ounces|pounds))/ig.exec(bodySTR)[0].replace('Shipping Weight','') : null
	o.product_details_ASIN = /(?:\b)((?=[0-9a-z]*\d)[0-9a-z]{10})(?:\b)/ig.exec(location.href)[0];
	o.product_details_ItemModelNumber = /(Item model number.*)\w+/ig.exec(bodySTR) ? /(Item model number.*\w+)/ig.exec(bodySTR)[0].replace('Item model number','') : null;
	o.product_details_manufacturerPartNumber = /(Manufacturer Part Number.*\w+)/ig.exec(bodySTR) ? /(Manufacturer Part Number.*\w+)/ig.exec(bodySTR)[0].replace('Manufacturer Part Number','') : null;

	o.product_details_category_rank = /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(bodySTR) ? /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(bodySTR)[1] :null;
	o.product_details_category_category = /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(bodySTR) ? /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(bodySTR)[3] :null;

	o.product_details_subcategory_category =  jQuery('.zg_hrsr_item').text().trim().replace(/\s\n/g, '').replace(/\n/g, ';').replace(/ +/g, ' ')


	console.log('check FBA users')
	var postDataLink = 'http://atc.dustinwoodard.net/scriptlet'


	function isValid(data){

		function isEmpty(val){
		return (val === false || val === undefined || val == null || val.length <= 0) ? true : false;
		}

		validate = {}
		validate.state = true;
		validate.product_productTitle =  data.product_productTitle
		validate.product_details_ASIN =  data.product_details_ASIN
		validate.product_price =  data.product_price
		validate.merchantInfo_SellerFBACount =  data.merchantInfo_SellerFBACount


		if (isEmpty(data.product_productTitle)) {
			validate.state = false;
		};
		if (isEmpty(data.product_details_ASIN)) {
			validate.state = false;
		};
		if (isEmpty(data.product_price)) {
			validate.state = false;
		};
		if (isEmpty(data.merchantInfo_SellerFBACount)) {
			validate.state = false;
		};
		console.log("Valid:" + validate.state)
		return validate.state;
	}


	console.log(o);
	//check for sells for fba
	jQuery.ajax({
			url:o.merchantInfo_newSellers_link
		}).error(function(data){

			console.log(data);
			o.merchantInfo_SellerFBACount = false;
			isValid(o)
			console.log('FBA link for users didnt exsist')
			console.log(o)

		}).success(function(data){
			var result = $(data).find('.olpOffer');
			o.merchantInfo_SellerFBACount = result.length  ;
		})
		.complete(function(){
			isValid(o)

			console.log('all done! Send Data')

			jQuery.post(postDataLink, {
				"product_productTitle": o.product_productTitle,
				"product_price": o.product_price,
				"product_madeBy": o.product_madeBy,
				"product_madeByLink": o.product_madeByLink,
				"customers_totalCustomerReviews": o.customers_totalCustomerReviews,
				"merchantInfo_hasMerchantInfo": o.merchantInfo_hasMerchantInfo,
				"merchantInfo_newSellers_total": o.merchantInfo_newSellers_total,
				"merchantInfo_newSellers_link": o.merchantInfo_newSellers_link,
				"merchantInfo_newSellers_lowestSellingPrice": o.merchantInfo_newSellers_lowestSellingPrice,
				"merchantInfo_soldBy": o.merchantInfo_soldBy,
				"merchantInfo_soldBySeller": o.merchantInfo_soldBySeller,
				"merchantInfo_fulfilledBy": o.merchantInfo_fulfilledBy,
				"merchantInfo_isFBA": o.merchantInfo_isFBA,
				"merchantInfo_SellerFBACount": o.merchantInfo_SellerFBACount,
				"product_details_dimensions": o.product_details_dimensions,
				"product_details_shippingWeight": o.product_details_shippingWeight,
				"product_details_ASIN": o.product_details_ASIN,
				"product_details_ItemModelNumber": o.product_details_ItemModelNumber,
				"product_details_manufacturerPartNumber": o.product_details_manufacturerPartNumber,
				"product_details_category_rank": o.product_details_category_rank,
				"product_details_category_category": o.product_details_category_category,
				"product_details_subcategory_category": o.product_details_subcategory_category
			})
			// .done(function(data){
			// 		// console.log($.parseJSON(data))
			// 	})
			.done(function(){
				console.log('Data Sent')

				if (isValid(o)) {
					$('<div id="atcHUD" style="position:fixed;top:0;width:100%;height:10px;background:green;z-index:999">').appendTo('body')

				}else{
					$('<div id="atcHUD" style="position:fixed;top:0;width:100%;height:10px;background:red;z-index:999">').appendTo('body')
				}
			});

		})











});