<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<select class="form-control form-control-sm select-2 filter-websites">
				<option value="">--Select All Websites--</option>
				<?php
				foreach ($website_list  as $website) {

					echo '<option value="'.$website.'">'.$website.'</option>';
				}
				?>
				
			</select>
		</div>
	</div>
</div>
<?php
	//$attributes = array('class' => 'form-horizontal form-hub-secure', 'id' => 'articlebuildbacklinks-form');
	//echo form_open('', $attributes);
?>
<div class="">
	<div class="table-responsive" style="max-height:350px">
		<table class="table table-bordered">
			<thead>
				<tr>
				<th scope="col">Website</th>
				<th scope="col">Title</th>
				<th scope="col">Published</th>
				<th scope="col">Keyword</th>
				<th scope="col">Content</th>
				<th scope="col">Backlinks</th>
				<th scope="col">Status</th>
				<th scope="col"></th>
				</tr>
			</thead>
			<tbody style="overflow-y: auto">
				<?php $response = '';
				foreach ($article_list  as $result) {
					
					$temp_array=array();
					
					$temp_array['article_id'] =$result['article_id'];
					$temp_array['article_pillar_id'] =$result['article_pillar_id'];
					$temp_array['article_url'] =$result['article_url'];
					$temp_array['keywords'] =$result['keywords'];
					$lable_text='<label  data-json ="'.htmlentities(json_encode($temp_array)).'" for="check_article_'.$result['article_id'].'" class="selected-build-backlink mb-0">Select</label>';
					
					$checkbox ='';
					if(in_array($result['article_id'], $selected_backlink)){
						$lable_text='<span class="text-success font-weight-bold">Selected</span>';
						$checkbox = "checked";
					}
					$response .= '<tr class="'.$result['article_site_id'].'" data-site-id="'.$result['article_site_id'].'">';
					$response .= '<th scope="row">'.$result['article_site_id'].'</th>';
					$response .= '<td>'.$result['article_title'].'</td>';
					$response .= '<td>'.$result['publish_date'].'</td>';
					$response .= '<td>'.$result['article_meta_keyword'].'</td>';
					$response .= '<td>'.$result['article_content_score'].'</td>';
					$response .= '<td>'.$result['backlink_article'].'</td>';
					$response .= '<td>'.$result['article_status'].'</td>';
					$response .= '<td><div class="position-relative overflow-hidden"><input type="checkbox" class="check_article_backlink" id="check_article_'.$result['article_id'].'" name="check_article" value ="'.htmlentities(json_encode($temp_array)).'" style="position: absolute; opacity:0; top:-15px" '. $checkbox .'>'.$lable_text.'</div></td>';
					$response .= '</tr>';
				}
				echo $response; ?>
			</tbody>
		</table>
	</div>
</div>