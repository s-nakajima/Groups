<?php
/**
 * Group4UsersTestFixture
 *
 * @author Yuna Miyashita <butackle@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * Summary for Group4UsersTestFixture
 */
class Group4UsersTestFixture extends GroupFixture {

/**
 * Model name
 *
 * @var string
 */
	public $name = 'Group';

/**
 * Full Table Name
 *
 * @var string
 */
	public $table = 'groups';

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'name' => 'Loremsss ipsum dolor sit amet',
			'created_user' => '1',
			'created' => '2016-02-28 04:57:50',
			'modified_user' => '1',
			'modified' => '2016-02-28 04:57:50'
		),
		array(
			'id' => '2',
			'name' => 'Test',
			'created_user' => '1',
			'created' => '2016-03-15 14:12:00',
			'modified_user' => '1',
			'modified' => '2016-03-15 14:12:00'
		),
	);

}
