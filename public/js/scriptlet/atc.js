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
*/


// var script = document.createElement('script');script.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js";document.getElementsByTagName('head')[0].appendChild(script);

	var o = {};
jQuery( document ).ready(function($) {
	loadScript('https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js');
	console.clear()
    console.log( "ready!" );




    var bodySTR = $('body').text();


    function getPrice(){

    	if (jQuery('#priceblock_dealprice').length) {
    		return jQuery('#priceblock_dealprice').text()
    	};
    	if (jQuery('#priceblock_saleprice').length) {
    		return jQuery('#priceblock_saleprice').text()
    	};
    	if (jQuery('#priceblock_ourprice').length) {
	    	return jQuery('#priceblock_ourprice').text();
    	};
    	return /(?:price|deal|sale):(?:\n\s+)?(.*)/ig.exec(jQuery('body').text())[1];
    }

    function getAsin(){
    	if (jQuery('.label:contains("ASIN")').length) {
    		return jQuery('.label:contains("ASIN")').parent().text().replace("ASIN","");
    	};

    	if (jQuery('li:contains("ASIN:")').length) {
    		asin = jQuery('.label:contains("ASIN")').parent().text().replace("ASIN","");
    	};

    	return /(?:\b)((?=[0-9a-z]*\d)[0-9a-z]{10})(?:\b)/ig.exec(location.href)[0];

    }

	o.title = $("#productTitle").text();
	o.asin = getAsin() ? getAsin() : null
	o.price = getPrice() ? getPrice() : null;
	o.manufacturer = jQuery("#brand").text();
	o.made_by_link = jQuery("#brand").text() ? location.origin + jQuery("#brand").attr('href') : ""
	o.fba_sellers_total = null;
	o.price_lowest_sold = "";
	o.stars = jQuery(jQuery('span[title]:contains("out of 5 stars")')[0]).text()
	o.url = window.location;
	o.customer_reviews_total = /(\d+) customer reviews/.exec(jQuery('#averageCustomerReviews_feature_div').text()) ? /(\d+) customer reviews/.exec(jQuery('#averageCustomerReviews_feature_div').text())[0] : null;
	o.sold_by = jQuery('#merchant-info').text().trim().replace(/\s\s/ig,'').replace(/\. .*/ig,'');
	o.new_sellers_total = /(\d+).*new\sfrom\s(.*)/.exec(jQuery('#olp_feature_div').text()) ? /(\d+).*new\sfrom\s(.*)/.exec(jQuery('#olp_feature_div').text())[1] : null;
	o.new_sellers_link = jQuery("a[href*='condition=new']").length ? location.origin + jQuery(jQuery("a[href*='condition=new']")[0]).attr('href') + "&shipPromoFilter=1":null;
	o.item_model_number = /(Item model number.*)\w+/ig.exec(bodySTR) ? /(Item model number.*\w+)/ig.exec(bodySTR)[0].replace('Item model number','') : null;
	o.manufacturer_part_number = /(Manufacturer Part Number.*\w+)/ig.exec(bodySTR) ? /(Manufacturer Part Number.*\w+)/ig.exec(bodySTR)[0].replace('Manufacturer Part Number','') : null;
	o.dimensions = /(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\s(\w+)/ig.exec(bodySTR) ? /(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\s(\w+)/ig.exec(bodySTR)[0] : null;
	o.weight = /(Shipping Weight\s?.*\d+(\.\d{1,2})?\s(ounces|pounds))/ig.exec(bodySTR) ? /(Shipping Weight\s?.*\d+(\.\d{1,2})?\s(ounces|pounds))/ig.exec(bodySTR)[0].replace('Shipping Weight','') : null
	o.category = /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(bodySTR) ? /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(bodySTR)[3] :null;
	o.category_rank = /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(bodySTR) ? /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(bodySTR)[1] :null;
	o.subcategory =  jQuery('.zg_hrsr_item').text().trim().replace(/\s\n/g, '').replace(/\n/g, ';').replace(/ +/g, ' ')


	console.log('check FBA users')
	var postDataLink = 'http://dev.atc.dustinwoodard.net/scriptlet';


	function isValid(data){

		function isEmpty(val){
		return (val === false || val === undefined || val == null || val.length <= 0) ? true : false;
		}

		validate = {}
		validate.state = true;
		validate.title =  data.title
		validate.asin =  data.asin
		validate.price =  data.price
		validate.fba_sellers_total =  data.fba_sellers_total


		if (isEmpty(data.title)) {
			validate.state = false;
		};
		if (isEmpty(data.asin)) {
			validate.state = false;
		};
		if (isEmpty(data.price)) {
			validate.state = false;
		};
		if (isEmpty(data.fba_sellers_total)) {
			validate.state = false;
		};
		console.log("Valid:" + validate.state, validate)
		return validate.state;
	}


	console.log(o);
	//check for sells for fba
	jQuery.ajax({
			url:"http://www.amazon.com/gp/offer-listing/"+o.asin+"/ref=olp_sort_tax?ie=UTF8&shipPromoFilter=1&sort=taxsip"
		}).error(function(data){

			console.log(data);
			o.fba_sellers_total = false;
			isValid(o)
			console.log('FBA link for users didnt exsist')
			console.log(o)

		}).success(function(data){
			var result = $(data).find('.olpOffer');
			o.price_lowest_sold = /new from\s(\$\d+\.\d+).*/ig.exec($(data).find('#olpTabNew a').text()) ? /new from\s(\$\d+\.\d+).*/ig.exec($(data).find('#olpTabNew a').text())[1] : null;
			o.fba_sellers_total = result.length;
		})
		.complete(function(){
			isValid(o)
			jQuery.post(postDataLink, {
				"title":o.title,
				"asin":o.asin,
				"price":o.price,
				"manufacturer":o.manufacturer,
				"made_by_link":o.made_by_link,
				"stars":o.stars,
				"fba_sellers_total":o.fba_sellers_total,
				"price_lowest_sold":o.price_lowest_sold,
				"url":o.url,
				"customer_reviews_total":o.customer_reviews_total,
				"sold_by":o.sold_by,
				"new_sellers_total":o.new_sellers_total,
				"new_sellers_link":o.new_sellers_link,
				"item_model_number":o.item_model_number,
				"manufacturer_part_number":o.manufacturer_part_number,
				"dimensions":o.dimensions,
				"weight":o.weight,
				"category":o.category,
				"category_rank":o.category_rank,
				"subcategory":o.subcategory
			})
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