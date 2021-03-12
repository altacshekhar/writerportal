<?php 
if($h_tags)
{
?>
<div class="document-search-summary-meta pt-2">
    <img class="favicon" src="https://www.google.com/s2/favicons?domain_url=<?php echo $root_domain?>">
    <span><a class="text-secondary" href="<?php echo $serp_url ?>" target="_blank"><u><?php echo $root_domain?></u></a></span>
    <!-- <span>Sept 17,2020</span> -->
    <span><?php echo $word_count ?> Words</span>
</div>
<h2><?php echo $title; ?></h2>
<p><?php echo $description; ?></p>
<?php 
$random = rand(10000,99999);
?>
<div id="accordion-<?php echo $random ?>" class="accordion">
    <div class="card border-default">
        <span>Outline</span>
        <?php
        $c = 1;
        $cc = 1;
        foreach($h_tags as $htag)
        {
            $cls = "";
            $h_title = $htag['heading_text'];
            $h_description = $htag['heading_description'];
            if($htag['heading'] == 'h2' || $htag['heading'] == 'h1' || $htag['heading'] == 'h3')
            {   
                if($cc > 6)
                {
                    $cls = 'hide';
                }
                $cc++;
            }
            else{
                $cls = 'hide';
            }
            ?>
            <div class="show-overview<?php echo '-'.$random.' '.$cls; ?>">
            <?php
            if($h_title)
            { 
            ?>
            <div class="alert alert-secondary alert-default d-flex mb-1 m-0 collapsed overview-collapse" id="heading-1-1">
                <div data-toggle="collapse" role="button" data-target="#collapse-<?php echo $random.'-'.$c; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $random.'-'.$c?>" style="">
                <h6 class="text-default mb-0"><i class="icon-action fa fa-chevron-down" style="font-size: 12px"></i> <?php echo $htag['heading']."<br>".$h_title?></h6>
                </div>
                <button type="button" class="btn-circle btn-corner paste-heading" data-title="<?php echo $h_title; ?>"><i class="fas fa-copy"></i></button>    
            </div>
            <div id="collapse-<?php echo $random.'-'.$c?>" class="collapse" aria-labelledby="heading-1-1" data-parent="#accordion-<?php echo $random?>" style="">
                <p class="text-jutify mx-1"><?php echo $h_description ?></p>
                <button type="button" class="paste-full-overview btn btn-default btn-sm ml-1 mb-2" data-title="<?php echo $h_title; ?>" data-description="<?php echo $h_description; ?>"><i class="fas fa-copy"></i> Paste Full</button>
            </div>
            <?php 
            }
            ?>
            </div>
            <?php
            $c++;
        }
        if($cc > 6)
        {
            echo '<a href="javascript:void(0)" class="show-all-overviews" data-random="'.$random.'">View All Sections</a>';
        }
        ?>

    </div>
</div>
<?php 
}
?>