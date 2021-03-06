<?php
/**
 * Group::getGroupList()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Yuna Miyashita <butackle@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('GroupsModelTestBase', 'Groups.Test/Case');

/**
 * Group::getGroupList()のテスト
 *
 * @author Yuna Miyashita <butackle@gmail.com>
 * @package NetCommons\Groups\Test\Case\Model\Group
 */
class GroupGetGroupListTest extends GroupsModelTestBase {

/**
 * getGroupList()のテスト
 *
 * @dataProvider dataProviderGetGroupList
 * @param array $query
 * @return void
 */
	public function testGetGroupList($query = []) {
		$groupQuery = $this->_group->getGroupList($query);
		$param = array(
			'fields' => array('Group.id', 'Group.name', 'Group.modified'),
			'conditions' => array('Group.created_user' => Current::read('User.id')),
			'order' => array('Group.created ASC'),
			'recursive' => 1,
		);

		$this->assertEquals(
			$this->_group->find(
				'all',
				Hash::merge($param, $query)
			),
			$groupQuery,
			'想定していたクエリが返っていません。'
		);
	}

/**
 * testGetGroupList用dataProvider
 * 
 * ### 戻り値
 *  - query:	find条件
 */
	public function dataProviderGetGroupList() {
		return array(
			array(null),
			array([]),
			array([
				'order' => array('Group.created DESC'),
			]),
			array([
				'fields' => array('Group.id', 'Group.name', 'Group.created'),
			]),
			array([
				'conditions' => array('Group.id' => '1'),
			]),
			array([
				'conditions' => [],
			]),
			array([
				'recursive' => 0,
			]),
		);
	}
}
