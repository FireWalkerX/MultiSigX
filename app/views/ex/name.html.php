<div class="white">
	<div class="col-md-12  container-fluid" >
		<div class="panel panel-warning">
			<div class="panel-heading"><a href="/ex/dashboard">Dashboard <i class="fa fa-chevron-left fa-lg"></i></a>&nbsp;&nbsp;
			Name: <?=$addresses['name']?></div>
			<div class="panel-body">
				<div class="row" style="margin:10px">
					<div class="col-md-12" style="border:1px solid gray;padding:10px " >
					<table class="table table-striped table-condensed table-bordered">
						<tr>
							<th>Email</th>
							<th><span class=" tooltip-x" rel="tooltip-x" data-placement="top" title="This address should be used for reciving withdrawal of funds from MultiSigX address"><?=$addresses['currencyName']?> Address: <?=$addresses['currency']?></span></th>							
							<th>Verified</th>
							<th>Relation</th>							
						</tr>
						<?php 
						foreach($data as $d){?>
							<tr>
								<td><?=$d['email']?></td>
								<td><?=$d['address']?></td>
								<td><?=$d['username']?></td>
								<td><?=$d['relation']?></td>
							</tr>
						<?php }?>
					</table>
					<table class="table table-striped table-condensed table-bordered">
						<tr>
							<th>MultiSigX</th>
							<td><strong class=" tooltip-x" rel="tooltip-x" data-placement="top" title="Use this address for deposit and control of your coins"><a href="/ex/address/<?=$addresses['msxRedeemScript']['address']?>"><?=$addresses['msxRedeemScript']['address']?></a></strong></td>
						</tr>
						<tr>
							<th>Security</th>
							<td><strong><?=$addresses['security']?></strong> of 3</td>
						</tr>
						<tr>
							<th>redeemScript</th>
							<td class="wrapword">{"<?=$addresses['msxRedeemScript']['redeemScript']?>"}</td>
						</tr>
					</table>
					</div>
				</div>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
</div>
