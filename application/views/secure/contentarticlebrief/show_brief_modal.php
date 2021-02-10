<!-- Article Brief  Model for Edit Values in Content Brief -->
<div class="modal fade" id="showBriefModal" tabindex="-1" role="dialog" aria-labelledby="showBriefModal"
	    aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">CTA Preview</h5>
			</div>
			<div class="modal-body">
            <?php 
            foreach($cta_data as $cta)
            {
				?>
                <div class="preview">
					<button type="button" class="btn btn-secondary article-brief-cta mb-1" data-cta-id="<?php echo $cta->cta_lookup_id?>">Edit</button>
                    <?php $this->load->view('secure/contentarticlebrief/cta_preview',(array) $cta);?>
                </div>
            <?php }

            ?>
			</div>
            <div class="modal-footer">
				<button type="button" class="btn btn-link text-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>