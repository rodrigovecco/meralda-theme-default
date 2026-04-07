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
}
?>
