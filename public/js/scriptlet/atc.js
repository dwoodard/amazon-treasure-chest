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

jQuery( document ).ready(function($,atc) {
    console.log( "ready!" );



    var bodySTR = jQuery('body').text();

	var o = {};
	o.url = window.location;

	o.product_productTitle = $("#productTitle").text();
	o.product_price = $("#priceblock_ourprice").text();
	o.product_madeBy = $("#brand").text();
	o.product_madeByLink = $("#brand").attr('href');


	o.customers_totalCustomerReviews = /(\d+\sreview(s)?)/ig.exec(bodySTR) ? /(\d+\sreview(s)?)/ig.exec(bodySTR)[0] : null;



	o.merchantInfo_hasMerchantInfo = $("#merchant-info a").length;
	o.merchantInfo_newSellers_total = $("a[href*='condition=new']").parent().text().split('from')[0];
	o.merchantInfo_newSellers_link = jQuery("a[href*='condition=new']").length ? location.origin + jQuery(jQuery("a[href*='condition=new']")[0]).attr('href') + "&shipPromoFilter=1":null;
	o.merchantInfo_newSellers_lowestSellingPrice = $("a[href*='condition=new']").parent().text().split('from')[1];
	o.merchantInfo_usedSellers_total = $("a[href$='condition=used']").parent().text().split('from')[0];
	o.merchantInfo_usedSellers_lowestSellingPrice = $("a[href$='condition=used']").parent().text().split('from')[1];



	o.merchantInfo_soldBy = $("#merchant-info a[href*=seller]").text();
	o.merchantInfo_isFBA = $("#merchant-info a[href*=customer]:contains('Fulfilled by Amazon')").length;
	o.merchantInfo_fulfilledBy = o.merchantInfo_isFBA ? $("#merchant-info a[href*=customer]").text() : false;
	o.merchantInfo_SellerFBACount = 0;


	o.product_details_dimensions = /(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\s(\w+)/ig.exec(bodySTR) ? /(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\s(\w+)/ig.exec(bodySTR)[0] : null;
	o.product_details_shippingWeight = /(Shipping Weight\s?.*\d+(\.\d{1,2})?\s(ounces|pounds))/ig.exec(bodySTR) ? /(Shipping Weight\s?.*\d+(\.\d{1,2})?\s(ounces|pounds))/ig.exec(bodySTR)[0].replace('Shipping Weight','') : null
	o.product_details_ASIN = /(?:\b)((?=[0-9a-z]*\d)[0-9a-z]{10})(?:\b)/ig.exec(location.href)[0];
	o.product_details_ItemModelNumber = /(Item model number.*)\w+/ig.exec(jQuery('body').text()) ? /(Item model number.*\w+)/ig.exec(jQuery('body').text())[0].replace('Item model number','') : null;
	o.product_details_manufacturerPartNumber = /(Manufacturer Part Number.*\w+)/ig.exec(jQuery('body').text()) ? /(Manufacturer Part Number.*\w+)/ig.exec(jQuery('body').text())[0].replace('Manufacturer Part Number','') : null;


	o.product_details_category_rank = /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(jQuery('body').text()) ? /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(jQuery('body').text())[1] :null;
	o.product_details_category_category = /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(jQuery('body').text()) ? /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(jQuery('body').text())[3] :null;

	o.product_details_subcategory_category =  jQuery('.zg_hrsr_item').text().trim().replace(/\s\n/g, '').replace(/\n/g, ';').replace(/ +/g, ' ')


	console.log('check FBA users')


	var postDataLink = 'http://dev.atc.dustinwoodard.net/scriptlet'

	//check for sells for fba
		jQuery.ajax({
			url:o.merchantInfo_newSellers_link
		}).error(function(data){
			console.log(data);
			o.merchantInfo_SellerFBACount = 'failed';

			jQuery.post(postDataLink, o)
			.done(function(data){
				console.log(data)
			})
		}).success(function(data){
			var result = $(data).find('.olpOffer');
			o.merchantInfo_SellerFBACount = result.length;
			console.log(result);
			console.log(o.merchantInfo_SellerFBACount);
			console.log('got FBA users')

			jQuery.post(postDataLink, o)
			.done(function(data){
				console.log(data)
			})
		});






});