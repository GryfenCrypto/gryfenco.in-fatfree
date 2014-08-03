/**
 * Created by stefano on 7/21/14.
 */
function  generatePage(menu,content,footer) {

    jQuery(document).ready(function() {
        "use strict";

        $( "#menubar" ).load( menu, function()
        {
            $( "#content" ).load( content,function()
            {
                $( "#footer" ).load(footer,function()
                {
                    initStylio();
                });
            } );
        } );
    });
};

