( function( api ) {
	// Extends our custom "bloghub" section.
	api.sectionConstructor['bloghub-upsell'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );