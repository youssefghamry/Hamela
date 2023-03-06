;(function($) {
    "use strict";

    jQuery(document).ready(function(){
        //Header
        elementor.settings.page.addChangeCallback( 'style_header', handleReloadPreview );
        elementor.settings.page.addChangeCallback( 'site_logo', handleReloadPreview );
        //Page
        elementor.settings.page.addChangeCallback( 'sidebar_layout', handleReloadPreview );
        
        //Footer
        elementor.settings.page.addChangeCallback( 'show_footer_info', handleReloadPreview );
    });

    function handleReloadPreview ( newValue ) {
        elementor.saver.saveEditor({
            status: elementor.settings.page.model.get('post_status'),
            onSuccess: () => {
                elementor.reloadPreview();

                elementor.once("preview:loaded", function() {
                    elementor.getPanelView().setPage("page_settings");
                });
            }
        })
    }

})(jQuery);