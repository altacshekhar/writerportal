    <?php 
    for($i=0; $i<$campaign_quantity;$i++)
    {
        $article_status = "";
        $brief_id = array_key_exists($i,$campaign_briefs) ? $campaign_briefs[$i]['brief_id'] : "";
        if(array_key_exists($brief_id,$brief_articles) && !empty($brief_articles))
        {
            if($brief_articles[$brief_id]['article_title'] != "")
                $article_status = "disabled";
        }
        ?>    
        <div class="form-row">
            <div class="col-3">
            <?php
            if($i == 0)
            {
                echo '<label class="col-form-label">Publisher</label>';
            }  
            $brief_publisher = array_key_exists($i,$campaign_briefs) ? $campaign_briefs[$i]['publisher_id'] : "";
            ?>
                <div class="form-group" style="height: 45px;">
                <?php
                    $js = 'id="publisher_'.$i.'"  class="form-control select-2 px-1" ';
                    echo form_dropdown("publisher[]", $publisher_dropdown,$brief_publisher, $js);
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
            $brief_writer = array_key_exists($i,$campaign_briefs) ? $campaign_briefs[$i]['brief_article_writer'] : "";
            ?>
            <div class="form-group" style="height: 45px;">
                <?php
                    $js = 'id="campaign_writer_'.$i.'"  class="form-control select-2 px-1" '.$article_status;
                    echo form_dropdown("campaign_writer[]", $writer_list,$brief_writer, $js);
                    echo form_error("campaign_writer[]");
                    if($article_status == "disabled")
                    {
                        echo '<input type="hidden" name="campaign_writer[]" value="'.$brief_writer.'" />';
                    }
                ?>
            </div>
            </div>
            <div class="col-2">
            <?php
            if($i == 0)
            {
                echo '<label class="col-form-label">Length</label>';
            }  
            $brief_length = array_key_exists($i,$campaign_briefs) ? $campaign_briefs[$i]['brief_article_length'] : "";
            ?>
            <div class="form-group" style="height: 45px;">
                <input type="text" placeholder="Length" class="form-control px-1" name="length[]" id="length_<?php echo $i ?>" value ="<?php echo $brief_length; ?>">
                </div>
            </div>
            <div class="col-2">
            <?php
            if($i == 0)
            {
                echo '<label class="col-form-label">Cost</label>';
            }  
            $brief_cost = array_key_exists($i,$campaign_briefs) ? $campaign_briefs[$i]['brief_article_cost'] : "";
            ?>
            <div class="form-group" style="height: 45px;">
                <input type="text" placeholder="Cost" class="form-control px-1" name="cost[]" id="cost_<?php echo $i ?>" value ="<?php echo $brief_cost ?>" >
                </div>
            </div>
            <div class="col-2"> 
            <?php
            if($i == 0)
            {
                echo '<label class="col-form-label">Notes</label>';
            }  
            $brief_notes = array_key_exists($i,$campaign_briefs) ? $campaign_briefs[$i]['brief_notes'] : "";
            ?>
            <div class="form-group" style="height: 45px;">
                <input type="text" placeholder="Notes" class="form-control px-1" name="notes[]" id="notes_<?php echo $i ?>" value ="<?php echo $brief_notes?>" >
                </div>
            </div>
        </div>
        <?php
    }
        ?>