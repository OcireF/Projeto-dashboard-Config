<?php
           
       namespace Modules\LessonGaugeChart\Includes;
           
       use Modules\LessonGaugeChart\Widget;
       use Zabbix\Widgets\CWidgetField;
       use Zabbix\Widgets\CWidgetForm;
           
       use Zabbix\Widgets\Fields\CWidgetFieldCheckBox;
       use Zabbix\Widgets\Fields\CWidgetFieldColor;
       use Zabbix\Widgets\Fields\CWidgetFieldMultiSelectItem;
       use Zabbix\Widgets\Fields\CWidgetFieldNumericBox;
       use Zabbix\Widgets\Fields\CWidgetFieldSelect;
       use Zabbix\Widgets\Fields\CWidgetFieldTextBox;
           
       /**
        * Gauge chart widget form.
        */
       class WidgetForm extends CWidgetForm {
           
           public function addFields(): self {
               return $this
                   ->addField(
                       (new CWidgetFieldMultiSelectItem('itemid', _('Item')))
                           ->setFlags(CWidgetField::FLAG_NOT_EMPTY | CWidgetField::FLAG_LABEL_ASTERISK)
                           ->setMultiple(false)
                           ->setFilterParameter('numeric', true)
                   )
                   ->addField(
                       new CWidgetFieldCheckBox('adv_conf', _('Advanced configuration'))
                   )
                   ->addField(
                       (new CWidgetFieldColor('chart_color', _('Color')))->setDefault('666666')
                   )
                   ->addField(
                       (new CWidgetFieldNumericBox('value_min', _('Min')))
                           ->setDefault(0)
                           ->setFlags(CWidgetField::FLAG_NOT_EMPTY | CWidgetField::FLAG_LABEL_ASTERISK)
                   )
                   ->addField(
                       (new CWidgetFieldNumericBox('value_max', _('Max')))
                           ->setDefault(100)
                           ->setFlags(CWidgetField::FLAG_NOT_EMPTY | CWidgetField::FLAG_LABEL_ASTERISK)
                   )
                   ->addField(
                       (new CWidgetFieldSelect('value_units', _('Units'), [
                           Widget::UNIT_AUTO => _x('Auto', 'history source selection method'),
                           Widget::UNIT_STATIC => _x('Static', 'history source selection method')
                       ]))->setDefault(Widget::UNIT_AUTO)
                   )
                   ->addField(
                       (new CWidgetFieldTextBox('value_static_units'))
                   )
                   ->addField(
                       new CWidgetFieldTextBox('description', _('Description'))
                   );
           }
       }