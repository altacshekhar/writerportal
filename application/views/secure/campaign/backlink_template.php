<?php 
// pre($backlink_list);
// pre($backlink_url_list);
// pre($campaign_quantity);
// pre($campaign_briefs);
// pre($briefs);
// pre($briefs_backlinks);
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
        $this->load->view('secure/campaign/backlink_template_col_2_left');
        ?>
    </div>
    <div class="col-5">
    <div style="overflow-x: auto">
      <div class="d-flex d-row-flex backlink-list-mid-col">
        <?php
			$template_col_array = array('backlink_url_list'=> $backlink_url_list,'briefs' => $briefs,'briefs_backlinks' => $briefs_backlinks,'form_action' => $form_action);			
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
    $temp_col_5_right = ['campaign_quantity' => $campaign_quantity,'writer_list' => $writer_list,'publisher_dropdown' => $publisher_dropdown];
    $this->load->view('secure/campaign/backlink_template_col_5_right',$temp_col_5_right);
    ?>
    </div>
</div>
    