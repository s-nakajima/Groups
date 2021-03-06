<?php
/**
 * View/Group/selectのテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Yuna Miyashita <butackle@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('GroupsViewTestBase', 'Groups.Test/Case');

/**
 * View/Group/selectのテスト
 *
 * @author Yuna Miyashita <butackle@gmail.com>
 * @package NetCommons\Groups\Test\Case\View\Group\Select
 */
class GroupsViewGroupSelectTest extends GroupsViewTestBase {

/**
 * View/Group/selectのテスト
 *
 * @return void
 */
	public function testSelect() {
		$this->controller->set('groups', [
			[
				'Group' => ['id' => 1, 'name' => 'test'],
				'GroupsUser' => [['user_id' => 1], ['user_id' => 2]]
			]
		]);
		$this->controller->set('users', [
			['User' => ['id' => 1]],
			['User' => ['id' => 2]]
		]);
		$view = $this->_createViewClass();
		$view->render('Groups.Groups/select');
	}
}
