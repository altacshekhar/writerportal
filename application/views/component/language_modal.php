<div id="language-modal" class="language-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="languageModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content be-loading p-1">
			<div class="modal-header">
				<h5 class="modal-title h3 mx-auto">Add Language</h5>
			</div>
			<div class="modal-body">
				<div class="form-group mb-2">
					<?php   
						$segment_array = $this->uri->segment_array();
						$segment_array[2] = 'i18';
					?>
					<select id="article_language" name="article_language" class="form-control select-2" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
						<option value=''>Choose Language...</option>
					<?php if(isset($languages)) {
						foreach ($languages as $language_id=>$language_name) {
						$segment_array[3] = $language_id;
						$temp_str =  implode('/', $segment_array);
						$url =  site_url($temp_str);
						$active = ($language_id == $lang) ? 'selected' : '' ;?>
						<option value='<?php echo strtolower($url); ?>' <?php echo $active?>>
						<?php echo ucwords($language_name) ?>
						</option>
					<?php
						} 
					}?>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
