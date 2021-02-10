<?php 
//$optimizecontent = $optimizecontent['result']; 
$data_highlight_keywords = array(
	'type' => 'hidden',
	'name' => "highlight_keywords",
	'value' => json_encode($optimizecontent),
	'id' => 'highlight_keywords',
	'class' => 'highlight_keywords'
);
echo form_input($data_highlight_keywords);
if($optimizecontent['content_performance']['total_should_use']){ ?>
	<div class="card content-o-sidebar">
		<div class="card-body pb-0 content-o-header">
			<!--<h5 class="font-weight-normal">Create brief for the keyword</h5>
			<h4 class="font-weight-normal text-primary"><?php //echo ucwords($optimizecontent['content_performance']['optimizing_content_keyword']);?></h4>
			<ul class="list-group list-group-flush  pb-2">
				<li class="list-group-item border-0 px-0 pb-0">1. <span class="link-underline">Write</span> your content</li>
				<li class="list-group-item border-0 px-0 pb-0">2. Click <span class="link-underline">Check Score</span> Button</li>
				<li class="list-group-item border-0 px-0 pb-0">3. Check <span class="link-underline">optimization</span> suggestions</li>
				<li class="list-group-item border-0 px-0 pb-0">4. <span class="link-underline">Improve</span> your content</li>
			</ul> -->
		</div>
		<?php //if($optimizecontent['content_performance']['total_should_use']){ ?>
		<div class="card-body pt-0 content-o-body">
			<div id="accordion-1" class="accordion">
				<div class="card border-primary">
					<div class="alert alert-primary d-flex justify-content-between align-items-center m-0 collapsed" id="heading-1-2" data-toggle="collapse" role="button" data-target="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2" style="">
						<h6 class="text-primary text-uppercase mb-0">Keywords You Should Use</h6>
						<span class="h4 ml-auto text-primary mb-0">
							<?php 
								echo $optimizecontent['content_performance']['total_should_use'];
							?>
						</span>
					</div>
					
					<div id="collapse-1-2" class="collapse show" aria-labelledby="heading-1-2" data-parent="#accordion-1" style="">
						<div class="card-body pb-0 pr-0">
							<div class="kw-group-items">
								<?php foreach ($optimizecontent['should_use'] as $should_use) { ?>
								<div class="kw-group-item d-flex align-items-center">
									<?php if($should_use['priority']){ ?>
									<div class="small">
										<i class="fas fa-circle align-middle text-primary"></i>
									</div>
									<?php } ?>
									<h6 class="m-0"><?php echo $should_use['keyword']; ?></h6>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<?php //} ?>
	</div>
<?php } ?>

<!-- content-o-sidebar end -->