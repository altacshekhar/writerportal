<div class="container">
 <h1  class="text-center">Article Brief Info</h1>
 <hr>
  <div class="row">
    <div class="col-sm">
	<p><strong>Primary Keyword: </strong> <?php  echo ucfirst($brief['brief_primary_keyword']); ?></p>
	<p><strong> Headline: </strong><?php  echo ucfirst($brief['brief_headline']); ?></p>
	<p><strong> Introduction: </strong><?php  echo ucfirst($brief['brief_introduction']); ?></p>
	<p><strong> Body Outline: </strong> <?php  echo ucfirst($brief['brief_body_outline']); ?></p>
    </div>
    <div class="col-sm">
     
    </div>
  </div>
  <hr>
  <div class="row">
   <h3>Demographics</h3>
    <div class="col-sm">
	<p><strong>Demographics: </strong> <?php  echo ucfirst($brief['brief_demographics']); ?></p>
	<p><strong>What do they think now ?: </strong><?php  echo ucfirst($brief['brief_think_now']); ?></p>
	<p><strong>What do we want them to think ?: </strong><?php  echo ucfirst($brief['brief_want_them']); ?></p>
	<p><strong>What is our greatest strength ?: </strong><?php  echo ucfirst($brief['brief_strength']); ?></p>
	<p><strong>What is the one point we want to get across ?: </strong><?php  echo ucfirst($brief['brief_get_across']); ?></p>
    </div>
    <div class="col-sm">
		<h3>Psychographics</h3>
		<div class="row">
			<div class="col-sm">
			<p><strong>Fears: </strong><?php  echo ucfirst($brief['brief_psycho_fears']); ?></p>
			</div>
			<div class="col-sm">
			<p><strong>Pain Points: </strong><?php  echo ucfirst($brief['brief_psycho_pain_points']); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm">
			<p><strong>Wants: </strong><?php  echo ucfirst($brief['brief_psycho_wants']); ?></p>
			</div>
			<div class="col-sm">
			<p><strong>Values / Goals: </strong><?php  echo ucfirst($brief['brief_psycho_goals']); ?></p>
			</div>
		</div>
    </div>
  </div>
</div>