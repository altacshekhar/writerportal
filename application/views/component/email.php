<center>
	<table style="padding:30px;width:100%;" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td>
					<table style="width:100%;max-width:650px;min-width:348px;border:1px solid #dee2e6;" align="center" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td style="background:#4184F3;padding:20px 30px">
									<table style="width:100%;max-width:600px" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td style="max-width:600px">
													<a href="{portal_url}" style="text-decoration:none;" target="_blank">
														<img src="{portal_logo}" class="navbar-logo" alt="" height="50">
													</a>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td style="background:#fff;" align="center">
									<table style="width:100%;" align="center" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td style="border-bottom:thin solid #f0f0f0;color:#666;padding:20px 30px;font-size: 24px;">
													<div style="display:block"><?php echo $message_subject ?></div>
													<a style="color:rgba(0,0,0,0.5);font-size:16px;display:block">
														<?php echo $to_email ?>
													</a>
												</td>
											</tr>
											<tr>
												<td style="color:#666; padding:30px 30px 40px;">
													<div style="line-height:20px;text-align:left">
														<?php echo $message_body ?>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td style="background:#e9ecef;border-top:1px solid #dee2e6;padding:24px 10px" align="center">
									<table style="width:100%;" style="width:100%;max-width:600px" align="center">
										<tbody>
											<tr>
												<td style="font-size:20px;line-height:27px;text-align:center;max-width:600px">
													<a href="<?php echo site_url('#login-form-container');?>" style="font-size:18px;border: 1px solid #4184F3;display: inline-block;padding: .9rem 2rem;color: #4184F3;text-align: center;vertical-align: middle;white-space: nowrap;border-radius: .25rem;font-weight: 600;background:#FFF;text-decoration: none;">
														Login to Manage Articles
														<img src="<?php echo site_url('assets/images/icons/arrow.png');?>" style="vertical-align: middle; margin-left: 5px;">
													</a>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table style="width:100%;max-width:600px" align="center">
						<tbody>
							<tr>
								<td style="color:#dee2e6s;font-size:11px;padding-top:10px;line-height:15px;">
									<span> &copy; {portal_name} <?php echo date('Y') ?> - ALL RIGHTS RESERVED </span>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</center>