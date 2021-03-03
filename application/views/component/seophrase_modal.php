	<div class="modal fade" id="seophraseModal" tabindex="-1" role="dialog" aria-labelledby="seophraseModalLabel"
	    aria-hidden="true" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog modal-center-viewport modal-dialog-centered modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header modal-header-borderless">
	                <h3>Seo Keyword Phrase</h3>
	            </div>
	            <div class="modal-body pt-2 pb-4">
	                <?php
						$attributes = array('class' => 'form-horizontal form-hub-secure', 'id' => 'seophrase-form');
						echo form_open('', $attributes);
						?>
						<div class="form-group">
							<div class="row">
								<div class="col-md-9"><input type="text" id="keyword_search" name="keyword_search" value="" class="form-control keyword_search"></div>
								<div class="col-md-3"> <button type="submit" class="btn btn-success btn-block">Go</button></div>
							</div>
						</div>
	                <div class="text-black-50 small mt-2">
					The SEO keyword phrase is the search  query you want  this article to appear for, in the serch engine results page( i.e the serch term you would type into google).
	                </div>
	            </div>
	            <!-- End Signin -->
	            <?php echo form_close(); ?>
	        </div>
	    </div>
	</div>
	</div>