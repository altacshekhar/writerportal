<?php 
foreach($links_data as $links)
{
    if($links['a_text'] && $links['a_href'] && strlen($links['description']) > 10)
    {
        $a_desc = str_replace($links['a_text'],'<a class="ent _Small_Business_Chron" href="'.$links['a_href'].'">'.$links['a_text'].'</a>',$links['description']);
    ?>    
    <div class="alert alert-secondary alert-default d-flex mt-1 m-0">
        <div>
        <p><?php echo $a_desc; ?></p>
        <span style="display: inherit; margin-top: 8px; opacity: 0.6;">
            <i class="fas fa-link"></i>
            <span style="vertical-align: middle;">External link to <a href="<?php echo $links['a_href']?>" target="_blank"><u class="ng-binding"><?php echo $links['a_href'] ?></u></a></span>
        </span>
        </div>
        <button type="button" class="btn-circle btn-corner links-copy" data-href="<?php echo $links['a_href']?>" data-anchor="<?php echo $links['a_text']?>"><i class="fas fa-copy"></i></button>
    </div>
    <?php 
    }
}
?>