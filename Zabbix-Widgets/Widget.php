<?php 
           
       namespace Modules\LessonGaugeChart;
           
       use Zabbix\Core\CWidget;
           
       class Widget extends CWidget {
           
           public const UNIT_AUTO = 0;
           public const UNIT_STATIC = 1;
           
           public function getTranslationStrings(): array {
               return [
                   'class.widget.js' => [
                       'No data' => _('No data')
                   ]
               ];
           }
       }