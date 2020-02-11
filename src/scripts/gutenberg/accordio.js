( function( blocks, editor, i18n, element, components, _ ) {
	var el              = element.createElement,
		InnerBlocks     = editor.InnerBlocks,
		SelectControl   = wp.components.SelectControl,
		RichText        = editor.RichText;

	blocks.registerBlockType( 'pstu-theme/accordio', {
		title: i18n.__( 'Аккордеон', 'act_theme' ),
		description: i18n.__( 'PSTU Текстовый блок аналог Boootstrap блока "well".', 'act_theme' ),
		keywords: [
			i18n.__( 'ПГТУ', 'act_theme' ),
			i18n.__( 'аккордеон', 'act_theme' ),
			i18n.__( 'список', 'act_theme' ),
			i18n.__( 'контейнер', 'act_theme' ),
		],
		icon: 'editor-justify',
		category: 'layout',
		
		attributes: {
			level: {
				type: 'string',
				source: 'attribute',
				selector: '.accordio',
				attribute: 'data-heading',
				default: 'h2',
			},
		},

		supports: {
			customClassName: true,
			html: false,
		},

		styles: [
			{
				name: 'accordio-default',
				label:i18n. __( 'Стандартный', 'act_theme' ),
				isDefault: true
			},
			{
				name: 'accordio-primary',
				label: i18n.__( 'Primary', 'act_theme' ),
				isDefault: false
			},
			{
				name: 'accordio-success',
				label: i18n.__( 'Success', 'act_theme' ),
				isDefault: false
			},
			{
				name: 'accordio-warning',
				label: i18n.__( 'Warning', 'act_theme' ),
				isDefault: false
			},
			{
				name: 'accordio-danger',
				label: i18n.__( 'Danger', 'act_theme' ),
				isDefault: false
			},
			{
				name: 'accordio-info',
				label: i18n.__( 'Info', 'act_theme' ),
				isDefault: false
			},
		],

		edit: function( props ) {
			return el( 'div', { className: 'accordio ' + props.className, 'role': 'list' },
				el( wp.editor.InspectorControls, null,
					el( wp.components.PanelBody,
						{
							title: i18n.__( 'Уровень заголовка', 'act_theme' ),
							initialOpen: true
						},
						el( SelectControl, {
							value: props.attributes.level,
							options: [
								{ value: 'h2', label: i18n.__( 'Заголовок 2', 'act_theme' ) },
								{ value: 'h3', label: i18n.__( 'Заголовок 3', 'act_theme' ) },
								{ value: 'h4', label: i18n.__( 'Заголовок 4', 'act_theme' ) },
							],
							onChange: function( value ) {
								props.setAttributes( { level: value } )
							}
						} ),
					),
				),
				( 'undefined' !== typeof props.insertBlocksAfter ) ? el( editor.InnerBlocks, {
					template: [
						[ 'core/heading', {} ],
						[ 'core/paragraph', {} ],
					],
				} ) : el( 'div' )
			);
		},

		save: function( props ) {
			return el( 'div', { className: 'accordio', 'data-heading': props.attributes.level },
				el( InnerBlocks.Content, null )
			);
		},

	} );

} )(
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components,
	window._,
);