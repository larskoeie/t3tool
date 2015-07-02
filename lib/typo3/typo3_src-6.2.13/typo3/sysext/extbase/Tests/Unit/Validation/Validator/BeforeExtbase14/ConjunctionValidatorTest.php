<?php
namespace TYPO3\CMS\Extbase\Tests\Unit\Validation\Validator\BeforeExtbase14;

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
 *
 * This testcase checks the expected behavior for Extbase < 1.4.0, to make sure
 * we do not break backwards compatibility.
 */
class ConjunctionValidatorTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @test
	 */
	public function addingValidatorsToAJunctionValidatorWorks() {
		$proxyClassName = $this->buildAccessibleProxy('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ConjunctionValidator');
		$conjunctionValidator = new $proxyClassName();
		$mockValidator = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface', array('isValid'));
		$conjunctionValidator->addValidator($mockValidator);
		$this->assertTrue($conjunctionValidator->_get('validators')->contains($mockValidator));
	}

	/**
	 * @test
	 */
	public function allValidatorsInTheConjunctionAreCalledEvenIfOneReturnsFalse() {
		$validatorConjunction = new \TYPO3\CMS\Extbase\Validation\Validator\ConjunctionValidator();
		$validatorObject = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface', array('isValid'));
		$validatorObject->expects($this->once())->method('isValid')->will($this->returnValue(TRUE));
		$secondValidatorObject = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface', array('isValid', 'getErrors'));
		$secondValidatorObject->expects($this->once())->method('isValid')->will($this->returnValue(FALSE));
		$secondValidatorObject->expects($this->any())->method('getErrors')->will($this->returnValue(array()));
		$thirdValidatorObject = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface', array('isValid'));
		$thirdValidatorObject->expects($this->once())->method('isValid')->will($this->returnValue(TRUE));
		$validatorConjunction->addValidator($validatorObject);
		$validatorConjunction->addValidator($secondValidatorObject);
		$validatorConjunction->addValidator($thirdValidatorObject);
		$validatorConjunction->isValid('some subject');
	}

	/**
	 * @test
	 */
	public function validatorConjunctionReturnsTrueIfAllJunctionedValidatorsReturnTrue() {
		$validatorConjunction = new \TYPO3\CMS\Extbase\Validation\Validator\ConjunctionValidator();
		$validatorObject = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface', array('isValid'));
		$validatorObject->expects($this->any())->method('isValid')->will($this->returnValue(TRUE));
		$secondValidatorObject = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface', array('isValid'));
		$secondValidatorObject->expects($this->any())->method('isValid')->will($this->returnValue(TRUE));
		$validatorConjunction->addValidator($validatorObject);
		$validatorConjunction->addValidator($secondValidatorObject);
		$this->assertTrue($validatorConjunction->isValid('some subject'));
	}

	/**
	 * @test
	 */
	public function validatorConjunctionReturnsFalseIfOneValidatorReturnsFalse() {
		$validatorConjunction = new \TYPO3\CMS\Extbase\Validation\Validator\ConjunctionValidator();
		$validatorObject = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface', array('isValid', 'getErrors'));
		$validatorObject->expects($this->any())->method('isValid')->will($this->returnValue(FALSE));
		$validatorObject->expects($this->any())->method('getErrors')->will($this->returnValue(array()));
		$validatorConjunction->addValidator($validatorObject);
		$this->assertFalse($validatorConjunction->isValid('some subject'));
	}

	/**
	 * @test
	 */
	public function removingAValidatorOfTheValidatorConjunctionWorks() {
		$validatorConjunction = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ConjunctionValidator', array('dummy'), array(), '', TRUE);
		$validator1 = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface');
		$validator2 = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface');
		$validatorConjunction->addValidator($validator1);
		$validatorConjunction->addValidator($validator2);
		$validatorConjunction->removeValidator($validator1);
		$this->assertFalse($validatorConjunction->_get('validators')->contains($validator1));
		$this->assertTrue($validatorConjunction->_get('validators')->contains($validator2));
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Extbase\Validation\Exception\NoSuchValidatorException
	 */
	public function removingANotExistingValidatorIndexThrowsException() {
		$validatorConjunction = new \TYPO3\CMS\Extbase\Validation\Validator\ConjunctionValidator();
		$validator = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface');
		$validatorConjunction->removeValidator($validator);
	}

	/**
	 * @test
	 */
	public function countReturnesTheNumberOfValidatorsContainedInTheConjunction() {
		$validatorConjunction = new \TYPO3\CMS\Extbase\Validation\Validator\ConjunctionValidator();
		$validator1 = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface');
		$validator2 = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ValidatorInterface');
		$this->assertSame(0, count($validatorConjunction));
		$validatorConjunction->addValidator($validator1);
		$validatorConjunction->addValidator($validator2);
		$this->assertSame(2, count($validatorConjunction));
	}
}
