<?php
echo TbHtml::well("Features below can only be enabled / disabled when the survey is not active.");
$options = $survey->featureOptions;

echo TbHtml::openTag('fieldset', [
    'disabled' => $survey->isActive
]);
foreach ($options as $key => &$label) {
    $label .= ' ' . TbHtml::link(TbHtml::icon('info-sign'), 'https://manual.limesurvey.org/Feature:' . $key, ['target' => '_blank']);
}
echo TbHtml::activeCheckBoxListControlGroup($survey, 'features', $options, ['formLayout' => TbHtml::FORM_LAYOUT_HORIZONTAL]);
echo TbHtml::hiddenField('id', $survey->sid);
echo TbHtml::closeTag('fieldset');