<?php
/**
 * GroupsUser::beforeSave()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Yuna Miyashita <butackle@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('GroupsModelTestBase', 'Groups.Test/Case');

/**
 * GroupsUser::beforeSave()のテスト
 *
 * @author Yuna Miyashita <butackle@gmail.com>
 * @package NetCommons\Groups\Test\Case\Model\GroupsUser
 */
class GroupsUserBeforeSaveTest extends GroupsModelTestBase {

/**
 * validates()のテスト
 *
 * @dataProvider dataProviderBeforeSave
 * @param array $inputData 入力データ
 * @param array $validationErrors バリデーション結果
 * @return void
 */
	public function testBeforeSave($inputData = [], $validationErrors = []) {
		$this->_templateTestBeforeSave(
			$inputData,
			$validationErrors,
			$this->_classGroupsUser
		);
	}

/**
 * testBeforeSave用dataProvider
 * 
 * ### 戻り値
 *  - inputData:	入力データ
 *  - expectedValidationError:	バリデーション結果
 */
	public function dataProviderBeforeSave() {
		return array(
			array(
				[
					'Group' => [
						'id' => 2,
						'name' => 'test1'
					],
					'GroupsUser' => [
						'group_id' => 2,
						['user_id' => '1'], ['user_id' => '2']
					]
				],
				true
			),
			array(
				[
					'Group' => [
						'id' => 1,
						'name' => 'test1'
					],
					'GroupsUser' => [
						'group_id' => 2,
						['user_id' => '1'], ['user_id' => '2']
					]
				],
				false
			),
			array(
				[
					'Group' => [ 'name' => 'test1' ],
					'GroupsUser' => [['user_id' => '9999999999'], ['user_id' => '2']]
				],
				false
			),
		);
	}
}
