
<div class="white">
	<div class="col-md-12  container-fluid" >
		<div class="panel panel-primary">
			<div class="panel-heading">Dashboard</div>
			<div class="panel-body" style="text-align:center">
						<?php foreach($currencies as $currency){ 
						$curr = $curr . ", ". $currency['currency']['name']." ".$currency['currency']['unit'];
						}?>
						<?php 
						$current = array();
						foreach($addresses as $address){
							array_push($current, $address['currency']);
						}
						?>
						<?php if($msg!=""){ ?>
							<p class="alert alert-warning"><?=$msg?></p>
						<?php }	?>
						<h3>You can create MultiSigX in these <?=substr($curr,1,strlen($curr))?> currencies.</h3> 
						<h4>Your current MultiSigX. Secure your bitcoins on MultiSigX wallets.</h4>
						<?php 
//							foreach($currencies as $currency){
//							if(!in_array($currency['currency']['unit'],$current)){
									?>
									<a href="/ex/create" class="btn btn-primary">Create new 
									<?php
									//=$currency['currency']['name'];
									?> MultiSigX</a>
							<?php 
//								}
//					}?>
							<br><br>
							<div class="panel panel-primary">
								<div class="panel-heading"><?php 
									if(count($addresses)==0){?>
										<p class="alert alert-danger">You have not created any MultiSigX wallets.</p>
								<?php 
									}else{?><h2>Your own wallets:</h2><?php 
									}?></div>
								<div class="panel-body">
								<?php foreach($addresses as $address){?>
								<hr class="fearurette-dashboard">
								<h3><?=$address['currencyName']?> <?=$address['currency']?></h3>
								<h3><a href="/ex/name/<?=$address['name']?>"><?=$address['CoinName']?></a></h3>
								<h3><small><a href="/ex/name/<?=$address['name']?>"><?=$address['name']?></a></small></h3>
								<h4>
								<a href="#" class=" tooltip-x btn btn-success active btn-lg" rel="tooltip-x" data-placement="top" title="Deposit coins" data-toggle="modal" data-target="#DepositCoins" onClick="DepositCoins('<?=$address['currencyName']?>','<?=$address['msxRedeemScript']['address']?>');"><i class="icon-mail-reply icon icon-3x"></i> <br>&nbsp;Deposit&nbsp;</a>
								&nbsp;&nbsp;
								<a href="#" class=" tooltip-x btn btn-primary active btn-lg" rel="tooltip-x" data-placement="top" title="Check address balance" data-toggle="modal" data-target="#CheckBalance" onClick="CheckBalance('<?=$address['currencyName']?>','<?=$address['currency']?>','<?=$address['msxRedeemScript']['address']?>');"><i class="icon-tasks icon icon-3x"></i> <br>&nbsp;&nbsp;Check&nbsp;&nbsp;</a>
								&nbsp;&nbsp;
								<a href="/ex/withdraw/<?=$address['msxRedeemScript']['address']?>"  class=" tooltip-x btn btn-danger active btn-lg" rel="tooltip-x" data-placement="top" title="Withdraw coins, create, sign and send"><i class="icon-mail-forward icon icon-3x"></i> <br>Withdraw</a>
								</h4>
													<?php 
														foreach($balances as $balance){?>
														<?php if($balance['address']==$address['msxRedeemScript']['address']){?>
																<h4><?=$balance['balance']." ". $address['currency'];?></h4>
														<?php }?>
													<?php 
														}?>
								<h4><strong><?=$address['security']?></strong> of 3 <small><?=gmdate('Y-M-d h:i:s',$address['DateTime']->sec)?></small>
								<strong><a href="/ex/address/<?=$address['msxRedeemScript']['address']?>"><code><?=$address['msxRedeemScript']['address']?></code></a></strong>
													<a href="#" class="tooltip-x" rel="tooltip-x" data-placement="top" title="Delete MultiSigX address" onClick="DeleteCoin('<?=$address['msxRedeemScript']['address']?>')"><i class="icon-remove icon"></i></a>
									</h4>
									<?php }?>
								</div>
								<div class="panel-footer">
								The above wallets are secured by MultiSigX! Be safe, be secure.
								</div>
							</div>
							<div class="panel panel-primary">
								<div class="panel-heading">
									<?php 
										if(count($refered)==0){?>
											<p class="alert alert-danger">You are not referred in any MultiSigX wallets.</p>
											<?php 
										}else{?>
											<h2>You are referred in wallets:</h2>					
										<?php 
										}?>
								</div>
								<div class="panel-body">
								<?php 
									foreach($refered as $address){
										if($address['username']!=$user['username']){
								?><hr class="fearurette-dashboard">
								<h3><?=$address['currencyName']?> <?=$address['currency']?></h3>
								<h3><a href="/ex/name/<?=$address['name']?>"><?=$address['CoinName']?></a></h3>
								<h3><small><a href="/ex/name/<?=$address['name']?>"><?=$address['name']?></a></small></h3>
								<h4>
								<a href="#" class=" tooltip-x btn btn-success active btn-lg" rel="tooltip-x" data-placement="top" title="Deposit coins" data-toggle="modal" data-target="#DepositCoins" onClick="DepositCoins('<?=$address['currencyName']?>','<?=$address['msxRedeemScript']['address']?>');"><i class="icon-mail-reply icon icon-3x"></i> <br>&nbsp;Deposit&nbsp;</a>
								&nbsp;&nbsp;
								<a href="#" class=" tooltip-x btn btn-primary active btn-lg" rel="tooltip-x" data-placement="top" title="Check address balance" data-toggle="modal" data-target="#CheckBalance" onClick="CheckBalance('<?=$address['currencyName']?>','<?=$address['currency']?>','<?=$address['msxRedeemScript']['address']?>');"><i class="icon-tasks icon icon-3x"></i> <br>&nbsp;&nbsp;Check&nbsp;&nbsp;</a>
								&nbsp;&nbsp;
								<a href="/ex/withdraw/<?=$address['msxRedeemScript']['address']?>"  class=" tooltip-x btn btn-danger active btn-lg" rel="tooltip-x" data-placement="top" title="Withdraw coins, create, sign and send"><i class="icon-mail-forward icon icon-3x"></i> <br>Withdraw</a>
								</h4>
													<?php 
														foreach($balances as $balance){?>
														<?php if($balance['address']==$address['msxRedeemScript']['address']){?>
																<h4><?=$balance['balance']." ". $address['currency'];?></h4>
														<?php }?>
													<?php 
														}?>
								<h4><strong><?=$address['security']?></strong> of 3 <small><?=gmdate('Y-M-d h:i:s',$address['DateTime']->sec)?></small>
								<strong><a href="/ex/address/<?=$address['msxRedeemScript']['address']?>"><code><?=$address['msxRedeemScript']['address']?></code></a></strong>
													<a href="#" class="tooltip-x" rel="tooltip-x" data-placement="top" title="Delete MultiSigX address" onClick="DeleteCoin('<?=$address['msxRedeemScript']['address']?>')"><i class="icon-remove icon"></i></a>
									</h4>
									<?php }?>
								<?php }?>
								</div>
								<div class="panel-footer">
								The above wallets are secured by MultiSigX! Be safe, be secure.
								</div>
						</div>
					</div>
			<div class="panel-footer">You can get 100 XGC, GreenCoins (Identified Digital Currency) from <a href="http://greencoin.io" target="_blank">http://greencoin.io</a>, try MultiSigX security.  </div>
		</div>
	</div>
</div>
<?=$final?>


<div class="modal fade" id="DepositCoins" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      	<h4 class="modal-title" id="DepositModalLabel">Deposit Coins</h4>
      </div>
      <div class="modal-body" style="text-align:center ">
        <h4 id="DepositAddress"></h4>
				<img src="holder.js/300x300" style="border:1px solid" id="DepositAddressImg">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="CheckBalance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="CheckModalLabel">CheckBalance Coins</h4>
      </div>
      <div class="modal-body" style="text-align:center ">
        <h4 id="CheckBalanceAddress"></h4>
				<div id="CheckBalanceHTML" style="overflow:auto;height:400px">
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>