<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Manual Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Manual Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'theme_options',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
		'forced_dev_mode_off'  => true,
		'use_cdn'              => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/TheWpSmartApps',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/wpsmartapps',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );




    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
		
        /*$args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );*/
    } else {
       /* $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );*/
    }

    // Add content after the form.
    /*$args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );*/

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );



    /*
        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
     */
	 
	 
	 
	 
	 
	 
	 
	 
	 
/**********************************************
*******  START  GENERAL       *****
***********************************************/
	 
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General', 'manual' ),
        'id'     => 'theme-header',
        'icon'   => 'el el-edit',
        'fields' => array(
			
			array (
				'subtitle' => esc_html__('Image to display beside the url bar', 'manual'),
				'id' => 'manual-favicon',
				'type' => 'media',
				'title' => esc_html__('Favicon', 'manual'),
				'url' => true,
			),
		
            array(
                'id'       => 'theme-header-logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Theme Logo', 'manual' ),
				'url' => true,
				'desc' => esc_html__('For the best results make image size: 479px x 105px.', 'manual'),
            ),
			
		    array(
                'id'       => 'theme-nav-homepg-logo-when-img-bg',
                'type'     => 'media',
                'title'    => esc_html__( 'Theme White Logo', 'manual' ),
				'subtitle' => esc_html__( 'System will apply white logo if found image background (for the page header)', 'manual' ),
				'desc' => esc_html__( 'For the best results make image size: 479px x 105px.', 'manual' ),
            ),
			
			array(
				'id'       => 'hide-header-logo-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Hide Logo', 'manual' ),
				'default'  => false,
				'subtitle' => esc_html__( 'Hide logo from the header bar (Global Effect)', 'manual' ),
			),
			
			
			// Readjust Logo
			array(
                'id'       => 'readjust-logo-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Logo Adjustment', 'manual' ),
                'subtitle' => esc_html__( 'Readjust logo if needed', 'manual' ),
                'indent'   => true, 
            ),
			
			array(
				'id'       => 'theme-logo-readjust-height',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Readjust Logo Height', 'manual'),
				'desc'     => esc_html__('Default: 35', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '35'
					)
			),
			
			array(
				'id'       => 'theme-logo-readjust-margin-top',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Readjust Logo Top Margin', 'manual'),
				'desc'     => esc_html__('Default: -6', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '-6'
					)
			),
			
			
			// Sticky Menu
			array(
                'id'       => 'readjust-sticky-logo-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Sticky Menu', 'manual' ),
                'subtitle' => esc_html__( 'Readjust sticky menu if needed', 'manual' ),
                'indent'   => true, 
            ),
			
			array(
				'id'       => 'theme-sticky-menu',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Menu', 'manual' ),
				'default'  => false,
				'subtitle' => esc_html__( 'Enable or disable sticky menu (Global Effect)', 'manual' ),
			),
			
			array(
				'id'       => 'theme-logo-readjust-sticky-height',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Readjust Sticky Menu Logo Height', 'manual'),
				'desc'     => esc_html__('Default: 27', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '27'
					)
			),
			
			array(
				'id'       => 'theme-logo-readjust-sticky-margin-top',
				'type'     => 'dimensions',
				'units'    => array('px'),
				'title'    => esc_html__('Readjust Sticky Menu Logo Top Margin', 'manual'),
				'desc'     => esc_html__('Default: -12', 'manual'),
				'width'     => false,
				'default'  => array(
					'Height'  => '-12px'
					)
			),
			
			
			// Social Buttons
			array(
                'id'       => 'global-share-settings',
                'type'     => 'section',
                'title'    => esc_html__( 'Custom Post Social Share', 'manual' ),
                'subtitle' => esc_html__( 'Global Effect', 'manual' ),
                'indent'   => true, 
            ),
			
			array(
				'id'       => 'theme-social-box',
				'type'     => 'switch',
				'title'    => esc_html__( 'Social Share Buttons', 'manual' ),
				'default'  => true,
				'subtitle' => esc_html__( 'Enable or disable the social share buttons at the end of each post (Global Effect)', 'manual' ),
			),
			
			array (
				'subtitle' => esc_html__('This subject will act as default when visitors try to send favourite read post via email to there friends', 'manual'),
				'id' => 'theme-social-box-mailto-subject',
				'type' => 'text',
				'title' => esc_html__('Social Share eMail Button', 'manual'),
				'default' => esc_html__('Awesome Post', 'manual'),
			),
			
			array(
                'id'       => 'theme-social-share-displaycrl-status',
                'type'     => 'sortable',
				'mode'     => 'checkbox',
                'title'    => esc_html__( 'Social Share Display Control', 'manual' ),
                'subtitle' => esc_html__( 'Sortable/Control social share display', 'manual' ),
				'options'  => array(
                    'twitter' => 'Twitter',
                    'facebook' => 'Facebook',
                    'pinterest' => 'Pinterest',
                    'google-plus' => 'Google Plus',
                    'email' => 'Email',
                    'linkedin' => 'LinkedIn',
                ),
                'default'  => array(
                    'twitter' => true,
                    'facebook' => true,
                    'pinterest' => true,
                    'google-plus' => true,
                    'email' => true,
                    'linkedin' => true,
                )
            ),
			
			
			
			// Global Post Settings
			array(
                'id'       => 'global-post-settings',
                'type'     => 'section',
                'title'    => esc_html__( 'Custom Post Other Settings', 'manual' ),
                'subtitle' => esc_html__( 'Global Effect', 'manual' ),
                'indent'   => true, 
            ),
			
			array (
				'subtitle' => esc_html__('This message will appear above Yes/No button on the knowledgebase and documentation section.', 'manual'),
				'id' => 'yes-no-above-message',
				'type' => 'text',
				'title' => esc_html__('Like/Dislike Message', 'manual'),
				'default' => esc_html__('Was this helpful?', 'manual'),
			),
			
			array (
				'subtitle' => esc_html__('Will appear as title', 'manual'),
				'id' => 'attached-file-title',
				'type' => 'text',
				'title' => esc_html__('Attached File Title', 'manual'),
				'default' => esc_html__('Attached Files', 'manual'),
			),
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'manual'),
				'id' => 'attached-file-type',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Type Title', 'manual'),
				'default' => 'File Type',
			),
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'manual'),
				'id' => 'attached-file-size',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Size Title', 'manual'),
				'default' => 'File Size',
			),
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'manual'),
				'id' => 'attached-file-download',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Download Title', 'manual'),
				'default' => 'Download',
			),
			
			
			// Global Post Settings
			array(
                'id'       => 'global-theme-tracking-settings',
                'type'     => 'section',
                'title'    => esc_html__( 'Tracking Code', 'manual' ),
                'subtitle' => esc_html__( 'Global Effect', 'manual' ),
                'indent'   => true, 
            ),
			
			array (
				'desc' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer or header based on which you select afterwards. <br><br> Please <strong>do not</strong> include the &lt;script&gt; tags.', 'manual'),
				'id' => 'manual-google-analytics',
				'type' => 'ace_editor',
				'title' => esc_html__('Tracking Code', 'manual'),
				'theme' => 'chrome'
			),
			
			array (
				'desc' => __('Place code before &lt;/head&gt; or &lt;/body&gt;', 'manual'),
				'id' => 'manual-tracking-code-position',
				'on' => '&lt;/' . esc_html__('head', 'manual') . '&gt;',
				'off' => '&lt;/' . esc_html__('body', 'manual') . '&gt;',
				'type' => 'switch',
			),
		
			
        )
    ) );
	
	
/**********************************************
*******  // EOF  GENERAL //      *****
***********************************************/
	
	
	
	
/**********************************************
*******  START NAVIGATION     *****
***********************************************/
	
	    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Theme Navigation Style', 'manual' ),
        'id'     => 'theme-nav',
        'icon'   => 'el el-magic',
        'fields' => array(
			
			
			array(
                'id'       => 'theme-nav-type',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Select Navigation Style', 'manual' ),
                'subtitle' => esc_html__( 'Settings will effect globally', 'manual' ),
                'options'  => array(
                    '1' => array( 'img' => ReduxFramework::$_url .'images/1.jpg' ),
                    '2' => array( 'img' => ReduxFramework::$_url .'images/2.jpg' ),
                ),
                'default'  => '2',
            ),
		
		
			 array(
                'id'       => 'theme-nav-homepg-color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Home Page Navigation Color', 'manual' ),
                'subtitle' => esc_html__( 'Set your HOME PAGE navigation color', 'manual' ),
                'default'  => '#FFFFFF',
            ),
			
            array(
                'id'       => 'theme-nav-homepg-logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Theme Logo (ONLY HOME PAGE)', 'manual' ),
				'subtitle' => esc_html__( 'Change your HOME PAGE LOGO based on the Navigation color and background design (use if needed)', 'manual' ),
            ),
			
			
        )
    ) );
	
	
/**********************************************
*******  // EOF NAVIGATION  //   *****
***********************************************/
	
	
	
/**********************************************
*******  START hamburger menu OPTIONS       *****
***********************************************/
	
	    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Hamburger Menu', 'manual' ),
        'id'     => 'theme-hamburger-nav',
        'icon'   => 'el el-align-justify',
        'fields' => array(
		
			array(
					'id'    => 'hamburger-menu-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'Infomration', 'manual' ),
					'desc'  => '<strong>The settings does not work for the post type "Pages"</strong>. There is a seprate settings available to display Hamburger Menu & Search Box when you trying to create page (Pages-> Add New Pages)',
				),
		
			array(
					'id'       => 'target-display-search-box-on-menu-bar',
					'type'     => 'select',
					'data'     => 'post_type',
					'multi'    => true,
					'sortable' => true,
					'title'    => esc_html__( 'Target Search Box & Hamburger Menu', 'manual' ),
					'subtitle' => 'Targer display for the search box & hamburger menu to the selected post type',
					'desc'     => '<strong>NOTE:</strong> <span style="color:orange"><strong>Post Type: "Pages" does not work</strong></span>',
					'default'  => '',
			),
		
			array(
				'id'       => 'activate-hamburger-menu',
				'type'     => 'switch',
				'title'    => esc_html__( 'Hamburger Menu', 'manual' ),
				'default'  => false,
				'subtitle' => 'On activation, The normal standard header menu will be replaced by hamburger menu',
			),
			
			array(
				'id'       => 'activate-search-box-on-menu-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Search Box On The Menu Bar', 'manual' ),
				'default'  => false,
				'subtitle' => 'On activation, The search box will appear on the menu bar. <br><br><strong> NOTE: Feature will only work if activate Hamburger Menu</strong>',
			),
			
			array(
				'id'       => 'replace-search-design-with-modern-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Replace Manual Search', 'manual' ),
				'default'  => false,
				'subtitle' => 'On activation, Manual Search will be replace by simple modern search</strong>',
			),
			

        )
    ) );


/**********************************************
*******  EOF hamburger menu OPTIONS       *****
***********************************************/
	
	
/**********************************************
*******  START STYLING OPTIONS       *****
***********************************************/

		 Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Theme Custom Style', 'manual' ),
			'id'               => 'manual-theme-custom-style',
			//'desc'             => esc_html__( 'These are really basic fields!', 'manual' ),
			'customizer_width' => '400px',
			'icon'             => 'el-icon-website'
		) );
	
	
	    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General', 'manual' ),
        'id'     => 'manual-theme-style',
		'subsection'  => true,
		'desc'   => esc_html__( 'Global Effect', 'manual' ),
        'fields' => array(
		
					array(
						'id'       => 'manual-global-color-link',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Color Text Link', 'manual' ),
						'default'  => array(
							'color' => '#46b289',
							'alpha' => '1'
						),
						'mode'     => 'background',
					),
					
					array(
						'id'       => 'manual-global-color-link-hover',
						'type'     => 'color_rgba',
						'desc'     => esc_html__( 'Hover Color Text Link', 'manual' ),
						'default'  => array(
							'color' => '#333333',
							'alpha' => '1'
						),
						'mode'     => 'background',
					),
					
					array(
						'id'       => 'manual-global-color-botton',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Botton Color', 'manual' ),
						'default'  => array(
							'color' => '#46b289',
							'alpha' => '1'
						),
						'mode'     => 'background',
					),
					
					array(
						'id'       => 'manual-global-color-botton-hover',
						'type'     => 'color_rgba',
						'desc'     => esc_html__( 'Botton Hover Color', 'manual' ),
						'default'  => array(
							'color' => '#47C494',
							'alpha' => '1'
						),
						'mode'     => 'background',
					),
					
					array(
						'id'       => 'manual-hover-icon-color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Hover Icon Color', 'manual' ),
						'default'  => array(
							'color' => '#47C494',
							'alpha' => '1'
						),
						'mode'     => 'background',
					),
					
		
				)
		) );
		
		
		 Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Footer Styling', 'manual' ),
		'id'     => 'manual-theme-footer-style',
		'subsection'  => true,
		'desc'   => esc_html__( 'Global Effect', 'manual' ),
		'fields' => array(
		
		
			array(
                'id'       => 'theme_footer_redesign_start',
                'type'     => 'section',
                'title'    => esc_html__( 'Design Footer Widget Area', 'bind' ),
                'indent'   => true, 
            ),
			
			array(
                'id'       => 'theme_footer_widget_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'bind' ),
                'default'  => '#252525',
            ),
			
			array(
                'id'       => 'theme_footer_widget_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Widget Title Color', 'bind' ),
                'default'  => '#DDDDDD',
            ),
			
			array(
                'id'       => 'theme_footer_widget_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Widget Text Color', 'bind' ),
                'default'  => '#919191',
            ),
			
			array(
                'id'       => 'theme_footer_widget_text_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Link Color', 'bind' ),
                'active'    => false, 
                'visited'   => false, 
                'default'  => array(
                    'regular' => '#919191',
                    'hover'   => '#BEBCBC',
                    'active'  => '#ccc',
                )
            ),
			
			array(
                'id'       => 'theme_footer_social_redesign_start',
                'type'     => 'section',
                'title'    => esc_html__( 'Design Footer Social/Copyright Area', 'bind' ),
                'indent'   => true, 
            ),
			
			array(
                'id'       => 'theme_footer_social_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'bind' ),
                'default'  => '#1b1b1b',
            ),
			
			array(
                'id'       => 'theme_footer_social_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Text Color', 'bind' ),
                'default'  => '#828282',
            ),
			
			array(
                'id'       => 'theme_footer_social_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Link Color', 'bind' ),
                'active'    => false, 
                'visited'   => false, 
                'default'  => array(
                    'regular' => '#9E9D9D',
                    'hover'   => '#C4C4C4',
                    'active'  => '#ccc',
                )
            ),	
			
			array(
                'id'       => 'theme_footer_social_icon_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Icon Link Color', 'bind' ),
                'active'    => false, 
                'visited'   => false, 
                'default'  => array(
                    'regular' => '#7E7E7E',
                    'hover'   => '#FFFFFF',
                    'active'  => '#ccc',
                )
            ),			
		
			)
		) );
		
		
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Go Up Arrow Styling', 'manual' ),
		'id'     => 'manual-theme-go-up-style',
		'subsection'  => true,
		'desc'   => esc_html__( 'Global Effect', 'manual' ),
		'fields' => array(
		
				array(
					'id'            => 'go_up_arrow_font_size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'manual' ),
					'default'       => 24,
					'min'           => 1,
					'step'          => 1,
					'max'           => 60,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Default: 24px', 'manual' ),
				),
				
				array(
					'id'       => 'go_up_arrow_icon_style',
					'type'     => 'text',
					'title'    => esc_html__( 'Icon Name', 'manual' ),
					'desc'     => __( 'Enter <a href=\'http://fortawesome.github.io/Font-Awesome/icons/\' target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\'https://www.elegantthemes.com/blog/resources/elegant-icon-font\' target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\'http://demo.wpsmartapps.com/themes/manual/et-line-font/\' target=\"_blank\">et line font</a> name', 'manual' ),
					'default'  => 'fa fa-arrow-up',
					'subtitle' => esc_html__( 'Default: fa fa-arrow-up', 'manual' ),
				),
				
				array(
					'id'       => 'manual-go-up-icon-color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Go Up Icon Color', 'manual' ),
					'default'  => array(
						'color' => '#b0b0b0',
						'alpha' => '1'
					),
					'mode'     => 'background',
				),
				
		
		)
		) );
		
		
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header Style', 'manual' ),
		'id'     => 'manual-theme-header-style',
		'subsection'  => true,
		'fields' => array(
		
				array(
					'id'    => 'header-style-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'Infomration', 'manual' ),
					'desc'  => __( 'Settings set for the header style are always global BUT if any options like font family, font weight are chosen while crating page using "Pages-> Add New" or creating knowledge-base etc, such settings will overwrite global settings create unique header layout.', 'manual' )
				),
		
				array(
					'id'       => 'default-header-sytle-backgorund-image',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Default Gray Noise Background', 'manual' ),
					'subtitle' => esc_html__('on/off default gray noise background image', 'manual'),
					'default'  => false,
					'description' => 'Global Effect',
				),
				
				array(
					'id'       => 'default-header-sytle-background-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Default Header Background Color', 'bind' ),
					'default'  => '#F8F8F8',
					'subtitle' => 'Global Effect',
				),
				
				array(
					'id'            => 'default-header-sytle-height',
					'type'          => 'slider',
					'title'         => esc_html__( 'Height (equal top/bottom padding)', 'manual' ),
					'default'       => 60,
					'min'           => 1,
					'step'          => 1,
					'max'           => 300,
					'display_value' => 'label',
					'subtitle' => 'Default: 60',
				),
				
				array(
					'id'       => 'default-header-text-align',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Text Align', 'manual' ),
					'options'  => array(
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right',
					),
					'default'  => 'center'
				),
				
				array(
					'id'       => 'theme_header_title_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Customize Header Title', 'bind' ),
					'indent'   => true, 
					'subtitle' => 'Global Effect',
				),
				
				array(
					'id'       => 'default-top-header-title-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Default Header Title Color', 'bind' ),
					'default'  => '#4d515c',
				),
				
				array(
					'id'            => 'default-header-title-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Title Font Size', 'manual' ),
					'default'       => 36,
					'min'           => 12,
					'step'          => 1,
					'max'           => 75,
					'display_value' => 'label',
					'subtitle' => 'Default: 36',
				),
				
				array(
					'id'       => 'default-header-title-font-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Font Weight', 'manual' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '400',
					'subtitle' => 'Default: 400',
				),
				
				array(
					'id'       => 'default-header-title-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Text Transform', 'manual' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
					),
					'default'  => 'capitalize'
				),
				
				
				array(
					'id'            => 'default-header-title-font-letter-spacing',
					'type'          => 'slider',
					'title'         => esc_html__( 'Title Text Letter Spacing', 'manual' ),
					'default'       => 0,
					'min'           => 0,
					'step'          => 1,
					'max'           => 5,
					'display_value' => 'label',
					'subtitle' => 'Default: 0',
				),
				
				
				array(
					'id'       => 'theme_header_subtitle_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Customize Header Sub Title', 'bind' ),
					'indent'   => true, 
					'subtitle' => 'Global Effect',
				),
				
				array(
					'id'       => 'default-top-header-subtitle-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Default Header Sub Title Color', 'bind' ),
					'default'  => '#989CA6',
				),
				
				array(
					'id'            => 'default-header-subtitle-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Sub Title Font Size', 'manual' ),
					'default'       => 18,
					'min'           => 12,
					'step'          => 1,
					'max'           => 75,
					'display_value' => 'label',
					'subtitle' => 'Default: 18',
				),
				
				array(
					'id'       => 'theme_header_breadcrumb_customization',
					'type'     => 'section',
					'title'    => esc_html__( 'Customize Breadcrumb Link', 'bind' ),
					'indent'   => true, 
					'subtitle' => 'Global Effect',
				),
				
				array(
					'id'       => 'default-top-header-breadcrumb-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Default Header Breadcrumb Color', 'bind' ),
					'default'  => '#919191',
				),
				
				array(
					'id'       => 'default-top-header-breadcrumb-link-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Breadcrumb Link Color', 'bind' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#919191',
						'hover'   => '#636363',
						'active'  => '#ccc',
					),
				),	
				
				array(
					'id'       => 'default-header-breadcrumb-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Breadcrumb Text Transform', 'manual' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
					),
					'default'  => 'capitalize'
				),
				
				array(
					'id'            => 'default-header-breadcrumb-letter-spacing',
					'type'          => 'slider',
					'title'         => esc_html__( 'breadcrumb Text Letter Spacing', 'manual' ),
					'default'       => 0,
					'min'           => 0,
					'step'          => 1,
					'max'           => 5,
					'display_value' => 'label',
					'subtitle' => 'Default: 0',
				),
				
				array(
					'id'            => 'default-header-breadcrumb-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Breadcrumb Font Size', 'manual' ),
					'default'       => 14,
					'min'           => 6,
					'step'          => 1,
					'max'           => 18,
					'display_value' => 'label',
					'subtitle' => 'Default: 14',
				),
				
		
		)
		) );
		
		
		
/**********************************************
*******  // EOF STYLING OPTIONS //      *****
***********************************************/
	
	
	
/**********************************************
*******  START  PORTFOLIO       *****
***********************************************/
		
		 Redux::setSection( $opt_name, array(
			'title'      => esc_html__( 'Portfolio', 'manual' ),
			'id'         => 'manual-portfolio-settings',
			'icon'   => 'el el-picture',
			'fields'     => array(
			
			   array(
					'id'       => 'portfolio-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Single Post (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>work</strong>/single-portfolio-record/ <br><br>  <div style="color: #D01B0B;"><strong>WARNING:</strong> Single post portfolio <strong>Slug Name</strong> must be different from the page name used to display portfolio</strong>. If same name provided system will show 404 error page when used Portfolio pagination. ', 'manual' ),
					'default'  => 'work',
				),
				
			   array(
					'id'       => 'portfolio-cat-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Category (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>pfocat</strong>/themes/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Category Slug Name must be different from the <strong>Portfolio Single Post (Slug Name)</strong>. If same name provided system will show 404 error page when click on the Portfolio category link. <br><br> <strong>If possible do not change category slug name once set</strong>, if changed frequently it will show broken link and will also effect search. </div>', 'manual' ),
					'default'  => 'pfocat',
				),
				

				array(
                'id'       => 'portfolio-record-display-order',
                'type'     => 'select',
                'title'    => esc_html__( 'Portfolio Records Display Order', 'manual' ),
                'subtitle' => esc_html__( 'Display order ', 'manual' ),
                'options'  => array(
                    '1' => 'Ascending Order (ASC)',
                    '2' => 'Descending Order (DESC)',
                ),
                'default'  => '2'
				),
				
				array(
                'id'       => 'portfolio-record-display-order-by',
                'type'     => 'select',
                'title'    => esc_html__( 'Portfolio Records Display Order By', 'manual' ),
                'subtitle' => esc_html__( 'Display order by', 'manual' ),
                'options'  => array(
                    'title' => 'Order by Title',
                    'date' => 'Order by Date',
                    'rand' => 'Order by Random',
                    'modified' => 'Order by Modified',
                    'comment_count' => 'Order by Comment Count',
                    'menu_order' => 'Order by Page Order',
                ),
                'default'  => 'date'
				),
				
				array(
					'id'       => 'portfolio-x-posts-per-page',
					'type'     => 'spinner', 
					'title'    => esc_html__('Portfolio Pages Show at Most X Posts', 'manual'),
					'desc'     => __('Note: If choose <strong>-1</strong>, then system will display all records i.e no pagination will appear ', 'manual'),
					'default'  => '8',
					'min'      => '-1',
					'step'     => '1',
					'max'      => '20',
				),
				
				array(
					'id'       => 'portfolio-comment-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Comment Box', 'manual' ),
					'subtitle' => esc_html__('Allow comments on each portfolio article', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'portfolio-next-previous-status',
					'type'     => 'switch',
					'title'    => esc_html__('Deactivate Next/Previous Link ', 'manual' ),
					'subtitle' => esc_html__('Disable previous / next link at the bottom of the portfolio single page', 'manual'),
					'default'  => false,
				),
				
				
			)
		) );
		
		
/**********************************************
******* // EOF  PORTFOLIO  //    *****
***********************************************/




/**********************************************
*******  START  KNOWLEDGEBASE       *****
***********************************************/

	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Knowledgebase', 'manual' ),
        'id'               => 'theme_knowledgebase_section',
        'customizer_width' => '400px',
        'icon'             => 'el el-file-edit'
    ) );
	
	// CUSTOM SLUG NAME
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Slug Name & Breadcrumb', 'manual' ),
        'id'               => 'knowledgebase_slug_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				
				array(
					'id'       => 'kb-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base Single Post (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>knowledgebase</strong>/creating-new-kb-post/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Knowledge Base single post slug name <strong>MUST BE</strong> different from the page name used to display Knowledge Base. If same name provided system will show 404 on the different cases. </div>', 'manual' ),
					'default'  => 'knowledgebase',
				),
				
			   array(
					'id'       => 'kb-cat-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base Category (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>kb</strong>/customization/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Category Slug Name <strong>MUST BE</strong> different from the <strong>Knowledge Base Single Post (Slug Name)</strong> and the page name used to display Knowledge Base. 404 error page will appear if name matched on the different cases. <br><br> <strong>If possible do not change category slug name once set</strong>, if changed frequently it will show broken link and will also effect  search. </div>', 'manual' ),
					'default'  => 'kb',
				),
				
			   array(
					'id'       => 'kb-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base Breadcrumb Name', 'manual' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>Knowledge Base</strong> / Customization /', 'manual' ),
					'default'  => 'Knowledge Base',
				),
				
				array(
					'id'       => 'kb-breadcrumb-custom-home-url',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base Home Page URL', 'manual' ),
					'desc'     => __( '<strong>Will link breadcrumb as:</strong>  Home / <a href="">Knowledge Base</a> / Customization /', 'manual' ),
					'subtitle' => __( 'Custom home page URL for your Knowledge Base', 'manual' ),
					'default'  => '',
				),
	
		)
    ) );
	
	
	// CUSTOM SLUG NAME
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Tag Custom Slug Name ', 'manual' ),
        'id'               => 'knowledgebase_tag_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'kb-tag-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Tag Slug Name', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>kb-tag</strong>/kb-post-slig-name/ <br><br></strong> Custom slug name for your knowledge base tag.', 'manual' ),
					'default'  => 'kb-tag',
				),
				
		)
    ) );
	
	
	// RECORDS ORDER SECTION
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Records Display Settings', 'manual' ),
        'id'               => 'knowledgebase_records_order_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'kb-homepage-settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Landing Page + KnowledgeBase Shortcode Settings', 'manual' ),
					'indent'   => true, 
				),
		
				array(
					'id'       => 'kb-home-page-allow-child',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display All (Root+Child) Category', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Apply for the KB landing page & shortcodes', 'manual' ),
				),
		
				array(
					'id'       => 'kb-no-of-records-per-cat',
					'type'     => 'text',
					'title'    => esc_html__( 'Number Of KB Post Records Under Category', 'manual' ),
					'subtitle'    => esc_html__( 'Apply for the KB landing page & shortcodes', 'manual' ),
					'default'  => '5',
					'description' => 'Default: 5',
				),
		
				array(
					'id'       => 'kb-single-post-order',
					'type'     => 'section',
					'title'    => esc_html__( 'Single Post Display Order', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'kb-cat-page-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Page Display Order', 'manual' ),
					'subtitle' => esc_html__( 'Display order ', 'manual' ),
					'desc'     => __( '<strong>Order pages that\'s under category</strong>', 'manual' ),
					'options'  => array(
						'1' => 'Ascending Order (ASC)',
						'2' => 'Descending Order (DESC)',
					),
					'default'  => '2'
				),
			
				array(
					'id'       => 'kb-cat-page-display-order-by',
					'type'     => 'select',
					'title'    => esc_html__( 'Page Display Order By', 'manual' ),
					'subtitle' => esc_html__( 'Display order by', 'manual' ),
					'options'  => array(
						'date' => 'Order By Date',
						'modified' => 'Order By Last Modified Date',
						'title' => 'Order By Title',
						'rand' => 'Order By Random',
						'menu_order' => 'Order By Page Order',
						'comment_count' => 'Order By Number of Comments',
						'none' => 'None',
					),
					'default'  => 'date'
				),
				
				array(
					'id'       => 'kb-cat-order',
					'type'     => 'section',
					'title'    => esc_html__( 'Category Display Order', 'manual' ),
					'indent'   => true, 
				),

				array(
					'id'       => 'kb-cat-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Display Order', 'manual' ),
					'subtitle' => esc_html__( 'Display order ', 'manual' ),
					'options'  => array(
						'1' => 'Ascending Order (ASC)',
						'2' => 'Descending Order (DESC)',
					),
					'default'  => '2'
				),
			
				array(
					'id'       => 'kb-cat-display-order-by',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Display Order By', 'manual' ),
					'subtitle' => esc_html__( 'Display order by', 'manual' ),
					'options'  => array(
						'description' => 'Order By Description',
						'count' => 'Number Of Records Count',
						'slug' => 'Slug Name',
						'name' => 'Name',
						'none' => 'None',
					),
					'default'  => 'name'
				),
	
		)
    ) );
	
	
	// SINGLE POST ON/OFF
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Post/Category On|Off', 'manual' ),
        'id'               => 'kb_single_records_on_off_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'kb-single-cat-on-off',
					'type'     => 'section',
					'title'    => esc_html__( 'Category Page', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'all-child-cat-post-in-root-category',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display All Child Category Posts in Parent Category', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Display all child records under single root category', 'manual' ),
				),
				
				array(
					'id'       => 'kb-cat-sidebar-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove The Sidebar From The Category', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Make record full width', 'manual' ),
				),
				
				array(
					'id'       => 'kb-cat-header-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Search', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable search bar from the category page', 'manual' ),
				),
				
				array(
					'id'       => 'kb-cat-header-breadcrumb-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Breadcrumb', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable Breadcrumb from the category page', 'manual' ),
				),
				
				array(
					'id'       => 'knowledgebase-cat-quick-stats-under-title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Quick Stats', 'manual' ),
					'subtitle' => esc_html__('Disable views, date posted, posted by and like count displayed under knowledgebase post title', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'kb-single-records-on-off',
					'type'     => 'section',
					'title'    => esc_html__( 'Single Page', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'kb-single-pg-header-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Search', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable search bar from the header', 'manual' ),
				),
				
				array(
					'id'       => 'kb-single-pg-header-breadcrumb-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Breadcrumb', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Disable Breadcrumb from the single KB page', 'manual' ),
				),
				
				array(
					'id'       => 'kb-comment-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Allow Comments On Each Knowledge Base Article', 'manual' ),
					'default'  => false,
				),
				
				array(
					'id'       => 'kb-cat-sidebar-singlepg-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove The Sidebar From The Single Pages', 'manual' ),
					'default'  => false,
					'subtitle' => esc_html__( 'Make record full width', 'manual' ),
				),
				
				array(
					'id'       => 'kb-singlepg-modified-date-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Post Modified Date', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'On checked no modifed date will be displayed under knowledgebase post title', 'manual' ),
				),
				
				array(
					'id'       => 'knowledgebase-quick-stats-under-title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Quick Stats', 'manual' ),
					'subtitle' => esc_html__('Disable views, date posted, posted by and like count displayed under knowledgebase post title', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'knowledgebase-social-share-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Social Share', 'manual' ),
					'subtitle' => esc_html__('Disable knowledgebase post social share', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'knowledgebase-voting-buttons-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Voting Buttons', 'manual' ),
					'subtitle' => esc_html__('Disable knowledgebase post voting buttoms', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'knowledgebase-voting-login-users',
					'type'     => 'switch',
					'title'    => '<span style="color:orange;font-weight:bold;">Display Voting For Only Login Users</span>',
					'subtitle' => esc_html__('allow voting ONLY for login users', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'kb-related-post-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Allow Related Posts On Each Knowledge Base Article', 'manual' ),
					'default'  => true,
				),
				
				array(
					'id'       => 'kb-related-post-title',
					'type'     => 'text',
					'title'    => esc_html__( 'Related Post Title', 'manual' ),
					'default'  => 'Related Articles',
				),
				
				array(
					'id'       => 'kb-related-post-per-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Number Of Related Post to Display', 'manual' ),
					'default'  => '6',
				),
				
		)
    ) );
	
	
/**********************************************
*******  // EOF  KNOWLEDGEBASE //   *****
***********************************************/
	
	
	
		
		
/**********************************************
*******  START  DOCUMENTATION       *****
***********************************************/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Documentation', 'manual' ),
        'id'               => 'theme_documentation_section',
        'customizer_width' => '400px',
        'icon'             => 'el el-folder-open'
    ) );
	
	// CUSTOM SLUG NAME
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Slug Name & Breadcrumb', 'manual' ),
        'id'               => 'documentation_slug_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			  array(
					'id'       => 'doc-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation Single Post (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>documentation</strong>/new-doc-post/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Documentation single post slug name <strong>MUST BE</strong> different from the page name used to display documentation. If same name provided system will show 404 on the different cases. </div>', 'manual' ),
					'default'  => 'documentation',
				),
				
			   array(
					'id'       => 'doc-cat-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation Category (Slug Name)', 'manual' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>doc</strong>/product-name/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Category Slug Name <strong>MUST BE</strong> different from the <strong>Documentation Single Post (Slug Name)</strong> and the page name used to display documentation. 404 error page will appear if name matched on the different cases. <br><br> <strong>If possible do not change category slug name once set</strong>, if changed frequently it will show broken link and will also effect  search. </div>', 'manual' ),
					'default'  => 'doc',
				),
				
				array(
					'id'       => 'doc-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation Breadcrumb Name', 'manual' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>Documentation</strong> / product-name /', 'manual' ),
					'default'  => 'Documentation',
				),
				
				array(
					'id'       => 'doc-breadcrumb-custom-home-url',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation Home Page URL', 'manual' ),
					'desc'     => __( '<strong>Will link breadcrumb as:</strong>  Home / <a href="">Documentation</a> / product-name /', 'manual' ),
					'subtitle' => __( 'Custom home page URL for your Documentation', 'manual' ),
					'default'  => '',
				),
		
		)
    ) );
	
	
	// RECORDS ORDER SECTION
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Records Display Order', 'manual' ),
        'id'               => 'documentation_records_order_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'doc-single-post-order',
					'type'     => 'section',
					'title'    => esc_html__( 'Single Post Display Order', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'documentation-record-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Display Order', 'manual' ),
					'subtitle' => esc_html__( 'Records display order ', 'manual' ),
					'options'  => array(
						'ASC' => 'Ascending Order (ASC)',
						'DESC' => 'Descending Order (DESC)',
					),
					'default'  => 'ASC'
				),
				
				array(
					'id'       => 'documentation-record-display-order-by',
					'type'     => 'select',
					'title'    => esc_html__( 'Display Order By', 'manual' ),
					'subtitle' => esc_html__( 'Records display order by', 'manual' ),
					'desc'     => __( 'Find how orderby works <a href="https://codex.wordpress.org/Template_Tags/get_posts" target="_blank">https://codex.wordpress.org/Template_Tags/get_posts</a>', 'manual' ),
					'options'  => array(
						'title' => 'Order by Title',
						'rand' => 'Order by Random',
						'menu_order' => 'Page Order',
						'date' => 'Order By Date',
						'modified' => 'Order By Last Modified Date',
						'none' => 'None',
					),
					'default'  => 'menu_order'
				),
				
				array(
					'id'       => 'doc-cat-order',
					'type'     => 'section',
					'title'    => esc_html__( 'Category Display Order', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'documentation-category-record-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Display Order', 'manual' ),
					'subtitle' => esc_html__( 'Category records display order ', 'manual' ),
					'options'  => array(
						'ASC' => 'Ascending Order (ASC)',
						'DESC' => 'Descending Order (DESC)',
					),
					'default'  => 'ASC'
				),
				
				array(
					'id'       => 'documentation-category-record-display-order-by',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Display Order By', 'manual' ),
					'subtitle' => esc_html__( 'Category records display order by', 'manual' ),
					'options'  => array(
						'id' => 'Order By ID',
						'count' => 'Order By Count',
						'name' => 'Order By Name ',
						'slug' => 'Order By Slug ',
						'none' => 'None',
					),
					'default'  => 'name'
				),

		)
    ) );
	
	
	
	// SINGLE POST ON/OFF
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Post/Category On|Off', 'manual' ),
        'id'               => 'documentation_single_records_on_off_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'documentation-single-cat-section',
					'type'     => 'section',
					'title'    => esc_html__( 'Category Page', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'    => 'documentation-single-cat-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'desc'  => __( 'All controls moved to location: <strong>"Documentation -> Documentation Categories"</strong> under "Documentation Access Control"', 'manual' )
				),
				
				array(
					'id'       => 'documentation-single-page-section',
					'type'     => 'section',
					'title'    => esc_html__( 'Single Page', 'manual' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'documentation-single-post-user-name',
					'type'     => 'select',
					'title'    => esc_html__( 'Author Name', 'manual' ),
					'subtitle' => esc_html__( 'will appear under title i.e aricle display by', 'manual' ),
					'options'  => array(
						'user_login' => 'User Login',
						'user_nicename' => 'User Nicename',
						'user_registered' => 'User Registered',
						'display_name' => 'Display Name',
						'first_name' => 'First Name',
						'user_firstname' => 'User Firstname',
					),
					'default'  => 'user_nicename'
				),
				
				array(
					'id'       => 'documentation-comment-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Allow Comments On Each Documentation Article', 'manual' ),
					'default'  => false,
					'description' => '<span style="color:red">ACTIVATE COMMENT WILL NOT WORK (TEMPORARY DISABLE)</span>',
				),
		
				array(
					'id'       => 'documentation-quick-stats-under-title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Quick Stats', 'manual' ),
					'subtitle'     => esc_html__('Disable views, date posted, posted by and like count displayed under documentation post title', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'documentation-social-share-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Social Share', 'manual' ),
					'subtitle'     => esc_html__('Disable documentation post social share', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'documentation-voting-buttons-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Voting Buttons', 'manual' ),
					'subtitle'     => esc_html__('Disable documentation post voting buttoms', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'documentation-voting-login-users',
					'type'     => 'switch',
					'title'    => '<span style="color:orange;font-weight:bold;">Display Voting For Only Login Users</span>',
					'subtitle' => esc_html__('allow voting ONLY for login users', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'documentation-singlepg-modified-date-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Post Modified Date', 'manual' ),
					'default'  => true,
					'subtitle' => esc_html__( 'On checked no modifed date will be displayed under documentation post title', 'manual' ),
				),
				
				array(
					'id'       => 'documentation-related-post-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Allow Related Posts On Each Documentation Article', 'manual' ),
					'default'  => false,
				),
				
				array(
					'id'       => 'documentation-related-post-title',
					'type'     => 'text',
					'title'    => esc_html__( 'Related Post Title', 'manual' ),
					'default'  => 'Related Articles',
				),
				
				array(
					'id'       => 'documentation-related-post-per-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Number Of Related Post to Display', 'manual' ),
					'default'  => '6',
				),
		
		)
    ) );
	
	
	// SEARCH HANDLER
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Search/Direct URL Handler', 'manual' ),
        'id'               => 'documentation_search_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
				
				array(
					'id'       => 'documentation-search-redirect-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Single Post Redirect on Search AND While Using Direct Record URL', 'manual' ),
					'subtitle' => esc_html__('If enable, system will redirect to the single documentation page', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'documentation-hash-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hash Search', 'manual' ),
					'subtitle' => esc_html__('HIGHLY RECOMMENDED if site under cache and if, search fail to display accurate result', 'manual'),
					'default'  => true,
				),
		
		)
    ) );	
	
	
	// MENU SCROLLER
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Menu Scroller', 'manual' ),
        'id'               => 'documentation_menu_scroller_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'documentation-menu-scroller-status',
					'type'     => 'switch',
					'title'    => esc_html__('Menu Scroller', 'manual' ),
					'subtitle' => esc_html__('Scrollbar will appear after certain documentation menu height', 'manual'),
					'default'  => true,
				),
				
				array(
					'id'            => 'documentation-scroll-after-menu-height-new',
					'type'          => 'slider',
					'title'         => esc_html__( 'Display Scrollbar After Height', 'manual' ),
					'subtitle'      =>  esc_html__( 'Scrollbar will appear after exceeding define menu height', 'manual' ),
					'default'       => 401,
					'min'           => 1,
					'step'          => 1,
					'max'           => 1200,
					'display_value' => 'label'
				),
		
		)
    ) );	
	
	
	
	// Ajax After Page Load SCROLLER
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Call Javascript on AJAX Page Load', 'manual' ),
        'id'               => 'documentation_js_call_after_page_load_action',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
					array(
						'id'       => 'activate_js_call_after_ajax_page_load',
						'type'     => 'switch',
						'title'    => esc_html__( 'Trigger JavaScript Code', 'manual' ),
						'subtitle' => esc_html__('Run ANY JavaScript code when a page is loaded via AJAX', 'manual'),
						'default'  => false,
					),
					
					array(
						'id'       => 'js_code_call_after_ajax_page_load',
						'type'     => 'ace_editor',
						'title'    => esc_html__( 'JS Code', 'manual' ),
						'subtitle' => esc_html__( 'Paste your JS code here.', 'manual' ),
						'mode'     => 'javascript',
						'theme'    => 'chrome',
						'default'  => 'jQuery(document).ready(function() { 
"use strict";
	    jQuery( document ).on("executeJSCodeOnAjaxCallDocPost", function(event, data){
		  // YOUR JS CODE OVER HERE...
		  //alert(123);
		 });
});'
					),
		
		)
    ) );
		

/**********************************************
*******  // EOF  DOCUMENTATION   //    *****
***********************************************/


		

/**********************************************
*******  START  SEARCH       *****
***********************************************/

	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Seach', 'manual' ),
        'id'               => 'theme_search_section',
        'customizer_width' => '400px',
        'icon'             => 'el el-search-alt'
    ) );


	// LIVE SEARCH
	Redux::setSection( $opt_name, array(
        'title'        => esc_html__( 'Live Search', 'manual' ),
        'id'           => 'theme_live_search_section',
		'subsection'   => true,
        'fields' => array(
				
				array(
					'id'       => 'manual-live-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Live Search', 'manual' ),
					'subtitle' => esc_html__('Globally disable live search', 'manual'),
					'default'  => true,
				),
				
				array(
					'id'       => 'global-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Search Placeholder Text', 'manual' ),
					'default'  => 'Have a question? Ask or enter a search term.',
				),
				
				 array(
					'id'       => 'global-flip-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Flip Search Placeholder Text', 'manual' ),
					'default'  => 'Please Let Us Know Your Problem',
				),
				
				array(
					'id'       => 'manual-live-search-icon-bouncein',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Search Icon BounceIn', 'manual' ),
					'subtitle' => esc_html__('Globally Enable', 'manual'),
					'default'  => false,
				),
				
		 )
    ) );
	
	// TRENDING SEARCH
	Redux::setSection( $opt_name, array(
        'title'        => esc_html__( 'Trending Search', 'manual' ),
        'id'           => 'theme_trending_search_section',
		'subsection'   => true,
        'fields' => array(
				
				array(
					'id'       => 'manual-trending-live-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Trending Search', 'manual' ),
					'subtitle' => esc_html__('Globally enable/disable trending searches ', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'manual-trending-text',
					'type'     => 'text',
					'title'    => esc_html__( 'Text', 'manual' ),
					'subtitle' => esc_html__( 'Short message words', 'manual'),
					'desc'     => esc_html__( 'Default: Trending searches', 'manual' ),
					'default'  => 'Trending searches:',
				),
				
				array(
					'id'       => 'manual-three-trending-search-text',
					'type'     => 'sortable',
					'title'    => esc_html__( 'Trending Search keyword', 'manual' ),
					'subtitle' => esc_html__( 'Include 3 search term that is trending ex: installation, demo data etc...', 'manual' ),
					'label'    => true,
					'options'  => array(
						'Search keyword 1'  => '',
						'Search keyword 2'  => '',
						'Search keyword 3'  => '',
					)
				),
				
		 )
    ) );
	
	// TARGET POST TYPE SEARCH
	Redux::setSection( $opt_name, array(
        'title'        => esc_html__( 'Target Post Type Search', 'manual' ),
        'id'           => 'theme_target_post_type_search_section',
		'subsection'   => true,
        'fields' => array(
				
				array(
					'id'       => 'manual-default-search-type-multi-select',
					'type'     => 'select',
					'data'     => 'post_type',
					'multi'    => true,
					'sortable' => true,
					'title'    => esc_html__( 'Default Live/Normal Target Search', 'manual' ),
					'subtitle' => 'System will only display results from the selected post types while performing live/normal search <strong>i.e without selecting any post type</strong>',
					'desc'     => __( '<strong>NOTE:</strong> If no any post type selected above, system will do normal WP (default) search', 'manual' ),
					'default'  => array('post','manual_kb','manual_faq','manual_portfolio','manual_documentation')
				),
				
				array(
					'id'       => 'manual_dropdown_live_search_control',
					'type'     => 'section',
					'title'    => esc_html__( 'Dropdown Target Search', 'manual' ),
					'indent'   => true,
				),
				
				array(
					'id'       => 'manual-trending-post-type-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Dropdown Target Search', 'manual' ),
					'subtitle' => esc_html__('Globally enable/disable target search', 'manual'),
					'default'  => true,
				),
				
				array(
					'id'       => 'manual-trending-post-type-search-status-on-forum-pages',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Dropdown Target Search On The Forum (bbpress) Section', 'manual' ),
					'subtitle' => esc_html__('Globally enable/disable post type search ', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'manual-search-post-type-multi-select',
					'type'     => 'select',
					'data'     => 'post_type',
					'multi'    => true,
					'sortable' => true,
					'title'    => esc_html__( 'Target Search (Dropdown list)', 'manual' ),
					'subtitle' => 'While performing search if selected any post type, <strong>the live/normal search results are targeted to only chosen post type</strong>',
					'desc'     => __( '<strong>NOTE:</strong> Post Type: "Forums" does not work ONLY for the TARGET LIVE search but WORKS SMOOTHLY for the normal search <br><br> <strong>NOTE 2:</strong> Post Type: "Replies and Topics" will not list on the Target Search although selected on list above.', 'manual' ),
					'default'  => array('post','page','manual_kb','manual_faq','manual_portfolio','manual_documentation')
				),
				
				array(
					'id'       => 'manual_dropdown_value_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Target Search Dropdown Text', 'manual' ),
					'indent'   => true,
					'subtitle' => 'If selected post type keyword matches from the "Target Search (Dropdown list)" above, it will be replace by below text',
				),
				
				array(
					'id'       => 'manual-post-type-search-text-inital',
					'type'     => 'text',
					'title'    => esc_html__( 'Default', 'manual' ),
					'subtitle' => esc_html__( 'Default display text', 'manual' ),
					'default'  => 'All Site',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-kb',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Knowledge Base Text', 'manual' ),
					'default'  => 'Knowledge Base',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-documentation',
					'type'     => 'text',
					'title'    => esc_html__( 'Documentation', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Documentation Text', 'manual' ),
					'default'  => 'Documentation',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-portfolio',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Portfolio Text', 'manual' ),
					'default'  => 'Portfolio',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-faq',
					'type'     => 'text',
					'title'    => esc_html__( 'FAQs', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown FAQs Text', 'manual' ),
					'default'  => 'FAQs',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-forums',
					'type'     => 'text',
					'title'    => esc_html__( 'Forums', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Forums Text', 'manual' ),
					'default'  => 'Forums',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-media',
					'type'     => 'text',
					'title'    => esc_html__( 'Media', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Media Text', 'manual' ),
					'default'  => 'Media',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Page', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Page Text', 'manual' ),
					'default'  => 'Page',
				),
				
				array(
					'id'       => 'manual-post-type-search-dropdown-post',
					'type'     => 'text',
					'title'    => esc_html__( 'Post', 'manual' ),
					'subtitle' => esc_html__( 'Dropdown Post Text', 'manual' ),
					'default'  => 'Post',
				),
				
				
		 )
    ) );
	
	
/**********************************************
*******  // EOF  SEARCH   //    *****
***********************************************/


/**********************************************
*******  START BLOG       *****
***********************************************/

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Blog', 'manual' ),
        'id'     => 'theme_blog_section',
        'icon'   => 'el el-blogger',
        'fields' => array(

				array(
					'id'       => 'manual_blog_single_page_settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Blog Single Page Settings', 'manual' ),
					'indent'   => true,
				),
				
				array(
					'id'       => 'blog_single_title_on_header',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display Blog Title On The Header', 'manual' ),
					'subtitle' => esc_html__('Display title on the header bar', 'manual'),
					'default'  => false,
				),
				
				array(
					'id'       => 'blog_single_breadcrumb_on_header',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb', 'manual' ),
					'subtitle' => esc_html__('on/off breadcrumb link on the header bar', 'manual'),
					'default'  => true,
				),
				
				array(
					'id'       => 'blog_single_title_on_content_area',
					'type'     => 'switch',
					'title'    => esc_html__( 'Blog Title', 'manual' ),
					'subtitle' => esc_html__('on/off blog title from the page content', 'manual'),
					'default'  => true,
				),
				
				array(
					'id'       => 'blog_single_social_share_status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Share', 'manual' ),
					'subtitle' => esc_html__('on/off social share from the blog post', 'manual'),
					'default'  => true,
				),
				
				array(
					'id'       => 'blog_single_sidebar_status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sidebar', 'manual' ),
					'subtitle' => esc_html__('on/off sidebar from the blog post', 'manual'),
					'default'  => true,
				),

		)
    ) );
	
	
/**********************************************
*******  WOOCOMMERCE       *****
***********************************************/
	
global $woocommerce;
if ($woocommerce) {
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'WooCommerce', 'manual' ),
        'id'               => 'theme_woocommerce',
        'customizer_width' => '400px',
        'icon'             => 'el el-shopping-cart'
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General', 'manual' ),
        'id'         => 'theme_woocommerce_general',
        'subsection' => true,
        'fields'     => array(
		
				/*array(
					'id'       => 'shop_header_layout',
					'type'     => 'switch',
					'title'    => esc_html__( 'Apply Shop Header Layout On The Single Product Page', 'bind' ),
					'subtitle'    => __( 'The default shop page <strong><i>(www.siteurl.com/shop)</i></strong> header will be applied to the single product page', 'bind' ),
					'default'  => false,
				),*/
				
				array(
					'id'       => 'woo_column_product_listing',
					'type'     => 'select',
					'title'    => esc_html__( 'Number Of Columns', 'manual' ),
					'subtitle' => esc_html__( 'Choose number of columns for product listing', 'manual' ),
					'options'  => array(
						'3' => '3 Columns',
						'4' => '4 Columns',
					),
					'default'  => '3'
				),
				
				array(
					'id'       => 'woo_display_sidebar_on_product_listing_page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display Sidebar', 'bind' ),
					'subtitle'    => __( 'Display sidebar on the product listing page i.e on default shop page', 'bind' ),
					'default'  => true,
				),
				
				/*array(
					'id'       => 'woo_display_sidebar_position_left_right',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Position', 'bind' ),
					'subtitle' => esc_html__( 'Display sidebar either on left or right side of the product listing page', 'bind' ),
					'options'  => array(
						'left' => 'Left',
						'right' => 'Right',
					),
					'default'  => 'right'
				),*/
	
		 )
    ) );
	
}


/**********************************************
*******  START  VISUAL COMPOSER       *****
***********************************************/

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Visual Composer', 'manual' ),
        'id'     => 'theme_vc_section',
        'icon'   => 'el el-website',
        'fields' => array(
		
				array(
					'id'       => 'activate-vc-inside-ajax-load-page-doc',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate VC inside documentation page', 'manual' ),
					'subtitle' => esc_html__( 'allow visual composer inside ajax load documentation pages', 'manual' ),
					'desc' =>  __( '<strong style="color:red">ALERT:</strong> Documentation records are based on the ajax call request leading to block VC shortcode that fully depend on JQuery or Javascript function <br><br> <strong style="color:green">SOLUTION:</strong> Call ANY JavaScript or JQuery function on AJAX page load, from the section <strong>"Manual Options -> Documentation -> Call Javascript on AJAX Page Load"</strong>', 'manual' ),
					'default'  => false,
				),


		)
    ) );
		
		
/**********************************************
*******  START  FAQ       *****
***********************************************/
	
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'FAQ', 'manual' ),
        'id'     => 'theme_faq_section',
        'icon'   => 'el el-question-sign',
        'fields' => array(
		
			array(
					'id'       => 'faq-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Records Display Order', 'manual' ),
					'subtitle' => esc_html__( 'FAQ records order', 'manual' ),
					'options'  => array(
						'1' => 'Ascending Order (ASC)',
						'2' => 'Descending Order (DESC)',
					),
					'default'  => '2'
			),
			
			array(
				'id'       => 'faq-display-order-by',
				'type'     => 'select',
				'title'    => esc_html__( 'FAQ Display Order By', 'manual' ),
				'subtitle' => esc_html__( 'FAQ records order by', 'manual' ),
				'options'  => array(
					'date' => 'Order By Date',
					'modified' => 'Order By Last Modified Date',
					'title' => 'Order By Title',
					'rand' => 'Order By Random',
					'menu_order' => 'Order By Page Order',
					'comment_count' => 'Order By Number of Comments',
					'none' => 'None',
				),
				'default'  => 'date'
			),
			
			array(
                'id'       => 'faq-display-sidebar-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Disable Sidebar', 'manual' ),
                'subtitle' => esc_html__( 'If checked FAQ sidebar will disable', 'manual' ),
                'default'  => false,
            ),
			
			array(
                'id'       => 'faq-display-social-share',
                'type'     => 'switch',
                'title'    => esc_html__( 'Social Share', 'manual' ),
                'subtitle' => esc_html__( 'show hide social share inside FAQ blocks', 'manual' ),
                'default'  => true,
            ),
		
		)
    ) );
	
/**********************************************
*******  // EOF FAQ  //   *****
***********************************************/
	
	
				
		
/**********************************************
*******  START  404 ERROR PAGE       *****
***********************************************/
		
	    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( '404 Error Page', 'manual' ),
        'id'     => 'theme_404_section',
        'icon'   => 'el el-remove-sign',
        'fields' => array(
					
					array(
						'id'       => 'home-404-main-title',
						'type'     => 'text',
						'title'    => esc_html__( 'Title', 'manual' ),
						'subtitle' => esc_html__( 'Enter title for 404 page', 'manual' ),
						'default'  => '404 - Page NOT Found',
					),
					
					array(
						'id'       => 'home-404-search-bar-status',
						'type'     => 'switch',
						'title'    => esc_html__( 'Disable Search Form', 'manual' ),
						'subtitle' => esc_html__('ON/OFF search bar', 'manual'),
						'default'  => false,
					),
					
					array(
						'id'       => 'home-404-body-main-title',
						'type'     => 'text',
						'title'    => esc_html__( 'Body Main Title', 'manual' ),
						'subtitle' => esc_html__( 'Enter text for 404 page', 'manual' ),
						'default'  => 'Oops! That page can’t be found',
					),
					
					array(
						'id'       => 'home-404-body-main-subtitle-title',
						'type'     => 'text',
						'title'    => esc_html__( 'Body Main Subtitle', 'manual' ),
						'subtitle' => esc_html__( 'Enter subtitle for 404 page', 'manual' ),
						'default'  => 'It looks like nothing was found at this location. Maybe try a search?',
					),
		
	
			)
		) );
	
/**********************************************
*******  EOF  404 ERROR PAGE       *****
***********************************************/
	
	
	
		
		
		
	 // -> START THEME MANUAL :: HOME
	 
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Home Page', 'manual' ),
			'id'               => 'homeconfg',
			'desc'             => esc_html__( 'These are really basic fields!', 'manual' ),
			'customizer_width' => '400px',
			'icon'             => 'el el-home'
		) );
		
	    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'manual' ),
        'id'               => 'homeconfg-header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'home-header-main-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title Text', 'manual' ),
                'subtitle' => esc_html__( 'Main title text', 'manual' ),
                'default'  => 'Beautiful Design, Unmatched Support',
            ),
			
			 array(
                'id'       => 'home-header-main-title-color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Title Text Color', 'manual' ),
                'default'  => '#FFFFFF',
            ),
			
			
           array(
                'id'      => 'home-header-sub-title',
                'type'    => 'textarea',
                'title'   => esc_html__( 'Sub Title', 'manual' ),
                'default' => 'Welcome to our support center, the place to be if you have questions or need assistance',
            ),
			
			 array(
                'id'       => 'home-header-sub-title-color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Sub Title Color', 'manual' ),
                'default'  => '#FFFFFF',
            ),
			
			
			array(
					'id'       => 'home-search-form-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search Form', 'manual' ),
				    'desc'     => esc_html__('ON/OFF search form for the home page', 'manual'),
					'default'  => true,
			),
			
			
            array(
                'id'       => 'home-header-background-img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Header Background Image', 'manual' ),
                'compiler' => 'true',
            ),
			
			
			array(  
                'id'       => 'home-header-background-padding',
                'type'     => 'text',
                'title'    => esc_html__( 'Redefine Padding', 'manual' ),
                'subtitle' => esc_html__( 'Reduce home page header banner height', 'manual' ),
                'default'  => '170',
				'desc'     => __('<strong>Omit px</strong> (Default: 170 == equal top and bottom height)', 'manual'),
            ),
			

			)
		) );
		
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Help Section', 'manual' ),
			'id'               => 'help-section',
			'subsection'       => true,
			'customizer_width' => '450px',
			'fields'           => array(
			
			
				array(
					'id'       => 'home-help-section-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Home Help Section', 'manual' ),
					'default'  => true,
				),
				
				
				array(
                'id'       => 'home-help-section-mindisplay-blocks',
                'type'     => 'select',
                'title'    => esc_html__( 'Display Minimum "X" no of Help Blocks', 'manual' ),
                'subtitle' => esc_html__( 'Choose minimum number of help blocks to display', 'manual' ),
                'options'  => array(
                    '3' => 'Block 3',
                    '4' => 'Block 4',
                ),
                'default'  => '4'
            ),
				
				
			
				array(
					'id'       => 'home-help-section-title-main',
					'type'     => 'text',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'subtitle' => esc_html__( 'Main title text', 'manual' ),
					'default'  => 'Browse Suitable Help Section',
				),
			
			   array(
					'id'      => 'home-help-section-msg-short',
					'type'    => 'textarea',
					'title'   => esc_html__( 'Sub Title', 'manual' ),
					'default' => 'Easily create Documentation, Knowledge-base, FAQ, Forum and more using page layouts and the tools we provide.',
				),
				
				array(
					'id'    => 'home-help-section-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'Help Section Block Infomration', 'manual' ),
					'desc'  => __( 'Please click on <strong>"Home Help Blocks -> Add New Block"</strong> to add new blocks on the Help Section', 'manual' )
				),
				
				
			)
		) );
		
		
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Message Bar', 'manual' ),
			'id'               => 'home-message-bar-section',
			'subsection'       => true,
			'customizer_width' => '450px',
			'fields'           => array(
			
				array(
					'id'       => 'de-message-bar',
					'type'     => 'switch',
					'title'    => esc_html__( 'Message Bar Display Status', 'manual' ),
					'default'  => true,
				),
				
				array(
					'id'       => 'message-bar-main-title',
					'type'     => 'text',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'subtitle' => esc_html__( 'Main title text', 'manual' ),
					'default'  => 'Didn\'t find the question you were searching?',
				),
				
			   array(
					'id'      => 'message-bar-sub-title',
					'type'    => 'textarea',
					'title'   => esc_html__( 'Sub Title', 'manual' ),
					'default' => 'Loaded with awesome features like Documentation, Knowledgebase, Forum & more!',
				),
				
				
				array(
					'id'       => 'message-bar-bottom-display-text',
					'type'     => 'text',
					'title'    => esc_html__( 'Bottom Text', 'manual' ),
					'subtitle' => esc_html__( 'Bottom display text', 'manual' ),
					'default'  => 'Go To Live Chat',
				),
			
				array(
					'id'       => 'message-bar-bottom-url',
					'type'     => 'text',
					'title'    => esc_html__( 'Bottom Url', 'manual' ),
				),
			
				
				
			)
		) );
		
		
		
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Organization Blocks', 'manual' ),
			'id'               => 'home-org-blocks-section',
			'subsection'       => true,
			'customizer_width' => '450px',
			'fields'           => array(
			
				array(
					'id'       => 'home-org-block-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Organization Blocks Display Status', 'manual' ),
					'default'  => true,
				),
				
			 array(
                'id'       => 'home-org-block-background-url',
                'type'     => 'media',
                'title'    => esc_html__( 'Organizational Block Sidebar Image', 'manual' ),
            ),
				
				array(
					'id'       => 'home-org-block-main-title',
					'type'     => 'text',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'subtitle' => esc_html__( 'Main title text', 'manual' ),
					'default'  => 'Why People Love Us',
				),
				
			   array(
					'id'      => 'home-org-block-sub-title',
					'type'    => 'textarea',
					'title'   => esc_html__( 'Sub Title', 'manual' ),
					'default' => 'Loaded with awesome features like Documentation, Knowledgebase, Forum & more!',
				),
				
				array(
					'id'    => 'home-org-help-section-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'Organization Blocks Infomration', 'manual' ),
					'desc'  => __( 'Please click on <strong>"Home Org Blocks -> Add New Block"</strong> to add new blocks on the Help Section', 'manual' )
				),
				
			)
		) );
	 
	 
	 
	 
		
		
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Testimonials', 'manual' ),
			'id'               => 'home-testimonials-section',
			'subsection'       => true,
			'customizer_width' => '450px',
			'fields'           => array(
			
				array(
					'id'       => 'home-testimonials-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Organization Blocks Display Status', 'manual' ),
					'default'  => true,
				),
				
				 array(
                'id'       => 'testimonials-plx-url',
                'type'     => 'media',
                'title'    => esc_html__( 'Testimonials Parallax Image', 'manual' ),
            ),
				
				
				array(
					'id'    => 'home-testimonials-info',
					'type'  => 'info',
					'style' => 'info',
					'notice' => false,
					'title' => esc_html__( 'Testimonials Infomration', 'manual' ),
					'desc'  => __( 'Please click on <strong>"Testimonials -> Add New Block"</strong> to add new Testimonials blocks', 'manual' )
				),
				
				
			)
		) );
		
		
		
		
		
		
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Fun Act', 'manual' ),
			'id'               => 'home-funact-section',
			'subsection'       => true,
			'customizer_width' => '450px',
			'fields'           => array(
			
				array(
					'id'       => 'home-funact-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Fun Act Display Status', 'manual' ),
					'default'  => true,
				),
				
				 array(
                'id'       => 'funact-plx-url',
                'type'     => 'media',
                'title'    => esc_html__( 'Fun Act Parallax Image', 'manual' ),
				),
				
				array(
					'id'       => 'home-funact-main-title',
					'type'     => 'text',
					'title'    => esc_html__( 'Title Text', 'manual' ),
					'subtitle' => esc_html__( 'Main title text', 'manual' ),
					'default'  => 'Something you dont know...',
				),
				
			   array(
					'id'      => 'home-funact-sub-title',
					'type'    => 'textarea',
					'title'   => esc_html__( 'Sub Title', 'manual' ),
					'default' => 'Loaded with awesome features like Documentation, Knowledgebase, Forum & more!',
				),
				
				array(
                'id'       => 'home-funact-sortable',
                'type'     => 'sortable',
                'title'    => esc_html__( 'Fun Act', 'manual' ),
                'subtitle' => __( 'Define organization fun act.', 'manual' ),
                'label'    => true,
                'options'  => array(
                    'Text One'   => 'Happy Customers',
                    'Text Two'   => 'Projects',
                    'Text Three' => 'Satisfied Clients',
                    'Text Four' => 'Problem Solved',
					)
				 ),
				 
				array(
                'id'       => 'home-funact-no-sortable',
                'type'     => 'sortable',
                'title'    => esc_html__( 'Fun Act Number', 'manual' ),
                'subtitle' => __( 'Define organization fun act Number.', 'manual' ),
                'label'    => true,
                'options'  => array(
                    'Text One'   => '',
                    'Text Two'   => '',
                    'Text Three' => '',
                    'Text Four' => '',
					)
				 ),
				
			)
		) );
		
	 
	 
	 // -> EOF THEME MANUAL  HOME
	 
	 
/**********************************************
*******  START  FOOTER       *****
***********************************************/

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'manual' ),
        'id'               => 'theme-footer',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card'
    ) );
	
	// General Settings
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Settings', 'manual' ),
        'id'               => 'footer-design-bar',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
		array(
			'id'       => 'footer-widget-status',
			'type'     => 'switch',
			'title'    => esc_html__( 'Disable Footer Widget Area', 'manual' ),
			'subtitle' => esc_html__( 'Only works for the default footer style i.e with widget and footer', 'manual' ),
			'default'  => false,
		),
		
		array(
			'id'       => 'footer-social-copyright-status',
			'type'     => 'switch',
			'title'    => esc_html__( 'Disable Footer Social/copyright Area', 'manual' ),
			'subtitle' => esc_html__( 'Only works for the default footer style i.e with widget and footer', 'manual' ),
			'default'  => false,
		),
		
		array(
			'id'       => 'theme-footer-type',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Select Footer Style', 'manual' ),
			'subtitle' => esc_html__( 'Settings will effect globally', 'manual' ),
			'options'  => array(
				'1' => array( 'img' => ReduxFramework::$_url .'images/footer1.jpg' ),
				'2' => array( 'img' => ReduxFramework::$_url .'images/footer2.jpg' ),
			),
			'default'  => '2',
		),
		
        )
    ) );
	
	// Notification Bar
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Notification Bar', 'manual' ),
        'id'               => 'footer-notification-bar',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			array(
				'id'       => 'footer-notification-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Notification Bar Display Status', 'manual' ),
				'default'  => true,
			),
			
			array(
                'id'       => 'footer-notification-bar-bg-color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Color RGBA', 'manual' ),
                'default'  => array(
                    'color' => '#5AA773',
                    'alpha' => '1'
                ),
                'mode'     => 'background',
            ),
			
			array(
                'id'       => 'footer-notification-bar-background-img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Background Image', 'manual' ),
                'compiler' => 'true',
            ),
			
			array(
                'id'            => 'footer-notification-bar-text-margin',
                'type'          => 'slider',
                'title'         => esc_html__( 'Text Margin Top/Bottom', 'manual' ),
                'default'       => 1,
                'min'           => 1,
                'step'          => 1,
                'max'           => 200,
                'display_value' => 'label'
            ),
		
			array(
                'id'      => 'footer-text',
                'type'    => 'editor',
                'title'   => esc_html__( 'Message', 'manual' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    'teeny'         => false,
                    'quicktags'     => true,
                )
            ),
			
        )
    ) );
	
	
	// Footer Section Settings
	 Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Section Settings', 'manual' ),
        'id'               => 'footer-section-settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			
			array(
                'id'       => 'footer_widget_section_selector',
                'type'     => 'section',
                'title'    => esc_html__( 'Footer Style (Widget + Social/Copyright)', 'manual' ),
                'indent'   => true,
            ),
			
			array(
                'id'            => 'theme_footer_noof_section_widget_area',
                'type'          => 'slider',
                'title'         => esc_html__( 'Number Of Widget', 'manual' ),
                'default'       => 4,
                'min'           => 1,
                'step'          => 1,
                'max'           => 4,
                'display_value' => 'label'
            ),
			
			array(
				'id'       => 'footer-disable-social-icons',
				'type'     => 'switch',
				'title'    => esc_html__( 'Disable Social Icons', 'manual' ),
				'subtitle' => 'Click <code>On</code> to disable social icons.',
				'default'  => false,
			),
			
			array(
				'id'       => 'footer-disable-copyright-section',
				'type'     => 'switch',
				'title'    => esc_html__( 'Disable Copyright Section', 'manual' ),
				'subtitle' => 'Click <code>On</code> to disable copyright section.',
				'default'  => false,
			),
			
			array(
                'id'       => 'footer-copyright',
                'type'     => 'text',
                'title'    => esc_html__( 'Copyright Text', 'manual' ),
            ),
		
	 )
    ) );

	
	// Social Icons Settings
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Icons Settings', 'manual' ),
        'id'               => 'footer-copyright-social-bar',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			array(
                'id'       => 'footer-social-facebook',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-twitter',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-youtube',
                'type'     => 'text',
                'title'    => esc_html__( 'Youtube URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-google',
                'type'     => 'text',
                'title'    => esc_html__( 'Google URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-instagram',
                'type'     => 'text',
                'title'    => esc_html__( 'Instagram URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-linkedin',
                'type'     => 'text',
                'title'    => esc_html__( 'Linkedin URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-pinterest',
                'type'     => 'text',
                'title'    => esc_html__( 'Pinterest URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-vimo',
                'type'     => 'text',
                'title'    => esc_html__( 'vimo URL', 'manual' ),
            ),
			
			array(
                'id'       => 'footer-social-tumblr',
                'type'     => 'text',
                'title'    => esc_html__( 'Tumblr URL', 'manual' ),
            ),
			
        )
    ) );
	
/**********************************************
*******  //  EOF  FOOTER  //     *****
***********************************************/
	


/**********************************************
*******  //  FORUM SECTION  //     *****
***********************************************/


    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Forum', 'manual' ),
        'id'               => 'theme-forum',
        'customizer_width' => '400px',
        'icon'             => 'el el-comment-alt'
    ) );
	
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General Settings', 'manual' ),
        'id'     => 'manual-forum',
		'subsection'  => true,
		'customizer_width' => '450px',
        'fields' => array(
		
            array(
                'id'       => 'manual-forum-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title Text', 'manual' ),
                'desc'     => esc_html__( 'Will appear on the top bar', 'manual' ),
                'default'  => 'Forum',
            ),
			
            array(
                'id'       => 'manual-forum-subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Sub-title Text', 'manual' ),
                'desc'     => esc_html__( 'forum sub-title', 'manual' ),
                'default'  => '',
            ),
			
			array(
				'id'       => 'bbpress_breadcrumb',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Root Forums', 'manual' ),
				'subtitle' => esc_html__( 'Display Root "Forums" on your bbPress Breadcrumb', 'manual' ),
				'default'  => false,
			),
			
			array(
				'id'       => 'bbpress_breadcrumb_status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'manual' ),
				'subtitle' => esc_html__( 'Enable/Disable "breadcrumb" on the forum pages', 'manual' ),
				'default'  => true,
			),
			
			array(
				'id'       => 'bbpress_search_status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Search', 'manual' ),
				'subtitle' => esc_html__( 'Enable/Disable "Search" on the forum pages', 'manual' ),
				'default'  => true,
			),
		
           array(
                'id'       => 'manual-forum-yes-no-sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Display Form Home Page With Or Without Sidebar', 'manual' ),
                'options'  => array(
                    '1' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '2' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                    
                ),
                'default'  => '2'
            ),
			
			array(
                'id'      => 'manual-forum-message',
                'type'    => 'editor',
                'title'   => esc_html__( 'User Alert Message', 'manual' ),
				'subtitle' => esc_html__( 'will appear on the forum home page', 'manual' ),
                'default' => '',
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    'teeny'         => false,
                    'quicktags'     => false,
                )
            ),
			
        )
    ) );
	
	
	
	// forum head design
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Design', 'manual' ),
        'id'               => 'bbpres-header-design',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			 array(
                'id'       => 'bbpress-header-image',
                'type'     => 'media',
                'title'    => esc_html__( 'Background Image', 'manual' ),
				'url' => true,
            ),
			
			array(
                'id'            => 'bbpress-header-height',
                'type'          => 'slider',
                'title'         => esc_html__( 'Header Height', 'manual' ),
                'default'       => 90,
                'min'           => 1,
                'step'          => 1,
                'max'           => 220,
                'display_value' => 'label',
				'subtitle' => esc_html__( 'Equal top/bottom padding', 'manual' ),
            ),
		
		

        )
    ) );
	
/**********************************************
*******  //  EOF FORUM SECTION  //     *****
***********************************************/


	 
	 Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Code', 'manual' ),
        'id'         => 'manual-editor',
        //'icon'  => 'el el-brush',
        'subsection' => false,
        'fields'     => array(
            array(
                'id'       => 'manual-editor-css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'CSS Custom Code', 'manual' ),
                'subtitle' => esc_html__( 'Change theme design using your own custom code', 'manual' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
            ),
            array(
                'id'       => 'manual-editor-js',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'JS Code', 'manual' ),
                'subtitle' => esc_html__( 'Paste your JS code here.', 'manual' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
            ),
        )
    ) );

	 
	 
	 
/**********************************************
*******  //  EOF  CONTENT  //     *****
***********************************************/
	 
	 
	 
	 


    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

