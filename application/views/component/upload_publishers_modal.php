<div class="modal fade" id="upload-publisher-modal" tabindex="-1" role="dialog" aria-labelledby="newArticleModalLabel"
	    aria-hidden="true" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog modal-center-viewport modal-dialog-centered modal-lg" role="document">
	        <div class="modal-content">
			    <div class="modal-header">
				    <h5 class="modal-title">Upload Publisher</h5>
			    </div>
	            <div class="modal-body">
                    <?php 
                    echo form_open_multipart('secure/publishers/doUpload');
                    ?>
                    <div class="row">
                        <div class="col-md-3 col-lg-3"></div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="article-master-iconpicker" class="col-form-label">Upload Publisher Excel / CSV</label>
                                <input class="form-control" type="file" id="uploadFile" name="uploadFile" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3"></div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <button type="submit" name="doUpload" id="doUpload" class="btn btn-success" value="do">Upload Publishers</button>
                            </div>
                        </div>
                    </div>
                    <?php 
                    echo form_close();
                    ?>  				
	            </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-link text-danger" data-dismiss="modal">Close</button>
			    </div>
	            
	        </div>
	    </div>
	</div>
	</div>