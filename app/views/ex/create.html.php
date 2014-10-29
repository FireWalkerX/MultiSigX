<div class="white">
	<div class="col-md-12  container-fluid" >
		<div class="panel panel-success">
			<div class="panel-heading"><a href="/ex/dashboard">Dashboard <i class="icon-chevron-left icon-large"></i></a>&nbsp;&nbsp;
			Create new MultiSigX&#8482;</div>
			<div class="panel-body">
				<?=$this->form->create(null,array('class'=>'form-group has-error','id'=>'MSXForm')); ?>
				<div class="row">
					<div class="col-md-12">
					<p>Please provide three (3) email addresses. These email addresses will be used for new bitcoin addresses and their privatekeys will be emailed to them.</p>
					</div>
					<div class="col-md-6">
						<ul>
							<li><strong>Email 1</strong>: Self or Business</li>
							<li><strong>Email 2 & Email 3</strong>:
								<ul>
								<li>Self: Print security</li>
								<li>Other: Friend, Family or Business</li>						
								</ul>
							</li>					
						</ul>
					</div>
					<div class="col-md-6">
					<strong>Name your MultiSigX coin:</strong>
					<?=$this->form->field('CoinName', array('label'=>'','class'=>'code form-control','onblur'=>'checkform()')); ?>
					</div>
				</div>
				<?=$this->form->hidden('key', array('value'=>$details['key'])); ?>
				<?=$this->form->hidden('secret', array('value'=>$details['secret'])); ?>							
				<?=$this->form->hidden('username', array('value'=>$user['username'])); ?>
				<?=$this->form->hidden('passphrase[1]', array('value'=>$passphrase[0])); ?>				
				<?=$this->form->hidden('passphrase[2]', array('value'=>$passphrase[1])); ?>								
				<?=$this->form->hidden('passphrase[3]', array('value'=>$passphrase[2])); ?>								
				<?=$this->form->hidden('dest[1]', array('value'=>'')); ?>
				<?=$this->form->hidden('dest[2]', array('value'=>'')); ?>				
				<?=$this->form->hidden('dest[3]', array('value'=>'')); ?>				
				<?=$this->form->hidden('private[1]', array('value'=>'')); ?>								
				<?=$this->form->hidden('private[2]', array('value'=>'')); ?>												
				<?=$this->form->hidden('private[3]', array('value'=>'')); ?>												
				<?=$this->form->hidden('pubkeycompress[1]', array('value'=>'')); ?>																
				<?=$this->form->hidden('pubkeycompress[2]', array('value'=>'')); ?>
				<?=$this->form->hidden('pubkeycompress[3]', array('value'=>'')); ?>				
				<?=$this->form->hidden('address[1]', array('value'=>'')); ?>
				<?=$this->form->hidden('address[2]', array('value'=>'')); ?>
				<?=$this->form->hidden('address[3]', array('value'=>'')); ?>				
				<div class="row">
					<div class="col-md-3">
						<h4>Create with <code>Security</code>:</h4>
						<select name="security" class="form-control" onBlur="checkform();">
							<option value="2">2 of 3</option>
							<option value="3">3 of 3</option>					
						</select>					
					</div>
					<div class="col-md-3">
						<h4>Save MultiSigX : <code>Coin name</code></h4>
						<?php 
						$curr = array();
						foreach($addresses as $address){
							array_push($curr, $address['currency']);
						}
						?>
						<select name="currency" class="form-control" onBlur="ChangeCurrency(this.value);" id="Currency">
						<?php 
						foreach($currencies as $currency){ 
		/*					if(in_array($currency['currency']['unit'],$curr)){
								$disable = "disabled";
							}else{
								$disable = "";
							}
		*/					
						?>
							<option value="<?=$currency['currency']['unit']?>" <?=$disable?>><?=$currency['currency']['name']?> - <?=$currency['currency']['unit']?></option>
						<?php }?>
						</select>
					</div>
					<div class="col-md-6">
					<h4>Change address: <code>Used for withdrawal</code></h4>
						<select name="ChangeAddress" id="ChangeAddress" class="form-control" onChange="ChangeDefaultAddress(this.value);">
							<option value="MultiSigX">MultiSigX</option>
							<option value="Simple" id="Simple">Your own XGC address</option>
						</select>
						<?=$this->form->field('DefaultAddress', array('label'=>'','value'=>'','class'=>'form-control hidden','placeholder'=>'1AHLowz77C9aWWEYBgaMQo8kGmY7Da7nUA','style'=>'color:red;font-weight:bold')); ?>
					
					</div>
					
					
					
				</div>
				<br>

				<table class="table table-striped table-condensed table-bordered">
					<tr>
						<th width="50%">Email <code>(Each email should be unique and valid)</code></th>
						<th width="50%">Relation <code>(Correct relation defines correct commission percent)</code></th>
					</tr>
					<tr>
						<td><?=$this->form->field('email[1]', array('label'=>'','value'=>$user['email'],'readonly'=>'readonly','class'=>'form-control')); ?></td>
						<td>
						<select name="relation[1]" id="Relation1" class="form-control">
						<?php foreach ($relations as $relation){
							if($relation['type']!="MultiSigX - Escrow"){
						?>
							<option value="<?=$relation['type']?>"><?=$relation['type']?></option>
						<?php }}?>
						</select>
						</td>
						
					</tr>
					<tr>
						<td><?=$this->form->field('email[2]', array('label'=>'','value'=>'','class'=>'form-control','onblur'=>'checkform()','placeholder'=>'2ndEmail@somedomain.com')); ?></td>
						<td>
						<select name="relation[2]" id="Relation2" class="form-control" onChange="ChangeRelationEmail('Email2',this.value,'<?=DEFAULT_ESCROW?>')">
						<?php foreach ($relations as $relation){?>
							<option value="<?=$relation['type']?>"><?=$relation['type']?></option>
						<?php }?>
						</select>
						</td>
					</tr>					
					<tr>
						<td><?=$this->form->field('email[3]', array('label'=>'','value'=>'','class'=>'form-control','onBlur'=>'checkform()','placeholder'=>'3rdEmail@somedomain.com')); ?></td>
						<td>
						<select name="relation[3]" id="Relation3" class="form-control"  onChange="ChangeRelationEmail('Email3',this.value,'<?=DEFAULT_ESCROW?>')">
						<?php foreach ($relations as $relation){?>
							<option value="<?=$relation['type']?>"><?=$relation['type']?></option>
						<?php }?>
						</select>
						</td>
					</tr>					
				</table>

				<input type="button" id="SubmitButton" class="btn btn-primary" value="Create MultiSigX address" onClick='$("#SubmitButton").attr("disabled", "true");PasstoPhrase();' disabled="true">
				<input type="button" id="FinalButton" class="btn btn-danger" value="Save >> Email all users" onClick='$("#FinalButton").attr("disabled", "true");$("#MSXForm").submit();' disabled="true">
				<?=$this->form->end(); ?>
				<p>Click the "Create MultiSigX address >> Email all users" <strong>ONCE</strong>. The keys are created in your browser memory, the unique password protected PDF files are send to each email address.</p>
			</div>
			<div class="panel-footer">You can get 100 XGC, GreenCoins (Identified Digital Currency) from <a href="http://<?=GREENCOIN_WEB?>" target="_blank">http://<?=GREENCOIN_WEB?></a>, try MultiSigX security.  </div>
		</div>
	</div>
</div>
<?php
$this->scripts('<script src="/js/mnemonic.js?v='.rand(1,100000000).'"></script>'); 	
$this->scripts('<script src="/js/base.js?v='.rand(1,100000000).'"></script>'); 		
$this->scripts('<script src="/js/btc.js?v='.rand(1,100000000).'"></script>'); 			
$this->scripts('<script src="/js/crypto.js?v='.rand(1,100000000).'"></script>'); 				
$this->scripts('<script src="/js/bitcoinjs.js?v='.rand(1,100000000).'"></script>'); 			
?>