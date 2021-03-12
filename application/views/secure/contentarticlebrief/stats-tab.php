<?php 
$random = rand(10000,99999);
if($stats_data)
{
?>
<div id="accordion-<?php echo $random ?>" class="accordion">
    <div class="card border-default">
<?php 
$c = 0;
foreach($stats_data as $stats)
{
    if($stats['a_text'] && $stats['a_href'] && strlen($stats['description']) > 10)
    {
        $mt = $c == 0 ? "mt-1" : "";
        $a_desc = str_replace($stats['a_text'],'<a class="ent _Small_Business_Chron" href="'.$stats['a_href'].'">'.$stats['a_text'].'</a>',$stats['description']);
    ?>    
    <div class="alert alert-secondary alert-default d-flex mb-1 <?php echo $mt?> m-0 collapsed overview-collapse" id="heading-1-1">
        <div data-toggle="collapse" role="button" data-target="#collapse-<?php echo $random.'-'.$c; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $random.'-'.$c?>" style="">
        <h6 class="text-default mb-0"><i class="icon-action fa fa-chevron-down" style="font-size: 12px"></i> 
            <?php echo $stats['a_text']."<br>"?>
            <img class="favicon" src="https://www.google.com/s2/favicons?domain_url=<?php echo $stats['a_href']?>" /> <?php echo $stats['a_href']?> 
        </h6>
        </div>
        <button type="button" class="btn-circle btn-corner stats-copy" data-title="<?php echo $stats['description']; ?>"><i class="fas fa-copy"></i></button>    
    </div>
    <div id="collapse-<?php echo $random.'-'.$c?>" class="collapse" aria-labelledby="heading-1-1" data-parent="#accordion-<?php echo $random?>" style="">
        <p class="text-jutify mx-1 mb-1"><?php echo $stats['description'] ?></p>
    </div>
    <?php
    $c++; 
    }
}
?>
    </div>
</div>
<?php 
}
?>