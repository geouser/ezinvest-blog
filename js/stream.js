jQuery(document).ready(function($) {

	var currentPrice = {};
	var socket = io.connect('https://streamer.cryptocompare.com/');
	//Format: {SubscriptionId}~{ExchangeName}~{FromSymbol}~{ToSymbol}
	//Use SubscriptionId 0 for TRADE, 2 for CURRENT and 5 for CURRENTAGG
	//For aggregate quote updates use CCCAGG as market
	var subscription = [];
	$('.tv-widget-ticker').find('.tv-widget-ticker-item').each(function(index, el) {
		subscription[index] = $(this).attr('data-subscription');
	});

	socket.emit('SubAdd', { subs: subscription });
	socket.on("m", function(message) {
		var messageType = message.substring(0, message.indexOf("~"));
		var res = {};
		if (messageType == CCC.STATIC.TYPE.CURRENTAGG) {
			res = CCC.CURRENT.unpack(message);
			dataUnpack(res);
		}
	});

	var dataUnpack = function(data) {
		var from = data['FROMSYMBOL'];
		var to = data['TOSYMBOL'];
		var fsym = CCC.STATIC.CURRENCY.getSymbol(from);
		var tsym = CCC.STATIC.CURRENCY.getSymbol(to);
		var pair = from + to;
		//console.log(data);
		if (!currentPrice.hasOwnProperty(pair)) {
			currentPrice[pair] = {};
		}

		for (var key in data) {
			currentPrice[pair][key] = data[key];
		}

		if (currentPrice[pair]['LASTTRADEID']) {
			currentPrice[pair]['LASTTRADEID'] = parseInt(currentPrice[pair]['LASTTRADEID']).toFixed(0);
		}
		currentPrice[pair]['CHANGE24HOUR'] = CCC.convertValueToDisplay(tsym, (currentPrice[pair]['PRICE'] - currentPrice[pair]['OPEN24HOUR']));
		currentPrice[pair]['CHANGE24HOURPCT'] = ((currentPrice[pair]['PRICE'] - currentPrice[pair]['OPEN24HOUR']) / currentPrice[pair]['OPEN24HOUR'] * 100).toFixed(2) + "%";;
		displayData(currentPrice[pair], from, tsym, fsym);
	};

	var displayData = function(current, from, tsym, fsym) {
		//console.log(current);
		var priceDirection = current.FLAGS;

		if ( current['FROMSYMBOL'] == 'SPX' ) {
			console.log(current);
		}

		var container = $('.' + current['FROMSYMBOL'] + current['TOSYMBOL']);
		$('.tv-widget-ticker').removeClass('disabled').addClass('enabled');
		
		var current_price = current['PRICE'];
		var hour_start = current['OPENHOUR'];
		var hour_change = current_price - hour_start;
		var hour_change_pct = (current_price*100)/hour_start - 100;
		var hour_change_pct = hour_change_pct.toFixed(2);

		container.find('.js-symbol-last').text( current_price );
		container.find('.js-symbol-change-pt').text( Math.abs(hour_change_pct) + '%' );
		container.find('.js-symbol-change').text( hour_change.toFixed(2) );


		container.find('.js-symbol-last').removeClass('tv-widget-ticker-item__last--growing tv-widget-ticker-item__last--falling');
		if (priceDirection & 1) {
			container.find('.js-symbol-last').addClass("tv-widget-ticker-item__last--growing");
		}
		else if (priceDirection & 2) {
			container.find('.js-symbol-last').addClass("tv-widget-ticker-item__last--falling");
		}

		setTimeout(function(){
			container.find('.js-symbol-last').removeClass('tv-widget-ticker-item__last--growing tv-widget-ticker-item__last--falling');
		}, 1000);

		if ( current_price > hour_start ) {
			container.find('.tv-widget-ticker-item__body').removeClass('tv-widget-ticker-item__body--down tv-widget-ticker-item__body--up');
			container.find('.tv-widget-ticker-item__body').addClass("tv-widget-ticker-item__body--up");
		}
		else if ( current_price < hour_start ) {
			container.find('.tv-widget-ticker-item__body').removeClass('tv-widget-ticker-item__body--down tv-widget-ticker-item__body--up');
			container.find('.tv-widget-ticker-item__body').addClass("tv-widget-ticker-item__body--down");
		}
	};
});