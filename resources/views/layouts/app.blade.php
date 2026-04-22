<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8" />

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
            {{ trim(View::yieldContent('title') . ' | ' . config('app.name')) }}
        </title>

        <link rel="icon" type="image/png" href="{{ asset("wp-content/logo/logo.png") }}" sizes="96x96">
        <link rel="icon" type="image/svg+xml" href="{{ asset("wp-content/logo/logo.png") }}">
        <link rel="shortcut icon" href="{{ asset("wp-content/logo/logo.png") }}">

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("wp-content/logo/logo.png") }}">

            @vite(['resources/css/app.css'])
        @stack('styles')
        <link rel='stylesheet' id='astra-theme-css-css'
              href=' {{asset('wp-content/themes/astra/assets/css/minified/main.mina07c.css')}}'
              media='all'/>

        <link rel='stylesheet' id='contact-form-7-css'
              href='  {{asset('wp-content/plugins/contact-form-7/includes/css/styles6fb3.css')}}'
              media='all'/>
        <link rel='stylesheet' id='astra-contact-form-7-css'
              href=' {{asset('wp-content/themes/astra/assets/css/minified/compatibility/contact-form-7-main.mina07c.css')}}'
              media='all'/>
        <link rel='stylesheet' id='dashicons-css'
              href='{{asset('wp-includes/css/dashicons.min32d4.css')}}' media='all'/>

        <link rel='stylesheet' id='rmp-menu-styles-css'
              href="{{ asset('wp-content/uploads/rmp-menu/css/rmp-menu.css') }}" media='all'/>

        <link rel='stylesheet' id='admin-bar-css' href="{{ asset('wp-includes/css/admin-bar.min32d4.css') }}" media='all' />

        <link rel='stylesheet' id='woocommerce-layout-css' href="{{ asset('wp-content/themes/astra/assets/css/minified/compatibility/woocommerce/woocommerce-layout-grid.mina07c.css') }}" media='all' />
        <link rel='stylesheet' id='woocommerce-smallscreen-css' href="{{ asset('wp-content/themes/astra/assets/css/minified/compatibility/woocommerce/woocommerce-smallscreen-grid.mina07c.css') }}" media='only screen and (max-width: 921px)' />
        <link rel='stylesheet' id='woocommerce-general-css' href="{{ asset('wp-content/themes/astra/assets/css/minified/compatibility/woocommerce/woocommerce-grid.mina07c.css') }}" media='all' />

        <link rel='stylesheet' id='wcz-frontend-css' href="{{ asset('wp-content/plugins/woocustomizer/assets/css/frontend6fca.css') }}" media='all' />
        <link rel='stylesheet' id='wsm-style-css' href="{{ asset('wp-content/plugins/wp-stats-manager/css/style62ea.css') }}?ver=1.2" media='all' />
        <link rel='stylesheet' id='hostinger-reach-subscription-block-css' href="{{ asset('wp-content/plugins/hostinger-reach/frontend/dist/blocks/subscription1214.css') }}" media='all' />
        <link rel='stylesheet' id='dgwt-wcas-style-css' href="{{ asset('wp-content/plugins/ajax-search-for-woocommerce/assets/css/style.min86af.css') }}" media='all' />

        <link rel='stylesheet' id='taxopress-frontend-css-css' href="{{ asset('wp-content/plugins/simple-tags/assets/frontend/css/frontend2e00.css') }}" media='all' />
        <link rel='stylesheet' id='chaty-front-css-css' href="{{ asset('wp-content/plugins/chaty/css/chaty-front.min8ec7.css') }}" media='all' />

        <link rel='stylesheet' id='elementor-frontend-css' href="{{ asset('wp-content/plugins/elementor/assets/css/frontend.min37de.css') }}" media='all' />
        <link rel='stylesheet' id='elementor-post-1877-css' href="{{ asset('wp-content/uploads/elementor/css/post-1877f59a.css') }}" media='all' />
        <link rel='stylesheet' id='brizy-asset-group-1_2-21-css' class="brz-link brz-link-preview-lib-pro" data-brz-group="group-1_2" href="{{ asset('wp-content/plugins/brizy-pro/public/editor-build/prod/css/group-1_2-pro.min4dca.css') }}" media='all' />
        <link rel='stylesheet' id='brizy-asset-main-30-css' class="brz-link brz-link-preview-pro" href="{{ asset('wp-content/plugins/brizy-pro/public/editor-build/prod/css/preview.pro.min4dca.css') }}" media='all' />

        <script src="{{ asset('wp-includes/js/jquery/jquery.minf43b.js') }}" id="jquery-core-js"></script>
        <script src="{{ asset('wp-includes/js/jquery/jquery-migrate.min5589.js') }}" id="jquery-migrate-js"></script>
        <script src="{{ asset('wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.minae83.js') }}" id="wc-jquery-blockui-js" data-wp-strategy="defer"></script>

        <script src="{{ asset('wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.minf607.js') }}" id="wc-add-to-cart-js" defer data-wp-strategy="defer"></script>
        <script src="{{ asset('wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.minf503.js') }}" id="wc-js-cookie-js" data-wp-strategy="defer"></script>
        <script src="{{ asset('wp-content/plugins/simple-tags/assets/frontend/js/frontend2e00.js') }}" id="taxopress-frontend-js-js"></script>


       <style>
         .dgwt-wcas-details-wrapp{
            display:none

        }
       </style>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18095309673"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-18095309673');
        </script>
    </head>

    <body class="wp-singular page-template page-template-brizy-blank-template page-template-brizy-blank-template-php page page-id-535 wp-custom-logo wp-theme-astra theme-astra woocommerce-js wcz-woocommerce wcz-btns wcz-btn-style-default wcz-wooblocks wcz-soldout-style-plain ast-header-break-point ast-page-builder-template ast-no-sidebar astra-4.6.11 ast-single-post ast-inherit-site-logo-transparent ast-hfb-header brz ast-normal-title-enabled elementor-default elementor-kit-1877">
        <main>
            @yield('content')
        </main>
    </body>

    @stack('scripts')
    <script id="rmp_menu_scripts-js-extra">
        var rmp_menu = {
            "ajaxURL": "#", "wp_nonce": "e57a6f7b01", "menu": [{
                "menu_theme": "new new 2",
                "theme_type": "template",
                "theme_location_menu": "0",
                "submenu_submenu_arrow_width": "40",
                "submenu_submenu_arrow_width_unit": "px",
                "submenu_submenu_arrow_height": "39",
                "submenu_submenu_arrow_height_unit": "px",
                "submenu_arrow_position": "right",
                "submenu_sub_arrow_background_colour": "",
                "submenu_sub_arrow_background_hover_colour": "",
                "submenu_sub_arrow_background_colour_active": "",
                "submenu_sub_arrow_background_hover_colour_active": "",
                "submenu_sub_arrow_border_width": "",
                "submenu_sub_arrow_border_width_unit": "px",
                "submenu_sub_arrow_border_colour": "#1d4354",
                "submenu_sub_arrow_border_hover_colour": "#3f3f3f",
                "submenu_sub_arrow_border_colour_active": "#1d4354",
                "submenu_sub_arrow_border_hover_colour_active": "#3f3f3f",
                "submenu_sub_arrow_shape_colour": "#fff",
                "submenu_sub_arrow_shape_hover_colour": "#fff",
                "submenu_sub_arrow_shape_colour_active": "#fff",
                "submenu_sub_arrow_shape_hover_colour_active": "#fff",
                "use_header_bar": "off",
                "header_bar_items_order": {
                    "logo": "off",
                    "title": "on",
                    "additional content": "off",
                    "menu": "on",
                    "search": "off"
                },
                "header_bar_title": "Responsive Menu",
                "header_bar_html_content": "",
                "header_bar_logo": "",
                "header_bar_logo_link": "",
                "header_bar_logo_width": "",
                "header_bar_logo_width_unit": "%",
                "header_bar_logo_height": "",
                "header_bar_logo_height_unit": "px",
                "header_bar_height": "80",
                "header_bar_height_unit": "px",
                "header_bar_padding": {"top": "0px", "right": "5%", "bottom": "0px", "left": "5%"},
                "header_bar_font": "",
                "header_bar_font_size": "14",
                "header_bar_font_size_unit": "px",
                "header_bar_text_color": "#ffffff",
                "header_bar_background_color": "#1d4354",
                "header_bar_breakpoint": "8000",
                "header_bar_position_type": "fixed",
                "header_bar_adjust_page": "on",
                "header_bar_scroll_enable": "off",
                "header_bar_scroll_background_color": "#36bdf6",
                "mobile_breakpoint": "600",
                "tablet_breakpoint": "1024",
                "transition_speed": "0.5",
                "sub_menu_speed": "0.2",
                "show_menu_on_page_load": "off",
                "menu_disable_scrolling": "off",
                "menu_overlay": "off",
                "menu_overlay_colour": "rgba(0,0,0,0.7)",
                "desktop_menu_width": "",
                "desktop_menu_width_unit": "%",
                "desktop_menu_positioning": "absolute",
                "desktop_menu_side": "left",
                "desktop_menu_to_hide": "",
                "use_current_theme_location": "off",
                "mega_menu": {"225": "off", "227": "off", "229": "off", "228": "off", "226": "off"},
                "desktop_submenu_open_animation": "none",
                "desktop_submenu_open_animation_speed": "100ms",
                "desktop_submenu_open_on_click": "off",
                "desktop_menu_hide_and_show": "off",
                "menu_name": "Primary Menu",
                "menu_to_use": "46",
                "different_menu_for_mobile": "off",
                "menu_to_use_in_mobile": "main-menu",
                "use_mobile_menu": "on",
                "use_tablet_menu": "on",
                "use_desktop_menu": "off",
                "menu_display_on": "all-pages",
                "menu_to_hide": "",
                "submenu_descriptions_on": "off",
                "custom_walker": "",
                "menu_background_colour": "rgba(0,116,249,0)",
                "menu_depth": "5",
                "smooth_scroll_on": "off",
                "smooth_scroll_speed": "500",
                "menu_font_icons": {"id": ["225"], "icon": [""]},
                "menu_links_height": "40",
                "menu_links_height_unit": "px",
                "menu_links_line_height": "40",
                "menu_links_line_height_unit": "px",
                "menu_depth_0": "5",
                "menu_depth_0_unit": "%",
                "menu_font_size": "17",
                "menu_font_size_unit": "px",
                "menu_font": "",
                "menu_font_weight": "normal",
                "menu_text_alignment": "left",
                "menu_text_letter_spacing": "2",
                "menu_word_wrap": "off",
                "menu_link_colour": "#fff",
                "menu_link_hover_colour": "#fff",
                "menu_current_link_colour": "#fff",
                "menu_current_link_hover_colour": "#fff",
                "menu_item_background_colour": "rgba(221,51,51,0)",
                "menu_item_background_hover_colour": "#dd3333",
                "menu_current_item_background_colour": "#fb8b43",
                "menu_current_item_background_hover_colour": "#dd3333",
                "menu_border_width": "",
                "menu_border_width_unit": "px",
                "menu_item_border_colour": "#1d4354",
                "menu_item_border_colour_hover": "#1d4354",
                "menu_current_item_border_colour": "#1d4354",
                "menu_current_item_border_hover_colour": "#3f3f3f",
                "submenu_links_height": "40",
                "submenu_links_height_unit": "px",
                "submenu_links_line_height": "40",
                "submenu_links_line_height_unit": "px",
                "menu_depth_side": "left",
                "menu_depth_1": "10",
                "menu_depth_1_unit": "%",
                "menu_depth_2": "15",
                "menu_depth_2_unit": "%",
                "menu_depth_3": "20",
                "menu_depth_3_unit": "%",
                "menu_depth_4": "25",
                "menu_depth_4_unit": "%",
                "submenu_item_background_colour": "",
                "submenu_item_background_hover_colour": "",
                "submenu_current_item_background_colour": "",
                "submenu_current_item_background_hover_colour": "",
                "submenu_border_width": "",
                "submenu_border_width_unit": "px",
                "submenu_item_border_colour": "#1d4354",
                "submenu_item_border_colour_hover": "#1d4354",
                "submenu_current_item_border_colour": "#1d4354",
                "submenu_current_item_border_hover_colour": "#3f3f3f",
                "submenu_font_size": "13",
                "submenu_font_size_unit": "px",
                "submenu_font": "",
                "submenu_font_weight": "normal",
                "submenu_text_letter_spacing": "",
                "submenu_text_alignment": "left",
                "submenu_link_colour": "#fff",
                "submenu_link_hover_colour": "#fff",
                "submenu_current_link_colour": "#fff",
                "submenu_current_link_hover_colour": "#fff",
                "inactive_arrow_shape": "\u25bc",
                "active_arrow_shape": "\u25b2",
                "inactive_arrow_font_icon": "",
                "active_arrow_font_icon": "",
                "inactive_arrow_image": "",
                "active_arrow_image": "",
                "submenu_arrow_width": "40",
                "submenu_arrow_width_unit": "px",
                "submenu_arrow_height": "39",
                "submenu_arrow_height_unit": "px",
                "arrow_position": "right",
                "menu_sub_arrow_shape_colour": "#fff",
                "menu_sub_arrow_shape_hover_colour": "#fff",
                "menu_sub_arrow_shape_colour_active": "#fff",
                "menu_sub_arrow_shape_hover_colour_active": "#fff",
                "menu_sub_arrow_border_width": "",
                "menu_sub_arrow_border_width_unit": "px",
                "menu_sub_arrow_border_colour": "#1d4354",
                "menu_sub_arrow_border_hover_colour": "#3f3f3f",
                "menu_sub_arrow_border_colour_active": "#1d4354",
                "menu_sub_arrow_border_hover_colour_active": "#3f3f3f",
                "menu_sub_arrow_background_colour": "",
                "menu_sub_arrow_background_hover_colour": "",
                "menu_sub_arrow_background_colour_active": "rgba(33,33,33,0.01)",
                "menu_sub_arrow_background_hover_colour_active": "",
                "fade_submenus": "off",
                "fade_submenus_side": "left",
                "fade_submenus_delay": "100",
                "fade_submenus_speed": "500",
                "use_slide_effect": "off",
                "slide_effect_back_to_text": "Back",
                "accordion_animation": "off",
                "auto_expand_all_submenus": "off",
                "auto_expand_current_submenus": "on",
                "menu_item_click_to_trigger_submenu": "off",
                "button_width": "55",
                "button_width_unit": "px",
                "button_height": "55",
                "button_height_unit": "px",
                "button_background_colour": "#fb8b43",
                "button_background_colour_hover": "#1d4354",
                "button_background_colour_active": "#fb8b43",
                "toggle_button_border_radius": "5",
                "button_transparent_background": "off",
                "button_left_or_right": "right",
                "button_position_type": "fixed",
                "button_distance_from_side": "5",
                "button_distance_from_side_unit": "%",
                "button_top": "33",
                "button_top_unit": "px",
                "button_push_with_animation": "off",
                "button_click_animation": "boring",
                "button_line_margin": "10",
                "button_line_margin_unit": "px",
                "button_line_width": "25",
                "button_line_width_unit": "px",
                "button_line_height": "3",
                "button_line_height_unit": "px",
                "button_line_colour": "#fff",
                "button_line_colour_hover": "#fff",
                "button_line_colour_active": "#fff",
                "button_font_icon": "",
                "button_font_icon_when_clicked": "",
                "button_image": "",
                "button_image_when_clicked": "",
                "button_title": "",
                "button_title_open": "",
                "button_title_position": "left",
                "menu_container_columns": "",
                "button_font": "",
                "button_font_size": "14",
                "button_font_size_unit": "px",
                "button_title_line_height": "13",
                "button_title_line_height_unit": "px",
                "button_text_colour": "#fff",
                "button_trigger_type_click": "on",
                "button_trigger_type_hover": "off",
                "button_click_trigger": "",
                "items_order": {"title": "on", "additional content": "on", "menu": "on", "search": "on"},
                "menu_title": "Responsive Menu",
                "menu_title_link": "",
                "menu_title_link_location": "_self",
                "menu_title_image": "",
                "menu_title_font_icon": "",
                "menu_title_section_padding": {"top": "10%", "right": "5%", "bottom": "0%", "left": "5%"},
                "menu_title_background_colour": "",
                "menu_title_background_hover_colour": "",
                "menu_title_font_size": "25",
                "menu_title_font_size_unit": "px",
                "menu_title_alignment": "center",
                "menu_title_font_weight": "400",
                "menu_title_font_family": "",
                "menu_title_colour": "#ffffff",
                "menu_title_hover_colour": "#fff",
                "menu_title_image_width": "",
                "menu_title_image_width_unit": "%",
                "menu_title_image_height": "",
                "menu_title_image_height_unit": "px",
                "menu_additional_content": "Add more content here...",
                "menu_additional_section_padding": {"top": "0%", "right": "5%", "bottom": "10%", "left": "5%"},
                "menu_additional_content_font_size": "16",
                "menu_additional_content_font_size_unit": "px",
                "menu_additional_content_alignment": "center",
                "menu_additional_content_colour": "#6fda44",
                "menu_search_box_text": "Search",
                "menu_search_box_code": "",
                "menu_search_section_padding": {"top": "5%", "right": "5%", "bottom": "5%", "left": "5%"},
                "menu_search_box_height": "45",
                "menu_search_box_height_unit": "px",
                "menu_search_box_border_radius": "30",
                "menu_search_box_text_colour": "#1d4354",
                "menu_search_box_background_colour": "#ffffff",
                "menu_search_box_placeholder_colour": "#1d4354",
                "menu_search_box_border_colour": "",
                "menu_section_padding": {"top": "0px", "right": "0px", "bottom": "0px", "left": "0px"},
                "menu_width": "75",
                "menu_width_unit": "%",
                "menu_maximum_width": "350",
                "menu_maximum_width_unit": "px",
                "menu_minimum_width": "320",
                "menu_minimum_width_unit": "px",
                "menu_auto_height": "off",
                "menu_container_padding": {"top": "0px", "right": "0px", "bottom": "0px", "left": "0px"},
                "menu_container_background_colour": "#1d4354",
                "menu_background_image": "",
                "animation_type": "slide",
                "menu_appear_from": "left",
                "animation_speed": "0.5",
                "page_wrapper": "body",
                "menu_close_on_body_click": "off",
                "menu_close_on_scroll": "off",
                "menu_close_on_link_click": "off",
                "enable_touch_gestures": "off",
                "hamburger_position_selector": "",
                "menu_id": 2694,
                "active_toggle_contents": "\u25b2",
                "inactive_toggle_contents": "\u25bc"
            }]
        };
    </script>

    <script src="{{ asset('wp-content/plugins/responsive-menu/v4.0.0/assets/js/rmp-menu.min.js') }}" id="rmp_menu_scripts-js"></script>

    {{--<script src="https://www.youtube.com/iframe_api"></script>--}}

</html>
