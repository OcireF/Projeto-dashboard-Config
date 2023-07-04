<?php
           
       /**
        * Gauge chart widget view.
        *
        * @var CView $this
        * @var array $data
        */
           
       (new CWidgetView($data))
           ->addItem([
               (new CDiv())->addClass('chart'),
               $data['fields_values']['description']
                   ? (new CDiv($data['fields_values']['description']))->addClass('description')
                   : null
           ])
           ->setVar('history', $data['history'])
           ->setVar('fields_values', $data['fields_values'])
           ->show();