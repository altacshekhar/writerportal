<?php 
// pre($backlink_list);
// pre($backlink_url_list);
// pre($campaign_quantity);
//pre($campaign_briefs);
?>
<style>
.d-row-flex>.col, .d-row-flex>[class*='col-'] {
    padding-right: 5px;
    padding-left: 5px;
}
</style>
<div class="form-row">
    <div class="col-2">
        <?php 

        for ($i=0; $i < $campaign_quantity ; $i++) { 
            if($i == 0)
            {
                echo '<label class="col-form-label">&nbsp;</label>';
            }  

        ?>
        <div class="form-group" style="height: 45px;">
            <div class="d-flex justify-content-between">
                <label for="" data-original-title="" title="" class="col-form-label">Article <?php echo $i+1 ?></label>
                <label for="" data-original-title="" title="" class="col-form-label">Anchor Text </label>
            </div>
            
        </div>
        <?php 

        }
        ?>
    </div>
    <div class="col-5">
    <div style="overflow-x: auto">
      <div class="d-flex d-row-flex backlink-list-mid-col">
        <?php
       
			$template_col_array = array('backlink_url_list'=> $backlink_url_list);			
            $this->load->view('secure/campaign/backlink_template_column', $template_col_array);
        ?>

        </div>
        </div>
    </div>
    <div class="col-5">
    <?php 
    $publisher_dropdown[''] = '---Select---';
    foreach($publisher as $key => $pub)
    {
        $publisher_dropdown[$pub['publisher_id']] = get_domain($pub['publisher_url']);
    }
      $i=0;  
    foreach($campaign_briefs as $key=>$brief) {  
//pre($brief);
        ?>
        <div class="form-row">
            <div class="col-3">
            <?php
            if($i == 0)
            {
                echo '<label class="col-form-label">Publisher</label>';
            }  
            ?>
            <div class="form-group" style="height: 45px;">
            <?php
                $js = 'id="publisher_'.$i.'"  class="form-control select-2 px-1"';
                echo form_dropdown("publisher[]", $publisher_dropdown, $brief['publisher_id'], $js);
                echo form_error("publisher[]");
            ?>
                </div>
            </div>
            <div class="col-3">
            <?php
            if($i == 0)
            {
                echo '<label class="col-form-label">Writer</label>';
            }  
            ?>
            <div class="form-group" style="height: 45px;">
                <?php
                    $js = 'id="campaign_writer_'.$i.'"  class="form-control select-2 px-1"';
                    echo form_dropdown("campaign_writer[]", $writer_list, $brief['brief_article_writer'], $js);
                    echo form_error("campaign_writer[]");
                ?>
            </div>
            </div>
            <div class="col-2">
            <?php
            if($i == 0)
            {
                echo '<label class="col-form-label">Length</label>';
            }  
            ?>
            <div class="form-group" style="height: 45px;">
                <input type="text" placeholder="Length" class="form-control px-1" name="length[]" id="length_<?php echo $i ?>" value ="<?php echo $brief['brief_article_length']?>">
                </div>
            </div>
            <div class="col-2">
            <?php
            if($i == 0)
            {
                echo '<label class="col-form-label">Cost</label>';
            }  
            ?>
            <div class="form-group" style="height: 45px;">
                <input type="text" placeholder="Cost" class="form-control px-1" name="cost[]" id="cost_<?php echo $i ?>" value ="<?php echo $brief['brief_article_cost']?>">
                </div>
            </div>
            <div class="col-2"> 
            <?php
            if($i == 0)
            {
                echo '<label class="col-form-label">Notes</label>';
            }  
            ?>
            <div class="form-group" style="height: 45px;">
                <input type="text" placeholder="Notes" class="form-control px-1" name="notes[]" id="notes_<?php echo $i ?>" value ="<?php echo $brief['brief_notes']?>">
                </div>
            </div>
        </div>
     <?php $i++; } ?>
    </div>
    
</div>
