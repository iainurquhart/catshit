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
				$("input#cat_image").live("click", function() {
					$.ee_filebrowser.add_trigger("input#cat_image", function (a) {
							$("input#cat_image" + window.file_manager_context).val("{filedir_" + a.directory + "}" + a.name)
					});
				});
			});
		
		</script>
		
		');

	}
	
}
// END CLASS