<?php
/**
 * Group::validate()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Yuna Miyashita <butackle@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('GroupsModelTestBase', 'Groups.Test/Case');

/**
 * Group::validate()のテスト
 *
 * @author Yuna Miyashita <butackle@gmail.com>
 * @package NetCommons\Groups\Test\Case\Model\Group
 */
class GroupValidateTest extends GroupsModelTestBase {

/**
 * validates()のテスト
 *
 * @dataProvider dataProviderGroupValidates
 * @param array $inputData 入力データ
 * @param array $validationErrors バリデーション結果
 * @return void
 */
	public function testValidates($inputData = [], $validationErrors = []) {
		$this->_templateTestBeforeValidation(
			$inputData,
			$validationErrors,
			$this->_classGroup
		);
	}

/**
 * testValidates用dataProvider
 * 
 * ### 戻り値
 *  - inputData:	入力データ
 *  - expectedValidationErrors:	バリデーション結果
 */
	public function dataProviderGroupValidates() {
		return $this->dataProviderValidates(true);
	}
}
