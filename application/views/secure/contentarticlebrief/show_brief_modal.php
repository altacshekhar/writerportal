<!-- Article Brief  Model for Edit Values in Content Brief -->
<div class="modal fade" id="showBriefModal" tabindex="-1" role="dialog" aria-labelledby="showBriefModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-center-viewport modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header pb-0">
				<h5 class="modal-title">CTA Preview</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="hr-line-dashed my-1"></div>
			<div class="modal-body pt-0">
				<p class="pixabay_results_help text-center">
					<span class="text-secondary">Clicking a CTA will add the CTA to your article.</span>
					<span class="text-danger">Do not click a CTA just to "preview" it.</span>
				</p>
				<div style="max-height: 80vh; overflow:auto">
				   <div class="cta-list-item">
						<?php
						foreach($cta_data as $cta)
						{ ?>
							<div class="preview position-relative my-1">
								<?php $this->load->view('component/cta_preview',(array) $cta);?>
								<a href="javascript:void(0)" class="case-study stretched-link library-cta" data-cta-id="<?php echo $cta->cta_lookup_id?>"></a>
							</div>
						<?php }
						?>
				   </div>
				</div>
			</div>
		</div>
	</div>
</div>