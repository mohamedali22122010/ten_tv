$(document).ready(function() {

	(function() {
        if ($("div.nav-tabs-custom").length) {
        	
        	$("div.nav-tabs-custom").tabs({
	            activate: function(event, ui) {

					if (location.hash) {
					    setTimeout(function() {

					        window.scrollTo(0, 0);
					    }, 1);
					}

	                //window.location.hash = ui.newPanel.selector;
	            }
        	});
        	//jQuery UI Tabs

        	$("div.nextTab a").on("click", function(event) {
        		event.preventDefault();
        		var tab = $(this).data("tab-index");
		        $('div.nav-tabs-custom').tabs("option", "active", tab);
        	});

			window.Parsley.on('form:error', function(formInstance) {
			    for (var i = 0; i < formInstance.fields.length; i++) {
			        var field = formInstance.fields[i];
			        if (true !== field.validationResult && field.validationResult.length > 0 && 'undefined' === typeof field.options.noFocus) {
			            var focusedField = field.$element;
			            var tab = $(focusedField).closest(".tab-pane").data("tab-index");

			            console.log(tab);
			            $('div.nav-tabs-custom').tabs("option", "active", tab);

			            // if ($(focusedField).is('select:hidden')) {
			            //     $(focusedField).parent().find('input').focus();
			            // } else {
			            //     $(focusedField).focus();
			            // }

			            // focus on first invalid element
			            break;
			        }
			    }
			});

        }
    })();
    //jQuery UI tabs and switch tabs if parsley fails
    
    (function() {
        if ($("input.selectAll").length) {
            var selectAll = $("input.selectAll"),
                checkboxes = $("table tbody input");
            selectAll.on("click", function() {
                var checkedStatus = this.checked;
                checkboxes.each(function() {
                    this.checked = checkedStatus;
                });
            });
        }
    })();
    //Select All Checkbox

});