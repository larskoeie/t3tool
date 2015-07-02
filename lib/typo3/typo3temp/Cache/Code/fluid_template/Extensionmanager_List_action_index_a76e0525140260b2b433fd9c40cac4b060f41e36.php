<?php
class FluidCache_Extensionmanager_List_action_index_a76e0525140260b2b433fd9c40cac4b060f41e36 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\CMS\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {

return 'main';
}
public function hasLayout() {
return TRUE;
}

/**
 * section docheader-buttons
 */
public function section_82416aa889dc891ac3382685ebae30417e96849a(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments1 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments2 = array();
$arguments2['action'] = 'form';
$arguments2['controller'] = 'UploadExtensionFile';
$arguments2['arguments'] = array (
);
$arguments2['extensionName'] = NULL;
$arguments2['pluginName'] = NULL;
$arguments2['pageUid'] = NULL;
$arguments2['pageType'] = 0;
$arguments2['noCache'] = false;
$arguments2['noCacheHash'] = false;
$arguments2['section'] = '';
$arguments2['format'] = '';
$arguments2['linkAccessRestrictedPages'] = false;
$arguments2['additionalParams'] = array (
);
$arguments2['absolute'] = false;
$arguments2['addQueryString'] = false;
$arguments2['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments2['addQueryStringMethod'] = NULL;
$renderChildrenClosure3 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper4 = $self->getViewHelper('$viewHelper4', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper4->setArguments($arguments2);
$viewHelper4->setRenderingContext($renderingContext);
$viewHelper4->setRenderChildrenClosure($renderChildrenClosure3);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments1['uri'] = $viewHelper4->initializeArgumentsAndRender();
$arguments1['icon'] = 'actions-edit-upload';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments5 = array();
$arguments5['key'] = 'extensionList.uploadExtension';
$arguments5['id'] = NULL;
$arguments5['default'] = NULL;
$arguments5['htmlEscape'] = NULL;
$arguments5['arguments'] = NULL;
$arguments5['extensionName'] = NULL;
$renderChildrenClosure6 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper7 = $self->getViewHelper('$viewHelper7', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper7->setArguments($arguments5);
$viewHelper7->setRenderingContext($renderingContext);
$viewHelper7->setRenderChildrenClosure($renderChildrenClosure6);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments1['title'] = $viewHelper7->initializeArgumentsAndRender();
$arguments1['additionalAttributes'] = NULL;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper9 = $self->getViewHelper('$viewHelper9', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper9->setArguments($arguments1);
$viewHelper9->setRenderingContext($renderingContext);
$viewHelper9->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output0 .= $viewHelper9->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}
/**
 * section module-headline
 */
public function section_448d1ad99edd62d80682fc5d4e038788bb925e4c(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output10 = '';

$output10 .= '
	<h1>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments11 = array();
$arguments11['key'] = 'manageExtensions';
$arguments11['id'] = NULL;
$arguments11['default'] = NULL;
$arguments11['htmlEscape'] = NULL;
$arguments11['arguments'] = NULL;
$arguments11['extensionName'] = NULL;
$renderChildrenClosure12 = function() use ($renderingContext, $self) {
return 'Manage extensions';
};
$viewHelper13 = $self->getViewHelper('$viewHelper13', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper13->setArguments($arguments11);
$viewHelper13->setRenderingContext($renderingContext);
$viewHelper13->setRenderChildrenClosure($renderChildrenClosure12);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output10 .= $viewHelper13->initializeArgumentsAndRender();

$output10 .= '</h1>
';

return $output10;
}
/**
 * section Content
 */
public function section_4f9be057f0ea5d2ba72fd2c810e8d7b9aa98b469(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output14 = '';

$output14 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments15 = array();
$arguments15['renderMode'] = 'div';
$arguments15['additionalAttributes'] = NULL;
$arguments15['class'] = NULL;
$arguments15['dir'] = NULL;
$arguments15['id'] = NULL;
$arguments15['lang'] = NULL;
$arguments15['style'] = NULL;
$arguments15['title'] = NULL;
$arguments15['accesskey'] = NULL;
$arguments15['tabindex'] = NULL;
$arguments15['onclick'] = NULL;
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper17 = $self->getViewHelper('$viewHelper17', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper17->setArguments($arguments15);
$viewHelper17->setRenderingContext($renderingContext);
$viewHelper17->setRenderChildrenClosure($renderChildrenClosure16);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper

$output14 .= $viewHelper17->initializeArgumentsAndRender();

$output14 .= '

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments18 = array();
$arguments18['partial'] = 'List/UploadForm';
$arguments18['section'] = NULL;
$arguments18['arguments'] = array (
);
$arguments18['optional'] = false;
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper20 = $self->getViewHelper('$viewHelper20', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper20->setArguments($arguments18);
$viewHelper20->setRenderingContext($renderingContext);
$viewHelper20->setRenderChildrenClosure($renderChildrenClosure19);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper

$output14 .= $viewHelper20->initializeArgumentsAndRender();

$output14 .= '

	<div class="headerRow ui-helper-clearfix">
		<div class="typo3-extensionmanager-headerRowLeft">
		</div>
		<div class="typo3-extensionmanager-headerRowRight">
		</div>
	</div>
	<table id="typo3-extension-list" class="t3-table typo3-extension-list">
		<thead>
			<tr>
				<th title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments21 = array();
$arguments21['key'] = 'extensionList.header.title.update';
$arguments21['id'] = NULL;
$arguments21['default'] = NULL;
$arguments21['htmlEscape'] = NULL;
$arguments21['arguments'] = NULL;
$arguments21['extensionName'] = NULL;
$renderChildrenClosure22 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper23 = $self->getViewHelper('$viewHelper23', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper23->setArguments($arguments21);
$viewHelper23->setRenderingContext($renderingContext);
$viewHelper23->setRenderChildrenClosure($renderChildrenClosure22);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output14 .= $viewHelper23->initializeArgumentsAndRender();

$output14 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments24 = array();
$arguments24['key'] = 'extensionList.header.update';
$arguments24['id'] = NULL;
$arguments24['default'] = NULL;
$arguments24['htmlEscape'] = NULL;
$arguments24['arguments'] = NULL;
$arguments24['extensionName'] = NULL;
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper26 = $self->getViewHelper('$viewHelper26', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper26->setArguments($arguments24);
$viewHelper26->setRenderingContext($renderingContext);
$viewHelper26->setRenderChildrenClosure($renderChildrenClosure25);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output14 .= $viewHelper26->initializeArgumentsAndRender();

$output14 .= '</th>
				<th title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments27 = array();
$arguments27['key'] = 'extensionList.header.title.activate';
$arguments27['id'] = NULL;
$arguments27['default'] = NULL;
$arguments27['htmlEscape'] = NULL;
$arguments27['arguments'] = NULL;
$arguments27['extensionName'] = NULL;
$renderChildrenClosure28 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper29 = $self->getViewHelper('$viewHelper29', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper29->setArguments($arguments27);
$viewHelper29->setRenderingContext($renderingContext);
$viewHelper29->setRenderChildrenClosure($renderChildrenClosure28);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output14 .= $viewHelper29->initializeArgumentsAndRender();

$output14 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments30 = array();
$arguments30['key'] = 'extensionList.header.activate';
$arguments30['id'] = NULL;
$arguments30['default'] = NULL;
$arguments30['htmlEscape'] = NULL;
$arguments30['arguments'] = NULL;
$arguments30['extensionName'] = NULL;
$renderChildrenClosure31 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper32 = $self->getViewHelper('$viewHelper32', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper32->setArguments($arguments30);
$viewHelper32->setRenderingContext($renderingContext);
$viewHelper32->setRenderChildrenClosure($renderChildrenClosure31);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output14 .= $viewHelper32->initializeArgumentsAndRender();

$output14 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments33 = array();
$arguments33['key'] = 'extensionList.header.extensionName';
$arguments33['id'] = NULL;
$arguments33['default'] = NULL;
$arguments33['htmlEscape'] = NULL;
$arguments33['arguments'] = NULL;
$arguments33['extensionName'] = NULL;
$renderChildrenClosure34 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper35 = $self->getViewHelper('$viewHelper35', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper35->setArguments($arguments33);
$viewHelper35->setRenderingContext($renderingContext);
$viewHelper35->setRenderChildrenClosure($renderChildrenClosure34);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output14 .= $viewHelper35->initializeArgumentsAndRender();

$output14 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments36 = array();
$arguments36['key'] = 'extensionList.header.extensionKey';
$arguments36['id'] = NULL;
$arguments36['default'] = NULL;
$arguments36['htmlEscape'] = NULL;
$arguments36['arguments'] = NULL;
$arguments36['extensionName'] = NULL;
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper38 = $self->getViewHelper('$viewHelper38', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper38->setArguments($arguments36);
$viewHelper38->setRenderingContext($renderingContext);
$viewHelper38->setRenderChildrenClosure($renderChildrenClosure37);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output14 .= $viewHelper38->initializeArgumentsAndRender();

$output14 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments39 = array();
$arguments39['key'] = 'extensionList.header.extensionVersion';
$arguments39['id'] = NULL;
$arguments39['default'] = NULL;
$arguments39['htmlEscape'] = NULL;
$arguments39['arguments'] = NULL;
$arguments39['extensionName'] = NULL;
$renderChildrenClosure40 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper41 = $self->getViewHelper('$viewHelper41', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper41->setArguments($arguments39);
$viewHelper41->setRenderingContext($renderingContext);
$viewHelper41->setRenderChildrenClosure($renderChildrenClosure40);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output14 .= $viewHelper41->initializeArgumentsAndRender();

$output14 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments42 = array();
$arguments42['key'] = 'extensionList.header.extensionActions';
$arguments42['id'] = NULL;
$arguments42['default'] = NULL;
$arguments42['htmlEscape'] = NULL;
$arguments42['arguments'] = NULL;
$arguments42['extensionName'] = NULL;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper44 = $self->getViewHelper('$viewHelper44', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper44->setArguments($arguments42);
$viewHelper44->setRenderingContext($renderingContext);
$viewHelper44->setRenderChildrenClosure($renderChildrenClosure43);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output14 .= $viewHelper44->initializeArgumentsAndRender();

$output14 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments45 = array();
$arguments45['key'] = 'extensionList.header.extensionState';
$arguments45['id'] = NULL;
$arguments45['default'] = NULL;
$arguments45['htmlEscape'] = NULL;
$arguments45['arguments'] = NULL;
$arguments45['extensionName'] = NULL;
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper47 = $self->getViewHelper('$viewHelper47', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper47->setArguments($arguments45);
$viewHelper47->setRenderingContext($renderingContext);
$viewHelper47->setRenderChildrenClosure($renderChildrenClosure46);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output14 .= $viewHelper47->initializeArgumentsAndRender();

$output14 .= '</th>
			</tr>
		</thead>
		<tbody>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments48 = array();
$arguments48['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensions', $renderingContext);
$arguments48['as'] = 'extension';
$arguments48['key'] = 'extensionKey';
$arguments48['reverse'] = false;
$arguments48['iteration'] = NULL;
$renderChildrenClosure49 = function() use ($renderingContext, $self) {
$output50 = '';

$output50 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments51 = array();
// Rendering Boolean node
$arguments51['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject', $renderingContext));
$arguments51['then'] = NULL;
$arguments51['else'] = NULL;
$renderChildrenClosure52 = function() use ($renderingContext, $self) {
$output53 = '';

$output53 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments54 = array();
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
$output56 = '';

$output56 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments57 = array();
$arguments57['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensionKey', $renderingContext);
$arguments57['keepQuotes'] = false;
$arguments57['encoding'] = NULL;
$arguments57['doubleEncode'] = true;
$renderChildrenClosure58 = function() use ($renderingContext, $self) {
return NULL;
};
$value59 = ($arguments57['value'] !== NULL ? $arguments57['value'] : $renderChildrenClosure58());

$output56 .= (!is_string($value59) ? $value59 : htmlspecialchars($value59, ($arguments57['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments57['encoding'] !== NULL ? $arguments57['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments57['doubleEncode']));

$output56 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments60 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments61 = array();
$arguments61['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.reviewState', $renderingContext);
$arguments61['keepQuotes'] = false;
$arguments61['encoding'] = NULL;
$arguments61['doubleEncode'] = true;
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
return NULL;
};
$value63 = ($arguments61['value'] !== NULL ? $arguments61['value'] : $renderChildrenClosure62());
$arguments60['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value63) ? $value63 : htmlspecialchars($value63, ($arguments61['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments61['encoding'] !== NULL ? $arguments61['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments61['doubleEncode'])), -1);
$arguments60['then'] = 'insecure';
$arguments60['else'] = NULL;
$renderChildrenClosure64 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper65 = $self->getViewHelper('$viewHelper65', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper65->setArguments($arguments60);
$viewHelper65->setRenderingContext($renderingContext);
$viewHelper65->setRenderChildrenClosure($renderChildrenClosure64);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output56 .= $viewHelper65->initializeArgumentsAndRender();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments66 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments67 = array();
$arguments67['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.reviewState', $renderingContext);
$arguments67['keepQuotes'] = false;
$arguments67['encoding'] = NULL;
$arguments67['doubleEncode'] = true;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
return NULL;
};
$value69 = ($arguments67['value'] !== NULL ? $arguments67['value'] : $renderChildrenClosure68());
$arguments66['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value69) ? $value69 : htmlspecialchars($value69, ($arguments67['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments67['encoding'] !== NULL ? $arguments67['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments67['doubleEncode'])), -2);
$arguments66['then'] = 'outdated';
$arguments66['else'] = NULL;
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper71 = $self->getViewHelper('$viewHelper71', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper71->setArguments($arguments66);
$viewHelper71->setRenderingContext($renderingContext);
$viewHelper71->setRenderChildrenClosure($renderChildrenClosure70);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output56 .= $viewHelper71->initializeArgumentsAndRender();

$output56 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments72 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments73 = array();
$arguments73['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.installed', $renderingContext);
$arguments73['keepQuotes'] = false;
$arguments73['encoding'] = NULL;
$arguments73['doubleEncode'] = true;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
return NULL;
};
$value75 = ($arguments73['value'] !== NULL ? $arguments73['value'] : $renderChildrenClosure74());
$arguments72['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value75) ? $value75 : htmlspecialchars($value75, ($arguments73['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments73['encoding'] !== NULL ? $arguments73['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments73['doubleEncode'])));
$arguments72['then'] = '';
$arguments72['else'] = 'inactive';
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper77 = $self->getViewHelper('$viewHelper77', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper77->setArguments($arguments72);
$viewHelper77->setRenderingContext($renderingContext);
$viewHelper77->setRenderChildrenClosure($renderChildrenClosure76);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output56 .= $viewHelper77->initializeArgumentsAndRender();

$output56 .= '">
					';
return $output56;
};
$viewHelper78 = $self->getViewHelper('$viewHelper78', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper78->setArguments($arguments54);
$viewHelper78->setRenderingContext($renderingContext);
$viewHelper78->setRenderChildrenClosure($renderChildrenClosure55);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper

$output53 .= $viewHelper78->initializeArgumentsAndRender();

$output53 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments79 = array();
$renderChildrenClosure80 = function() use ($renderingContext, $self) {
$output81 = '';

$output81 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments82 = array();
$arguments82['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensionKey', $renderingContext);
$arguments82['keepQuotes'] = false;
$arguments82['encoding'] = NULL;
$arguments82['doubleEncode'] = true;
$renderChildrenClosure83 = function() use ($renderingContext, $self) {
return NULL;
};
$value84 = ($arguments82['value'] !== NULL ? $arguments82['value'] : $renderChildrenClosure83());

$output81 .= (!is_string($value84) ? $value84 : htmlspecialchars($value84, ($arguments82['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments82['encoding'] !== NULL ? $arguments82['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments82['doubleEncode']));

$output81 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments85 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments86 = array();
$arguments86['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.installed', $renderingContext);
$arguments86['keepQuotes'] = false;
$arguments86['encoding'] = NULL;
$arguments86['doubleEncode'] = true;
$renderChildrenClosure87 = function() use ($renderingContext, $self) {
return NULL;
};
$value88 = ($arguments86['value'] !== NULL ? $arguments86['value'] : $renderChildrenClosure87());
$arguments85['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value88) ? $value88 : htmlspecialchars($value88, ($arguments86['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments86['encoding'] !== NULL ? $arguments86['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments86['doubleEncode'])));
$arguments85['then'] = '';
$arguments85['else'] = 'inactive';
$renderChildrenClosure89 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper90 = $self->getViewHelper('$viewHelper90', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper90->setArguments($arguments85);
$viewHelper90->setRenderingContext($renderingContext);
$viewHelper90->setRenderChildrenClosure($renderChildrenClosure89);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output81 .= $viewHelper90->initializeArgumentsAndRender();

$output81 .= '">
					';
return $output81;
};
$viewHelper91 = $self->getViewHelper('$viewHelper91', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper91->setArguments($arguments79);
$viewHelper91->setRenderingContext($renderingContext);
$viewHelper91->setRenderChildrenClosure($renderChildrenClosure80);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper

$output53 .= $viewHelper91->initializeArgumentsAndRender();

$output53 .= '
				';
return $output53;
};
$arguments51['__thenClosure'] = function() use ($renderingContext, $self) {
$output92 = '';

$output92 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments93 = array();
$arguments93['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensionKey', $renderingContext);
$arguments93['keepQuotes'] = false;
$arguments93['encoding'] = NULL;
$arguments93['doubleEncode'] = true;
$renderChildrenClosure94 = function() use ($renderingContext, $self) {
return NULL;
};
$value95 = ($arguments93['value'] !== NULL ? $arguments93['value'] : $renderChildrenClosure94());

$output92 .= (!is_string($value95) ? $value95 : htmlspecialchars($value95, ($arguments93['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments93['encoding'] !== NULL ? $arguments93['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments93['doubleEncode']));

$output92 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments96 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments97 = array();
$arguments97['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.reviewState', $renderingContext);
$arguments97['keepQuotes'] = false;
$arguments97['encoding'] = NULL;
$arguments97['doubleEncode'] = true;
$renderChildrenClosure98 = function() use ($renderingContext, $self) {
return NULL;
};
$value99 = ($arguments97['value'] !== NULL ? $arguments97['value'] : $renderChildrenClosure98());
$arguments96['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value99) ? $value99 : htmlspecialchars($value99, ($arguments97['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments97['encoding'] !== NULL ? $arguments97['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments97['doubleEncode'])), -1);
$arguments96['then'] = 'insecure';
$arguments96['else'] = NULL;
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper101 = $self->getViewHelper('$viewHelper101', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper101->setArguments($arguments96);
$viewHelper101->setRenderingContext($renderingContext);
$viewHelper101->setRenderChildrenClosure($renderChildrenClosure100);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output92 .= $viewHelper101->initializeArgumentsAndRender();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments102 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments103 = array();
$arguments103['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.reviewState', $renderingContext);
$arguments103['keepQuotes'] = false;
$arguments103['encoding'] = NULL;
$arguments103['doubleEncode'] = true;
$renderChildrenClosure104 = function() use ($renderingContext, $self) {
return NULL;
};
$value105 = ($arguments103['value'] !== NULL ? $arguments103['value'] : $renderChildrenClosure104());
$arguments102['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value105) ? $value105 : htmlspecialchars($value105, ($arguments103['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments103['encoding'] !== NULL ? $arguments103['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments103['doubleEncode'])), -2);
$arguments102['then'] = 'outdated';
$arguments102['else'] = NULL;
$renderChildrenClosure106 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper107 = $self->getViewHelper('$viewHelper107', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper107->setArguments($arguments102);
$viewHelper107->setRenderingContext($renderingContext);
$viewHelper107->setRenderChildrenClosure($renderChildrenClosure106);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output92 .= $viewHelper107->initializeArgumentsAndRender();

$output92 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments108 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments109 = array();
$arguments109['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.installed', $renderingContext);
$arguments109['keepQuotes'] = false;
$arguments109['encoding'] = NULL;
$arguments109['doubleEncode'] = true;
$renderChildrenClosure110 = function() use ($renderingContext, $self) {
return NULL;
};
$value111 = ($arguments109['value'] !== NULL ? $arguments109['value'] : $renderChildrenClosure110());
$arguments108['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value111) ? $value111 : htmlspecialchars($value111, ($arguments109['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments109['encoding'] !== NULL ? $arguments109['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments109['doubleEncode'])));
$arguments108['then'] = '';
$arguments108['else'] = 'inactive';
$renderChildrenClosure112 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper113 = $self->getViewHelper('$viewHelper113', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper113->setArguments($arguments108);
$viewHelper113->setRenderingContext($renderingContext);
$viewHelper113->setRenderChildrenClosure($renderChildrenClosure112);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output92 .= $viewHelper113->initializeArgumentsAndRender();

$output92 .= '">
					';
return $output92;
};
$arguments51['__elseClosure'] = function() use ($renderingContext, $self) {
$output114 = '';

$output114 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments115 = array();
$arguments115['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensionKey', $renderingContext);
$arguments115['keepQuotes'] = false;
$arguments115['encoding'] = NULL;
$arguments115['doubleEncode'] = true;
$renderChildrenClosure116 = function() use ($renderingContext, $self) {
return NULL;
};
$value117 = ($arguments115['value'] !== NULL ? $arguments115['value'] : $renderChildrenClosure116());

$output114 .= (!is_string($value117) ? $value117 : htmlspecialchars($value117, ($arguments115['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments115['encoding'] !== NULL ? $arguments115['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments115['doubleEncode']));

$output114 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments118 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments119 = array();
$arguments119['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.installed', $renderingContext);
$arguments119['keepQuotes'] = false;
$arguments119['encoding'] = NULL;
$arguments119['doubleEncode'] = true;
$renderChildrenClosure120 = function() use ($renderingContext, $self) {
return NULL;
};
$value121 = ($arguments119['value'] !== NULL ? $arguments119['value'] : $renderChildrenClosure120());
$arguments118['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value121) ? $value121 : htmlspecialchars($value121, ($arguments119['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments119['encoding'] !== NULL ? $arguments119['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments119['doubleEncode'])));
$arguments118['then'] = '';
$arguments118['else'] = 'inactive';
$renderChildrenClosure122 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper123 = $self->getViewHelper('$viewHelper123', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper123->setArguments($arguments118);
$viewHelper123->setRenderingContext($renderingContext);
$viewHelper123->setRenderChildrenClosure($renderChildrenClosure122);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output114 .= $viewHelper123->initializeArgumentsAndRender();

$output114 .= '">
					';
return $output114;
};
$viewHelper124 = $self->getViewHelper('$viewHelper124', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper124->setArguments($arguments51);
$viewHelper124->setRenderingContext($renderingContext);
$viewHelper124->setRenderChildrenClosure($renderChildrenClosure52);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output50 .= $viewHelper124->initializeArgumentsAndRender();

$output50 .= '
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments125 = array();
// Rendering Boolean node
$arguments125['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.updateAvailable', $renderingContext));
$arguments125['then'] = NULL;
$arguments125['else'] = NULL;
$renderChildrenClosure126 = function() use ($renderingContext, $self) {
$output127 = '';

$output127 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments128 = array();
// Rendering Boolean node
$arguments128['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.state', $renderingContext), 'excludeFromUpdates');
$arguments128['then'] = NULL;
$arguments128['else'] = NULL;
$renderChildrenClosure129 = function() use ($renderingContext, $self) {
$output130 = '';

$output130 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments131 = array();
$renderChildrenClosure132 = function() use ($renderingContext, $self) {
$output133 = '';

$output133 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments134 = array();
$arguments134['icon'] = 'actions-system-extension-update-disabled';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments135 = array();
$arguments135['key'] = 'extensionList.updateDisabled';
$arguments135['id'] = NULL;
$arguments135['default'] = NULL;
$arguments135['htmlEscape'] = NULL;
$arguments135['arguments'] = NULL;
$arguments135['extensionName'] = NULL;
$renderChildrenClosure136 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper137 = $self->getViewHelper('$viewHelper137', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper137->setArguments($arguments135);
$viewHelper137->setRenderingContext($renderingContext);
$viewHelper137->setRenderChildrenClosure($renderChildrenClosure136);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments134['title'] = $viewHelper137->initializeArgumentsAndRender();
$arguments134['uri'] = '';
$arguments134['additionalAttributes'] = NULL;
$renderChildrenClosure138 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper139 = $self->getViewHelper('$viewHelper139', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper139->setArguments($arguments134);
$viewHelper139->setRenderingContext($renderingContext);
$viewHelper139->setRenderChildrenClosure($renderChildrenClosure138);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output133 .= $viewHelper139->initializeArgumentsAndRender();

$output133 .= '
							';
return $output133;
};
$viewHelper140 = $self->getViewHelper('$viewHelper140', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper140->setArguments($arguments131);
$viewHelper140->setRenderingContext($renderingContext);
$viewHelper140->setRenderChildrenClosure($renderChildrenClosure132);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper

$output130 .= $viewHelper140->initializeArgumentsAndRender();

$output130 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments141 = array();
$renderChildrenClosure142 = function() use ($renderingContext, $self) {
$output143 = '';

$output143 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments144 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments145 = array();
$arguments145['action'] = 'updateCommentForUpdatableVersions';
$arguments145['controller'] = 'Download';
// Rendering Array
$array146 = array();
$array146['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.key', $renderingContext);
$array146['integerVersionStart'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.integerVersion', $renderingContext);
$array146['integerVersionStop'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.updateToVersion.integerVersion', $renderingContext);
$arguments145['arguments'] = $array146;
$arguments145['format'] = 'json';
$arguments145['extensionName'] = NULL;
$arguments145['pluginName'] = NULL;
$arguments145['pageUid'] = NULL;
$arguments145['pageType'] = 0;
$arguments145['noCache'] = false;
$arguments145['noCacheHash'] = false;
$arguments145['section'] = '';
$arguments145['linkAccessRestrictedPages'] = false;
$arguments145['additionalParams'] = array (
);
$arguments145['absolute'] = false;
$arguments145['addQueryString'] = false;
$arguments145['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments145['addQueryStringMethod'] = NULL;
$renderChildrenClosure147 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper148 = $self->getViewHelper('$viewHelper148', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper148->setArguments($arguments145);
$viewHelper148->setRenderingContext($renderingContext);
$viewHelper148->setRenderChildrenClosure($renderChildrenClosure147);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments144['uri'] = $viewHelper148->initializeArgumentsAndRender();
$arguments144['icon'] = 'actions-system-extension-update';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments149 = array();
$arguments149['key'] = 'extensionList.updateToVersion';
// Rendering Array
$array150 = array();
$array150['0'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.updateToVersion.version', $renderingContext);
$arguments149['arguments'] = $array150;
$arguments149['id'] = NULL;
$arguments149['default'] = NULL;
$arguments149['htmlEscape'] = NULL;
$arguments149['extensionName'] = NULL;
$renderChildrenClosure151 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper152 = $self->getViewHelper('$viewHelper152', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper152->setArguments($arguments149);
$viewHelper152->setRenderingContext($renderingContext);
$viewHelper152->setRenderChildrenClosure($renderChildrenClosure151);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments144['title'] = $viewHelper152->initializeArgumentsAndRender();
$arguments144['additionalAttributes'] = NULL;
$renderChildrenClosure153 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper154 = $self->getViewHelper('$viewHelper154', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper154->setArguments($arguments144);
$viewHelper154->setRenderingContext($renderingContext);
$viewHelper154->setRenderChildrenClosure($renderChildrenClosure153);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output143 .= $viewHelper154->initializeArgumentsAndRender();

$output143 .= '
							';
return $output143;
};
$viewHelper155 = $self->getViewHelper('$viewHelper155', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper155->setArguments($arguments141);
$viewHelper155->setRenderingContext($renderingContext);
$viewHelper155->setRenderChildrenClosure($renderChildrenClosure142);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper

$output130 .= $viewHelper155->initializeArgumentsAndRender();

$output130 .= '
						';
return $output130;
};
$arguments128['__thenClosure'] = function() use ($renderingContext, $self) {
$output156 = '';

$output156 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments157 = array();
$arguments157['icon'] = 'actions-system-extension-update-disabled';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments158 = array();
$arguments158['key'] = 'extensionList.updateDisabled';
$arguments158['id'] = NULL;
$arguments158['default'] = NULL;
$arguments158['htmlEscape'] = NULL;
$arguments158['arguments'] = NULL;
$arguments158['extensionName'] = NULL;
$renderChildrenClosure159 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper160 = $self->getViewHelper('$viewHelper160', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper160->setArguments($arguments158);
$viewHelper160->setRenderingContext($renderingContext);
$viewHelper160->setRenderChildrenClosure($renderChildrenClosure159);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments157['title'] = $viewHelper160->initializeArgumentsAndRender();
$arguments157['uri'] = '';
$arguments157['additionalAttributes'] = NULL;
$renderChildrenClosure161 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper162 = $self->getViewHelper('$viewHelper162', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper162->setArguments($arguments157);
$viewHelper162->setRenderingContext($renderingContext);
$viewHelper162->setRenderChildrenClosure($renderChildrenClosure161);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output156 .= $viewHelper162->initializeArgumentsAndRender();

$output156 .= '
							';
return $output156;
};
$arguments128['__elseClosure'] = function() use ($renderingContext, $self) {
$output163 = '';

$output163 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments164 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments165 = array();
$arguments165['action'] = 'updateCommentForUpdatableVersions';
$arguments165['controller'] = 'Download';
// Rendering Array
$array166 = array();
$array166['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.key', $renderingContext);
$array166['integerVersionStart'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.integerVersion', $renderingContext);
$array166['integerVersionStop'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.updateToVersion.integerVersion', $renderingContext);
$arguments165['arguments'] = $array166;
$arguments165['format'] = 'json';
$arguments165['extensionName'] = NULL;
$arguments165['pluginName'] = NULL;
$arguments165['pageUid'] = NULL;
$arguments165['pageType'] = 0;
$arguments165['noCache'] = false;
$arguments165['noCacheHash'] = false;
$arguments165['section'] = '';
$arguments165['linkAccessRestrictedPages'] = false;
$arguments165['additionalParams'] = array (
);
$arguments165['absolute'] = false;
$arguments165['addQueryString'] = false;
$arguments165['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments165['addQueryStringMethod'] = NULL;
$renderChildrenClosure167 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper168 = $self->getViewHelper('$viewHelper168', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper168->setArguments($arguments165);
$viewHelper168->setRenderingContext($renderingContext);
$viewHelper168->setRenderChildrenClosure($renderChildrenClosure167);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments164['uri'] = $viewHelper168->initializeArgumentsAndRender();
$arguments164['icon'] = 'actions-system-extension-update';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments169 = array();
$arguments169['key'] = 'extensionList.updateToVersion';
// Rendering Array
$array170 = array();
$array170['0'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.updateToVersion.version', $renderingContext);
$arguments169['arguments'] = $array170;
$arguments169['id'] = NULL;
$arguments169['default'] = NULL;
$arguments169['htmlEscape'] = NULL;
$arguments169['extensionName'] = NULL;
$renderChildrenClosure171 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper172 = $self->getViewHelper('$viewHelper172', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper172->setArguments($arguments169);
$viewHelper172->setRenderingContext($renderingContext);
$viewHelper172->setRenderChildrenClosure($renderChildrenClosure171);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments164['title'] = $viewHelper172->initializeArgumentsAndRender();
$arguments164['additionalAttributes'] = NULL;
$renderChildrenClosure173 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper174 = $self->getViewHelper('$viewHelper174', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper174->setArguments($arguments164);
$viewHelper174->setRenderingContext($renderingContext);
$viewHelper174->setRenderChildrenClosure($renderChildrenClosure173);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output163 .= $viewHelper174->initializeArgumentsAndRender();

$output163 .= '
							';
return $output163;
};
$viewHelper175 = $self->getViewHelper('$viewHelper175', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper175->setArguments($arguments128);
$viewHelper175->setRenderingContext($renderingContext);
$viewHelper175->setRenderChildrenClosure($renderChildrenClosure129);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output127 .= $viewHelper175->initializeArgumentsAndRender();

$output127 .= '
					';
return $output127;
};
$viewHelper176 = $self->getViewHelper('$viewHelper176', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper176->setArguments($arguments125);
$viewHelper176->setRenderingContext($renderingContext);
$viewHelper176->setRenderChildrenClosure($renderChildrenClosure126);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output50 .= $viewHelper176->initializeArgumentsAndRender();

$output50 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper
$arguments177 = array();
$arguments177['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
$arguments177['additionalAttributes'] = NULL;
$arguments177['class'] = NULL;
$arguments177['dir'] = NULL;
$arguments177['id'] = NULL;
$arguments177['lang'] = NULL;
$arguments177['style'] = NULL;
$arguments177['title'] = NULL;
$arguments177['accesskey'] = NULL;
$arguments177['tabindex'] = NULL;
$arguments177['onclick'] = NULL;
$arguments177['name'] = NULL;
$arguments177['rel'] = NULL;
$arguments177['rev'] = NULL;
$arguments177['target'] = NULL;
$renderChildrenClosure178 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper179 = $self->getViewHelper('$viewHelper179', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper');
$viewHelper179->setArguments($arguments177);
$viewHelper179->setRenderingContext($renderingContext);
$viewHelper179->setRenderChildrenClosure($renderChildrenClosure178);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper

$output50 .= $viewHelper179->initializeArgumentsAndRender();

$output50 .= '
				</td>
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments180 = array();
// Rendering Boolean node
$arguments180['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.description', $renderingContext));
$arguments180['then'] = NULL;
$arguments180['else'] = NULL;
$renderChildrenClosure181 = function() use ($renderingContext, $self) {
$output182 = '';

$output182 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments183 = array();
$renderChildrenClosure184 = function() use ($renderingContext, $self) {
$output185 = '';

$output185 .= '
						<td title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments186 = array();
$arguments186['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.description', $renderingContext);
$arguments186['keepQuotes'] = false;
$arguments186['encoding'] = NULL;
$arguments186['doubleEncode'] = true;
$renderChildrenClosure187 = function() use ($renderingContext, $self) {
return NULL;
};
$value188 = ($arguments186['value'] !== NULL ? $arguments186['value'] : $renderChildrenClosure187());

$output185 .= (!is_string($value188) ? $value188 : htmlspecialchars($value188, ($arguments186['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments186['encoding'] !== NULL ? $arguments186['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments186['doubleEncode']));

$output185 .= '">
					';
return $output185;
};
$viewHelper189 = $self->getViewHelper('$viewHelper189', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper189->setArguments($arguments183);
$viewHelper189->setRenderingContext($renderingContext);
$viewHelper189->setRenderChildrenClosure($renderChildrenClosure184);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper

$output182 .= $viewHelper189->initializeArgumentsAndRender();

$output182 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments190 = array();
$renderChildrenClosure191 = function() use ($renderingContext, $self) {
return '
						<td>
					';
};
$viewHelper192 = $self->getViewHelper('$viewHelper192', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper192->setArguments($arguments190);
$viewHelper192->setRenderingContext($renderingContext);
$viewHelper192->setRenderChildrenClosure($renderChildrenClosure191);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper

$output182 .= $viewHelper192->initializeArgumentsAndRender();

$output182 .= '
				';
return $output182;
};
$arguments180['__thenClosure'] = function() use ($renderingContext, $self) {
$output193 = '';

$output193 .= '
						<td title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments194 = array();
$arguments194['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.description', $renderingContext);
$arguments194['keepQuotes'] = false;
$arguments194['encoding'] = NULL;
$arguments194['doubleEncode'] = true;
$renderChildrenClosure195 = function() use ($renderingContext, $self) {
return NULL;
};
$value196 = ($arguments194['value'] !== NULL ? $arguments194['value'] : $renderChildrenClosure195());

$output193 .= (!is_string($value196) ? $value196 : htmlspecialchars($value196, ($arguments194['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments194['encoding'] !== NULL ? $arguments194['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments194['doubleEncode']));

$output193 .= '">
					';
return $output193;
};
$arguments180['__elseClosure'] = function() use ($renderingContext, $self) {
return '
						<td>
					';
};
$viewHelper197 = $self->getViewHelper('$viewHelper197', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper197->setArguments($arguments180);
$viewHelper197->setRenderingContext($renderingContext);
$viewHelper197->setRenderChildrenClosure($renderChildrenClosure181);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output50 .= $viewHelper197->initializeArgumentsAndRender();

$output50 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments198 = array();
// Rendering Boolean node
$arguments198['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.ext_icon', $renderingContext));
$arguments198['then'] = NULL;
$arguments198['else'] = NULL;
$renderChildrenClosure199 = function() use ($renderingContext, $self) {
$output200 = '';

$output200 .= '
						<img class="ext-icon" src="../';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments201 = array();
$arguments201['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.siteRelPath', $renderingContext);
$arguments201['keepQuotes'] = false;
$arguments201['encoding'] = NULL;
$arguments201['doubleEncode'] = true;
$renderChildrenClosure202 = function() use ($renderingContext, $self) {
return NULL;
};
$value203 = ($arguments201['value'] !== NULL ? $arguments201['value'] : $renderChildrenClosure202());

$output200 .= (!is_string($value203) ? $value203 : htmlspecialchars($value203, ($arguments201['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments201['encoding'] !== NULL ? $arguments201['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments201['doubleEncode']));
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments204 = array();
$arguments204['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.ext_icon', $renderingContext);
$arguments204['keepQuotes'] = false;
$arguments204['encoding'] = NULL;
$arguments204['doubleEncode'] = true;
$renderChildrenClosure205 = function() use ($renderingContext, $self) {
return NULL;
};
$value206 = ($arguments204['value'] !== NULL ? $arguments204['value'] : $renderChildrenClosure205());

$output200 .= (!is_string($value206) ? $value206 : htmlspecialchars($value206, ($arguments204['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments204['encoding'] !== NULL ? $arguments204['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments204['doubleEncode']));

$output200 .= '" alt="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments207 = array();
$arguments207['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.title', $renderingContext);
$arguments207['keepQuotes'] = false;
$arguments207['encoding'] = NULL;
$arguments207['doubleEncode'] = true;
$renderChildrenClosure208 = function() use ($renderingContext, $self) {
return NULL;
};
$value209 = ($arguments207['value'] !== NULL ? $arguments207['value'] : $renderChildrenClosure208());

$output200 .= (!is_string($value209) ? $value209 : htmlspecialchars($value209, ($arguments207['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments207['encoding'] !== NULL ? $arguments207['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments207['doubleEncode']));

$output200 .= '" />
					';
return $output200;
};
$viewHelper210 = $self->getViewHelper('$viewHelper210', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper210->setArguments($arguments198);
$viewHelper210->setRenderingContext($renderingContext);
$viewHelper210->setRenderChildrenClosure($renderChildrenClosure199);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output50 .= $viewHelper210->initializeArgumentsAndRender();

$output50 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper
$arguments211 = array();
$arguments211['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
// Rendering Boolean node
$arguments211['forceConfiguration'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('0');
// Rendering Boolean node
$arguments211['showDescription'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments211['additionalAttributes'] = NULL;
$arguments211['class'] = NULL;
$arguments211['dir'] = NULL;
$arguments211['id'] = NULL;
$arguments211['lang'] = NULL;
$arguments211['style'] = NULL;
$arguments211['title'] = NULL;
$arguments211['accesskey'] = NULL;
$arguments211['tabindex'] = NULL;
$arguments211['onclick'] = NULL;
$arguments211['name'] = NULL;
$arguments211['rel'] = NULL;
$arguments211['rev'] = NULL;
$arguments211['target'] = NULL;
$renderChildrenClosure212 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments213 = array();
$arguments213['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.title', $renderingContext);
$arguments213['keepQuotes'] = false;
$arguments213['encoding'] = NULL;
$arguments213['doubleEncode'] = true;
$renderChildrenClosure214 = function() use ($renderingContext, $self) {
return NULL;
};
$value215 = ($arguments213['value'] !== NULL ? $arguments213['value'] : $renderChildrenClosure214());
return (!is_string($value215) ? $value215 : htmlspecialchars($value215, ($arguments213['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments213['encoding'] !== NULL ? $arguments213['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments213['doubleEncode']));
};
$viewHelper216 = $self->getViewHelper('$viewHelper216', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper');
$viewHelper216->setArguments($arguments211);
$viewHelper216->setRenderingContext($renderingContext);
$viewHelper216->setRenderChildrenClosure($renderChildrenClosure212);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper

$output50 .= $viewHelper216->initializeArgumentsAndRender();

$output50 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments217 = array();
$arguments217['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensionKey', $renderingContext);
$arguments217['keepQuotes'] = false;
$arguments217['encoding'] = NULL;
$arguments217['doubleEncode'] = true;
$renderChildrenClosure218 = function() use ($renderingContext, $self) {
return NULL;
};
$value219 = ($arguments217['value'] !== NULL ? $arguments217['value'] : $renderChildrenClosure218());

$output50 .= (!is_string($value219) ? $value219 : htmlspecialchars($value219, ($arguments217['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments217['encoding'] !== NULL ? $arguments217['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments217['doubleEncode']));

$output50 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments220 = array();
$arguments220['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.version', $renderingContext);
$arguments220['keepQuotes'] = false;
$arguments220['encoding'] = NULL;
$arguments220['doubleEncode'] = true;
$renderChildrenClosure221 = function() use ($renderingContext, $self) {
return NULL;
};
$value222 = ($arguments220['value'] !== NULL ? $arguments220['value'] : $renderChildrenClosure221());

$output50 .= (!is_string($value222) ? $value222 : htmlspecialchars($value222, ($arguments220['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments220['encoding'] !== NULL ? $arguments220['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments220['doubleEncode']));

$output50 .= '
				</td>
				<td class="icons">
					';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper
$arguments223 = array();
$arguments223['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
$arguments223['additionalAttributes'] = NULL;
$arguments223['class'] = NULL;
$arguments223['dir'] = NULL;
$arguments223['id'] = NULL;
$arguments223['lang'] = NULL;
$arguments223['style'] = NULL;
$arguments223['title'] = NULL;
$arguments223['accesskey'] = NULL;
$arguments223['tabindex'] = NULL;
$arguments223['onclick'] = NULL;
$arguments223['name'] = NULL;
$arguments223['rel'] = NULL;
$arguments223['rev'] = NULL;
$arguments223['target'] = NULL;
$renderChildrenClosure224 = function() use ($renderingContext, $self) {
$output225 = '';

$output225 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper
$arguments226 = array();
$arguments226['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
$arguments226['additionalAttributes'] = NULL;
$arguments226['forceConfiguration'] = true;
$arguments226['showDescription'] = false;
$arguments226['class'] = NULL;
$arguments226['dir'] = NULL;
$arguments226['id'] = NULL;
$arguments226['lang'] = NULL;
$arguments226['style'] = NULL;
$arguments226['title'] = NULL;
$arguments226['accesskey'] = NULL;
$arguments226['tabindex'] = NULL;
$arguments226['onclick'] = NULL;
$arguments226['name'] = NULL;
$arguments226['rel'] = NULL;
$arguments226['rev'] = NULL;
$arguments226['target'] = NULL;
$renderChildrenClosure227 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments228 = array();
$arguments228['icon'] = 'actions-system-extension-configure';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments229 = array();
$arguments229['key'] = 'extensionList.configure';
$arguments229['id'] = NULL;
$arguments229['default'] = NULL;
$arguments229['htmlEscape'] = NULL;
$arguments229['arguments'] = NULL;
$arguments229['extensionName'] = NULL;
$renderChildrenClosure230 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper231 = $self->getViewHelper('$viewHelper231', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper231->setArguments($arguments229);
$viewHelper231->setRenderingContext($renderingContext);
$viewHelper231->setRenderChildrenClosure($renderChildrenClosure230);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments228['title'] = $viewHelper231->initializeArgumentsAndRender();
$arguments228['uri'] = '';
$arguments228['additionalAttributes'] = NULL;
$renderChildrenClosure232 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper233 = $self->getViewHelper('$viewHelper233', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper233->setArguments($arguments228);
$viewHelper233->setRenderingContext($renderingContext);
$viewHelper233->setRenderChildrenClosure($renderChildrenClosure232);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
return $viewHelper233->initializeArgumentsAndRender();
};
$viewHelper234 = $self->getViewHelper('$viewHelper234', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper');
$viewHelper234->setArguments($arguments226);
$viewHelper234->setRenderingContext($renderingContext);
$viewHelper234->setRenderChildrenClosure($renderChildrenClosure227);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper

$output225 .= $viewHelper234->initializeArgumentsAndRender();

$output225 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper
$arguments235 = array();
$arguments235['extensionKey'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.key', $renderingContext);
$arguments235['additionalAttributes'] = NULL;
$arguments235['class'] = NULL;
$arguments235['dir'] = NULL;
$arguments235['id'] = NULL;
$arguments235['lang'] = NULL;
$arguments235['style'] = NULL;
$arguments235['title'] = NULL;
$arguments235['accesskey'] = NULL;
$arguments235['tabindex'] = NULL;
$arguments235['onclick'] = NULL;
$arguments235['name'] = NULL;
$arguments235['rel'] = NULL;
$arguments235['rev'] = NULL;
$arguments235['target'] = NULL;
$renderChildrenClosure236 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper237 = $self->getViewHelper('$viewHelper237', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper');
$viewHelper237->setArguments($arguments235);
$viewHelper237->setRenderingContext($renderingContext);
$viewHelper237->setRenderChildrenClosure($renderChildrenClosure236);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper

$output225 .= $viewHelper237->initializeArgumentsAndRender();

$output225 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper
$arguments238 = array();
$arguments238['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
$arguments238['additionalAttributes'] = NULL;
$arguments238['class'] = NULL;
$arguments238['dir'] = NULL;
$arguments238['id'] = NULL;
$arguments238['lang'] = NULL;
$arguments238['style'] = NULL;
$arguments238['title'] = NULL;
$arguments238['accesskey'] = NULL;
$arguments238['tabindex'] = NULL;
$arguments238['onclick'] = NULL;
$arguments238['name'] = NULL;
$arguments238['rel'] = NULL;
$arguments238['rev'] = NULL;
$arguments238['target'] = NULL;
$renderChildrenClosure239 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper240 = $self->getViewHelper('$viewHelper240', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper');
$viewHelper240->setArguments($arguments238);
$viewHelper240->setRenderingContext($renderingContext);
$viewHelper240->setRenderChildrenClosure($renderChildrenClosure239);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper

$output225 .= $viewHelper240->initializeArgumentsAndRender();

$output225 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments241 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments242 = array();
$arguments242['action'] = 'downloadExtensionZip';
$arguments242['controller'] = 'Action';
// Rendering Array
$array243 = array();
$array243['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.key', $renderingContext);
$arguments242['arguments'] = $array243;
$arguments242['extensionName'] = NULL;
$arguments242['pluginName'] = NULL;
$arguments242['pageUid'] = NULL;
$arguments242['pageType'] = 0;
$arguments242['noCache'] = false;
$arguments242['noCacheHash'] = false;
$arguments242['section'] = '';
$arguments242['format'] = '';
$arguments242['linkAccessRestrictedPages'] = false;
$arguments242['additionalParams'] = array (
);
$arguments242['absolute'] = false;
$arguments242['addQueryString'] = false;
$arguments242['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments242['addQueryStringMethod'] = NULL;
$renderChildrenClosure244 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper245 = $self->getViewHelper('$viewHelper245', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper245->setArguments($arguments242);
$viewHelper245->setRenderingContext($renderingContext);
$viewHelper245->setRenderChildrenClosure($renderChildrenClosure244);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments241['uri'] = $viewHelper245->initializeArgumentsAndRender();
$arguments241['icon'] = 'actions-system-extension-download';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments246 = array();
$arguments246['key'] = 'extensionList.downloadzip';
$arguments246['id'] = NULL;
$arguments246['default'] = NULL;
$arguments246['htmlEscape'] = NULL;
$arguments246['arguments'] = NULL;
$arguments246['extensionName'] = NULL;
$renderChildrenClosure247 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper248 = $self->getViewHelper('$viewHelper248', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper248->setArguments($arguments246);
$viewHelper248->setRenderingContext($renderingContext);
$viewHelper248->setRenderChildrenClosure($renderChildrenClosure247);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments241['title'] = $viewHelper248->initializeArgumentsAndRender();
$arguments241['additionalAttributes'] = NULL;
$renderChildrenClosure249 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper250 = $self->getViewHelper('$viewHelper250', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper250->setArguments($arguments241);
$viewHelper250->setRenderingContext($renderingContext);
$viewHelper250->setRenderChildrenClosure($renderChildrenClosure249);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output225 .= $viewHelper250->initializeArgumentsAndRender();

$output225 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper
$arguments251 = array();
$arguments251['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
$arguments251['additionalAttributes'] = NULL;
$arguments251['class'] = NULL;
$arguments251['dir'] = NULL;
$arguments251['id'] = NULL;
$arguments251['lang'] = NULL;
$arguments251['style'] = NULL;
$arguments251['title'] = NULL;
$arguments251['accesskey'] = NULL;
$arguments251['tabindex'] = NULL;
$arguments251['onclick'] = NULL;
$arguments251['name'] = NULL;
$arguments251['rel'] = NULL;
$arguments251['rev'] = NULL;
$arguments251['target'] = NULL;
$renderChildrenClosure252 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper253 = $self->getViewHelper('$viewHelper253', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper');
$viewHelper253->setArguments($arguments251);
$viewHelper253->setRenderingContext($renderingContext);
$viewHelper253->setRenderChildrenClosure($renderChildrenClosure252);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper

$output225 .= $viewHelper253->initializeArgumentsAndRender();

$output225 .= '
					';
return $output225;
};
$viewHelper254 = $self->getViewHelper('$viewHelper254', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper');
$viewHelper254->setArguments($arguments223);
$viewHelper254->setRenderingContext($renderingContext);
$viewHelper254->setRenderChildrenClosure($renderChildrenClosure224);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper

$output50 .= $viewHelper254->initializeArgumentsAndRender();

$output50 .= '
				</td>
				<td class="state ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments255 = array();
$arguments255['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.state', $renderingContext);
$arguments255['keepQuotes'] = false;
$arguments255['encoding'] = NULL;
$arguments255['doubleEncode'] = true;
$renderChildrenClosure256 = function() use ($renderingContext, $self) {
return NULL;
};
$value257 = ($arguments255['value'] !== NULL ? $arguments255['value'] : $renderChildrenClosure256());

$output50 .= (!is_string($value257) ? $value257 : htmlspecialchars($value257, ($arguments255['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments255['encoding'] !== NULL ? $arguments255['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments255['doubleEncode']));

$output50 .= '">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments258 = array();
$arguments258['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.state', $renderingContext);
$arguments258['keepQuotes'] = false;
$arguments258['encoding'] = NULL;
$arguments258['doubleEncode'] = true;
$renderChildrenClosure259 = function() use ($renderingContext, $self) {
return NULL;
};
$value260 = ($arguments258['value'] !== NULL ? $arguments258['value'] : $renderChildrenClosure259());

$output50 .= (!is_string($value260) ? $value260 : htmlspecialchars($value260, ($arguments258['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments258['encoding'] !== NULL ? $arguments258['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments258['doubleEncode']));

$output50 .= '
				</td>
				</tr>
			';
return $output50;
};

$output14 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments48, $renderChildrenClosure49, $renderingContext);

$output14 .= '
		</tbody>
	</table>
';

return $output14;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output261 = '';

$output261 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper
$arguments262 = array();
$arguments262['name'] = 'main';
$renderChildrenClosure263 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper264 = $self->getViewHelper('$viewHelper264', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper264->setArguments($arguments262);
$viewHelper264->setRenderingContext($renderingContext);
$viewHelper264->setRenderChildrenClosure($renderChildrenClosure263);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper

$output261 .= $viewHelper264->initializeArgumentsAndRender();

$output261 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments265 = array();
$arguments265['name'] = 'docheader-buttons';
$renderChildrenClosure266 = function() use ($renderingContext, $self) {
$output267 = '';

$output267 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments268 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments269 = array();
$arguments269['action'] = 'form';
$arguments269['controller'] = 'UploadExtensionFile';
$arguments269['arguments'] = array (
);
$arguments269['extensionName'] = NULL;
$arguments269['pluginName'] = NULL;
$arguments269['pageUid'] = NULL;
$arguments269['pageType'] = 0;
$arguments269['noCache'] = false;
$arguments269['noCacheHash'] = false;
$arguments269['section'] = '';
$arguments269['format'] = '';
$arguments269['linkAccessRestrictedPages'] = false;
$arguments269['additionalParams'] = array (
);
$arguments269['absolute'] = false;
$arguments269['addQueryString'] = false;
$arguments269['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments269['addQueryStringMethod'] = NULL;
$renderChildrenClosure270 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper271 = $self->getViewHelper('$viewHelper271', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper271->setArguments($arguments269);
$viewHelper271->setRenderingContext($renderingContext);
$viewHelper271->setRenderChildrenClosure($renderChildrenClosure270);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments268['uri'] = $viewHelper271->initializeArgumentsAndRender();
$arguments268['icon'] = 'actions-edit-upload';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments272 = array();
$arguments272['key'] = 'extensionList.uploadExtension';
$arguments272['id'] = NULL;
$arguments272['default'] = NULL;
$arguments272['htmlEscape'] = NULL;
$arguments272['arguments'] = NULL;
$arguments272['extensionName'] = NULL;
$renderChildrenClosure273 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper274 = $self->getViewHelper('$viewHelper274', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper274->setArguments($arguments272);
$viewHelper274->setRenderingContext($renderingContext);
$viewHelper274->setRenderChildrenClosure($renderChildrenClosure273);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments268['title'] = $viewHelper274->initializeArgumentsAndRender();
$arguments268['additionalAttributes'] = NULL;
$renderChildrenClosure275 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper276 = $self->getViewHelper('$viewHelper276', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper276->setArguments($arguments268);
$viewHelper276->setRenderingContext($renderingContext);
$viewHelper276->setRenderChildrenClosure($renderChildrenClosure275);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output267 .= $viewHelper276->initializeArgumentsAndRender();

$output267 .= '
';
return $output267;
};

$output261 .= '';

$output261 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments277 = array();
$arguments277['name'] = 'module-headline';
$renderChildrenClosure278 = function() use ($renderingContext, $self) {
$output279 = '';

$output279 .= '
	<h1>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments280 = array();
$arguments280['key'] = 'manageExtensions';
$arguments280['id'] = NULL;
$arguments280['default'] = NULL;
$arguments280['htmlEscape'] = NULL;
$arguments280['arguments'] = NULL;
$arguments280['extensionName'] = NULL;
$renderChildrenClosure281 = function() use ($renderingContext, $self) {
return 'Manage extensions';
};
$viewHelper282 = $self->getViewHelper('$viewHelper282', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper282->setArguments($arguments280);
$viewHelper282->setRenderingContext($renderingContext);
$viewHelper282->setRenderChildrenClosure($renderChildrenClosure281);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output279 .= $viewHelper282->initializeArgumentsAndRender();

$output279 .= '</h1>
';
return $output279;
};

$output261 .= '';

$output261 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments283 = array();
$arguments283['name'] = 'Content';
$renderChildrenClosure284 = function() use ($renderingContext, $self) {
$output285 = '';

$output285 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments286 = array();
$arguments286['renderMode'] = 'div';
$arguments286['additionalAttributes'] = NULL;
$arguments286['class'] = NULL;
$arguments286['dir'] = NULL;
$arguments286['id'] = NULL;
$arguments286['lang'] = NULL;
$arguments286['style'] = NULL;
$arguments286['title'] = NULL;
$arguments286['accesskey'] = NULL;
$arguments286['tabindex'] = NULL;
$arguments286['onclick'] = NULL;
$renderChildrenClosure287 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper288 = $self->getViewHelper('$viewHelper288', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper288->setArguments($arguments286);
$viewHelper288->setRenderingContext($renderingContext);
$viewHelper288->setRenderChildrenClosure($renderChildrenClosure287);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper

$output285 .= $viewHelper288->initializeArgumentsAndRender();

$output285 .= '

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments289 = array();
$arguments289['partial'] = 'List/UploadForm';
$arguments289['section'] = NULL;
$arguments289['arguments'] = array (
);
$arguments289['optional'] = false;
$renderChildrenClosure290 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper291 = $self->getViewHelper('$viewHelper291', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper291->setArguments($arguments289);
$viewHelper291->setRenderingContext($renderingContext);
$viewHelper291->setRenderChildrenClosure($renderChildrenClosure290);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper

$output285 .= $viewHelper291->initializeArgumentsAndRender();

$output285 .= '

	<div class="headerRow ui-helper-clearfix">
		<div class="typo3-extensionmanager-headerRowLeft">
		</div>
		<div class="typo3-extensionmanager-headerRowRight">
		</div>
	</div>
	<table id="typo3-extension-list" class="t3-table typo3-extension-list">
		<thead>
			<tr>
				<th title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments292 = array();
$arguments292['key'] = 'extensionList.header.title.update';
$arguments292['id'] = NULL;
$arguments292['default'] = NULL;
$arguments292['htmlEscape'] = NULL;
$arguments292['arguments'] = NULL;
$arguments292['extensionName'] = NULL;
$renderChildrenClosure293 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper294 = $self->getViewHelper('$viewHelper294', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper294->setArguments($arguments292);
$viewHelper294->setRenderingContext($renderingContext);
$viewHelper294->setRenderChildrenClosure($renderChildrenClosure293);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output285 .= $viewHelper294->initializeArgumentsAndRender();

$output285 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments295 = array();
$arguments295['key'] = 'extensionList.header.update';
$arguments295['id'] = NULL;
$arguments295['default'] = NULL;
$arguments295['htmlEscape'] = NULL;
$arguments295['arguments'] = NULL;
$arguments295['extensionName'] = NULL;
$renderChildrenClosure296 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper297 = $self->getViewHelper('$viewHelper297', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper297->setArguments($arguments295);
$viewHelper297->setRenderingContext($renderingContext);
$viewHelper297->setRenderChildrenClosure($renderChildrenClosure296);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output285 .= $viewHelper297->initializeArgumentsAndRender();

$output285 .= '</th>
				<th title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments298 = array();
$arguments298['key'] = 'extensionList.header.title.activate';
$arguments298['id'] = NULL;
$arguments298['default'] = NULL;
$arguments298['htmlEscape'] = NULL;
$arguments298['arguments'] = NULL;
$arguments298['extensionName'] = NULL;
$renderChildrenClosure299 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper300 = $self->getViewHelper('$viewHelper300', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper300->setArguments($arguments298);
$viewHelper300->setRenderingContext($renderingContext);
$viewHelper300->setRenderChildrenClosure($renderChildrenClosure299);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output285 .= $viewHelper300->initializeArgumentsAndRender();

$output285 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments301 = array();
$arguments301['key'] = 'extensionList.header.activate';
$arguments301['id'] = NULL;
$arguments301['default'] = NULL;
$arguments301['htmlEscape'] = NULL;
$arguments301['arguments'] = NULL;
$arguments301['extensionName'] = NULL;
$renderChildrenClosure302 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper303 = $self->getViewHelper('$viewHelper303', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper303->setArguments($arguments301);
$viewHelper303->setRenderingContext($renderingContext);
$viewHelper303->setRenderChildrenClosure($renderChildrenClosure302);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output285 .= $viewHelper303->initializeArgumentsAndRender();

$output285 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments304 = array();
$arguments304['key'] = 'extensionList.header.extensionName';
$arguments304['id'] = NULL;
$arguments304['default'] = NULL;
$arguments304['htmlEscape'] = NULL;
$arguments304['arguments'] = NULL;
$arguments304['extensionName'] = NULL;
$renderChildrenClosure305 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper306 = $self->getViewHelper('$viewHelper306', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper306->setArguments($arguments304);
$viewHelper306->setRenderingContext($renderingContext);
$viewHelper306->setRenderChildrenClosure($renderChildrenClosure305);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output285 .= $viewHelper306->initializeArgumentsAndRender();

$output285 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments307 = array();
$arguments307['key'] = 'extensionList.header.extensionKey';
$arguments307['id'] = NULL;
$arguments307['default'] = NULL;
$arguments307['htmlEscape'] = NULL;
$arguments307['arguments'] = NULL;
$arguments307['extensionName'] = NULL;
$renderChildrenClosure308 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper309 = $self->getViewHelper('$viewHelper309', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper309->setArguments($arguments307);
$viewHelper309->setRenderingContext($renderingContext);
$viewHelper309->setRenderChildrenClosure($renderChildrenClosure308);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output285 .= $viewHelper309->initializeArgumentsAndRender();

$output285 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments310 = array();
$arguments310['key'] = 'extensionList.header.extensionVersion';
$arguments310['id'] = NULL;
$arguments310['default'] = NULL;
$arguments310['htmlEscape'] = NULL;
$arguments310['arguments'] = NULL;
$arguments310['extensionName'] = NULL;
$renderChildrenClosure311 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper312 = $self->getViewHelper('$viewHelper312', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper312->setArguments($arguments310);
$viewHelper312->setRenderingContext($renderingContext);
$viewHelper312->setRenderChildrenClosure($renderChildrenClosure311);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output285 .= $viewHelper312->initializeArgumentsAndRender();

$output285 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments313 = array();
$arguments313['key'] = 'extensionList.header.extensionActions';
$arguments313['id'] = NULL;
$arguments313['default'] = NULL;
$arguments313['htmlEscape'] = NULL;
$arguments313['arguments'] = NULL;
$arguments313['extensionName'] = NULL;
$renderChildrenClosure314 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper315 = $self->getViewHelper('$viewHelper315', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper315->setArguments($arguments313);
$viewHelper315->setRenderingContext($renderingContext);
$viewHelper315->setRenderChildrenClosure($renderChildrenClosure314);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output285 .= $viewHelper315->initializeArgumentsAndRender();

$output285 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments316 = array();
$arguments316['key'] = 'extensionList.header.extensionState';
$arguments316['id'] = NULL;
$arguments316['default'] = NULL;
$arguments316['htmlEscape'] = NULL;
$arguments316['arguments'] = NULL;
$arguments316['extensionName'] = NULL;
$renderChildrenClosure317 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper318 = $self->getViewHelper('$viewHelper318', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper318->setArguments($arguments316);
$viewHelper318->setRenderingContext($renderingContext);
$viewHelper318->setRenderChildrenClosure($renderChildrenClosure317);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper

$output285 .= $viewHelper318->initializeArgumentsAndRender();

$output285 .= '</th>
			</tr>
		</thead>
		<tbody>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments319 = array();
$arguments319['each'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensions', $renderingContext);
$arguments319['as'] = 'extension';
$arguments319['key'] = 'extensionKey';
$arguments319['reverse'] = false;
$arguments319['iteration'] = NULL;
$renderChildrenClosure320 = function() use ($renderingContext, $self) {
$output321 = '';

$output321 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments322 = array();
// Rendering Boolean node
$arguments322['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject', $renderingContext));
$arguments322['then'] = NULL;
$arguments322['else'] = NULL;
$renderChildrenClosure323 = function() use ($renderingContext, $self) {
$output324 = '';

$output324 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments325 = array();
$renderChildrenClosure326 = function() use ($renderingContext, $self) {
$output327 = '';

$output327 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments328 = array();
$arguments328['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensionKey', $renderingContext);
$arguments328['keepQuotes'] = false;
$arguments328['encoding'] = NULL;
$arguments328['doubleEncode'] = true;
$renderChildrenClosure329 = function() use ($renderingContext, $self) {
return NULL;
};
$value330 = ($arguments328['value'] !== NULL ? $arguments328['value'] : $renderChildrenClosure329());

$output327 .= (!is_string($value330) ? $value330 : htmlspecialchars($value330, ($arguments328['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments328['encoding'] !== NULL ? $arguments328['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments328['doubleEncode']));

$output327 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments331 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments332 = array();
$arguments332['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.reviewState', $renderingContext);
$arguments332['keepQuotes'] = false;
$arguments332['encoding'] = NULL;
$arguments332['doubleEncode'] = true;
$renderChildrenClosure333 = function() use ($renderingContext, $self) {
return NULL;
};
$value334 = ($arguments332['value'] !== NULL ? $arguments332['value'] : $renderChildrenClosure333());
$arguments331['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value334) ? $value334 : htmlspecialchars($value334, ($arguments332['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments332['encoding'] !== NULL ? $arguments332['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments332['doubleEncode'])), -1);
$arguments331['then'] = 'insecure';
$arguments331['else'] = NULL;
$renderChildrenClosure335 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper336 = $self->getViewHelper('$viewHelper336', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper336->setArguments($arguments331);
$viewHelper336->setRenderingContext($renderingContext);
$viewHelper336->setRenderChildrenClosure($renderChildrenClosure335);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output327 .= $viewHelper336->initializeArgumentsAndRender();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments337 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments338 = array();
$arguments338['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.reviewState', $renderingContext);
$arguments338['keepQuotes'] = false;
$arguments338['encoding'] = NULL;
$arguments338['doubleEncode'] = true;
$renderChildrenClosure339 = function() use ($renderingContext, $self) {
return NULL;
};
$value340 = ($arguments338['value'] !== NULL ? $arguments338['value'] : $renderChildrenClosure339());
$arguments337['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value340) ? $value340 : htmlspecialchars($value340, ($arguments338['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments338['encoding'] !== NULL ? $arguments338['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments338['doubleEncode'])), -2);
$arguments337['then'] = 'outdated';
$arguments337['else'] = NULL;
$renderChildrenClosure341 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper342 = $self->getViewHelper('$viewHelper342', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper342->setArguments($arguments337);
$viewHelper342->setRenderingContext($renderingContext);
$viewHelper342->setRenderChildrenClosure($renderChildrenClosure341);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output327 .= $viewHelper342->initializeArgumentsAndRender();

$output327 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments343 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments344 = array();
$arguments344['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.installed', $renderingContext);
$arguments344['keepQuotes'] = false;
$arguments344['encoding'] = NULL;
$arguments344['doubleEncode'] = true;
$renderChildrenClosure345 = function() use ($renderingContext, $self) {
return NULL;
};
$value346 = ($arguments344['value'] !== NULL ? $arguments344['value'] : $renderChildrenClosure345());
$arguments343['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value346) ? $value346 : htmlspecialchars($value346, ($arguments344['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments344['encoding'] !== NULL ? $arguments344['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments344['doubleEncode'])));
$arguments343['then'] = '';
$arguments343['else'] = 'inactive';
$renderChildrenClosure347 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper348 = $self->getViewHelper('$viewHelper348', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper348->setArguments($arguments343);
$viewHelper348->setRenderingContext($renderingContext);
$viewHelper348->setRenderChildrenClosure($renderChildrenClosure347);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output327 .= $viewHelper348->initializeArgumentsAndRender();

$output327 .= '">
					';
return $output327;
};
$viewHelper349 = $self->getViewHelper('$viewHelper349', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper349->setArguments($arguments325);
$viewHelper349->setRenderingContext($renderingContext);
$viewHelper349->setRenderChildrenClosure($renderChildrenClosure326);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper

$output324 .= $viewHelper349->initializeArgumentsAndRender();

$output324 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments350 = array();
$renderChildrenClosure351 = function() use ($renderingContext, $self) {
$output352 = '';

$output352 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments353 = array();
$arguments353['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensionKey', $renderingContext);
$arguments353['keepQuotes'] = false;
$arguments353['encoding'] = NULL;
$arguments353['doubleEncode'] = true;
$renderChildrenClosure354 = function() use ($renderingContext, $self) {
return NULL;
};
$value355 = ($arguments353['value'] !== NULL ? $arguments353['value'] : $renderChildrenClosure354());

$output352 .= (!is_string($value355) ? $value355 : htmlspecialchars($value355, ($arguments353['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments353['encoding'] !== NULL ? $arguments353['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments353['doubleEncode']));

$output352 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments356 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments357 = array();
$arguments357['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.installed', $renderingContext);
$arguments357['keepQuotes'] = false;
$arguments357['encoding'] = NULL;
$arguments357['doubleEncode'] = true;
$renderChildrenClosure358 = function() use ($renderingContext, $self) {
return NULL;
};
$value359 = ($arguments357['value'] !== NULL ? $arguments357['value'] : $renderChildrenClosure358());
$arguments356['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value359) ? $value359 : htmlspecialchars($value359, ($arguments357['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments357['encoding'] !== NULL ? $arguments357['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments357['doubleEncode'])));
$arguments356['then'] = '';
$arguments356['else'] = 'inactive';
$renderChildrenClosure360 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper361 = $self->getViewHelper('$viewHelper361', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper361->setArguments($arguments356);
$viewHelper361->setRenderingContext($renderingContext);
$viewHelper361->setRenderChildrenClosure($renderChildrenClosure360);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output352 .= $viewHelper361->initializeArgumentsAndRender();

$output352 .= '">
					';
return $output352;
};
$viewHelper362 = $self->getViewHelper('$viewHelper362', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper362->setArguments($arguments350);
$viewHelper362->setRenderingContext($renderingContext);
$viewHelper362->setRenderChildrenClosure($renderChildrenClosure351);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper

$output324 .= $viewHelper362->initializeArgumentsAndRender();

$output324 .= '
				';
return $output324;
};
$arguments322['__thenClosure'] = function() use ($renderingContext, $self) {
$output363 = '';

$output363 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments364 = array();
$arguments364['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensionKey', $renderingContext);
$arguments364['keepQuotes'] = false;
$arguments364['encoding'] = NULL;
$arguments364['doubleEncode'] = true;
$renderChildrenClosure365 = function() use ($renderingContext, $self) {
return NULL;
};
$value366 = ($arguments364['value'] !== NULL ? $arguments364['value'] : $renderChildrenClosure365());

$output363 .= (!is_string($value366) ? $value366 : htmlspecialchars($value366, ($arguments364['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments364['encoding'] !== NULL ? $arguments364['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments364['doubleEncode']));

$output363 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments367 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments368 = array();
$arguments368['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.reviewState', $renderingContext);
$arguments368['keepQuotes'] = false;
$arguments368['encoding'] = NULL;
$arguments368['doubleEncode'] = true;
$renderChildrenClosure369 = function() use ($renderingContext, $self) {
return NULL;
};
$value370 = ($arguments368['value'] !== NULL ? $arguments368['value'] : $renderChildrenClosure369());
$arguments367['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value370) ? $value370 : htmlspecialchars($value370, ($arguments368['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments368['encoding'] !== NULL ? $arguments368['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments368['doubleEncode'])), -1);
$arguments367['then'] = 'insecure';
$arguments367['else'] = NULL;
$renderChildrenClosure371 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper372 = $self->getViewHelper('$viewHelper372', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper372->setArguments($arguments367);
$viewHelper372->setRenderingContext($renderingContext);
$viewHelper372->setRenderChildrenClosure($renderChildrenClosure371);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output363 .= $viewHelper372->initializeArgumentsAndRender();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments373 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments374 = array();
$arguments374['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.reviewState', $renderingContext);
$arguments374['keepQuotes'] = false;
$arguments374['encoding'] = NULL;
$arguments374['doubleEncode'] = true;
$renderChildrenClosure375 = function() use ($renderingContext, $self) {
return NULL;
};
$value376 = ($arguments374['value'] !== NULL ? $arguments374['value'] : $renderChildrenClosure375());
$arguments373['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value376) ? $value376 : htmlspecialchars($value376, ($arguments374['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments374['encoding'] !== NULL ? $arguments374['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments374['doubleEncode'])), -2);
$arguments373['then'] = 'outdated';
$arguments373['else'] = NULL;
$renderChildrenClosure377 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper378 = $self->getViewHelper('$viewHelper378', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper378->setArguments($arguments373);
$viewHelper378->setRenderingContext($renderingContext);
$viewHelper378->setRenderChildrenClosure($renderChildrenClosure377);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output363 .= $viewHelper378->initializeArgumentsAndRender();

$output363 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments379 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments380 = array();
$arguments380['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.installed', $renderingContext);
$arguments380['keepQuotes'] = false;
$arguments380['encoding'] = NULL;
$arguments380['doubleEncode'] = true;
$renderChildrenClosure381 = function() use ($renderingContext, $self) {
return NULL;
};
$value382 = ($arguments380['value'] !== NULL ? $arguments380['value'] : $renderChildrenClosure381());
$arguments379['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value382) ? $value382 : htmlspecialchars($value382, ($arguments380['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments380['encoding'] !== NULL ? $arguments380['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments380['doubleEncode'])));
$arguments379['then'] = '';
$arguments379['else'] = 'inactive';
$renderChildrenClosure383 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper384 = $self->getViewHelper('$viewHelper384', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper384->setArguments($arguments379);
$viewHelper384->setRenderingContext($renderingContext);
$viewHelper384->setRenderChildrenClosure($renderChildrenClosure383);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output363 .= $viewHelper384->initializeArgumentsAndRender();

$output363 .= '">
					';
return $output363;
};
$arguments322['__elseClosure'] = function() use ($renderingContext, $self) {
$output385 = '';

$output385 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments386 = array();
$arguments386['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensionKey', $renderingContext);
$arguments386['keepQuotes'] = false;
$arguments386['encoding'] = NULL;
$arguments386['doubleEncode'] = true;
$renderChildrenClosure387 = function() use ($renderingContext, $self) {
return NULL;
};
$value388 = ($arguments386['value'] !== NULL ? $arguments386['value'] : $renderChildrenClosure387());

$output385 .= (!is_string($value388) ? $value388 : htmlspecialchars($value388, ($arguments386['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments386['encoding'] !== NULL ? $arguments386['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments386['doubleEncode']));

$output385 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments389 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments390 = array();
$arguments390['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.installed', $renderingContext);
$arguments390['keepQuotes'] = false;
$arguments390['encoding'] = NULL;
$arguments390['doubleEncode'] = true;
$renderChildrenClosure391 = function() use ($renderingContext, $self) {
return NULL;
};
$value392 = ($arguments390['value'] !== NULL ? $arguments390['value'] : $renderChildrenClosure391());
$arguments389['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value392) ? $value392 : htmlspecialchars($value392, ($arguments390['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments390['encoding'] !== NULL ? $arguments390['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments390['doubleEncode'])));
$arguments389['then'] = '';
$arguments389['else'] = 'inactive';
$renderChildrenClosure393 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper394 = $self->getViewHelper('$viewHelper394', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper394->setArguments($arguments389);
$viewHelper394->setRenderingContext($renderingContext);
$viewHelper394->setRenderChildrenClosure($renderChildrenClosure393);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output385 .= $viewHelper394->initializeArgumentsAndRender();

$output385 .= '">
					';
return $output385;
};
$viewHelper395 = $self->getViewHelper('$viewHelper395', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper395->setArguments($arguments322);
$viewHelper395->setRenderingContext($renderingContext);
$viewHelper395->setRenderChildrenClosure($renderChildrenClosure323);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output321 .= $viewHelper395->initializeArgumentsAndRender();

$output321 .= '
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments396 = array();
// Rendering Boolean node
$arguments396['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.updateAvailable', $renderingContext));
$arguments396['then'] = NULL;
$arguments396['else'] = NULL;
$renderChildrenClosure397 = function() use ($renderingContext, $self) {
$output398 = '';

$output398 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments399 = array();
// Rendering Boolean node
$arguments399['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.state', $renderingContext), 'excludeFromUpdates');
$arguments399['then'] = NULL;
$arguments399['else'] = NULL;
$renderChildrenClosure400 = function() use ($renderingContext, $self) {
$output401 = '';

$output401 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments402 = array();
$renderChildrenClosure403 = function() use ($renderingContext, $self) {
$output404 = '';

$output404 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments405 = array();
$arguments405['icon'] = 'actions-system-extension-update-disabled';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments406 = array();
$arguments406['key'] = 'extensionList.updateDisabled';
$arguments406['id'] = NULL;
$arguments406['default'] = NULL;
$arguments406['htmlEscape'] = NULL;
$arguments406['arguments'] = NULL;
$arguments406['extensionName'] = NULL;
$renderChildrenClosure407 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper408 = $self->getViewHelper('$viewHelper408', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper408->setArguments($arguments406);
$viewHelper408->setRenderingContext($renderingContext);
$viewHelper408->setRenderChildrenClosure($renderChildrenClosure407);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments405['title'] = $viewHelper408->initializeArgumentsAndRender();
$arguments405['uri'] = '';
$arguments405['additionalAttributes'] = NULL;
$renderChildrenClosure409 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper410 = $self->getViewHelper('$viewHelper410', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper410->setArguments($arguments405);
$viewHelper410->setRenderingContext($renderingContext);
$viewHelper410->setRenderChildrenClosure($renderChildrenClosure409);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output404 .= $viewHelper410->initializeArgumentsAndRender();

$output404 .= '
							';
return $output404;
};
$viewHelper411 = $self->getViewHelper('$viewHelper411', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper411->setArguments($arguments402);
$viewHelper411->setRenderingContext($renderingContext);
$viewHelper411->setRenderChildrenClosure($renderChildrenClosure403);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper

$output401 .= $viewHelper411->initializeArgumentsAndRender();

$output401 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments412 = array();
$renderChildrenClosure413 = function() use ($renderingContext, $self) {
$output414 = '';

$output414 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments415 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments416 = array();
$arguments416['action'] = 'updateCommentForUpdatableVersions';
$arguments416['controller'] = 'Download';
// Rendering Array
$array417 = array();
$array417['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.key', $renderingContext);
$array417['integerVersionStart'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.integerVersion', $renderingContext);
$array417['integerVersionStop'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.updateToVersion.integerVersion', $renderingContext);
$arguments416['arguments'] = $array417;
$arguments416['format'] = 'json';
$arguments416['extensionName'] = NULL;
$arguments416['pluginName'] = NULL;
$arguments416['pageUid'] = NULL;
$arguments416['pageType'] = 0;
$arguments416['noCache'] = false;
$arguments416['noCacheHash'] = false;
$arguments416['section'] = '';
$arguments416['linkAccessRestrictedPages'] = false;
$arguments416['additionalParams'] = array (
);
$arguments416['absolute'] = false;
$arguments416['addQueryString'] = false;
$arguments416['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments416['addQueryStringMethod'] = NULL;
$renderChildrenClosure418 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper419 = $self->getViewHelper('$viewHelper419', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper419->setArguments($arguments416);
$viewHelper419->setRenderingContext($renderingContext);
$viewHelper419->setRenderChildrenClosure($renderChildrenClosure418);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments415['uri'] = $viewHelper419->initializeArgumentsAndRender();
$arguments415['icon'] = 'actions-system-extension-update';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments420 = array();
$arguments420['key'] = 'extensionList.updateToVersion';
// Rendering Array
$array421 = array();
$array421['0'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.updateToVersion.version', $renderingContext);
$arguments420['arguments'] = $array421;
$arguments420['id'] = NULL;
$arguments420['default'] = NULL;
$arguments420['htmlEscape'] = NULL;
$arguments420['extensionName'] = NULL;
$renderChildrenClosure422 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper423 = $self->getViewHelper('$viewHelper423', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper423->setArguments($arguments420);
$viewHelper423->setRenderingContext($renderingContext);
$viewHelper423->setRenderChildrenClosure($renderChildrenClosure422);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments415['title'] = $viewHelper423->initializeArgumentsAndRender();
$arguments415['additionalAttributes'] = NULL;
$renderChildrenClosure424 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper425 = $self->getViewHelper('$viewHelper425', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper425->setArguments($arguments415);
$viewHelper425->setRenderingContext($renderingContext);
$viewHelper425->setRenderChildrenClosure($renderChildrenClosure424);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output414 .= $viewHelper425->initializeArgumentsAndRender();

$output414 .= '
							';
return $output414;
};
$viewHelper426 = $self->getViewHelper('$viewHelper426', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper426->setArguments($arguments412);
$viewHelper426->setRenderingContext($renderingContext);
$viewHelper426->setRenderChildrenClosure($renderChildrenClosure413);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper

$output401 .= $viewHelper426->initializeArgumentsAndRender();

$output401 .= '
						';
return $output401;
};
$arguments399['__thenClosure'] = function() use ($renderingContext, $self) {
$output427 = '';

$output427 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments428 = array();
$arguments428['icon'] = 'actions-system-extension-update-disabled';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments429 = array();
$arguments429['key'] = 'extensionList.updateDisabled';
$arguments429['id'] = NULL;
$arguments429['default'] = NULL;
$arguments429['htmlEscape'] = NULL;
$arguments429['arguments'] = NULL;
$arguments429['extensionName'] = NULL;
$renderChildrenClosure430 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper431 = $self->getViewHelper('$viewHelper431', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper431->setArguments($arguments429);
$viewHelper431->setRenderingContext($renderingContext);
$viewHelper431->setRenderChildrenClosure($renderChildrenClosure430);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments428['title'] = $viewHelper431->initializeArgumentsAndRender();
$arguments428['uri'] = '';
$arguments428['additionalAttributes'] = NULL;
$renderChildrenClosure432 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper433 = $self->getViewHelper('$viewHelper433', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper433->setArguments($arguments428);
$viewHelper433->setRenderingContext($renderingContext);
$viewHelper433->setRenderChildrenClosure($renderChildrenClosure432);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output427 .= $viewHelper433->initializeArgumentsAndRender();

$output427 .= '
							';
return $output427;
};
$arguments399['__elseClosure'] = function() use ($renderingContext, $self) {
$output434 = '';

$output434 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments435 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments436 = array();
$arguments436['action'] = 'updateCommentForUpdatableVersions';
$arguments436['controller'] = 'Download';
// Rendering Array
$array437 = array();
$array437['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.key', $renderingContext);
$array437['integerVersionStart'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.terObject.integerVersion', $renderingContext);
$array437['integerVersionStop'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.updateToVersion.integerVersion', $renderingContext);
$arguments436['arguments'] = $array437;
$arguments436['format'] = 'json';
$arguments436['extensionName'] = NULL;
$arguments436['pluginName'] = NULL;
$arguments436['pageUid'] = NULL;
$arguments436['pageType'] = 0;
$arguments436['noCache'] = false;
$arguments436['noCacheHash'] = false;
$arguments436['section'] = '';
$arguments436['linkAccessRestrictedPages'] = false;
$arguments436['additionalParams'] = array (
);
$arguments436['absolute'] = false;
$arguments436['addQueryString'] = false;
$arguments436['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments436['addQueryStringMethod'] = NULL;
$renderChildrenClosure438 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper439 = $self->getViewHelper('$viewHelper439', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper439->setArguments($arguments436);
$viewHelper439->setRenderingContext($renderingContext);
$viewHelper439->setRenderChildrenClosure($renderChildrenClosure438);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments435['uri'] = $viewHelper439->initializeArgumentsAndRender();
$arguments435['icon'] = 'actions-system-extension-update';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments440 = array();
$arguments440['key'] = 'extensionList.updateToVersion';
// Rendering Array
$array441 = array();
$array441['0'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.updateToVersion.version', $renderingContext);
$arguments440['arguments'] = $array441;
$arguments440['id'] = NULL;
$arguments440['default'] = NULL;
$arguments440['htmlEscape'] = NULL;
$arguments440['extensionName'] = NULL;
$renderChildrenClosure442 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper443 = $self->getViewHelper('$viewHelper443', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper443->setArguments($arguments440);
$viewHelper443->setRenderingContext($renderingContext);
$viewHelper443->setRenderChildrenClosure($renderChildrenClosure442);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments435['title'] = $viewHelper443->initializeArgumentsAndRender();
$arguments435['additionalAttributes'] = NULL;
$renderChildrenClosure444 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper445 = $self->getViewHelper('$viewHelper445', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper445->setArguments($arguments435);
$viewHelper445->setRenderingContext($renderingContext);
$viewHelper445->setRenderChildrenClosure($renderChildrenClosure444);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output434 .= $viewHelper445->initializeArgumentsAndRender();

$output434 .= '
							';
return $output434;
};
$viewHelper446 = $self->getViewHelper('$viewHelper446', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper446->setArguments($arguments399);
$viewHelper446->setRenderingContext($renderingContext);
$viewHelper446->setRenderChildrenClosure($renderChildrenClosure400);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output398 .= $viewHelper446->initializeArgumentsAndRender();

$output398 .= '
					';
return $output398;
};
$viewHelper447 = $self->getViewHelper('$viewHelper447', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper447->setArguments($arguments396);
$viewHelper447->setRenderingContext($renderingContext);
$viewHelper447->setRenderChildrenClosure($renderChildrenClosure397);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output321 .= $viewHelper447->initializeArgumentsAndRender();

$output321 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper
$arguments448 = array();
$arguments448['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
$arguments448['additionalAttributes'] = NULL;
$arguments448['class'] = NULL;
$arguments448['dir'] = NULL;
$arguments448['id'] = NULL;
$arguments448['lang'] = NULL;
$arguments448['style'] = NULL;
$arguments448['title'] = NULL;
$arguments448['accesskey'] = NULL;
$arguments448['tabindex'] = NULL;
$arguments448['onclick'] = NULL;
$arguments448['name'] = NULL;
$arguments448['rel'] = NULL;
$arguments448['rev'] = NULL;
$arguments448['target'] = NULL;
$renderChildrenClosure449 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper450 = $self->getViewHelper('$viewHelper450', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper');
$viewHelper450->setArguments($arguments448);
$viewHelper450->setRenderingContext($renderingContext);
$viewHelper450->setRenderChildrenClosure($renderChildrenClosure449);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper

$output321 .= $viewHelper450->initializeArgumentsAndRender();

$output321 .= '
				</td>
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments451 = array();
// Rendering Boolean node
$arguments451['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.description', $renderingContext));
$arguments451['then'] = NULL;
$arguments451['else'] = NULL;
$renderChildrenClosure452 = function() use ($renderingContext, $self) {
$output453 = '';

$output453 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments454 = array();
$renderChildrenClosure455 = function() use ($renderingContext, $self) {
$output456 = '';

$output456 .= '
						<td title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments457 = array();
$arguments457['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.description', $renderingContext);
$arguments457['keepQuotes'] = false;
$arguments457['encoding'] = NULL;
$arguments457['doubleEncode'] = true;
$renderChildrenClosure458 = function() use ($renderingContext, $self) {
return NULL;
};
$value459 = ($arguments457['value'] !== NULL ? $arguments457['value'] : $renderChildrenClosure458());

$output456 .= (!is_string($value459) ? $value459 : htmlspecialchars($value459, ($arguments457['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments457['encoding'] !== NULL ? $arguments457['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments457['doubleEncode']));

$output456 .= '">
					';
return $output456;
};
$viewHelper460 = $self->getViewHelper('$viewHelper460', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper460->setArguments($arguments454);
$viewHelper460->setRenderingContext($renderingContext);
$viewHelper460->setRenderChildrenClosure($renderChildrenClosure455);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper

$output453 .= $viewHelper460->initializeArgumentsAndRender();

$output453 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments461 = array();
$renderChildrenClosure462 = function() use ($renderingContext, $self) {
return '
						<td>
					';
};
$viewHelper463 = $self->getViewHelper('$viewHelper463', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper463->setArguments($arguments461);
$viewHelper463->setRenderingContext($renderingContext);
$viewHelper463->setRenderChildrenClosure($renderChildrenClosure462);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper

$output453 .= $viewHelper463->initializeArgumentsAndRender();

$output453 .= '
				';
return $output453;
};
$arguments451['__thenClosure'] = function() use ($renderingContext, $self) {
$output464 = '';

$output464 .= '
						<td title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments465 = array();
$arguments465['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.description', $renderingContext);
$arguments465['keepQuotes'] = false;
$arguments465['encoding'] = NULL;
$arguments465['doubleEncode'] = true;
$renderChildrenClosure466 = function() use ($renderingContext, $self) {
return NULL;
};
$value467 = ($arguments465['value'] !== NULL ? $arguments465['value'] : $renderChildrenClosure466());

$output464 .= (!is_string($value467) ? $value467 : htmlspecialchars($value467, ($arguments465['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments465['encoding'] !== NULL ? $arguments465['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments465['doubleEncode']));

$output464 .= '">
					';
return $output464;
};
$arguments451['__elseClosure'] = function() use ($renderingContext, $self) {
return '
						<td>
					';
};
$viewHelper468 = $self->getViewHelper('$viewHelper468', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper468->setArguments($arguments451);
$viewHelper468->setRenderingContext($renderingContext);
$viewHelper468->setRenderChildrenClosure($renderChildrenClosure452);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output321 .= $viewHelper468->initializeArgumentsAndRender();

$output321 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments469 = array();
// Rendering Boolean node
$arguments469['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.ext_icon', $renderingContext));
$arguments469['then'] = NULL;
$arguments469['else'] = NULL;
$renderChildrenClosure470 = function() use ($renderingContext, $self) {
$output471 = '';

$output471 .= '
						<img class="ext-icon" src="../';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments472 = array();
$arguments472['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.siteRelPath', $renderingContext);
$arguments472['keepQuotes'] = false;
$arguments472['encoding'] = NULL;
$arguments472['doubleEncode'] = true;
$renderChildrenClosure473 = function() use ($renderingContext, $self) {
return NULL;
};
$value474 = ($arguments472['value'] !== NULL ? $arguments472['value'] : $renderChildrenClosure473());

$output471 .= (!is_string($value474) ? $value474 : htmlspecialchars($value474, ($arguments472['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments472['encoding'] !== NULL ? $arguments472['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments472['doubleEncode']));
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments475 = array();
$arguments475['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.ext_icon', $renderingContext);
$arguments475['keepQuotes'] = false;
$arguments475['encoding'] = NULL;
$arguments475['doubleEncode'] = true;
$renderChildrenClosure476 = function() use ($renderingContext, $self) {
return NULL;
};
$value477 = ($arguments475['value'] !== NULL ? $arguments475['value'] : $renderChildrenClosure476());

$output471 .= (!is_string($value477) ? $value477 : htmlspecialchars($value477, ($arguments475['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments475['encoding'] !== NULL ? $arguments475['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments475['doubleEncode']));

$output471 .= '" alt="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments478 = array();
$arguments478['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.title', $renderingContext);
$arguments478['keepQuotes'] = false;
$arguments478['encoding'] = NULL;
$arguments478['doubleEncode'] = true;
$renderChildrenClosure479 = function() use ($renderingContext, $self) {
return NULL;
};
$value480 = ($arguments478['value'] !== NULL ? $arguments478['value'] : $renderChildrenClosure479());

$output471 .= (!is_string($value480) ? $value480 : htmlspecialchars($value480, ($arguments478['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments478['encoding'] !== NULL ? $arguments478['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments478['doubleEncode']));

$output471 .= '" />
					';
return $output471;
};
$viewHelper481 = $self->getViewHelper('$viewHelper481', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper');
$viewHelper481->setArguments($arguments469);
$viewHelper481->setRenderingContext($renderingContext);
$viewHelper481->setRenderChildrenClosure($renderChildrenClosure470);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper

$output321 .= $viewHelper481->initializeArgumentsAndRender();

$output321 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper
$arguments482 = array();
$arguments482['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
// Rendering Boolean node
$arguments482['forceConfiguration'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('0');
// Rendering Boolean node
$arguments482['showDescription'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments482['additionalAttributes'] = NULL;
$arguments482['class'] = NULL;
$arguments482['dir'] = NULL;
$arguments482['id'] = NULL;
$arguments482['lang'] = NULL;
$arguments482['style'] = NULL;
$arguments482['title'] = NULL;
$arguments482['accesskey'] = NULL;
$arguments482['tabindex'] = NULL;
$arguments482['onclick'] = NULL;
$arguments482['name'] = NULL;
$arguments482['rel'] = NULL;
$arguments482['rev'] = NULL;
$arguments482['target'] = NULL;
$renderChildrenClosure483 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments484 = array();
$arguments484['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.title', $renderingContext);
$arguments484['keepQuotes'] = false;
$arguments484['encoding'] = NULL;
$arguments484['doubleEncode'] = true;
$renderChildrenClosure485 = function() use ($renderingContext, $self) {
return NULL;
};
$value486 = ($arguments484['value'] !== NULL ? $arguments484['value'] : $renderChildrenClosure485());
return (!is_string($value486) ? $value486 : htmlspecialchars($value486, ($arguments484['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments484['encoding'] !== NULL ? $arguments484['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments484['doubleEncode']));
};
$viewHelper487 = $self->getViewHelper('$viewHelper487', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper');
$viewHelper487->setArguments($arguments482);
$viewHelper487->setRenderingContext($renderingContext);
$viewHelper487->setRenderChildrenClosure($renderChildrenClosure483);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper

$output321 .= $viewHelper487->initializeArgumentsAndRender();

$output321 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments488 = array();
$arguments488['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extensionKey', $renderingContext);
$arguments488['keepQuotes'] = false;
$arguments488['encoding'] = NULL;
$arguments488['doubleEncode'] = true;
$renderChildrenClosure489 = function() use ($renderingContext, $self) {
return NULL;
};
$value490 = ($arguments488['value'] !== NULL ? $arguments488['value'] : $renderChildrenClosure489());

$output321 .= (!is_string($value490) ? $value490 : htmlspecialchars($value490, ($arguments488['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments488['encoding'] !== NULL ? $arguments488['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments488['doubleEncode']));

$output321 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments491 = array();
$arguments491['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.version', $renderingContext);
$arguments491['keepQuotes'] = false;
$arguments491['encoding'] = NULL;
$arguments491['doubleEncode'] = true;
$renderChildrenClosure492 = function() use ($renderingContext, $self) {
return NULL;
};
$value493 = ($arguments491['value'] !== NULL ? $arguments491['value'] : $renderChildrenClosure492());

$output321 .= (!is_string($value493) ? $value493 : htmlspecialchars($value493, ($arguments491['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments491['encoding'] !== NULL ? $arguments491['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments491['doubleEncode']));

$output321 .= '
				</td>
				<td class="icons">
					';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper
$arguments494 = array();
$arguments494['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
$arguments494['additionalAttributes'] = NULL;
$arguments494['class'] = NULL;
$arguments494['dir'] = NULL;
$arguments494['id'] = NULL;
$arguments494['lang'] = NULL;
$arguments494['style'] = NULL;
$arguments494['title'] = NULL;
$arguments494['accesskey'] = NULL;
$arguments494['tabindex'] = NULL;
$arguments494['onclick'] = NULL;
$arguments494['name'] = NULL;
$arguments494['rel'] = NULL;
$arguments494['rev'] = NULL;
$arguments494['target'] = NULL;
$renderChildrenClosure495 = function() use ($renderingContext, $self) {
$output496 = '';

$output496 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper
$arguments497 = array();
$arguments497['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
$arguments497['additionalAttributes'] = NULL;
$arguments497['forceConfiguration'] = true;
$arguments497['showDescription'] = false;
$arguments497['class'] = NULL;
$arguments497['dir'] = NULL;
$arguments497['id'] = NULL;
$arguments497['lang'] = NULL;
$arguments497['style'] = NULL;
$arguments497['title'] = NULL;
$arguments497['accesskey'] = NULL;
$arguments497['tabindex'] = NULL;
$arguments497['onclick'] = NULL;
$arguments497['name'] = NULL;
$arguments497['rel'] = NULL;
$arguments497['rev'] = NULL;
$arguments497['target'] = NULL;
$renderChildrenClosure498 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments499 = array();
$arguments499['icon'] = 'actions-system-extension-configure';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments500 = array();
$arguments500['key'] = 'extensionList.configure';
$arguments500['id'] = NULL;
$arguments500['default'] = NULL;
$arguments500['htmlEscape'] = NULL;
$arguments500['arguments'] = NULL;
$arguments500['extensionName'] = NULL;
$renderChildrenClosure501 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper502 = $self->getViewHelper('$viewHelper502', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper502->setArguments($arguments500);
$viewHelper502->setRenderingContext($renderingContext);
$viewHelper502->setRenderChildrenClosure($renderChildrenClosure501);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments499['title'] = $viewHelper502->initializeArgumentsAndRender();
$arguments499['uri'] = '';
$arguments499['additionalAttributes'] = NULL;
$renderChildrenClosure503 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper504 = $self->getViewHelper('$viewHelper504', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper504->setArguments($arguments499);
$viewHelper504->setRenderingContext($renderingContext);
$viewHelper504->setRenderChildrenClosure($renderChildrenClosure503);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
return $viewHelper504->initializeArgumentsAndRender();
};
$viewHelper505 = $self->getViewHelper('$viewHelper505', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper');
$viewHelper505->setArguments($arguments497);
$viewHelper505->setRenderingContext($renderingContext);
$viewHelper505->setRenderChildrenClosure($renderChildrenClosure498);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper

$output496 .= $viewHelper505->initializeArgumentsAndRender();

$output496 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper
$arguments506 = array();
$arguments506['extensionKey'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.key', $renderingContext);
$arguments506['additionalAttributes'] = NULL;
$arguments506['class'] = NULL;
$arguments506['dir'] = NULL;
$arguments506['id'] = NULL;
$arguments506['lang'] = NULL;
$arguments506['style'] = NULL;
$arguments506['title'] = NULL;
$arguments506['accesskey'] = NULL;
$arguments506['tabindex'] = NULL;
$arguments506['onclick'] = NULL;
$arguments506['name'] = NULL;
$arguments506['rel'] = NULL;
$arguments506['rev'] = NULL;
$arguments506['target'] = NULL;
$renderChildrenClosure507 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper508 = $self->getViewHelper('$viewHelper508', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper');
$viewHelper508->setArguments($arguments506);
$viewHelper508->setRenderingContext($renderingContext);
$viewHelper508->setRenderChildrenClosure($renderChildrenClosure507);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper

$output496 .= $viewHelper508->initializeArgumentsAndRender();

$output496 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper
$arguments509 = array();
$arguments509['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
$arguments509['additionalAttributes'] = NULL;
$arguments509['class'] = NULL;
$arguments509['dir'] = NULL;
$arguments509['id'] = NULL;
$arguments509['lang'] = NULL;
$arguments509['style'] = NULL;
$arguments509['title'] = NULL;
$arguments509['accesskey'] = NULL;
$arguments509['tabindex'] = NULL;
$arguments509['onclick'] = NULL;
$arguments509['name'] = NULL;
$arguments509['rel'] = NULL;
$arguments509['rev'] = NULL;
$arguments509['target'] = NULL;
$renderChildrenClosure510 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper511 = $self->getViewHelper('$viewHelper511', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper');
$viewHelper511->setArguments($arguments509);
$viewHelper511->setRenderingContext($renderingContext);
$viewHelper511->setRenderChildrenClosure($renderChildrenClosure510);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper

$output496 .= $viewHelper511->initializeArgumentsAndRender();

$output496 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper
$arguments512 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments513 = array();
$arguments513['action'] = 'downloadExtensionZip';
$arguments513['controller'] = 'Action';
// Rendering Array
$array514 = array();
$array514['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.key', $renderingContext);
$arguments513['arguments'] = $array514;
$arguments513['extensionName'] = NULL;
$arguments513['pluginName'] = NULL;
$arguments513['pageUid'] = NULL;
$arguments513['pageType'] = 0;
$arguments513['noCache'] = false;
$arguments513['noCacheHash'] = false;
$arguments513['section'] = '';
$arguments513['format'] = '';
$arguments513['linkAccessRestrictedPages'] = false;
$arguments513['additionalParams'] = array (
);
$arguments513['absolute'] = false;
$arguments513['addQueryString'] = false;
$arguments513['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments513['addQueryStringMethod'] = NULL;
$renderChildrenClosure515 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper516 = $self->getViewHelper('$viewHelper516', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper516->setArguments($arguments513);
$viewHelper516->setRenderingContext($renderingContext);
$viewHelper516->setRenderChildrenClosure($renderChildrenClosure515);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments512['uri'] = $viewHelper516->initializeArgumentsAndRender();
$arguments512['icon'] = 'actions-system-extension-download';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments517 = array();
$arguments517['key'] = 'extensionList.downloadzip';
$arguments517['id'] = NULL;
$arguments517['default'] = NULL;
$arguments517['htmlEscape'] = NULL;
$arguments517['arguments'] = NULL;
$arguments517['extensionName'] = NULL;
$renderChildrenClosure518 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper519 = $self->getViewHelper('$viewHelper519', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper');
$viewHelper519->setArguments($arguments517);
$viewHelper519->setRenderingContext($renderingContext);
$viewHelper519->setRenderChildrenClosure($renderChildrenClosure518);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments512['title'] = $viewHelper519->initializeArgumentsAndRender();
$arguments512['additionalAttributes'] = NULL;
$renderChildrenClosure520 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper521 = $self->getViewHelper('$viewHelper521', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper');
$viewHelper521->setArguments($arguments512);
$viewHelper521->setRenderingContext($renderingContext);
$viewHelper521->setRenderChildrenClosure($renderChildrenClosure520);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper

$output496 .= $viewHelper521->initializeArgumentsAndRender();

$output496 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper
$arguments522 = array();
$arguments522['extension'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension', $renderingContext);
$arguments522['additionalAttributes'] = NULL;
$arguments522['class'] = NULL;
$arguments522['dir'] = NULL;
$arguments522['id'] = NULL;
$arguments522['lang'] = NULL;
$arguments522['style'] = NULL;
$arguments522['title'] = NULL;
$arguments522['accesskey'] = NULL;
$arguments522['tabindex'] = NULL;
$arguments522['onclick'] = NULL;
$arguments522['name'] = NULL;
$arguments522['rel'] = NULL;
$arguments522['rev'] = NULL;
$arguments522['target'] = NULL;
$renderChildrenClosure523 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper524 = $self->getViewHelper('$viewHelper524', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper');
$viewHelper524->setArguments($arguments522);
$viewHelper524->setRenderingContext($renderingContext);
$viewHelper524->setRenderChildrenClosure($renderChildrenClosure523);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper

$output496 .= $viewHelper524->initializeArgumentsAndRender();

$output496 .= '
					';
return $output496;
};
$viewHelper525 = $self->getViewHelper('$viewHelper525', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper');
$viewHelper525->setArguments($arguments494);
$viewHelper525->setRenderingContext($renderingContext);
$viewHelper525->setRenderChildrenClosure($renderChildrenClosure495);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper

$output321 .= $viewHelper525->initializeArgumentsAndRender();

$output321 .= '
				</td>
				<td class="state ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments526 = array();
$arguments526['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.state', $renderingContext);
$arguments526['keepQuotes'] = false;
$arguments526['encoding'] = NULL;
$arguments526['doubleEncode'] = true;
$renderChildrenClosure527 = function() use ($renderingContext, $self) {
return NULL;
};
$value528 = ($arguments526['value'] !== NULL ? $arguments526['value'] : $renderChildrenClosure527());

$output321 .= (!is_string($value528) ? $value528 : htmlspecialchars($value528, ($arguments526['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments526['encoding'] !== NULL ? $arguments526['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments526['doubleEncode']));

$output321 .= '">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments529 = array();
$arguments529['value'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'extension.state', $renderingContext);
$arguments529['keepQuotes'] = false;
$arguments529['encoding'] = NULL;
$arguments529['doubleEncode'] = true;
$renderChildrenClosure530 = function() use ($renderingContext, $self) {
return NULL;
};
$value531 = ($arguments529['value'] !== NULL ? $arguments529['value'] : $renderChildrenClosure530());

$output321 .= (!is_string($value531) ? $value531 : htmlspecialchars($value531, ($arguments529['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments529['encoding'] !== NULL ? $arguments529['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments529['doubleEncode']));

$output321 .= '
				</td>
				</tr>
			';
return $output321;
};

$output285 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments319, $renderChildrenClosure320, $renderingContext);

$output285 .= '
		</tbody>
	</table>
';
return $output285;
};

$output261 .= '';

$output261 .= '


';

return $output261;
}


}
#1435660055    156965    