<?php namespace Toyota\Component\Ldap\Tests\Platform\Native;

use Toyota\Component\Ldap\Platform\Native\SearchPreloaded;
use Toyota\Component\Ldap\Platform\Test\Entry;
use Toyota\Component\Ldap\Tests\TestCase;

class SearchPreloadedTest extends TestCase
{

	/**
	 * Tests the preloaded search on the Native side
	 */
	public function testSetPreloadedSearch()
	{
		$search = new SearchPreloaded(array('count' => 3, array('dn' => 'd'), array('dn' => 'e'), array('dn' => 'f')));

		$this->assertEquals('d', $search->next()->getDn());
		$this->assertEquals('e', $search->next()->getDn());
		$this->assertEquals('f', $search->next()->getDn());
		$this->assertNull($search->next());
		$this->assertNull($search->next());
		$this->assertNull($search->next(), 'Does not reset when end of array is reached');

		$search->reset();
		$this->assertEquals('d', $search->next()->getDn());
		$this->assertEquals('e', $search->next()->getDn());

		$search->reset();

		$this->assertEquals('d', $search->next()->getDn());
	}

}