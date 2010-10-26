<?php
class Catshit_acc {

	var $name			= 'Catshit';
	var $id				= 'catshit';
	var $version		= '1.0';
	var $description	= 'Adds file browser to category image field when editing categories on the publish page';
	var $sections		= array();



	function set_sections()
	{
		$EE =& get_instance();
		
		// cheers to @leevigraham for this one.
		$this->sections[] = '<script type="text/javascript" charset="utf-8">$("#accessoryTabs a.catshit").parent().remove();</script>';
		
		// RAGE.
		$EE->cp->add_to_head('
		<script type="text/javascript">
		
			$(document).ready(function(){
				$(".ui-widget input#cat_image").live("click", function() {
					$.ee_filebrowser.add_trigger("input#cat_image", function (a) {
							
	
							var full_url = EE.upload_directories[a.directory].url + a.name;
							relative_url = full_url.replace(/http:\/\/[^\/]+/i,""); 
							
							$("input#cat_image" + window.file_manager_context).val(relative_url)
					});
				});
			});
		
		</script>
		
		');

	}
	
}
// END CLASS