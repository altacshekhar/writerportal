<?php 
if($serp_data)
{
    $random = rand(100000,999999);
    ?>
<div id="accordion-<?php echo $random ?>" class="accordion">
    <div class="card border-default">
<?php 
$c = 0;
foreach($serp_data as $serp)
{
    $mt = $c == 0 ? "mt-1" : "";
?>
    <div class="alert alert-secondary alert-default d-flex mb-1 <?php echo $mt ?> m-0 collapsed overview-collapse" id="heading-1-1">
        <div data-toggle="collapse" role="button" data-target="#collapse-<?php echo $random.'-'.$c; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $random.'-'.$c?>" style="">
        <h6 class="text-default mb-0"><i class="icon-action fa fa-chevron-down" style="font-size: 12px"></i> <?php echo $serp['ques']."<br>"?>
        <img class="favicon" src="https://www.google.com/s2/favicons?domain_url=<?php echo $serp['a_href']?>" /> <?php echo $serp['a_href']?> </h6>
        </div>
        <button type="button" class="btn-circle btn-corner serp-questions-copy" data-title="<?php echo $serp['ques']; ?>"><i class="fas fa-copy"></i></button>    
    </div>
    <div id="collapse-<?php echo $random.'-'.$c?>" class="collapse" aria-labelledby="heading-1-1" data-parent="#accordion-<?php echo $random?>" style="">
        <p class="text-jutify mx-1"><?php echo $serp['ques_text'] ?></p>
        <button type="button" class="paste-serp-questions btn btn-default btn-sm ml-1 mb-2" data-title="<?php echo $serp['ques']; ?>" data-description="<?php echo $serp['ques_text']; ?>"><i class="fas fa-copy"></i> Paste Full</button>
    </div>
    <!-- <div class="alert alert-secondary alert-default d-flex mt-1 m-0">
        <p><?php echo $serp ?></p>
        <button type="button" class="btn-circle btn-corner serp-questions-copy" data-title="<?php echo $serp; ?>"><i class="fas fa-copy"></i></button>
    </div> -->
<?php
$c++;
}
}
?>
