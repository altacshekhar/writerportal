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