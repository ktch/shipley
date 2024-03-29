(function($) {

/**
 * Handle Generator
 */
Blocks.ui.HandleGenerator = Blocks.ui.InputGenerator.extend({

	generateTargetValue: function(sourceVal)
	{
		// Remove HTML tags
		var handle = sourceVal.replace("/<(.*?)>/g", '');

		// Make it lowercase
		handle = handle.toLowerCase();

		// Convert extended ASCII characters to basic ASCII
		handle = Blocks.asciiString(handle);

		// Handle must start with a letter
		handle = handle.replace(/^[^a-z]+/, '');

		// Get the "words"
		var words = Blocks.filterArray(handle.split(/[^a-z0-9]+/)),
			handle = '';

		// Make it camelCase
		for (var i = 0; i < words.length; i++)
		{
			if (i == 0)
			{
				handle += words[i];
			}
			else
			{
				handle += words[i].charAt(0).toUpperCase()+words[i].substr(1);
			}
		}

		return handle;
	}
});

})(jQuery);
