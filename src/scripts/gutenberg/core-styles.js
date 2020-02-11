( function( blocks, editor, i18n, element, components, _ ) {


	// Параграф

	wp.blocks.registerBlockStyle( "core/paragraph", {
		name: 'text-primary',
		label: i18n.__( 'Text Primary', 'act_theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/paragraph", {
		name: 'text-success',
		label: i18n.__( 'Text Success', 'act_theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/paragraph", {
		name: 'text-info',
		label: i18n.__( 'Text Info', 'act_theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/paragraph", {
		name: 'text-warning',
		label: i18n.__( 'Text Warning', 'act_theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/paragraph", {
		name: 'text-danger',
		label: i18n.__( 'Text Danger', 'act_theme' ),
	} );


	// Таблицы

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-default',
		label: i18n.__( 'Table Default', 'act_theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-primary',
		label: i18n.__( 'Table Primary', 'act_theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-success',
		label: i18n.__( 'Table Success', 'act_theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-warning',
		label: i18n.__( 'Table Warning', 'act_theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-danger',
		label: i18n.__( 'Table Danger', 'act_theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-info',
		label: i18n.__( 'Table Info', 'act_theme' ),
	} );



} )(
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components,
	window._,
);