<?php
namespace TYPO3\CMS\Extbase\Tests\Unit\Domain\Model;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Test case
 */
class FrontendUserTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
	 */
	protected $fixture = NULL;

	public function setUp() {
		$this->fixture = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUser();
	}

	/**
	 * @test
	 */
	public function getUsernameInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getUsername());
	}

	/**
	 * @test
	 */
	public function setUsernameSetsUsername() {
		$username = 'don.juan';
		$this->fixture->setUsername($username);
		$this->assertSame($username, $this->fixture->getUsername());
	}

	/**
	 * @test
	 */
	public function getPasswordInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getPassword());
	}

	/**
	 * @test
	 */
	public function setPasswordSetsPassword() {
		$password = 'f00Bar';
		$this->fixture->setPassword($password);
		$this->assertSame($password, $this->fixture->getPassword());
	}

	/**
	 * @test
	 */
	public function setUsergroupSetsUsergroup() {
		$usergroup = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$usergroup->attach(new \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup('foo'));
		$this->fixture->setUsergroup($usergroup);
		$this->assertSame($usergroup, $this->fixture->getUsergroup());
	}

	/**
	 * @test
	 */
	public function addUsergroupAddsUserGroup() {
		$usergroup = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup('foo');
		$this->assertEquals(count($this->fixture->getUsergroup()), 0);
		$this->fixture->addUsergroup($usergroup);
		$this->assertEquals(count($this->fixture->getUsergroup()), 1);
	}

	/**
	 * @test
	 */
	public function removeUsergroupRemovesUsergroup() {
		$usergroup = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup('foo');
		$this->fixture->addUsergroup($usergroup);
		$this->assertEquals(count($this->fixture->getUsergroup()), 1);
		$this->fixture->removeUsergroup($usergroup);
		$this->assertEquals(count($this->fixture->getUsergroup()), 0);
	}

	/**
	 * @test
	 */
	public function getNameInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getName());
	}

	/**
	 * @test
	 */
	public function setNameSetsName() {
		$name = 'don juan';
		$this->fixture->setName($name);
		$this->assertSame($name, $this->fixture->getName());
	}

	/**
	 * @test
	 */
	public function getFirstNameInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getFirstName());
	}

	/**
	 * @test
	 */
	public function setFirstNameSetsFirstName() {
		$firstName = 'don';
		$this->fixture->setFirstName($firstName);
		$this->assertSame($firstName, $this->fixture->getFirstName());
	}

	/**
	 * @test
	 */
	public function getMiddleNameInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getMiddleName());
	}

	/**
	 * @test
	 */
	public function setMiddleNameSetsMiddleName() {
		$middleName = 'miguel';
		$this->fixture->setMiddleName($middleName);
		$this->assertSame($middleName, $this->fixture->getMiddleName());
	}

	/**
	 * @test
	 */
	public function getLastNameInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getLastName());
	}

	/**
	 * @test
	 */
	public function setLastNameSetsLastName() {
		$lastName = 'juan';
		$this->fixture->setLastName($lastName);
		$this->assertSame($lastName, $this->fixture->getLastName());
	}

	/**
	 * @test
	 */
	public function getAddressInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getAddress());
	}

	/**
	 * @test
	 */
	public function setAddressSetsAddress() {
		$address = 'foobar 42, foo';
		$this->fixture->setAddress($address);
		$this->assertSame($address, $this->fixture->getAddress());
	}

	/**
	 * @test
	 */
	public function getTelephoneInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getTelephone());
	}

	/**
	 * @test
	 */
	public function setTelephoneSetsTelephone() {
		$telephone = '42';
		$this->fixture->setTelephone($telephone);
		$this->assertSame($telephone, $this->fixture->getTelephone());
	}

	/**
	 * @test
	 */
	public function getFaxInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getFax());
	}

	/**
	 * @test
	 */
	public function setFaxSetsFax() {
		$fax = '42';
		$this->fixture->setFax($fax);
		$this->assertSame($fax, $this->fixture->getFax());
	}

	/**
	 * @test
	 */
	public function getEmailInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getEmail());
	}

	/**
	 * @test
	 */
	public function setEmailSetsEmail() {
		$email = 'don.juan@example.com';
		$this->fixture->setEmail($email);
		$this->assertSame($email, $this->fixture->getEmail());
	}

	/**
	 * @test
	 */
	public function getLockToDomainInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getLockToDomain());
	}

	/**
	 * @test
	 */
	public function setLockToDomainSetsLockToDomain() {
		$lockToDomain = 'foo.bar';
		$this->fixture->setLockToDomain($lockToDomain);
		$this->assertSame($lockToDomain, $this->fixture->getLockToDomain());
	}

	/**
	 * @test
	 */
	public function getTitleInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getTitle());
	}

	/**
	 * @test
	 */
	public function setTitleSetsTitle() {
		$title = 'foobar';
		$this->fixture->setTitle($title);
		$this->assertSame($title, $this->fixture->getTitle());
	}

	/**
	 * @test
	 */
	public function getZipInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getZip());
	}

	/**
	 * @test
	 */
	public function setZipSetsZip() {
		$zip = '42';
		$this->fixture->setZip($zip);
		$this->assertSame($zip, $this->fixture->getZip());
	}

	/**
	 * @test
	 */
	public function getCityInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getCity());
	}

	/**
	 * @test
	 */
	public function setCitySetsCity() {
		$city = 'foo';
		$this->fixture->setCity($city);
		$this->assertSame($city, $this->fixture->getCity());
	}

	/**
	 * @test
	 */
	public function getCountryInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getCountry());
	}

	/**
	 * @test
	 */
	public function setCountrySetsCountry() {
		$country = 'foo';
		$this->fixture->setCountry($country);
		$this->assertSame($country, $this->fixture->getCountry());
	}

	/**
	 * @test
	 */
	public function getWwwInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getWww());
	}

	/**
	 * @test
	 */
	public function setWwwSetsWww() {
		$www = 'foo.bar';
		$this->fixture->setWww($www);
		$this->assertSame($www, $this->fixture->getWww());
	}

	/**
	 * @test
	 */
	public function getCompanyInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getCompany());
	}

	/**
	 * @test
	 */
	public function setCompanySetsCompany() {
		$company = 'foo bar';
		$this->fixture->setCompany($company);
		$this->assertSame($company, $this->fixture->getCompany());
	}

	/**
	 * @test
	 */
	public function getImageInitiallyReturnsEmptyString() {
		$this->assertSame('', $this->fixture->getImage());
	}

	/**
	 * @test
	 */
	public function setImageSetsImage() {
		$image = 'foobar.gif';
		$this->fixture->setImage($image);
		$this->assertSame($image, $this->fixture->getImage());
	}

	/**
	 * @test
	 */
	public function getLastloginInitiallyReturnsNull() {
		$this->assertNull($this->fixture->getLastlogin());
	}

	/**
	 * @test
	 */
	public function setLastloginSetsLastlogin() {
		$date = new \DateTime();
		$this->fixture->setLastlogin($date);
		$this->assertSame($date, $this->fixture->getLastlogin());
	}
}
