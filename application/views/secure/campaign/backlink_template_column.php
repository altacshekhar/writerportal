    <?php
    //pre_exit($campaign_briefs);       
    //pre_exit($backlink_url_list); 
    $r = 0;
    $is_backlink_freeze = "";
    if($form_action == "publish")
        $is_backlink_freeze = "readonly";
        foreach ($backlink_url_list as $key => $backlink_url) {
            $backlink = $backlink_list[$backlink_url];
            $keywords=explode(",",$backlink['keywords']);
            $temp_k=0;
           ?>
        <div id="backlink_column_<?php echo $backlink ['article_id']?>" class="col-4" >

        <?php
         for ($i=0; $i < $campaign_quantity ; $i++) { 
            $brief_keyword = (!empty($campaign_briefs) && array_key_exists($i,$campaign_briefs)) ? explode(',',$campaign_briefs[$i]['article_anchortext']) : array();
            $brief_article_id = (!empty($campaign_briefs) && array_key_exists($i,$campaign_briefs)) ? explode(',',$campaign_briefs[$i]['wp_article_id']) : array();
            if(($temp_k) == count($keywords)){
                $temp_k=0;
            } 
            $keyword = array_key_exists($temp_k,$keywords) ? $keywords[$temp_k] : '';
            if(!in_array($backlink['article_id'],$brief_article_id))
            {   
                array_splice($brief_keyword,$r,0,[$keyword]);
                //$brief_keyword[$r] = $keyword;
            }
            if(array_key_exists($r,$brief_keyword))
            {
                $keyword = $brief_keyword[$r];
            }
            if($i == 0)
            {
                echo '<label class="col-form-label" title="'.$backlink_url.'">'.substr($backlink_url,0,14).'..</label>';
            }                    
       ?>
       <div class="form-group" style="height: 45px;">
           <input type="hidden" class="form-control backlink-url" id="backlinks-url-<?php echo $i ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_wp_url][]" placeholder="URL" value="<?php echo $backlink_url; ?>" required="">
           <input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-<?php echo $i ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_wp_id][]" value="<?php echo $backlink ['article_id']?>">
           <input type="text" class="form-control backlink-anchortext px-1" id="backlinks-anchor-text-<?php echo $i+1 ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_anchortext][]" placeholder="Anchor text <?php echo $i+1 ?>" value="<?php echo $keyword?>" required="" <?php echo $is_backlink_freeze; ?>>
       </div>
       <?php $temp_k++; } 
       if($form_action != "publish")
       {?>
       <div class="text-center mt-n2 mb-1">

       <a class="delete-backlink" data-col="<?php echo $r;?>" data-backlink-id="<?php echo $backlink ['article_id']?>" href="#"> <i class="fas fa-times text-danger"></i> </a>
       </div>
       <?php 
       }
       ?>
       </div>
       <?php $r++; }
      
        if($briefs)
        {
           foreach($briefs as $key => $val)
           {?>
            <input type="hidden" class="form-control backlink-wp-articles-id" id="link_wp_articles_id-<?php echo $key ?>" name="backlinks[<?php echo $key ?>][link_wp_articles_id]" placeholder="" value="<?php echo $val['link_wp_articles_id']; ?>">
            <input type="hidden" class="form-control" id="brief_id-<?php echo $key ?>" name="brief_id[]" placeholder="" value="<?php echo $val['brief_id']; ?>">
           <?php }
        }
        if($briefs_backlinks)
        {
           foreach($briefs_backlinks as $key => $bb)
           {?>
                <input type="hidden" class="form-control" id="backlink_id-<?php echo $key ?>" name="backlink_id[]" placeholder="" value="<?php echo $bb['backlink_id']; ?>">
           <?php 
           }
        }
        ?>

