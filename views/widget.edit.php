<?php
           
       /**
        * Gauge chart widget form view.
        *
        * @var CView $this
        * @var array $data
        */
           
       use Zabbix\Widgets\Fields\CWidgetFieldGraphDataSet;
           
       $lefty_units = new CWidgetFieldSelectView($data['fields']['value_units']);
       $lefty_static_units = (new CWidgetFieldTextBoxView($data['fields']['value_static_units']))
           ->setPlaceholder(_('value'))
           ->setWidth(ZBX_TEXTAREA_TINY_WIDTH);
           
       (new CWidgetFormView($data))
           ->addField(
               new CWidgetFieldMultiSelectItemView($data['fields']['itemid'], $data['captions']['ms']['items']['itemid'])
           )
           ->addField(
               new CWidgetFieldCheckBoxView($data['fields']['adv_conf'])
           )
           ->addField(
               new CWidgetFieldColorView($data['fields']['chart_color']),
               'js-advanced-configuration'
           )
           ->addField(
               new CWidgetFieldNumericBoxView($data['fields']['value_min']),
               'js-advanced-configuration'
           )
           ->addField(
               new CWidgetFieldNumericBoxView($data['fields']['value_max']),
               'js-advanced-configuration'
           )
           ->addItem([
               $lefty_units->getLabel()->addClass('js-advanced-configuration'),
               (new CFormField([
                   $lefty_units->getView()->addClass(ZBX_STYLE_FORM_INPUT_MARGIN),
                   $lefty_static_units->getView()
               ]))->addClass('js-advanced-configuration')
           ])
           ->addField(
               new CWidgetFieldTextBoxView($data['fields']['description']),
               'js-advanced-configuration'
           )
           ->includeJsFile('widget.edit.js.php')
           ->addJavaScript('widget_lesson_gauge_chart_form.init('.json_encode([
                   'color_palette' => CWidgetFieldGraphDataSet::DEFAULT_COLOR_PALETTE
               ], JSON_THROW_ON_ERROR).');')
           ->show();   