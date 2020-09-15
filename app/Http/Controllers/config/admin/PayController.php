<?php
defined('WEKIT_VERSION') || exit('Forbidden');

Wind::import('ADMIN:library.AdminBaseController');

/**
 * 后台设置-站点设置-站点信息设置/全局参数设置
 *
 * @author Jianmin Chen <sky_hold@163.com>
 * @copyright ©2003-2103 phpwind.com
 * @license http://www.windframework.com
 * @version $Id: PayController.php 3286 2011-12-15 09:32:42Z yishuo $
 * @package admin
 * @subpackage controller.config
 */
class PayController extends AdminBaseController {

	/* (non-PHPdoc)
	 * @see WindController::run()
	 */
	public function run() {
		
// 		$config = Core::C('pay');
		$config = Core::C()->getValues('pay');
		->with($config, 'config');
	}
	
	public function dorunAction(Request $request) {
		$request->isPost() || return $this->showError('operate.fail');

		list($ifopen, $reason, $alipay, $alipaypartnerID, $alipaykey, $alipayinterface, $tenpay, $tenpaykey, $paypal, $paypalkey, $_99bill, $_99billkey) = $request->get(array('ifopen', 'reason', 'alipay', 'alipaypartnerID', 'alipaykey', 'alipayinterface', 'tenpay', 'tenpaykey', 'paypal', 'paypalkey', '99bill', '99billkey'));

		$config = new PwConfigSet('pay');
		$config->set('ifopen', $ifopen)
			->set('reason', $reason)
			->set('alipay', $alipay)
			->set('alipaypartnerID', $alipaypartnerID)
			->set('alipaykey', $alipaykey)
			->set('alipayinterface', $alipayinterface)
			->set('tenpay', $tenpay)
			->set('tenpaykey', $tenpaykey)
			->set('paypal', $paypal)
			->set('paypalkey', $paypalkey)
			->set('99bill', $_99bill)
			->set('99billkey', $_99billkey)
			->flush();

		return $this->showMessage('success');
	}
}
?>