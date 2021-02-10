<!-- Article Brief  Model for Edit Values in Content Brief -->
<div class="modal fade" id="assignWriterModal" tabindex="-1" role="dialog" aria-labelledby="assignWriterModal"
	    aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-center-viewport modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Assign Writer</h5>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="Websites" class="col-form-label">Website</label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                        <label for="Websites" class="col-form-label"><?php echo $articlesbrief['website']; ?></label>

                        <?php
                            $data_brief_website = array(
                                'name' => "brief_website",
                                'value' => set_value("brief_website", $articlesbrief['website'], $html_escape=FALSE),
                                'type' => 'hidden'
                            );
                            echo form_input($data_brief_website);
                            $data_brief_primary_keyword = array(
                                'name' => "brief_primary_keyword",
                                'value' => set_value("brief_primary_keyword", $articlesbrief['brief_primary_keyword'], $html_escape=FALSE),
                                'type' => 'hidden'
                            );
                            echo form_input($data_brief_primary_keyword);
                        ?>
                        </div>
                    </div>
                </div>
                <div class="row pt-1">
                    <div class="col-md-4">
                        <label class="site structure">Site Structure</label>
                    </div>
                    <div class="col-md-8 article-brief-article-type">
                        <div class="custom-control custom-radio custom-control-inline">
                        <!--<input type="radio" id="topicClusterBrief" name="siteStructure" value="cluster" class="custom-control-input" data-show-class=".cluster-show-brief" checked>-->
                        <?php
                        $cluster='';
                        $blog='';
                        $display_pillar_show='';
                        $display_blog_show='';
                        $pillar_show ='.pillar-show-brief';
                        $blog_show ='.blog-show-brief';
                        if($articlesbrief['brief_article_site_structure']){

                        if($articlesbrief['brief_article_site_structure']=='cluster'){
                            $cluster = 'checked';
                            $display_blog_show ='display:none;';
                            $display_pillar_show ='display:block;';
                        }else{
                            $blog = 'checked';
                            $display_pillar_show ='display:none;';
                            $display_blog_show ='display:block;';
                        }
                        }else{
                            $cluster = 'checked';
                        }
                        $data_brief_article_site_structure = array(
                            'id' => "topicClusterBrief",
                            'name' => "brief_article_site_structure",
                            'value' =>'cluster',
                            'checked' => $cluster,
                            'class' =>'custom-control-input',
                            'data-show-class' =>'.cluster-show-brief'
                        );
                        echo form_radio($data_brief_article_site_structure);
                        
                        ?>
                        <label class="custom-control-label" for="topicClusterBrief">Topic Cluster</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                        <!--<input type="radio" id="blogBrief" name="brief_article_site_structure" value="blog" class="custom-control-input" data-show-class=".blog-show-brief" >-->
                        <?php

                        $data_brief_article_site_structure_blog = array(
                            'id' => "blogBrief",
                            'name' => "brief_article_site_structure",
                            'value' =>'blog',
                            'checked' => $blog,
                            'class' =>'custom-control-input',
                            'data-show-class' =>'.blog-show-brief'
                        );
                        echo form_radio($data_brief_article_site_structure_blog);
                        
                        ?>
                        <label class="custom-control-label" for="blogBrief">Blog</label>
                        </div>
                    </div>
                </div>
                <div class="row pt-1">
                    <div class="col-md-4">
                        <label class="article type">Article Type</label>
                    </div>
                    <div class="col-md-8">
                        <div class="article-brief-article-type cluster-show-brief" style="<?php echo $display_pillar_show ?>">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <!--<input type="radio" id="pillarArticleBrief" name="articleClusterType" value="pillar" class="custom-control-input"  data-show-class=".pillar-show-brief" checked>-->
                                    <?php
                                        $pillar='';
                                        $supporting='';
                                        if($articlesbrief['brief_article_type']){

                                            if($articlesbrief['brief_article_type']=='pillar'){
                                                $pillar = 'checked';
                                            }elseif($articlesbrief['brief_article_type']=='supporting'){
                                                $supporting = 'checked';
                                            }else{
                                                $pillar = 'checked';	
                                            }
                                        }else{
                                            $pillar = 'checked';
                                        }
                                        //pre($supporting);
                                        $data_brief_article_site_structure_pillar = array(
                                            'id' => "pillarArticleBrief",
                                            'name' => "articleClusterType",
                                            'value' =>'pillar',
                                            'checked' => $pillar,
                                            'class' =>'custom-control-input',
                                            'data-show-class' =>'.pillar-show-brief'
                                        );
                                        echo form_radio($data_brief_article_site_structure_pillar);

                                    ?>

                                    <label class="custom-control-label" for="pillarArticleBrief">Pillar Article</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <!--<input type="radio" id="supportingArticleBrief" name="articleClusterType" value="supporting" class="custom-control-input"  data-show-class=".supporting-show-brief">-->
                                    <?php
                                        
                                        $data_brief_article_site_structure_supporting = array(
                                            'id' => "supportingArticleBrief",
                                            'name' => "articleClusterType",
                                            'value' =>'supporting',
                                            'checked' => $supporting,
                                            'class' =>'custom-control-input',
                                            'data-show-class' =>'.supporting-show-brief'
                                        );
                                        echo form_radio($data_brief_article_site_structure_supporting);

                                    ?>
                                    <label class="custom-control-label" for="supportingArticleBrief">Supporting Article</label>
                                </div>
                            </div>
                            <div class="article-brief-article-type hide blog-show-brief" style="<?php echo $display_blog_show ?>">
                                <div class="custom-control custom-radio custom-control-inline">
                                <!--<input type="radio" id="blogArticleBrief" name="articleBlogType" value="article" data-json-category='<?php //echo $article_categories ?>' class="custom-control-input" checked>-->
                                <?php
                                    $article='';
                                    $recipe='';
                                    $news='';
                                    $article_selected_category='';
                                    $news_selected_category='';
                                    $recipe_selected_category='';
                                    if($articlesbrief['brief_article_type']){

                                        if($articlesbrief['brief_article_type']=='article'){
                                            $article = 'checked';
                                            $categories = json_decode($article_categories);
                                            $article_selected_category = $articlesbrief['brief_article_category'];
                                        }elseif($articlesbrief['brief_article_type']=='recipe'){
                                            $recipe = 'checked';
                                            $categories = json_decode($recipe_categories);
                                            $recipe_selected_category = $articlesbrief['brief_article_category'];
                                        }elseif($articlesbrief['brief_article_type']=='news'){
                                            $news = 'checked';
                                            $categories = json_decode($news_categories);
                                            $news_selected_category = $articlesbrief['brief_article_category'];
                                        }else{
                                            $article = 'checked';	
                                        }
                                    }else{
                                        $article = 'checked';
                                    }
                                    $data_brief_article_site_structure_article = array(
                                        'id' => "blogArticleBrief",
                                        'name' => "articleBlogType",
                                        'value' =>'article',
                                        'checked' => $article,
                                        'class' =>'custom-control-input',
                                        'data-json-category' => htmlentities($article_categories),
                                        'data-selected-category' => $article_selected_category
                                    );
                                    echo form_radio($data_brief_article_site_structure_article);

                                ?>
                                <label class="custom-control-label" for="blogArticleBrief">Blog Article</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <!--<input type="radio" id="recipeArticleBrief" name="articleBlogType" value="recipe" data-json-category='<?php //echo $recipe_categories ?>' class="custom-control-input">-->
                                <?php
                                    
                                    $data_brief_article_site_structure_recipe = array(
                                        'id' => "recipeArticleBrief",
                                        'name' => "articleBlogType",
                                        'value' =>'recipe',
                                        'checked' => $recipe,
                                        'class' =>'custom-control-input',
                                        'data-json-category' => htmlentities($recipe_categories),
                                        'data-selected-category' => $recipe_selected_category
                                    );
                                    echo form_radio($data_brief_article_site_structure_recipe);

                                ?>
                                <label class="custom-control-label" for="recipeArticleBrief">Recipe Article</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <!--<input type="radio" id="pressReleaseBrief" name="articleBlogType" value="news" data-json-category='<?php //echo $news_categories ?>' class="custom-control-input">-->
                                <?php
                                    
                                    $data_brief_article_site_structure_news = array(
                                        'id' => "pressReleaseBrief",
                                        'name' => "articleBlogType",
                                        'value' =>'news',
                                        'checked' => $news,
                                        'class' =>'custom-control-input',
                                        'data-json-category' => htmlentities($news_categories),
                                        'data-selected-category' => $news_selected_category
                                    );
                                    echo form_radio($data_brief_article_site_structure_news);

                                ?>
                                <label class="custom-control-label" for="pressReleaseBrief">Press Release</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="supporting-show-brief hide">
                    <div class="row pt-1">
                        <div class="col-md-4">
                            <label for="brief_article_pillar" class="col-form-label">Pillar Article</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" id="brief_article_pillar" name="brief_article_pillar">
                            <?php
                            foreach ($pillar_list as $pillararticle) { 
                                $selected='';
                                if($pillararticle['article_pillar_id']==$articlesbrief['brief_article_pillar_id']){
                                    $selected='selected';
                                }
                                ?>
                                <option value="<?php echo $pillararticle['article_permalink'] . '/' . trim($pillararticle['article_pillar_id']) ?>" <?php echo $selected;?> ><?php echo ucwords($pillararticle['keywords']) ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row pt-1">
                    <div class="col-md-4">
                        <label for="article icon">Article Icon</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                        $data_brief_article_icon = array(
                            'name' => "brief_article_icon",
                            'value' => set_value("brief_article_icon", $articlesbrief['brief_article_icon'], $html_escape=FALSE),
                            'placeholder' => 'Article Icon',
                            'class' => 'form-control article-iconpicker',
                            'required' => 'required',
                            'autocomplete' => 'off',
                            'data-msg-required'=>"Please enter icon"
                        );
                        echo form_input($data_brief_article_icon);
                        echo form_error("brief_article_icon");
                        ?>
                    </div>
                </div>
                <div class="row pt-1">
                    <div class="col-md-4">
                        <label for="article icon">Word Length</label>
                    </div>
                    <div class="col-md-8">
                        <?php
                        $data_brief_word_length = array(
                            'name' => "brief_word_length",
                            'value' => set_value("brief_word_length", $articlesbrief['brief_word_length'], $html_escape=FALSE),
                            'placeholder' => 'Word Length',
                            'class' => 'form-control',
                            'required' => 'required',
                            'autocomplete' => 'off',
                            'type' => 'number',
                        );
                        echo form_input($data_brief_word_length);
                        echo form_error("brief_word_length");
                        ?>
                    </div>
                </div>
                <div class="row pt-1">
                    <div class="col-md-4">
                        <label for="assigned to">Assigned To</label>
                    </div>
                    <div class="col-md-8">
                    <?php
                        $js = 'id="brief_assigned_to"  class="select-2 form-control-sm" required="required"';
                        echo form_dropdown("brief_assigned_to", $writers, $articlesbrief['brief_assigned_to'], $js);
                        echo form_error("brief_assigned_to");
                    ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-link text-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" name="submitForm" value="assign_writer" class="btn btn-primary btn-sm save-assign-writer" data-disable-with="Loading..." autocomplete="off">
					Add
				</button>
			</div>
        </div>
    </div>
</div>                                