/*///////////////////////////////////////////////////////////////////////Ported to jquery from prototype by Joel Lisenby (joel.lisenby@gmail.com)http://joellisenby.comoriginal prototype code by Aarron Walter (aarron@buildingfindablewebsites.com)http://buildingfindablewebsites.comDistrbuted under Creative Commons licensehttp://creativecommons.org/licenses/by-sa/3.0/us////////////////////////////////////////////////////////////////////////*/jQuery(document).ready(function() {	jQuery('#faucet-form').submit(function(event) {        event.preventDefault();        // update user interface		jQuery('#response').html('<span class="notice_message">Contacting GryfenCoin...</span>');        var action = jQuery(this).attr('action');        jQuery.post(action, {                gaddress: jQuery('#gryfen-address').val()            },            function(msg){                if (msg.indexOf("Success") !=-1) {                    jQuery('#response').html('<span class="success_message">Great! You will receive your coins soon!</span>');                } else {                    jQuery('#response').html('<span class="error_message">' + msg + '</span>');                }            }        );			return false;	});});