
	<ul class="nav nav-tabs brief-nav-tabs tab-main-section bg-secondary"" id="sideTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="top-results-tab" data-toggle="tab" href="#topresults" role="tab" aria-controls="topresults" aria-selected="true">Top Results</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="topics-tab" data-toggle="tab" href="#topics" role="tab" aria-controls="topics" aria-selected="false">Topics</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="questions-tab" data-toggle="tab" href="#questions" role="tab" aria-controls="questions" aria-selected="false">Questions</a>
		</li>
	</ul>

					<div class="tab-content" id="sideTabContent">
						<!-- Top Results Tab -->
						<div class="tab-pane fade show active" id="topresults" role="tabpanel" aria-labelledby="top-results-tab">
							<div class="">
								<ul class="nav nav-tabs topresults-tab sub-tab-section" id="subsideTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="links-tab" data-toggle="tab" href="#links" role="tab" aria-controls="links" aria-selected="false">Links</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="stats-tab" data-toggle="tab" href="#stats" role="tab" aria-controls="stats" aria-selected="false">Stats</a>
									</li>
								</ul>
							</div>
							<div class="tab-content tab-data-section" id="subsideTabContent">
								<!-- Start of Overview Tab -->
								<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
									<div class="container document-search-results" data-keyword="<?php echo $keyword; ?>" data-json-serp-url='<?php echo json_encode($serp_url);?>'>
											
									</div>
									<span class="btn show-loading "><span class="spinner-border spinner-border-sm text-primary" role="status" aria-hidden="true"></span></span>
								</div>
								<!-- End of Overview Tab -->
								<!-- Start of links Tab -->
								<div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="links-tab">
									<div class="container links-search-result">
										
									</div>
								</div>
								<!-- End of Links Tab -->
								<!-- Start of Stats Tab -->
								<div class="tab-pane fade" id="stats" role="tabpanel" aria-labelledby="stats-tab">
									<div class="container stats-search-result">
										
									</div>
								</div>
								<!-- End of Stats Tab -->
							</div>
						</div>
						<!-- End of Top Results -->
						<!-- Topic Tab -->
						<div class="tab-pane fade" id="topics" role="tabpanel" aria-labelledby="topics-tab">
							<span class="btn show-loading "><span class="spinner-border spinner-border-sm text-primary" role="status" aria-hidden="true"></span></span>
							<div class="container topic-score" data-keyword_id="<?php echo $keyword_id; ?>">
								<?php $this->load->view('secure/contentarticlebrief/topic-score-section')?>
							</div>
							
						</div>
						<!-- End of Topic-->
						<!-- Questions Tab -->
						<div class="tab-pane fade" id="questions" role="tabpanel" aria-labelledby="questions-tab">
							<div class="">
								<ul class="nav nav-tabs question-option-tab sub-tab-section" id="questionsideTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="serp-tab" data-toggle="tab" href="#serp" role="tab" aria-controls="serp" aria-selected="true">SERP</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="people-also-ask-tab" data-toggle="tab" href="#peoplealsoask" role="tab" aria-controls="peoplealsoask" aria-selected="false">People Also Ask</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link" id="quora-tab" data-toggle="tab" href="#quora" role="tab" aria-controls="quora" aria-selected="false">Quora</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="reddit-tab" data-toggle="tab" href="#reddit" role="tab" aria-controls="reddit" aria-selected="false">Reddit</a>
									</li> -->
								</ul>
							</div>
							<div class="tab-content" id="questionsideTabContent">
								<!-- SERP Tab -->
								<div class="tab-pane fade show active" id="serp" role="tabpanel" aria-labelledby="serp-tab">
									<div class="container serp-results">
										
									</div>
								</div>
								<!-- End of SERP Tab -->
								<!-- People Also Ask Tab -->
								<div class="tab-pane fade" id="peoplealsoask" role="tabpanel" aria-labelledby="people-also-ask-tab">
									<div class="container people-also-ask-results">
										
									</div>
								</div>
								<!-- End of People Also Ask Tab -->
								<!-- Quora Tab -->
								<!-- <div class="tab-pane fade" id="quora" role="tabpanel" aria-labelledby="quora-tab">
									<div class="container quora-results">
										
									</div>
								</div> -->
								<!-- End of Quora Tab -->
								<!-- Reddit Tab -->
								<!-- <div class="tab-pane fade" id="reddit" role="tabpanel" aria-labelledby="reddit-tab">
									<div class="container reddit-results">
										
									</div>
								</div> -->
								<!-- End of Reddit Tab -->
							</div>
						</div>
						<!-- End of Questions-->
					</div>
