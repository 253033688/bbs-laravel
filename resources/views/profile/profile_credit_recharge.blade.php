<div class="content" id="J_profile_recharge">
	@include('profile_credit_tab')
	<!--==============充值开始==============-->
	<div class="content_type">
		<ul class="cc">
			<li class="current"><a href="{{ url('profile/credit/recharge') }}">积分充值</a></li>
			<li class="line"></li><li><a href="{{ url('profile/credit/order') }}">订单记录</a></li>
		</ul>
	</div>
	<form id="J_recharge_form" action="{{ url('profile/credit/pay') }}" method="post">
	<div class="profile_ct">
		<dl class="cc">
			<dt>充值积分：</dt>
			<dd>
				<select id="J_recharge_select" name="credit" class="select_5">

@foreach ($recharge as $key => $value)

					<option value="{{ $key }}" >{{ $creditBo->cType[$key] }}</option>
					<!--# } #-->
				</select>
			</dd>
		</dl>
		<dl class="cc">
			<dt>充值比例：</dt>
			<dd><span id="J_recharge_rate">铜币</span> = 1元</dd>
		</dl>
		<dl class="cc">
			<dt>充值金额：</dt>
			<dd>
				<input id="J_recharge_amount" type="text" class="input length_5" name="pay" />
				<span class="gray">最少充值<span id="J_recharge_min"></span>元</span>
			</dd>
		</dl>
		<dl class="cc">
			<dt>可获得：</dt>
			<dd>
				<span id="J_recharge_count"><span class="red"></span>铜币</span>
			</dd>
		</dl>
		<dl class="cc">
			<dt>支付方式：</dt>
			<dd>
				<div class="payment_type">
					<ul class="cc" id="J_payment_list">
						<li class="current"><em></em><a href="" class="alipay" data-val="1">支付宝</a></li>
						<li><em></em><a href="" class="tenpay" data-val="2">财付通</a></li>
						<li><em></em><a href="" class="paypal" data-val="3">paypal</a></li>
						<li><em></em><a href="" class="bill" data-val="4">99bill</a></li>
					</ul>
				</div>
			</dd>
		</dl>
		<dl class="cc">
			<dt>&nbsp;</dt>
			<dd>
				<input type="hidden" value="1" name="paymethod" id="J_payment_type" />
				<button type="submit" class="btn btn_big btn_submit">充值</button>
			</dd>
		</dl>
	</div>
	</form>
</div>

<script>
var RECHARGE = '{{ $recharge|json }}';
Wind.ready(document, function(){
	Wind.use('jquery', 'global', 'ajaxForm', GV.JS_ROOT +'pages/profile/profileRecharge.js?v=' +GV.JS_VERSION);
});
</script>