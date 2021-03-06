<?php
/**
 * Group::saveGroup()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Yuna Miyashita <butackle@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('GroupsModelTestBase', 'Groups.Test/Case');

/**
 * Group::saveGroup()のテスト
 *
 * @author Yuna Miyashita <butackle@gmail.com>
 * @package NetCommons\Groups\Test\Case\Model\Group
 */
class GroupSaveGroupUserTest extends GroupsModelTestBase {

/**
 * saveGroup()のテスト
 *
 * @dataProvider dataProviderSaveGroup
 * @param array $inputData 入力データ
 * @param bool saveResult セーブ結果
 * @return void
 */
	public function testSaveGroup($inputData = [], $saveResult = 1) {
		$isUpdate = isset($inputData['Group']['id']);

		$this->assertTrue(
			$this->_classGroup->saveGroup($inputData) === $saveResult, 'セーブ結果が想定と異なります。'
		);

		$expectedCount = $saveResult ? 2 : 1;
		$expectedCount -= $saveResult && $isUpdate ? 1 : 0;
		$this->assertEqual(
			$expectedCount,
			$this->_group->find('count'),
			'データ登録数が想定と異なります。'
		);
	}

/**
 * testSaveGroup用dataProvider
 * 
 * ### 戻り値
 *  - inputData:	入力データ
 *  - saveResult:	セーブ結果
 */
	public function dataProviderSaveGroup() {
		//長い名前を作成
		$longName = '';
		$chars = array_flip(array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z')));
		for ($i = 0; $i < 1000; ++$i) {
			$longName .= array_rand($chars);
		}

		return array(
			//登録可能
			array(
				[
					'Group' => [ 'name' => 'TestInsert' ],
					'GroupsUser' => [ ['user_id' => '1'] ]
				],
				true
			),
			//登録可能
			array(
				[
					'name' => 'テストInsert',
					'GroupsUser' => [ ['user_id' => '2'], ['user_id' => '3'] ]
				],
				true
			),
			//更新可能
			array(
				[
					'Group' => [
						'id' => 1,
						'name' => 'TestInsert',
					],
					'GroupsUser' => [ ['user_id' => '1'] ]
				],
				true
			),
			//更新可能
			array(
				[
					'Group' => [
						'id' => 1,
						'name' => 'テストInsert',
					],
					'GroupsUser' => [ ['user_id' => '2'], ['user_id' => '3'] ]
				],
				true
			),
			//NULL
			array(
				'Group' => [ 'Error' => 1, ],
				false
			),
			//名前なし
			array(
				[
					'Group' => [ 'Error' => 1, ],
					'GroupsUser' => [ ['user_id' => '2'], ['user_id' => '3'] ]
				],
				false
			),
			array(
				[
					'Group' => [ 'id' => 1, ],
					'GroupsUser' => [ ['user_id' => '2'], ['user_id' => '3'] ]
				],
				false
			),
			//GroupsUserなし
			array(
				[ 'name' => 'テストInsert'],
				false
			),
			//長すぎる名前
			array(
				[
					'Group' => [
						'id' => 1,
						'name' => $longName,
					],
					'GroupsUser' => [ ['user_id' => '2'], ['user_id' => '3'] ]
				],
				false
			),
		);
	}

}
