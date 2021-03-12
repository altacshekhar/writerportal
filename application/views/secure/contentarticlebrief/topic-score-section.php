<?php 
$data_highlight_keywords = array(
	'type' => 'hidden',
	'name' => "highlight_keywords",
	'value' => json_encode($optimizecontent),
	'id' => 'highlight_keywords',
	'class' => 'highlight_keywords'
);
echo form_input($data_highlight_keywords);
if($optimizecontent['content_performance']['total_word_on_page'] > 0){
	$keyword = ucwords($optimizecontent['content_performance']['optimizing_content_keyword']);
?>
	<!-- content-o-sidebar start -->
	<div class="card content-o-sidebar">
		<div class="card-body pb-0 content-o-header">
			<h5 class="font-weight-normal">Optimizing content for the keyword</h5>
			<h4 class="font-weight-normal text-primary"><?php echo $keyword;?></h4>
		</div>
		<div class="card-header pt-1 pb-0 content-o-header">
			<div class="d-flex align-items-end">
				<h3 class="display-4 m-0">
					<?php 
						echo $optimizecontent['content_performance']['performance_rank_score'];
					?>
				</h3>
				<span class="text-light"><i class="fas fa-info-circle align-top fa-lg fa-fw"></i></span>
			</div>
			<div class="mt-n2">
				<div class="position-relative">
					<span class="text-muted text-uppercase position-absolute" style="top: 0.75rem; font-size: 1rem; ">
					Content Performance 
					</span>
					<?php 
					$target = (int) $optimizecontent['content_performance']['target'];
					if($target > 100)
						$target = 99;
					?>
					<span class="progress-tooltip" style="left: <?php echo $target;?>%;">
					Target: 
					<?php 
						echo $optimizecontent['content_performance']['target'];
						$target_score = $optimizecontent['content_performance']['target'];
						$performance_rank_score = $optimizecontent['content_performance']['performance_rank_score'];
						$remaining_score = 0;
					?>
					</span>
					<div class="progress progress-bar-striped" style="height: 25px;">
						<div class="progress-bar <?php echo ($performance_rank_score > $target_score) ? 'bg-success' : 'bg-primary'?> progress-bar-striped small" style="width: <?php echo $performance_rank_score;?>%">
						<?php 
							echo $performance_rank_score . "%";
						?>
					</div>
						<?php 
							if($performance_rank_score <= $target_score){
								$remaining_score = $target_score - $performance_rank_score;
							}
						?>
						<div class="progress-bar bg-light progress-bar-striped small" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $remaining_score; ?>%;"><?php echo $remaining_score . "%"; ?></div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body pb-0 content-o-body">
			<?php if($optimizecontent['content_performance']['performance_can_rank'] <=50 ){ 
			$content_rank = $optimizecontent['content_performance']['performance_can_rank'];
			?>
			<div class="alert alert-warning small text-center mb-0 small">
				This content can rank in the top <?php echo $content_rank ?> Google results
			</div>
			<?php }else{ ?>
			<div class="alert alert-warning small text-center mb-0 small">
				This content needs to be optimized to rank higher in Google
			</div>
			<?php } ?>
		</div>
		<div class="card-body pt-0 content-o-body">
			<hr class="my-2">
			<div class="d-flex justify-content-between mb-2">
				<div>
					<h3 class="h2 m-0">
						<span>
							<?php 
								echo $optimizecontent['content_performance']['total_already_use'];
							?>
						</span> / <span class="text-info">
							<?php 
								echo $optimizecontent['content_performance']['total_focus_keywords'];
							?>
						</span>
					</h3>
					<p class="text-light mb-0 small">
						FOCUS KEYWORDS
					</p>
				</div>
				<div>
					<h3 class="h2 m-0">
					<?php 
					echo number_format($optimizecontent['content_performance']['readability_score'], 2);
					?>
					</h3>
					<p class="text-light mb-0 small">
						READABILITY SCORE
					</p>
				</div>
				<div>
					<h3 class="h2 m-0">
						<?php 
							echo $optimizecontent['content_performance']['total_word_on_page'];
						?>
					</h3>
					<p class="text-light mb-0 small">
						WORDS ON PAGE
					</p>
				</div>
			</div>
			<div id="accordion-1" class="accordion">
				<div class="card border-success">
					<div class="alert alert-success d-flex justify-content-between align-items-center m-0 collapsed" id="heading-1-1" data-toggle="collapse" role="button" data-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1" style="">
						<h6 class="text-success text-uppercase mb-0">KEYWORDS YOU ALREADY USE</h6>
						<span class="h4 ml-auto text-success mb-0">
							<?php 
								echo $optimizecontent['content_performance']['total_already_use'];
							?>
						</span>
					</div>
					<?php if(count($optimizecontent['already_use']) > 0){?>
					<div id="collapse-1-1" class="collapse" aria-labelledby="heading-1-1" data-parent="#accordion-1" style="">
						<div class="card-body pb-0 pr-0">
							<div class="kw-group-items">
								<?php foreach ($optimizecontent['already_use'] as $already_use) { ?>
								<div class="kw-group-item d-flex align-items-center">
									<?php if($already_use['priority']){ ?>
									<div class="small">
										<i class="fas fa-circle align-middle text-success"></i>
									</div>
									<?php } ?>
									<h6 class="m-0"><?php echo $already_use['keyword']; ?></h6>
								</div>
								<?php } ?>
							</div>							
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="card border-primary">
					<div class="alert alert-primary d-flex justify-content-between align-items-center m-0 collapsed" id="heading-1-2" data-toggle="collapse" role="button" data-target="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2" style="">
						<h6 class="text-primary text-uppercase mb-0">Keywords You Should Use</h6>
						<span class="h4 ml-auto text-primary mb-0">
							<?php 
								echo $optimizecontent['content_performance']['total_should_use'];
							?>
						</span>
					</div>
					<?php if(count($optimizecontent['should_use']) > 0){?>
					<div id="collapse-1-2" class="collapse" aria-labelledby="heading-1-2" data-parent="#accordion-1" style="">
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
					<?php } ?>
				</div>
				<div class="card  border-warning rounded-0">
					<div class="alert alert-warning d-flex justify-content-between align-items-center  m-0 collapsed" id="heading-1-3" data-toggle="collapse" role="button" data-target="#collapse-1-3" aria-expanded="false" aria-controls="collapse-1-3" style="">
						<h6 class="text-warning text-uppercase mb-0">Keywords You Should Use More Often</h6>
						<span class="h4 ml-auto text-warning mb-0">
							<?php 
								echo $optimizecontent['content_performance']['total_more_often'];
							?>
						</span>
					</div>
					<?php if(count($optimizecontent['more_often']) > 0){?>
					<div id="collapse-1-3" class="collapse" aria-labelledby="heading-1-3" data-parent="#accordion-1" style="">
						<div class="card-body pb-0 pr-0">
							<div class="kw-group-items">
								<?php foreach ($optimizecontent['more_often'] as $more_often) { ?>
								<div class="kw-group-item d-flex align-items-center">
									<?php if($more_often['priority']){ ?>
									<div class="small">
										<i class="fas fa-circle align-middle text-warning"></i>
									</div>
									<?php } ?>
									<h6 class="m-0"><?php echo $more_often['keyword']; ?></h6>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="card border-danger rounded-0">
					<div class="alert alert-danger d-flex justify-content-between align-items-center m-0 collapsed" id="heading-1-4" data-toggle="collapse" role="button" data-target="#collapse-1-4" aria-expanded="false" aria-controls="collapse-1-4" style="">
						<h6 class="text-danger text-uppercase mb-0">Keywords Stuffing</h6>
						<span class="h4 ml-auto text-danger mb-0">
							<?php 
								echo $optimizecontent['content_performance']['total_stuffing'];
							?>
						</span>
					</div>
					<?php if(count($optimizecontent['stuffing']) > 0){?>
					<div id="collapse-1-4" class="collapse" aria-labelledby="heading-1-4" data-parent="#accordion-1" style="">
						<div class="card-body pb-0 pr-0">
							<div class="kw-group-items">
								<?php foreach ($optimizecontent['stuffing'] as $stuffing) { ?>
								<div class="kw-group-item d-flex align-items-center">
									<?php if($stuffing['priority']){ ?>
									<div class="small">
										<i class="fas fa-circle align-middle text-danger"></i>
									</div>
									<?php } ?>
									<h6 class="m-0"><?php echo $stuffing['keyword']; ?></h6>
								</div>
								<?php } ?>
							</div>			
						</div>
					</div>
					<?php } ?>
				</div>
				<hr class="my-2">
				<div class="card border-info rounded-0">
					<div class="alert alert-light d-flex justify-content-between align-items-center m-0 collapsed" id="heading-1-5" data-toggle="collapse" role="button" data-target="#collapse-1-5" aria-expanded="false" aria-controls="collapse-1-5" style="">
						<h6 class="text-info text-uppercase mb-0">CONTENT IDEAS VIA QUESTIONS PEOPLE ASK</h6>
						<span class="h4 ml-auto text-info mb-0">
							<?php 
								echo $optimizecontent['content_performance']['total_questions'];
							?>
						</span>
					</div>
					<?php if(count($optimizecontent['questions']) > 0){?>
					<div id="collapse-1-5" class="collapse" aria-labelledby="heading-1-5" data-parent="#accordion-1" style="">
						<div class="card-body pb-0 pr-0">
							<div class="kw-group-items">
								<?php foreach ($optimizecontent['questions'] as $questions) { ?>
								<div class="kw-group-item d-flex align-items-center">
									<?php if($questions['priority']){ ?>
									<div class="small">
										<i class="fas fa-circle align-middle text-info"></i>
									</div>
									<?php } ?>
									<h6 class="m-0">
										<?php echo $questions['keyword']; ?>
									</h6>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?>
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
<?php }else{ ?>
	<div class="card content-o-sidebar">
		<div class="card-body pb-0 content-o-header">
			<h5 class="font-weight-normal">Optimizing content for the keyword</h5>
			<h4 class="font-weight-normal text-primary"><?php echo ucwords($optimizecontent['content_performance']['optimizing_content_keyword']);?></h4>
			<!-- <ul class="list-group list-group-flush  pb-2">
				<li class="list-group-item border-0 px-0 pb-0">1. <span class="link-underline">Write</span> your content</li>
				<li class="list-group-item border-0 px-0 pb-0">2. Click <span class="link-underline">Check Score</span> Button</li>
				<li class="list-group-item border-0 px-0 pb-0">3. Check <span class="link-underline">optimization</span> suggestions</li>
				<li class="list-group-item border-0 px-0 pb-0">4. <span class="link-underline">Improve</span> your content</li>
			</ul>  -->
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
					
					<div id="collapse-1-2" class="collapse" aria-labelledby="heading-1-2" data-parent="#accordion-1" style="">
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