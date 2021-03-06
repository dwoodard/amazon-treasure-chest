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


var o = {};
jQuery(document).ready(function ($) {

    // var script = document.createElement('script');script.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js";document.getElementsByTagName('head')[0].appendChild(script);

    loadScript('https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js');
    // loadScript('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js');

    console.clear();

    var bodySTR = jQuery('body').text();
    o.asin = getAsin();

    function getPrice() {

        if (jQuery('#priceblock_dealprice').length) {
            return jQuery('#priceblock_dealprice').text()
        }
        if (jQuery('#priceblock_saleprice').length) {
            return jQuery('#priceblock_saleprice').text()
        }
        if (jQuery('#priceblock_ourprice').length) {
            return jQuery('#priceblock_ourprice').text();
        }
        return /(?:price|deal|sale):(?:\n\s+)?(.*)/ig.exec(jQuery('body').text())[1];
    }

    function getAsin() {
        if (jQuery('.label:contains("ASIN")').length) {
            return jQuery('.label:contains("ASIN")').parent().text().replace("ASIN", "");
        }
        if (jQuery('li:contains("ASIN:")').length) {
            asin = jQuery('.label:contains("ASIN")').parent().text().replace("ASIN", "");
        }
        return /(?:\b)((?=[0-9a-z]*\d)[0-9a-z]{10})(?:\b)/ig.exec(location.href)[0];

    }

    function getWeightInOunces() {
        var unit,
            weight;

        weight = /(?:(?:item|Shipping)?\s+?Weight)(?:[\s:]{0,})?((?:\d*\.)?\d+)(?:\s)(ounces|ounce|oz|pounds|pound|lbs)/mig.exec(jQuery('body').text());
        if (weight == null) {
            return null
        }
        unit = weight[0] ? weight[0].match(/(ounces|ounce|oz|pounds|pound|lbs)/ig)[0] : null;

        if (unit.match(/pounds|pound|lbs/ig)) {
            return Number(weight[1] * 16);
        }
        return Number(weight[1]);
    }

    function getCategory() {
        var category = /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(jQuery('body').text()) ? /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(jQuery('body').text())[3].trim() : null;

        console.log("get category 1", category);
        if (category == null) {
            console.log("get category 2", category);
            jQuery.ajax({
                url: "http://www.amazon.com/dp/" + o.asin,
                async: false,
                success: function (data) {
                    var parser = new DOMParser(),
                        data = parser.parseFromString(data, "text/html");
                    data = jQuery(data)[0];
                    if (jQuery(data).find('#wayfinding-breadcrumbs_feature_div li:first').length) {
                        category = jQuery(data).find('#wayfinding-breadcrumbs_feature_div li:first').text().replace(/\s{2,}/ig, '')
                    }
                }
            });
            return category;
        }


        return category;

        if (jQuery('#wayfinding-breadcrumbs_feature_div li:first').length) {
            return jQuery('#wayfinding-breadcrumbs_feature_div li:first').text().replace(/\s{2,}/ig, '')
        }


    }

    o.title = $("#productTitle").text();
    o.price = getPrice() ? getPrice() : null;
    o.manufacturer = jQuery("#brand").text();
    o.made_by_link = jQuery("#brand").text() ? location.origin + jQuery("#brand").attr('href') : "";
    o.fba_sellers_total = null;
    o.img = jQuery('#altImages img, #thumbs-image img').length != 0 ? jQuery('#altImages img, #thumbs-image img')[0].getAttribute("src").replace(/SS40/g, "SS50") : null;
    o.price_lowest_sold = "";
    o.stars = jQuery('span[title]:contains("out of 5 stars")') ? jQuery(jQuery('span[title]:contains("out of 5 stars")')[0]).text().replace(" out of 5 stars", "") : null;
    o.url = window.location;
    o.customer_reviews_total = /(\d+) customer reviews/.exec(jQuery('#averageCustomerReviews_feature_div').text()) ? /(\d+) customer reviews/.exec(jQuery('#averageCustomerReviews_feature_div').text())[1] : null;
    o.sold_by = jQuery('#merchant-info').text().trim().replace(/\s\s/ig, '').replace(/\. .*/ig, '');
    o.new_sellers_total = /(\d+).*new\sfrom\s(.*)/.exec(jQuery('#olp_feature_div').text()) ? /(\d+).*new\sfrom\s(.*)/.exec(jQuery('#olp_feature_div').text())[1] : null;
    o.new_sellers_link = jQuery("a[href*='condition=new']").length ? location.origin + jQuery(jQuery("a[href*='condition=new']")[0]).attr('href') + "&shipPromoFilter=1" : null;
    o.item_model_number = /(Item model number.*)\w+/ig.exec(bodySTR) ? /(Item model number.*\w+)/ig.exec(bodySTR)[0].replace('Item model number', '') : null;
    o.manufacturer_part_number = /(Manufacturer Part Number.*\w+)/ig.exec(bodySTR) ? /(Manufacturer Part Number.*\w+)/ig.exec(bodySTR)[0].replace('Manufacturer Part Number', '') : null;
    o.dimensions = /(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\s(\w+)/ig.exec(bodySTR) ? /(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\sx\s(\d+(\.\d{1,2})?)?\s(\w+)/ig.exec(bodySTR)[0] : null;
    o.weight = getWeightInOunces();
    o.category = getCategory();
    o.categories = [];
    o.category_rank = /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(bodySTR) ? /(#[0-9]+(,[0-9]+)*) in (.*)\(See top/ig.exec(bodySTR)[1] : null;
    o.subcategory = jQuery('.zg_hrsr_item').text().trim().replace(/\s\n/g, '').replace(/\n/g, ';').replace(/ +/g, ' ');


    console.log('check FBA users');
    var postDataLink = 'http://atc.dustinwoodard.net/scriptlet';
    //var postDataLink = 'http://dev.atc.dustinwoodard.net/scriptlet';


    function isValid(data) {

        function isEmpty(val) {
            return !!(val === false || val === undefined || val == null || val.length <= 0);
        }

        validate = {};
        validate.state = true;
        validate.title = data.title;
        validate.asin = data.asin;
        validate.price = data.price;
        validate.fba_sellers_total = data.fba_sellers_total;
        if (isEmpty(data.title)) validate.state = false;
        if (isEmpty(data.asin)) validate.state = false;
        if (isEmpty(data.price)) validate.state = false;
        if (isEmpty(data.fba_sellers_total)) validate.state = false;
        // console.log("Valid:" + validate.state, validate)
        return validate.state;
    }

    //check for sells for fba
    jQuery.ajax({
        url: "http://www.amazon.com/gp/offer-listing/" + o.asin + "/ref=olp_sort_tax?ie=UTF8&shipPromoFilter=1&sort=taxsip",
        error: function () {
            o.fba_sellers_total = false;
            console.log('FBA link for users didnt exsist');
            console.log(o)
        }
    }).success(function (data) {

        var result = $(data).find('.olpOffer');
        o.price_lowest_sold = /new from\s(\$\d+\.\d+).*/ig.exec($(data).find('#olpTabNew a').text()) ? /new from\s(\$\d+\.\d+).*/ig.exec($(data).find('#olpTabNew a').text())[1] : null;
        o.fba_sellers_total = result.length;


        //get Current Category totals
        jQuery.ajax({
            url: 'http://www.amazon.com/s/ref=nb_sb_noss/?url=' + jQuery('.searchSelect [selected]').val(),
            context: document.getElementsByClassName('categoryRefinementsSection'),
            async: false,
            cache: false,
            timeout: 7000,
            dataType: "html",
            error: function () {
                return true;
            }
        }).success(function (data) {
            var parser = new DOMParser(),
                data = parser.parseFromString(data, "text/html");

            data = jQuery(data)[0];
            categoryData = jQuery(data).find('.categoryRefinementsSection li:gt(0)');
            category = [];

            o.CategoryMain = jQuery(data).find('.categoryRefinementsSection li:eq(0)').text();

            jQuery.each(categoryData, function (key, el) {
                var catName = jQuery(el).find('.refinementLink').text();
                var catVal = jQuery(el).find('.narrowValue').text();
                category[key] = {"name": catName, "value": catVal.replace(/[^0-9]+/g, "")}
            });

            o.categories = JSON.stringify(category)
        })

    }).complete(function () {
        console.log(o);
        isValid(o);
        jQuery.post(postDataLink, {
            "title": o.title,
            "asin": o.asin,
            "price": o.price,
            "manufacturer": o.manufacturer,
            "made_by_link": o.made_by_link,
            "stars": o.stars,
            "fba_sellers_total": o.fba_sellers_total,
            "img": o.img,
            "price_lowest_sold": o.price_lowest_sold,
            "url": o.url,
            "customer_reviews_total": o.customer_reviews_total,
            "sold_by": o.sold_by,
            "new_sellers_total": o.new_sellers_total,
            "new_sellers_link": o.new_sellers_link,
            "item_model_number": o.item_model_number,
            "manufacturer_part_number": o.manufacturer_part_number,
            "dimensions": o.dimensions,
            "weight": o.weight,
            "category": o.category,
            "category_main": o.CategoryMain,
            "categories": o.categories,
            "category_rank": o.category_rank,
            "subcategory": o.subcategory
        }).done(function () {
            console.log('Data Sent');
            if (isValid(o)) {
                $('<div id="atcHUD" style="position:fixed;top:0;width:100%;height:10px;background:#00d500;z-index:999">').appendTo('body')

            } else {
                $('<div id="atcHUD" style="position:fixed;top:0;width:100%;height:10px;background:red;z-index:999">').appendTo('body')
            }
        });

    })


});