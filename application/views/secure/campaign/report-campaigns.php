<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="page-title-title">
				<h1 class="mb-2">
					Campaigns Report
				</h1>
			</div>
		</div>
		<div class="highlight">
			<div class="report-campaigns-filters">
				<div class="row form-row">
					<div class="col-sm-3 ">
						<div class="form-group">
							<label class="control-label" for="user_select">Select </label>
							<select id="user_select" class="form-control select-2" data-column="0">
								<option value=''>--Select All User --</option>
								<?php 
								if(!empty($user))
								{
									foreach($user as $key => $value)
									{
										echo '<option value="'.$key.'">'.ucwords($value).'</option>';
                                    }
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
                    <label class="control-label" for="from_date">From Date </label>
                        <?php 
                        $data_from_date = array(
                                'name' => 'from_date',
                                'value' => set_value('campaign_startdate', date('Y-m-d',strtotime('-1 months'))),
                                'placeholder' => 'From Date',
                                'class' => 'form-control campaign_from_date',
                                'id' => 'from_date',
                                'data-date-format'=>"yyyy-mm-dd",
                                'data-column' => "1"
                            );
                            echo form_input($data_from_date);
                            echo form_error('from_date');
                        ?>
					</div>
                    <div class="col-sm-3">
                    <label class="control-label" for="to_date">To Date </label>
                    <?php 
                        $data_to_date = array(
                                'name' => 'to_date',
                                'value' => set_value('campaign_startdate', date('Y-m-d')),
                                'placeholder' => 'To Date',
                                'class' => 'form-control campaign_to_date',
                                'id' => 'to_date',
                                'data-date-format'=>"yyyy-mm-dd",
                                'data-column' => "2"
                            );
                            echo form_input($data_to_date);
                            echo form_error('to_date');
                        ?>
					</div>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table id="campaign_report" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="" >Content Co-ordinator</th>
						<th class="text-center"># of Campaigns</th>
						<th class="text-center"># of Articles</th>
                        <th></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

