<?php
/**
 * Group::deleteGroup()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Yuna Miyashita <butackle@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('GroupsModelTestBase', 'Groups.Test/Case');

/**
 * Group::deleteGroup()のテスト
 *
 * @author Yuna Miyashita <butackle@gmail.com>
 * @package NetCommons\Groups\Test\Case\Model\Group
 */
class GroupDeleteGroupUserTest extends GroupsModelTestBase {

/**
 * deleteGroup()のテスト
 *
 * @dataProvider dataProviderDeleteGroup
 * @param int $groupId 削除対象グループID
 * @param string exception 想定しているexception
 * @return void
 */
	public function testDeleteGroup($groupId = [], $exception = null) {
		if (!is_null($exception)) {
			$this->setExpectedException($exception);
		}
		$result = $this->_classGroup->deleteGroup($groupId);

		$this->assertTrue(
			$result, 'セーブ結果が想定と異なります。'
		);
		$this->assertEqual(
			0,
			$this->_group->find('count'),
			'データ登録数が想定と異なります。'
		);
	}

/**
 * testDeleteGroup用dataProvider
 * 
 * ### 戻り値
 *  - groupId:	削除対象グループID
 *  - exception:　想定しているexception
 */
	public function dataProviderDeleteGroup() {
		return array(
			array(
				1, null
			),
			//NULL
			array(
				null, 'InternalErrorException'
			),
			//存在しないgroupId
			array(
				9999, 'InternalErrorException'
			),
			//文字列のgroupId
			array(
				'Error', 'InternalErrorException'
			),
		);
	}

}
