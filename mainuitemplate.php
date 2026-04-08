<?php
/**
 * Default theme — UI2 template
 *
 * Loads the standard UI2 CSS stack and then appends this theme's override
 * sheet from /res/themes/default/css/custom.css.
 *
 * Usage in a project UI class:
 *
 * ```php
 * class mwap_myproject_uiadmin_main extends mwmod_mw_ui2_def_main_admin {
 *     function create_template() {
 *         return new mwtheme_default_mainuitemplate($this);
 *     }
 * }
 * ```
 *
 * Registration in src/app/init.php (if not already done):
 *
 * ```php
 * $GLOBALS["__mw_autoload_manager"]->create_and_add_sub_pref_man("default", dirname(dirname(__FILE__))."/mwap/modules/themes/default", "mwtheme");
 * ```
 *
 * @see mwmod_mw_ui2_template_main  Parent with the standard UI2 CSS stack.
 */
class mwtheme_default_mainuitemplate extends mwmod_mw_ui2_template_main {

    /**
     * Path (relative to public_html) of the theme CSS override file.
     *
     * @var string
     */
    protected string $custom_css_path = "/res/themes/default/css/custom.css";

    /**
     * Path (relative to public_html) of the theme JS enhancement file.
     *
     * @var string
     */
    protected string $custom_js_path = "/res/themes/default/js/theme.js";

    /**
     * Load standard UI2 CSS and then append the theme override sheet.
     *
     * @param mwmod_mw_html_manager_css $cssmanager
     */
    function add_default_css_sheets($cssmanager) {
        parent::add_default_css_sheets($cssmanager);

        $cssmanager->add_item_by_item(
            new mwmod_mw_html_manager_item_css("theme-custom", $this->custom_css_path)
        );
    }

    /**
     * Load standard UI2 JS and then append the theme enhancement script.
     * The script is injected at the bottom of <body> so it runs after the
     * framework markup is fully parsed.
     *
     * @param object $mainUI
     * @param mwmod_mw_html_manager_js $jsmanager
     */
    function add_default_js_scripts_for_main($mainUI, $jsmanager) {
        parent::add_default_js_scripts_for_main($mainUI, $jsmanager);

        $item = new mwmod_mw_html_manager_item_jsexternal("theme-custom-js", $this->custom_js_path);
        $item->bottom = true;
        $jsmanager->add_item_by_item($item);
    }
}
?>
