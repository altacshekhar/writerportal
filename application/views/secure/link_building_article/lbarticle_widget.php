<?php 
//pre($brief);
//pre($brief_backlinks);
?>

	<!-- content-o-sidebar start -->
	<div class="card content-o-sidebar">
		<div class="card-body pb-0 content-o-header">
		
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-auto col-form-label">Assigned Writer</label>
			<div class="col">
			<?php
				$js = 'id="brief_article_writer"  class="select-2 form-control-sm" required="required"';
				if($user_type ==0 || $user_type ==4 || $user_type ==5 ){
					$js = 'id="brief_article_writer"  class="select-2 form-control-sm" required="required" disabled';
				}
				
				echo form_dropdown("brief_article_writer", $writers, $brief['brief_article_writer'], $js);
				echo form_error("brief_article_writer");
			?>
			
			</div>
		</div>
		<div class="form-group row">
			<label for="Length" class="col-sm-3 col-form-label">Length </label>
			<div class="col-sm-4">
			<?php 
			     
				$data_brief_article_length = array(
					'name' => "brief_article_length",
					'value' => set_value("brief_article_length", $brief['brief_article_length'], $html_escape=FALSE),
					'placeholder' => '',
					'required' => 'required',
					'data-msg-required'=>"",
					'class' => 'form-control'
				);
				if($user_type ==0 || $user_type ==4 || $user_type ==5 ){
					$data_brief_article_length['readonly']=true;
				}
				echo form_input($data_brief_article_length);
				echo form_error("brief_article_length");
			?>
			
			</div>
			<!--<label for="Cost" class="col-sm-auto col-form-label">Cost </label>
			<div class="col">
			<?php
				$data_brief_article_cost = array(
					'name' => "brief_article_cost",
					'value' => set_value("brief_article_cost", $brief['brief_article_cost'], $html_escape=FALSE),
					'placeholder' => '',
					'required' => 'required',
					'data-msg-required'=>"",
					'class' => 'form-control'
				);
				if($user_type ==0 || $user_type ==4 || $user_type ==5){
					$data_brief_article_cost['readonly']=true;
					
				}
				echo form_input($data_brief_article_cost);
				echo form_error("brief_article_cost");
			?>
			</div> -->
		</div>
		<div class="form-group row">
			<label for="Length" class="col-sm-3 col-form-label">Notes</label>
			<div class="col-sm-9">
			<?php
				$data_brief_notes = array(
					'name' => "brief_notes",
					'rows' => 3,
					'cols' => 50,
					'value' => set_value("brief_notes", $brief['brief_notes'], $html_escape=FALSE),
					'data-msg-required'=>"",
					'class' => 'form-control',
					'readonly' => 'readonly'
				);
				if($user_type ==5){
					$data_brief_notes['readonly']=true;
				}
				echo form_textarea($data_brief_notes);
				echo form_error("brief_notes");
			?>
			</div>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-auto col-form-label">Live URL</label>
			<div class="col">
			<?php
				$data_brief_live_url = array(
					'name' => "brief_live_url",
					'value' => set_value("brief_live_url", $brief['brief_live_url'], $html_escape=FALSE),
					'placeholder' => '',
					'data-msg-required'=>"",
					'class' => 'form-control',
					'pattern' => "[Hh][Tt][Tt][Pp][Ss]?:\/\/(?:(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)*(?:\.(?:[a-zA-Z\u00a1-\uffff]{2,}))(?::\d{2,5})?(?:\/[^\s]*)?",
					'title' => "Please correct the liver url"
				);
				if($user_type ==0 || $user_type ==3 || $user_type ==4 || $user_type ==5){
					$data_brief_live_url['readonly']=true;
				}
				$article_status = strtolower($article['article_status']);
				//pre($article_status);
				if(($article_status == 'approved' || $article_status == "submitted") && ($user_type == 1 || $user_type == 6))
				{
					//$data_brief_live_url['required'] = 'required';
				}
				//pre($data_brief_live_url);
				// elseif($user_type == 1 || $user_type == 6 )
				// {
				// 	$data_brief_live_url['required'] = 'required';
				// }
				echo form_input($data_brief_live_url);
				echo form_error("brief_live_url");
			?>
			</div>
		</div>
		</div>
		<div class="card-header pt-1 pb-0 content-o-header">
			
		
		</div>
		
		<div class="card-body pt-0 content-o-body">
			<hr class="my-2">
			<div class="d-flex justify-content-between mb-2">
				<div>
				<?php 
					$total_backlinks = 0;
					$not_used_links = '';
					foreach ($brief_backlinks as $brief_backlink) { 
							$backlink_url = explode(',', $brief_backlink['backlink_url']);
							$backlink_text = explode(',', $brief_backlink['backlink_anchortext']);
							$total_backlinks += count($backlink_text);
							foreach ($backlink_text as $key => $text) {
							
							$not_used_links .= '<div class="kw-group-item  align-items-center backlinks-not-used">
							<span class="copy-clipboard" data-anchor="'.$text.'" data-text="'.str_replace(" ","_",$text).'" data-url="'.$backlink_url[$key].'">
							<a href="'.$backlink_url[$key].'" class="hide-'.str_replace(" ","_",$text).'">'.$text.'</a>  
							<p class="m-0">'.$backlink_url[$key].'</p></span><br>
							</div>';
						} 
					} ?>
					<h3 class="h2 m-0">
						<span class="text-success backlinks-used-count">
							0<?php 
								//echo $optimizecontent['content_performance']['total_already_use'];
							?>
						</span> / <span class="text-warning backlinks-total-count">
							<?php 
								echo $total_backlinks;
							?>
						</span>
					</h3>
					<p class="text-light mb-0 small">
						BACKLINKS
					</p>
				</div>
				<div>
					<h3 class="h2 m-0 read-score">
					0.00
					<?php 
					//echo number_format($optimizecontent['content_performance']['readability_score'], 2);
					?>
					</h3>
					<p class="text-light mb-0 small">
						READABILITY SCORE
					</p>
				</div>
				<div>
					<h3 class="h2 m-0 word-on-page">
						0
						<?php 
						
							//echo $optimizecontent['content_performance']['total_word_on_page'];
						?>
					</h3>
					<p class="text-light mb-0 small ">
						WORDS ON PAGE
					</p>
				</div>
			</div>
			<div class="d-flex justify-content-between mb-2">
			<p class="font-italic text-primary">
				Click a backlink to copy to your clipboard, then paste in your article(Ctrl+V)
			</p>
			</div>
			<div id="accordion-1" class="accordion">
			<div class="card border-danger rounded-0">
					<div class="alert alert-danger d-flex justify-content-between align-items-center m-0 collapsed" id="heading-1-4" data-toggle="collapse" role="button" data-target="#collapse-1-4" aria-expanded="false" aria-controls="collapse-1-4" style="">
						<h6 class="text-danger text-uppercase mb-0">ANCHOR TEXT AND BACKLINKS YOU HAVE NOT USED</h6>
						<span class="h4 ml-auto text-danger mb-0">
							<?php 
								//echo $optimizecontent['content_performance']['total_stuffing'];
							?>
						</span>
					</div>
					<?php ?>
					<div id="collapse-1-4" class="collapse" aria-labelledby="heading-1-4" data-parent="#accordion-1" style="">
						<div class="card-body pb-0 pr-0">
							<div class="kw-group-items not-used-items">
								<?php echo $not_used_links; ?>
							</div>			
						</div>
					</div>
					<?php ?>
				</div>
				<div class="card border-success">
					<div class="alert alert-success d-flex justify-content-between align-items-center m-0 collapsed" id="heading-1-1" data-toggle="collapse" role="button" data-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1" style="">
						<h6 class="text-success text-uppercase mb-0">ANCHOR TEXT AND BACKLINKS YOU ALREADY USE</h6>
						<span class="h4 ml-auto text-success mb-0">
							<?php 
								//echo $optimizecontent['content_performance']['total_already_use'];
							?>
						</span>
					</div>
					<?php //if(count($optimizecontent['already_use']) > 0){?>
					<div id="collapse-1-1" class="collapse" aria-labelledby="heading-1-1" data-parent="#accordion-1" style="">
						<div class="card-body pb-0 pr-0">
							<div class="kw-group-items used-items">
								
							</div>							
						</div>
					</div>
					<?php //} ?>
				</div>
			</div>
		</div>
	</div>
	<!--<div class="d-none d-flex justify-content-between align-items-center">
		<a class="btn btn-default border border-light">
		<i class="fas fa-exchange-alt fa-rotate-90 fa-fw"></i>
		Export Keyword List
		</a>
		<a class="btn btn-secondary text-white">
		<i class="fas fa-tachometer-alt fa-fw"></i>
		Check Score
		</a>
	</div>-->


<!-- content-o-sidebar end -->