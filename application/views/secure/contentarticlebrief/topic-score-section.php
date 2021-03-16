<?php 
$data_highlight_keywords = array(
	'type' => 'hidden',
	'name' => "highlight_keywords",
	'value' => json_encode($optimizecontent),
	'id' => 'highlight_keywords',
	'class' => 'highlight_keywords'
);
echo form_input($data_highlight_keywords);
?>
	<!-- content-o-sidebar start -->
	<div class="card content-o-sidebar">
		<!-- <div class="card-body pb-0 content-o-header">
			<h5 class="font-weight-normal">Optimizing content for the keyword</h5>
			<h4 class="font-weight-normal text-primary"><?php echo $keyword;?></h4>
		</div> -->
		
		<div class="card-body pt-0 content-o-body">
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
					<!-- <div id="collapse-1-5" class="collapse" aria-labelledby="heading-1-5" data-parent="#accordion-1" style="">
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
					</div> -->
					<?php } ?>
				</div>
			</div>
		</div>
	</div>