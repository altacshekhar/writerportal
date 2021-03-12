
<?php
	//$attributes = array('class' => 'form-horizontal form-hub-secure', 'id' => 'articlebuildbacklinks-form');
	//echo form_open('', $attributes);
?>
<div class="">
	<div class="table-responsive" style="max-height:350px">
		<table class="table table-bordered">
			<thead>
				<tr>
				<th scope="col">Article Title</th>
				<th scope="col">Anchor Text</th>
				<th scope="col">Sitelinks Rcd</th>
				<th scope="col">SEO Value</th>
				<th scope="col"></th>
				</tr>
			</thead>
			<tbody style="overflow-y: auto">
				<?php $response = '';
				foreach ($article_list  as $result) {
					
					$temp_array=array();
					$temp_array['article_id'] = $result['article_id'];
					$temp_array['article_url'] = $result['article_url'];
					$temp_array['article_anchor_text'] = $result['anchor_text'];
					$lable_text='<label  data-json ="'.htmlentities(json_encode($temp_array)).'" for="check_article_'.$result['article_id'].'" class="selected-sitelink add-sitelink mb-0">Select</label>';
					
					$checkbox ='';
					if(in_array($result['article_id'], $selected_sitelink)){
						$lable_text='<span class="text-success font-weight-bold">Selected</span>';
						$checkbox = "checked";
					}
					$response .= '<tr class="" data-site-id="">';
					
					$response .= '<td>'.$result['article_title'].'</td>';
					$response .= '<td>'.$result['anchor_text'].'</td>';
					$response .= '<td>'.$result['sitelinks_rcd'].'</td>';
					$response .= '<td>'.$result['seo_value'].'</td>';
					$response .= '<td><div class="position-relative overflow-hidden"><input type="checkbox" class="check_article_sitelink" id="check_article_'.$result['article_id'].'" name="check_article" value ="'.htmlentities(json_encode($temp_array)).'" style="position: absolute; opacity:0; top:-15px" '. $checkbox .'>'.$lable_text.'</div></td>';
					$response .= '</tr>';
				}
				echo $response; ?>
			</tbody>
		</table>
	</div>
</div>