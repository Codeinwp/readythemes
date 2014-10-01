(function($) {
	$(document).ready(function(){
		var fbusername = $( "#fbusername" );
		var allFields = $( [] ).add( fbusername );
		var tips = $(".validateTips");
		$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 230,
			width: 400,
			modal: true,
			buttons: {
				"Get Facebook ID": function() {
					allFields.removeClass( "ui-state-error" );
					if(checkLength( fbusername, "username", 4, 72 )){
						$.ajax({
							url: pluginurl,
							type: 'GET',
							data: "facebookusername="+fbusername.val(),
							success: function(res) {
								$("#fb_admins").val(res);
								$( "#dialog-form" ).dialog( "close" );
							}
						});
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		
		$( "#getfacebookid" ).button().click(function() {
				$( "#dialog-form" ).dialog( "open" );
		});
		
		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "Length of " + n + " must be between " +
					min + " and " + max + "." );
				return false;
			} else {
				return true;
			}
		}
	
		function updateTips( t ) {
			tips.text( t ).addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}
	});
})(jQuery);