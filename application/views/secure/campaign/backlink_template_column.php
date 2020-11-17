<?php 
       
       foreach ($backlink_url_list as $key => $backlink_url) {

           $backlink = $backlink_list[$backlink_url];
           //pre($backlink);
           $keywords=explode(",",$backlink['keywords']);
           $temp_k=0;
           ?>
       <div id="backlink_column_<?php echo $backlink ['article_id']?>" class="col-4" >
      <?php for ($i=0; $i < $campaign_quantity ; $i++) { 
          if(($temp_k) == count($keywords)){
           $temp_k=0;
   
          } 
          if($i == 0)
           {
               echo '<label class="col-form-label" title="'.$backlink_url.'">'.substr($backlink_url,0,14).'..</label>';
           }
                                       

       ?>
       <div class="form-group" style="height: 45px;">
           <input type="hidden" class="form-control" id="backlinks-url-<?php echo $i ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_wp_url][]" placeholder="URL" value="<?php echo $backlink_url; ?>" required="">
           <input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-<?php echo $i ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_wp_id][]" value="<?php echo $backlink ['article_id']?>">
           <input type="text" class="form-control px-1" id="backlinks-anchor-text-<?php echo $i ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_anchortext][]" placeholder="Anchor text <?php echo $i ?>" value="<?php echo $keywords[$temp_k]?>" required="">
       </div>
       <?php $temp_k++; } ?>
       <div class="text-center mt-n2 mb-1">
       <a class="delete-backlink" data-backlink-id="<?php echo $backlink ['article_id']?>" href="#"> <i class="fas fa-times text-danger"></i> </a>
       </div>
       </div>
       
       <?php } ?>