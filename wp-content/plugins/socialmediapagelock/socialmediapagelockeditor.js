(function() {
	tinymce.create('tinymce.plugins.smplbuttonPlugin', {
		init : function(edsmpl, url) {
			// Register commands
			edsmpl.addCommand('socialmediapagelockmcebutton', function() {
				edsmpl.windowManager.open({
					title : 'Add SocialMediaPageLockEditor Button',
					file : url + '/socialmediapagelockeditor_manager.php', // file that contains HTML for our modal window
					width : 1000 + parseInt(edsmpl.getLang('button.delta_width', 0)), // size of our window
					height : 800 + parseInt(edsmpl.getLang('button.delta_height', 0)), // size of our window
					inline : 1
				}, {
					plugin_url : url
				});
			});
			 
			// Register buttons
			edsmpl.addButton('socialmediapagelockeditor_button', {title : 'Social Media Page Lock', cmd : 'socialmediapagelockmcebutton', image: url + '/includes/images/socialmediapagelockeditor.png' });
		},
		 
		getInfo : function() {
			return {
				longname : 'SocialMediaPageLock Editor',
				author : 'Veena Prashanth',
				authorurl : 'http://WickedCoolPlugins.com',
				infourl : 'http://WickedCoolPlugins.com',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});
	 
	// Register plugin
	// first parameter is the button ID and must match ID elsewhere
	// second parameter must match the first parameter of the tinymce.create() function above
	tinymce.PluginManager.add('socialmediapagelockeditor_button', tinymce.plugins.smplbuttonPlugin);

})();