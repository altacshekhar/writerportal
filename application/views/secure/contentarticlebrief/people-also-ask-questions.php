<?php 
foreach($paa_data as $paa)
{
?>
<div class="alert alert-secondary alert-default d-flex mt-1 m-0">
    <p><?php echo $paa; ?></p>
    <button type="button" class="btn-circle btn-corner paa-questions-copy" data-title="<?php echo $paa;?>"><i class="fas fa-copy"></i></button>
</div>
<?php
}
?>
