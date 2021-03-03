<?php 
foreach($serp_data as $serp)
{
?>
<div class="alert alert-secondary alert-default d-flex mt-1 m-0">
    <p><?php echo $serp ?></p>
    <button type="button" class="btn-circle btn-corner serp-questions-copy" data-title="<?php echo $serp; ?>"><i class="fas fa-copy"></i></button>
</div>
<?php
}
?>
