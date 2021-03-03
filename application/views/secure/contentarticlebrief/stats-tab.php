<?php 
foreach($stats_data as $stats)
{
    if($stats['a_text'] && $stats['a_href'] && strlen($stats['description']) > 10)
    {
        $a_desc = str_replace($stats['a_text'],'<a class="ent _Small_Business_Chron" href="'.$stats['a_href'].'">'.$stats['a_text'].'</a>',$stats['description']);
    ?>    
    <div class="alert alert-secondary alert-default d-flex mt-1 m-0">
        <div>
        <p><?php echo $a_desc; ?></p>
        <span style="display: inherit; margin-top: 8px; opacity: 0.6;">
            <i class="fas fa-link"></i>
            <span style="vertical-align: middle;">External link to <a href="<?php echo $stats['a_href']?>" target="_blank"><u class="ng-binding"><?php echo $stats['a_href'] ?></u></a></span>
        </span>
        </div>
        <button type="button" class="btn-circle btn-corner stats-copy" data-anchor="<?php echo $stats['a_text'] ?>" data-href="<?php echo $stats['a_href']; ?>"><i class="fas fa-copy"></i></button>
    </div>
    <?php 
    }
}
?>