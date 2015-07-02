<?php
namespace TYPO3\CMS\Extbase\Tests\Unit\Mvc\Controller;

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
class ActionControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\CMS\Extbase\Mvc\Controller\ActionController|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface
	 */
	protected $actionController;

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
	 */
	protected $mockObjectManager;

	/**
	 * @var \TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder
	 */
	protected $mockUriBuilder;

	/**
	 * @var \TYPO3\CMS\Extbase\Mvc\Controller\MvcPropertyMappingConfigurationService
	 */
	protected $mockMvcPropertyMappingConfigurationService;

	public function setUp() {
		$this->actionController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController');
	}

	/**
	 * @test
	 */
	public function processRequestSticksToSpecifiedSequence() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Request', array(), array(), '', FALSE);
		$mockRequest->expects($this->once())->method('setDispatched')->with(TRUE);
		$mockUriBuilder = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder');
		$mockUriBuilder->expects($this->once())->method('setRequest')->with($mockRequest);
		$mockObjectManager = $this->getMock('TYPO3\\CMS\\Extbase\\Object\\ObjectManagerInterface');
		$mockObjectManager->expects($this->once())->method('get')->with('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Routing\\UriBuilder')->will($this->returnValue($mockUriBuilder));
		$mockResponse = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Response', array(), array(), '', FALSE);
		$configurationService = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\MvcPropertyMappingConfigurationService');
		/** @var \TYPO3\CMS\Extbase\Mvc\Controller\ActionController|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array(
			'initializeFooAction',
			'initializeAction',
			'resolveActionMethodName',
			'initializeActionMethodArguments',
			'initializeActionMethodValidators',
			'mapRequestArgumentsToControllerArguments',
			'buildControllerContext',
			'resolveView',
			'initializeView',
			'callActionMethod',
			'checkRequestHash'
		), array(), '', FALSE);
		$mockController->_set('objectManager', $mockObjectManager);

		$mockController->expects($this->at(0))->method('resolveActionMethodName')->will($this->returnValue('fooAction'));
		$mockController->expects($this->at(1))->method('initializeActionMethodArguments');
		$mockController->expects($this->at(2))->method('initializeActionMethodValidators');
		$mockController->expects($this->at(3))->method('initializeAction');
		$mockController->expects($this->at(4))->method('initializeFooAction');
		$mockController->expects($this->at(5))->method('mapRequestArgumentsToControllerArguments');
		$mockController->expects($this->at(6))->method('checkRequestHash');
		$mockController->expects($this->at(7))->method('buildControllerContext');
		$mockController->expects($this->at(8))->method('resolveView');

		$mockController->_set('mvcPropertyMappingConfigurationService', $configurationService);
		$mockController->_set('arguments', new \TYPO3\CMS\Extbase\Mvc\Controller\Arguments());

		$mockController->processRequest($mockRequest, $mockResponse);
		$this->assertSame($mockRequest, $mockController->_get('request'));
		$this->assertSame($mockResponse, $mockController->_get('response'));
	}

	/**
	 * @test
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function callActionMethodAppendsStringsReturnedByActionMethodToTheResponseObject() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockResponse = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\ResponseInterface', array(), array(), '', FALSE);
		$mockResponse->expects($this->once())->method('appendContent')->with('the returned string');
		$mockArguments = new \ArrayObject();
		$mockArgumentMappingResults = $this->getMock('TYPO3\\CMS\\Extbase\\Property\\MappingResults', array(), array(), '', FALSE);
		$mockArgumentMappingResults->expects($this->once())->method('hasErrors')->will($this->returnValue(FALSE));
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('fooAction', 'initializeAction'), array(), '', FALSE);
		$mockSignalSlotDispatcher = $this->getMock('TYPO3\\CMS\Extbase\\SignalSlot\\Dispatcher', array(), array(), '', FALSE);
		$mockController->_set('signalSlotDispatcher', $mockSignalSlotDispatcher);
		$this->enableDeprecatedPropertyMapperInController($mockController);
		$mockController->expects($this->once())->method('fooAction')->will($this->returnValue('the returned string'));
		$mockController->_set('request', $mockRequest);
		$mockController->_set('response', $mockResponse);
		$mockController->_set('arguments', $mockArguments);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_set('argumentsMappingResults', $mockArgumentMappingResults);
		$mockController->_call('callActionMethod');
	}

	/**
	 * @test
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function callActionMethodRendersTheViewAutomaticallyIfTheActionReturnedNullAndAViewExists() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockResponse = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\ResponseInterface', array(), array(), '', FALSE);
		$mockResponse->expects($this->once())->method('appendContent')->with('the view output');
		$mockView = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$mockView->expects($this->once())->method('render')->will($this->returnValue('the view output'));
		$mockArguments = new \ArrayObject();
		$mockArgumentMappingResults = $this->getMock('TYPO3\\CMS\\Extbase\\Property\\MappingResults', array(), array(), '', FALSE);
		$mockArgumentMappingResults->expects($this->once())->method('hasErrors')->will($this->returnValue(FALSE));
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('fooAction', 'initializeAction'), array(), '', FALSE);
		$mockSignalSlotDispatcher = $this->getMock('TYPO3\\CMS\Extbase\\SignalSlot\\Dispatcher', array(), array(), '', FALSE);
		$mockController->_set('signalSlotDispatcher', $mockSignalSlotDispatcher);
		$this->enableDeprecatedPropertyMapperInController($mockController);
		$mockController->expects($this->once())->method('fooAction');
		$mockController->_set('request', $mockRequest);
		$mockController->_set('response', $mockResponse);
		$mockController->_set('arguments', $mockArguments);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_set('argumentsMappingResults', $mockArgumentMappingResults);
		$mockController->_set('view', $mockView);
		$mockController->_call('callActionMethod');
	}

	/**
	 * @test
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function callActionMethodCallsTheErrorActionIfTheMappingResultsHaveErrors() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockResponse = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\ResponseInterface', array(), array(), '', FALSE);
		$mockResponse->expects($this->once())->method('appendContent')->with('the returned string');
		$mockArguments = new \ArrayObject();
		$mockArgumentMappingResults = $this->getMock('TYPO3\\CMS\\Extbase\\Property\\MappingResults', array(), array(), '', FALSE);
		$mockArgumentMappingResults->expects($this->once())->method('hasErrors')->will($this->returnValue(TRUE));
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('barAction', 'initializeAction'), array(), '', FALSE);
		$this->enableDeprecatedPropertyMapperInController($mockController);
		$mockController->expects($this->once())->method('barAction')->will($this->returnValue('the returned string'));
		$mockController->_set('request', $mockRequest);
		$mockController->_set('response', $mockResponse);
		$mockController->_set('arguments', $mockArguments);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_set('errorMethodName', 'barAction');
		$mockController->_set('argumentsMappingResults', $mockArgumentMappingResults);
		$mockController->_call('callActionMethod');
	}

	/**
	 * @test
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function callActionMethodPassesDefaultValuesAsArguments() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockResponse = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\ResponseInterface', array(), array(), '', FALSE);
		$arguments = new \ArrayObject();
		$optionalArgument = new \TYPO3\CMS\Extbase\Mvc\Controller\Argument('name1', 'Text');
		$optionalArgument->setDefaultValue('Default value');
		$arguments[] = $optionalArgument;
		$mockArgumentMappingResults = $this->getMock('TYPO3\\CMS\\Extbase\\Property\\MappingResults', array(), array(), '', FALSE);
		$mockArgumentMappingResults->expects($this->once())->method('hasErrors')->will($this->returnValue(FALSE));
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('fooAction', 'initializeAction'), array(), '', FALSE);
		$mockSignalSlotDispatcher = $this->getMock('TYPO3\\CMS\Extbase\\SignalSlot\\Dispatcher', array(), array(), '', FALSE);
		$mockController->_set('signalSlotDispatcher', $mockSignalSlotDispatcher);
		$this->enableDeprecatedPropertyMapperInController($mockController);
		$mockController->expects($this->once())->method('fooAction')->with('Default value');
		$mockController->_set('request', $mockRequest);
		$mockController->_set('response', $mockResponse);
		$mockController->_set('arguments', $arguments);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_set('argumentsMappingResults', $mockArgumentMappingResults);
		$mockController->_call('callActionMethod');
	}

	/**
	 * @test
	 * @author Karsten Dambekalns <karsten@typo3.org>
	 */
	public function resolveViewUsesFluidTemplateViewIfTemplateIsAvailable() {
		$mockSession = $this->getMock('Tx_Extbase_Session_SessionInterface');
		$mockControllerContext = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ControllerContext', array(), array(), '', FALSE);
		$mockFluidTemplateView = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$mockFluidTemplateView->expects($this->once())->method('setControllerContext')->with($mockControllerContext);
		$mockFluidTemplateView->expects($this->once())->method('canRender')->with($mockControllerContext)->will($this->returnValue(TRUE));
		$mockObjectManager = $this->getMock('TYPO3\\CMS\\Extbase\\Object\\ObjectManagerInterface', array(), array(), '', FALSE);
		$mockObjectManager->expects($this->at(0))->method('get')->with('TYPO3\\CMS\\Fluid\\View\\TemplateView')->will($this->returnValue($mockFluidTemplateView));
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('buildControllerContext', 'resolveViewObjectName', 'setViewConfiguration'), array(), '', FALSE);
		$mockController->expects($this->once())->method('resolveViewObjectName')->will($this->returnValue(FALSE));
		$mockController->_set('session', $mockSession);
		$mockController->_set('objectManager', $mockObjectManager);
		$mockController->_set('controllerContext', $mockControllerContext);
		$this->assertSame($mockFluidTemplateView, $mockController->_call('resolveView'));
	}

	/**
	 * @test
	 * @author Bastian Waidelich <bastian@typo3.org>
	 */
	public function resolveViewObjectNameUsesViewObjectNamePatternToResolveViewObjectName() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockRequest->expects($this->once())->method('getControllerVendorName')->will($this->returnValue('MyVendor'));
		$mockRequest->expects($this->once())->method('getControllerExtensionName')->will($this->returnValue('MyPackage'));
		$mockRequest->expects($this->once())->method('getControllerName')->will($this->returnValue('MyController'));
		$mockRequest->expects($this->once())->method('getControllerActionName')->will($this->returnValue('MyAction'));
		$mockRequest->expects($this->atLeastOnce())->method('getFormat')->will($this->returnValue('MyFormat'));
		$mockObjectManager = $this->getMock('TYPO3\\CMS\\Extbase\\Object\\ObjectManagerInterface', array(), array(), '', FALSE);
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('dummy'), array(), '', FALSE);
		$mockController->_set('request', $mockRequest);
		$mockController->_set('objectManager', $mockObjectManager);
		$mockController->_set('namespacesViewObjectNamePattern', 'RandomViewObject@vendor\@extension\View\@controller\@action@format');
		$mockController->_call('resolveViewObjectName');
	}

	/**
	 * @test
	 */
	public function resolveViewObjectNameUsesDeprecatedViewObjectNamePatternForExtensionsWithoutVendor() {
		eval('class Tx_MyPackage_View_MyController_MyActionMyFormat {}');

		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockRequest->expects($this->once())->method('getControllerExtensionName')->will($this->returnValue('MyPackage'));
		$mockRequest->expects($this->once())->method('getControllerName')->will($this->returnValue('MyController'));
		$mockRequest->expects($this->once())->method('getControllerActionName')->will($this->returnValue('MyAction'));
		$mockRequest->expects($this->once())->method('getControllerVendorName')->will($this->returnValue(NULL));
		$mockRequest->expects($this->atLeastOnce())->method('getFormat')->will($this->returnValue('MyFormat'));
		$mockObjectManager = $this->getMock('TYPO3\\CMS\\Extbase\\Object\\ObjectManagerInterface', array(), array(), '', FALSE);
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('dummy'), array(), '', FALSE);
		$mockController->_set('request', $mockRequest);
		$mockController->_set('objectManager', $mockObjectManager);

		$this->assertEquals(
			'Tx_MyPackage_View_MyController_MyActionMyFormat',
			$mockController->_call('resolveViewObjectName')
		);
	}

	/**
	 * @test
	 */
	public function resolveViewObjectNameUsesNamespacedViewObjectNamePatternForExtensionsWithVendor() {
		eval('namespace MyVendor\MyPackage\View\MyController; class MyActionMyFormat {}');

		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockRequest->expects($this->once())->method('getControllerExtensionName')->will($this->returnValue('MyPackage'));
		$mockRequest->expects($this->once())->method('getControllerName')->will($this->returnValue('MyController'));
		$mockRequest->expects($this->once())->method('getControllerActionName')->will($this->returnValue('MyAction'));
		$mockRequest->expects($this->once())->method('getControllerVendorName')->will($this->returnValue('MyVendor'));
		$mockRequest->expects($this->atLeastOnce())->method('getFormat')->will($this->returnValue('MyFormat'));
		$mockObjectManager = $this->getMock('TYPO3\\CMS\\Extbase\\Object\\ObjectManagerInterface', array(), array(), '', FALSE);
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('dummy'), array(), '', FALSE);
		$mockController->_set('request', $mockRequest);
		$mockController->_set('objectManager', $mockObjectManager);

		$this->assertEquals(
			'MyVendor\MyPackage\View\MyController\MyActionMyFormat',
			$mockController->_call('resolveViewObjectName')
		);
	}

	/**
	 * @test
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function resolveActionMethodNameReturnsTheCurrentActionMethodNameFromTheRequest() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockRequest->expects($this->once())->method('getControllerActionName')->will($this->returnValue('fooBar'));
		/** @var \TYPO3\CMS\Extbase\Mvc\Controller\ActionController|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('fooBarAction'), array(), '', FALSE);
		$mockController->_set('request', $mockRequest);
		$this->assertEquals('fooBarAction', $mockController->_call('resolveActionMethodName'));
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function resolveActionMethodNameThrowsAnExceptionIfTheActionDefinedInTheRequestDoesNotExist() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockRequest->expects($this->once())->method('getControllerActionName')->will($this->returnValue('fooBar'));
		/** @var \TYPO3\CMS\Extbase\Mvc\Controller\ActionController|\PHPUnit_Framework_MockObject_MockObject|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('otherBarAction'), array(), '', FALSE);
		$mockController->_set('request', $mockRequest);
		$mockController->_call('resolveActionMethodName');
	}

	/**
	 * @test
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function initializeActionMethodArgumentsRegistersArgumentsFoundInTheSignatureOfTheCurrentActionMethod() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockArguments = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Arguments', array('addNewArgument', 'removeAll'));
		$mockArguments->expects($this->at(0))->method('addNewArgument')->with('stringArgument', 'string', TRUE);
		$mockArguments->expects($this->at(1))->method('addNewArgument')->with('integerArgument', 'integer', TRUE);
		$mockArguments->expects($this->at(2))->method('addNewArgument')->with('objectArgument', 'F3_Foo_Bar', TRUE);
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('fooAction', 'evaluateDontValidateAnnotations'), array(), '', FALSE);
		$methodParameters = array(
			'stringArgument' => array(
				'position' => 0,
				'byReference' => FALSE,
				'array' => FALSE,
				'optional' => FALSE,
				'allowsNull' => FALSE,
				'type' => 'string'
			),
			'integerArgument' => array(
				'position' => 1,
				'byReference' => FALSE,
				'array' => FALSE,
				'optional' => FALSE,
				'allowsNull' => FALSE,
				'type' => 'integer'
			),
			'objectArgument' => array(
				'position' => 2,
				'byReference' => FALSE,
				'array' => FALSE,
				'optional' => FALSE,
				'allowsNull' => FALSE,
				'type' => 'F3_Foo_Bar'
			)
		);
		$mockReflectionService = $this->getMock('TYPO3\\CMS\\Extbase\\Reflection\\ReflectionService', array(), array(), '', FALSE);
		$mockReflectionService->expects($this->once())->method('getMethodParameters')->with(get_class($mockController), 'fooAction')->will($this->returnValue($methodParameters));
		$mockController->_set('reflectionService', $mockReflectionService);
		$mockController->_set('request', $mockRequest);
		$mockController->_set('arguments', $mockArguments);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_call('initializeActionMethodArguments');
	}

	/**
	 * @test
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function initializeActionMethodArgumentsRegistersOptionalArgumentsAsSuch() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockArguments = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Arguments', array(), array(), '', FALSE);
		$mockArguments->expects($this->at(0))->method('addNewArgument')->with('arg1', 'string', TRUE);
		$mockArguments->expects($this->at(1))->method('addNewArgument')->with('arg2', 'array', FALSE, array(21));
		$mockArguments->expects($this->at(2))->method('addNewArgument')->with('arg3', 'string', FALSE, 42);
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('fooAction', 'evaluateDontValidateAnnotations'), array(), '', FALSE);
		$methodParameters = array(
			'arg1' => array(
				'position' => 0,
				'byReference' => FALSE,
				'array' => FALSE,
				'optional' => FALSE,
				'allowsNull' => FALSE,
				'type' => 'string'
			),
			'arg2' => array(
				'position' => 1,
				'byReference' => FALSE,
				'array' => TRUE,
				'optional' => TRUE,
				'defaultValue' => array(21),
				'allowsNull' => FALSE
			),
			'arg3' => array(
				'position' => 2,
				'byReference' => FALSE,
				'array' => FALSE,
				'optional' => TRUE,
				'defaultValue' => 42,
				'allowsNull' => FALSE,
				'type' => 'string'
			)
		);
		$mockReflectionService = $this->getMock('TYPO3\\CMS\\Extbase\\Reflection\\ReflectionService', array(), array(), '', FALSE);
		$mockReflectionService->expects($this->once())->method('getMethodParameters')->with(get_class($mockController), 'fooAction')->will($this->returnValue($methodParameters));
		$mockController->_set('reflectionService', $mockReflectionService);
		$mockController->_set('request', $mockRequest);
		$mockController->_set('arguments', $mockArguments);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_call('initializeActionMethodArguments');
	}

	/**
	 * @test
	 * @author Sebastian Kurfürst <sbastian@typo3.org>
	 * @expectedException \TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentTypeException
	 */
	public function initializeActionMethodArgumentsThrowsExceptionIfDataTypeWasNotSpecified() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockArguments = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Arguments', array(), array(), '', FALSE);
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('fooAction'), array(), '', FALSE);
		$methodParameters = array(
			'arg1' => array(
				'position' => 0,
				'byReference' => FALSE,
				'array' => FALSE,
				'optional' => FALSE,
				'allowsNull' => FALSE
			)
		);
		$mockReflectionService = $this->getMock('TYPO3\\CMS\\Extbase\\Reflection\\ReflectionService', array(), array(), '', FALSE);
		$mockReflectionService->expects($this->once())->method('getMethodParameters')->with(get_class($mockController), 'fooAction')->will($this->returnValue($methodParameters));
		$mockController->_set('reflectionService', $mockReflectionService);
		$mockController->_set('request', $mockRequest);
		$mockController->_set('arguments', $mockArguments);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_call('initializeActionMethodArguments');
	}

	/**
	 * @test
	 * @author Sebastian Kurfürst <sbastian@typo3.org>
	 */
	public function initializeActionMethodValidatorsCorrectlyRegistersValidatorsBasedOnDataType() {
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('fooAction'), array(), '', FALSE);
		$this->enableDeprecatedPropertyMapperInController($mockController);
		$argument = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Argument', array('getName'), array(), '', FALSE);
		$argument->expects($this->any())->method('getName')->will($this->returnValue('arg1'));
		$arguments = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Arguments', array('dummy'));
		$arguments->addArgument($argument);
		$methodTagsValues = array();
		$methodArgumentsValidatorConjunctions = array();
		$methodArgumentsValidatorConjunctions['arg1'] = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ConjunctionValidator', array(), array(), '', FALSE);
		$mockReflectionService = $this->getMock('TYPO3\\CMS\\Extbase\\Reflection\\ReflectionService', array(), array(), '', FALSE);
		$mockReflectionService->expects($this->once())->method('getMethodTagsValues')->with(get_class($mockController), 'fooAction')->will($this->returnValue($methodTagsValues));
		$mockValidatorResolver = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\ValidatorResolver', array(), array(), '', FALSE);
		$mockValidatorResolver->expects($this->once())->method('buildMethodArgumentsValidatorConjunctions')->with(get_class($mockController), 'fooAction')->will($this->returnValue($methodArgumentsValidatorConjunctions));
		$mockController->_set('reflectionService', $mockReflectionService);
		$mockController->_set('validatorResolver', $mockValidatorResolver);
		$mockController->_set('arguments', $arguments);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_call('initializeActionMethodValidators');
		$this->assertEquals($methodArgumentsValidatorConjunctions['arg1'], $arguments['arg1']->getValidator());
	}

	/**
	 * @test
	 * @author Sebastian Kurfürst <sbastian@typo3.org>
	 */
	public function initializeActionMethodValidatorsRegistersModelBasedValidators() {
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('fooAction'), array(), '', FALSE);
		$this->enableDeprecatedPropertyMapperInController($mockController);
		$argument = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Argument', array('getName', 'getDataType'), array(), '', FALSE);
		$argument->expects($this->any())->method('getName')->will($this->returnValue('arg1'));
		$argument->expects($this->any())->method('getDataType')->will($this->returnValue('F3_Foo_Quux'));
		$arguments = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Arguments', array('dummy'));
		$arguments->addArgument($argument);
		$methodTagsValues = array();
		$quuxBaseValidatorConjunction = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ConjunctionValidator', array(), array(), '', FALSE);
		$methodArgumentsValidatorConjunctions = array();
		$methodArgumentsValidatorConjunctions['arg1'] = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ConjunctionValidator', array(), array(), '', FALSE);
		$methodArgumentsValidatorConjunctions['arg1']->expects($this->once())->method('addValidator')->with($quuxBaseValidatorConjunction);
		$mockReflectionService = $this->getMock('TYPO3\\CMS\\Extbase\\Reflection\\ReflectionService', array(), array(), '', FALSE);
		$mockReflectionService->expects($this->once())->method('getMethodTagsValues')->with(get_class($mockController), 'fooAction')->will($this->returnValue($methodTagsValues));
		$mockValidatorResolver = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\ValidatorResolver', array(), array(), '', FALSE);
		$mockValidatorResolver->expects($this->once())->method('buildMethodArgumentsValidatorConjunctions')->with(get_class($mockController), 'fooAction')->will($this->returnValue($methodArgumentsValidatorConjunctions));
		$mockValidatorResolver->expects($this->once())->method('getBaseValidatorConjunction')->with('F3_Foo_Quux')->will($this->returnValue($quuxBaseValidatorConjunction));
		$mockController->_set('reflectionService', $mockReflectionService);
		$mockController->_set('validatorResolver', $mockValidatorResolver);
		$mockController->_set('arguments', $arguments);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_call('initializeActionMethodValidators');
		$this->assertEquals($methodArgumentsValidatorConjunctions['arg1'], $arguments['arg1']->getValidator());
	}

	/**
	 * @test
	 * @author Sebastian Kurfürst <sbastian@typo3.org>
	 */
	public function initializeActionMethodValidatorsDoesNotRegisterModelBasedValidatorsIfDontValidateAnnotationIsSet() {
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('fooAction'), array(), '', FALSE);
		$this->enableDeprecatedPropertyMapperInController($mockController);
		$argument = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Argument', array('getName', 'getDataType'), array(), '', FALSE);
		$argument->expects($this->any())->method('getName')->will($this->returnValue('arg1'));
		$argument->expects($this->any())->method('getDataType')->will($this->returnValue('F3_Foo_Quux'));
		$arguments = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Arguments', array('dummy'));
		$arguments->addArgument($argument);
		$methodTagsValues = array(
			'dontvalidate' => array(
				'$arg1'
			)
		);
		$methodArgumentsValidatorConjunctions = array();
		$methodArgumentsValidatorConjunctions['arg1'] = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\ConjunctionValidator', array(), array(), '', FALSE);
		$mockReflectionService = $this->getMock('TYPO3\\CMS\\Extbase\\Reflection\\ReflectionService', array(), array(), '', FALSE);
		$mockReflectionService->expects($this->once())->method('getMethodTagsValues')->with(get_class($mockController), 'fooAction')->will($this->returnValue($methodTagsValues));
		$mockValidatorResolver = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\ValidatorResolver', array(), array(), '', FALSE);
		$mockValidatorResolver->expects($this->once())->method('buildMethodArgumentsValidatorConjunctions')->with(get_class($mockController), 'fooAction')->will($this->returnValue($methodArgumentsValidatorConjunctions));
		$mockValidatorResolver->expects($this->any())->method('getBaseValidatorConjunction')->will($this->throwException(new \Exception('This should not be called because the dontvalidate annotation is set.')));
		$mockController->_set('reflectionService', $mockReflectionService);
		$mockController->_set('validatorResolver', $mockValidatorResolver);
		$mockController->_set('arguments', $arguments);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_call('initializeActionMethodValidators');
		$this->assertEquals($methodArgumentsValidatorConjunctions['arg1'], $arguments['arg1']->getValidator());
	}

	/**
	 * @test
	 * @author Christopher Hlubek <hlubek@networkteam.com>
	 */
	public function defaultErrorActionSetsArgumentMappingResultsErrorsInRequest() {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request', array(), array(), '', FALSE);
		$mockError = $this->getMock('TYPO3\\CMS\\Extbase\\Error\\Error', array('getMessage'), array(), '', FALSE);
		$mockArgumentsMappingResults = $this->getMock('TYPO3\\CMS\\Extbase\\Property\\MappingResults', array('getErrors', 'getWarnings'), array(), '', FALSE);
		$mockArgumentsMappingResults->expects($this->atLeastOnce())->method('getErrors')->will($this->returnValue(array($mockError)));
		$mockArgumentsMappingResults->expects($this->any())->method('getWarnings')->will($this->returnValue(array()));
		/** @var $mockController \TYPO3\CMS\Extbase\Mvc\Controller\ActionController|\TYPO3\CMS\Core\Tests\AccessibleObjectInterface */
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('clearCacheOnError'), array(), '', FALSE);
		$controllerContext = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ControllerContext', array('getFlashMessageQueue'));
		$controllerContext->expects($this->any())->method('getFlashMessageQueue')->will($this->returnValue(new \TYPO3\CMS\Core\Messaging\FlashMessageQueue('foo')));
		$this->enableDeprecatedPropertyMapperInController($mockController);
		$mockController->_set('controllerContext', $controllerContext);
		$mockController->_set('request', $mockRequest);
		$mockController->_set('argumentsMappingResults', $mockArgumentsMappingResults);
		$mockRequest->expects($this->once())->method('setErrors')->with(array($mockError));
		$mockController->_call('errorAction');
	}

	/**
	 * Data Provider for checkRequestHashDoesNotThrowExceptionInNormalOperations
	 *
	 * @return array
	 */
	public function checkRequestHashInNormalOperation() {
		return array(
			// HMAC is verified
			array(TRUE),
			// HMAC not verified, but objects are directly fetched from persistence layer
			array(FALSE, FALSE, \TYPO3\CMS\Extbase\Mvc\Controller\Argument::ORIGIN_PERSISTENCE, \TYPO3\CMS\Extbase\Mvc\Controller\Argument::ORIGIN_PERSISTENCE),
			// HMAC not verified, objects new and modified, but dontverifyrequesthash-annotation set
			array(FALSE, TRUE, \TYPO3\CMS\Extbase\Mvc\Controller\Argument::ORIGIN_PERSISTENCE, \TYPO3\CMS\Extbase\Mvc\Controller\Argument::ORIGIN_PERSISTENCE_AND_MODIFIED, array('dontverifyrequesthash' => ''))
		);
	}

	/**
	 * @test
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 * @dataProvider checkRequestHashInNormalOperation
	 * @param boolean $hmacVerified
	 * @param boolean $reflectionServiceNeedsInitialization
	 * @param integer $argument1Origin
	 * @param integer $argument2Origin
	 * @param array $methodTagsValues
	 */
	public function checkRequestHashDoesNotThrowExceptionInNormalOperations($hmacVerified, $reflectionServiceNeedsInitialization = FALSE, $argument1Origin = 3, $argument2Origin = 3, array $methodTagsValues = array()) {
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Request', array('isHmacVerified'), array(), '', FALSE);
		$mockRequest->expects($this->once())->method('isHmacVerified')->will($this->returnValue($hmacVerified));
		$argument1 = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Argument', array('getOrigin'), array(), '', FALSE);
		$argument1->expects($this->any())->method('getOrigin')->will($this->returnValue($argument1Origin));
		$argument2 = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Argument', array('getOrigin'), array(), '', FALSE);
		$argument2->expects($this->any())->method('getOrigin')->will($this->returnValue($argument2Origin));
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('dummy'), array(), '', FALSE);
		$this->enableDeprecatedPropertyMapperInController($mockController);
		$mockReflectionService = $this->getMock('TYPO3\\CMS\\Extbase\\Reflection\\ReflectionService', array('getMethodTagsValues'), array(), '', FALSE);
		if ($reflectionServiceNeedsInitialization) {
			// Somehow this is needed, else I get "Mocked method does not exist."
			$mockReflectionService->expects($this->any())->method('getMethodTagsValues')->with(get_class($mockController), 'fooAction')->will($this->returnValue($methodTagsValues));
		}
		$mockController->_set('arguments', array($argument1, $argument2));
		$mockController->_set('request', $mockRequest);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_set('reflectionService', $mockReflectionService);
		$mockController->_call('checkRequestHash');
	}

	/**
	 * @test
	 * @expectedException \TYPO3\CMS\Extbase\Mvc\Exception\InvalidOrNoRequestHashException
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function checkRequestHashThrowsExceptionIfNeeded() {
		$hmacVerified = FALSE;
		$argument1Origin = \TYPO3\CMS\Extbase\Mvc\Controller\Argument::ORIGIN_PERSISTENCE_AND_MODIFIED;
		$argument2Origin = \TYPO3\CMS\Extbase\Mvc\Controller\Argument::ORIGIN_PERSISTENCE;
		$methodTagsValues = array();
		$mockRequest = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Request', array('isHmacVerified'), array(), '', FALSE);
		$mockRequest->expects($this->once())->method('isHmacVerified')->will($this->returnValue($hmacVerified));
		$argument1 = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Argument', array('getOrigin'), array(), '', FALSE);
		$argument1->expects($this->any())->method('getOrigin')->will($this->returnValue($argument1Origin));
		$argument2 = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Argument', array('getOrigin'), array(), '', FALSE);
		$argument2->expects($this->any())->method('getOrigin')->will($this->returnValue($argument2Origin));
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('dummy'), array(), '', FALSE);
		$this->enableDeprecatedPropertyMapperInController($mockController);
		$mockReflectionService = $this->getMock('TYPO3\\CMS\\Extbase\\Reflection\\ReflectionService', array('getMethodTagsValues'), array(), '', FALSE);
		$mockReflectionService->expects($this->any())->method('getMethodTagsValues')->with(get_class($mockController), 'fooAction')->will($this->returnValue($methodTagsValues));
		$mockController->_set('arguments', array($argument1, $argument2));
		$mockController->_set('request', $mockRequest);
		$mockController->_set('actionMethodName', 'fooAction');
		$mockController->_set('reflectionService', $mockReflectionService);
		$mockController->_call('checkRequestHash');
	}

	/**
	 * Helper which enables the deprecated property mapper in the ActionController class.
	 *
	 * @param \TYPO3\CMS\Extbase\Mvc\Controller\ActionController $actionController
	 */
	protected function enableDeprecatedPropertyMapperInController(\TYPO3\CMS\Extbase\Mvc\Controller\ActionController $actionController) {
		$mockConfigurationManager = $this->getMock('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
		$mockConfigurationManager->expects($this->any())->method('isFeatureEnabled')->with('rewrittenPropertyMapper')->will($this->returnValue(FALSE));
		$actionController->injectConfigurationManager($mockConfigurationManager);
	}

	/**
	 * @test
	 * @dataProvider templateRootPathDataProvider
	 * @param array $configuration
	 * @param array $expected
	 */
	public function setViewConfigurationResolvesTemplateRootPathsForTemplateRootPath($configuration, $expected) {
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('dummy'), array(), '', FALSE);
		$mockConfigurationManager = $this->getMock('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
		$mockConfigurationManager->expects($this->any())->method('getConfiguration')->will($this->returnValue($configuration));
		$mockController->injectConfigurationManager($mockConfigurationManager);
		$mockController->_set('request', $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request'), array('getControllerExtensionKey'));
		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface', array('setControllerContext', 'assign', 'assignMultiple', 'canRender', 'render', 'initializeView', 'setTemplateRootPaths'));
		$view->expects($this->once())->method('setTemplateRootPaths')->with($expected);
		$mockController->_call('setViewConfiguration', $view);
	}

	/**
	 * @return array
	 */
	public function templateRootPathDataProvider() {
		return array(
			'old behaviour only' => array(
				array(
					'view' => array(
						'templateRootPath' => 'some path'
					)
				),
				array('some path')
			),
			'new behaviour only with text keys' => array(
				array(
					'view' => array(
						'templateRootPaths' => array(
							'default' => 'some path',
							'extended' => 'some other path'
						)
					)
				),
				array(
					'extended' => 'some other path',
					'default' => 'some path'
				)
			),
			'new behaviour only with numerical keys' => array(
				array(
					'view' => array(
						'templateRootPaths' => array(
							'10' => 'some path',
							'20' => 'some other path',
							'15' => 'intermediate specific path'
						)
					)
				),
				array(
					'20' => 'some other path',
					'15' => 'intermediate specific path',
					'10' => 'some path'
				)
			),
			'new behaviour only with mixed keys' => array(
				array(
					'view' => array(
						'templateRootPaths' => array(
							'10' => 'some path',
							'very_specific' => 'some other path',
							'15' => 'intermediate specific path'
						)
					)
				),
				array(
					'15' => 'intermediate specific path',
					'very_specific' => 'some other path',
					'10' => 'some path'
				)
			),
			'old and new behaviour mixed with text keys' => array(
				array(
					'view' => array(
						'templateRootPaths' => array(
							'default' => 'some path',
							'specific' => 'intermediate specific path',
							'very_specific' => 'some other path'
						),
						'templateRootPath' => 'old path'
					)
				),
				array(
					'very_specific' => 'some other path',
					'specific' => 'intermediate specific path',
					'default' => 'some path',
					'0' => 'old path'
				)
			),
			'old and new behaviour mixed with numerical keys' => array(
				array(
					'view' => array(
						'templateRootPaths' => array(
							'10' => 'some path',
							'20' => 'intermediate specific path',
							'30' => 'some other path'
						),
						'templateRootPath' => 'old path'
					)
				),
				array(
					'30' => 'some other path',
					'20' => 'intermediate specific path',
					'10' => 'some path',
					'31' => 'old path'
				)
			),
			'old and new behaviour mixed with mixed keys' => array(
				array(
					'view' => array(
						'templateRootPaths' => array(
							'10' => 'some path',
							'very_specific' => 'some other path',
							'15' => 'intermediate specific path'
						),
						'templateRootPath' => 'old path'
					)
				),
				array(
					'15' => 'intermediate specific path',
					'very_specific' => 'some other path',
					'10' => 'some path',
					'16' => 'old path'
				)
			)
		);
	}

	/**
	 * @test
	 * @dataProvider layoutRootPathDataProvider
	 *
	 * @param array $configuration
	 * @param array $expected
	 */
	public function setViewConfigurationResolvesLayoutRootPathsForLayoutRootPath($configuration, $expected) {
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('dummy'), array(), '', FALSE);
		$mockConfigurationManager = $this->getMock('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
		$mockConfigurationManager->expects($this->any())->method('getConfiguration')->will($this->returnValue($configuration));
		$mockController->injectConfigurationManager($mockConfigurationManager);
		$mockController->_set('request', $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request'), array('getControllerExtensionKey'));
		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface', array('setControllerContext', 'assign', 'assignMultiple', 'canRender', 'render', 'initializeView', 'setlayoutRootPaths'));
		$view->expects($this->once())->method('setlayoutRootPaths')->with($expected);
		$mockController->_call('setViewConfiguration', $view);
	}

	/**
	 * @return array
	 */
	public function layoutRootPathDataProvider() {
		return array(
			'old behaviour only' => array(
				array(
					'view' => array(
						'layoutRootPath' => 'some path'
					)
				),
				array('some path')
			),
			'new behaviour only with text keys' => array(
				array(
					'view' => array(
						'layoutRootPaths' => array(
							'default' => 'some path',
							'extended' => 'some other path'
						)
					)
				),
				array(
					'extended' => 'some other path',
					'default' => 'some path'
				)
			),
			'new behaviour only with numerical keys' => array(
				array(
					'view' => array(
						'layoutRootPaths' => array(
							'10' => 'some path',
							'20' => 'some other path',
							'15' => 'intermediate specific path'
						)
					)
				),
				array(
					'20' => 'some other path',
					'15' => 'intermediate specific path',
					'10' => 'some path'
				)
			),
			'new behaviour only with mixed keys' => array(
				array(
					'view' => array(
						'layoutRootPaths' => array(
							'10' => 'some path',
							'very_specific' => 'some other path',
							'15' => 'intermediate specific path'
						)
					)
				),
				array(
					'15' => 'intermediate specific path',
					'very_specific' => 'some other path',
					'10' => 'some path'
				)
			),
			'old and new behaviour mixed with text keys' => array(
				array(
					'view' => array(
						'layoutRootPaths' => array(
							'default' => 'some path',
							'specific' => 'intermediate specific path',
							'very_specific' => 'some other path'
						),
						'layoutRootPath' => 'old path'
					)
				),
				array(
					'very_specific' => 'some other path',
					'specific' => 'intermediate specific path',
					'default' => 'some path',
					'0' => 'old path'
				)
			),
			'old and new behaviour mixed with numerical keys' => array(
				array(
					'view' => array(
						'layoutRootPaths' => array(
							'10' => 'some path',
							'20' => 'intermediate specific path',
							'30' => 'some other path'
						),
						'layoutRootPath' => 'old path'
					)
				),
				array(
					'30' => 'some other path',
					'20' => 'intermediate specific path',
					'10' => 'some path',
					'31' => 'old path'
				)
			),
			'old and new behaviour mixed with mixed keys' => array(
				array(
					'view' => array(
						'layoutRootPaths' => array(
							'10' => 'some path',
							'very_specific' => 'some other path',
							'15' => 'intermediate specific path'
						),
						'layoutRootPath' => 'old path'
					)
				),
				array(
					'15' => 'intermediate specific path',
					'very_specific' => 'some other path',
					'10' => 'some path',
					'16' => 'old path'
				)
			)
		);
	}

	/**
	 * @test
	 * @dataProvider partialRootPathDataProvider
	 *
	 * @param array $configuration
	 * @param array $expected
	 */
	public function setViewConfigurationResolvesPartialRootPathsForPartialRootPath($configuration, $expected) {
		$mockController = $this->getAccessibleMock('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\ActionController', array('dummy'), array(), '', FALSE);
		$mockConfigurationManager = $this->getMock('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
		$mockConfigurationManager->expects($this->any())->method('getConfiguration')->will($this->returnValue($configuration));
		$mockController->injectConfigurationManager($mockConfigurationManager);
		$mockController->_set('request', $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\Request'), array('getControllerExtensionKey'));
		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface', array('setControllerContext', 'assign', 'assignMultiple', 'canRender', 'render', 'initializeView', 'setpartialRootPaths'));
		$view->expects($this->once())->method('setpartialRootPaths')->with($expected);
		$mockController->_call('setViewConfiguration', $view);
	}

	/**
	 * @return array
	 */
	public function partialRootPathDataProvider() {
		return array(
			'old behaviour only' => array(
				array(
					'view' => array(
						'partialRootPath' => 'some path'
					)
				),
				array('some path')
			),
			'new behaviour only with text keys' => array(
				array(
					'view' => array(
						'partialRootPaths' => array(
							'default' => 'some path',
							'extended' => 'some other path'
						)
					)
				),
				array(
					'extended' => 'some other path',
					'default' => 'some path'
				)
			),
			'new behaviour only with numerical keys' => array(
				array(
					'view' => array(
						'partialRootPaths' => array(
							'10' => 'some path',
							'20' => 'some other path',
							'15' => 'intermediate specific path'
						)
					)
				),
				array(
					'20' => 'some other path',
					'15' => 'intermediate specific path',
					'10' => 'some path'
				)
			),
			'new behaviour only with mixed keys' => array(
				array(
					'view' => array(
						'partialRootPaths' => array(
							'10' => 'some path',
							'very_specific' => 'some other path',
							'15' => 'intermediate specific path'
						)
					)
				),
				array(
					'15' => 'intermediate specific path',
					'very_specific' => 'some other path',
					'10' => 'some path'
				)
			),
			'old and new behaviour mixed with text keys' => array(
				array(
					'view' => array(
						'partialRootPath' => 'old path',
						'partialRootPaths' => array(
							'default' => 'some path',
							'specific' => 'intermediate specific path',
							'very_specific' => 'some other path'
						)
					)
				),
				array(
					'very_specific' => 'some other path',
					'specific' => 'intermediate specific path',
					'default' => 'some path',
					'0' => 'old path'
				)
			),
			'old and new behaviour mixed with numerical keys' => array(
				array(
					'view' => array(
						'partialRootPaths' => array(
							'10' => 'some path',
							'20' => 'intermediate specific path',
							'30' => 'some other path'
						),
						'partialRootPath' => 'old path'
					)
				),
				array(
					'30' => 'some other path',
					'20' => 'intermediate specific path',
					'10' => 'some path',
					'31' => 'old path'
				)
			),
			'old and new behaviour mixed with mixed keys' => array(
				array(
					'view' => array(
						'partialRootPaths' => array(
							'10' => 'some path',
							'very_specific' => 'some other path',
							'15' => 'intermediate specific path'
						),
						'partialRootPath' => 'old path'
					)
				),
				array(
					'15' => 'intermediate specific path',
					'very_specific' => 'some other path',
					'10' => 'some path',
					'16' => 'old path'
				)
			)
		);
	}
}
