<?php 
foreach($reddit_data as $reddit)
{
?>
<div class="alert alert-secondary alert-default d-flex mt-1 m-0">
    <p><?php echo $reddit ?></p>
    <button type="button" class="btn-circle btn-corner"><i class="fas fa-copy"></i></button>
</div>
<?php
}
?>
