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
var atc;
jQuery( document ).ready(function($,atc) {
    console.log( "ready!" );





	var o = {};
	o.url = window.location;

	o.product_productTitle = $("#productTitle").text();
	o.product_price = $("#priceblock_ourprice").text();
	o.product_madeBy = $("#brand").text();


	o.customers_totalCustomerReviews = /[0-9]+(,[0-9]+)*/ig.exec($("#acrCustomerReviewText").text())[0];



	o.merchantInfo_hasMerchantInfo = $("#merchant-info a").length;
	o.merchantInfo_newSellers_total = $("a[href*='condition=new']").parent().text().split('from')[0];
	o.merchantInfo_newSellers_link = location.origin + $($("a[href*='condition=new']")[0]).attr('href') + "&shipPromoFilter=1";
	o.merchantInfo_newSellers_lowestSellingPrice = $("a[href*='condition=new']").parent().text().split('from')[1];
	o.merchantInfo_usedSellers_total = $("a[href$='condition=used']").parent().text().split('from')[0];
	o.merchantInfo_usedSellers_lowestSellingPrice = $("a[href$='condition=used']").parent().text().split('from')[1];



	o.merchantInfo_soldBy = $("#merchant-info a[href*=seller]").text();
	o.merchantInfo_isFBA = $("#merchant-info a[href*=customer]:contains('Fulfilled by Amazon')").length;
	o.merchantInfo_fulfilledBy = o.merchantInfo_isFBA ? $("#merchant-info a[href*=customer]").text() : false;
	o.merchantInfo_SellerFBACount = 0;


	o.product_details_dimensions = /Product Dimensions:\s+(.*)/ig.exec($("li:contains('Product Dimensions:')").text())[1];
	o.product_details_shippingWeight = /Shipping Weight:\s+(.*)/ig.exec($("li:contains('Shipping Weight')").text().replace(' (View shipping rates and policies)', ''))[1];
	o.product_details_ASIN = /ASIN: (.*)/ig.exec($("*:contains('ASIN:')").text())[1];
	o.product_details_ItemModelNumber = /Item model number:\s+(.*)/ig.exec($("li:contains('Item model number:')").text())[1];


	o.product_details_category_rank = /Amazon Best Sellers Rank:\s+(#\d+ in.* \()/ig.exec($("li:contains('Amazon Best Sellers Rank:')").text())[1].replace(' (', '');
	o.product_details_category_category = /Amazon Best Sellers Rank:\s+(#\d+ in.* \()/ig.exec($("li:contains('Amazon Best Sellers Rank:')").text())[1].replace(' (', '');


	o.product_details_subcategory_rank = $(".zg_hrsr_rank").text();
	o.product_details_subcategory_category =  $(".zg_hrsr_ladder").text();
	o.product_details_subcategory_category_details = $(".zg_hrsr_ladder a");

	atc = o;

	//check for sells for fba
	$.ajax(
	{
		url:o.merchantInfo_newSellers_link
	})
	.success(function(data){
		var result = $(data).find('.olpOffer');
		o.merchantInfo_SellerFBACount = result.length;
		console.log(result);
		console.log(o.merchantInfo_SellerFBACount);


		$.post('http://dev.atc.dustinwoodard.net/scriptlet', o)
		.done(function(data){
			console.log(data)
		})
	});
});