<?php

namespace Admin\Classes;

use System\Traits\PropertyContainer;

/**
 * Dashboard Widget base class
 * Dashboard widgets are used inside the DashboardContainer.
 */
class BaseDashboardWidget extends BaseWidget
{
    use PropertyContainer;

    public function __construct($controller, $properties = [])
    {
        $this->setConfig($properties, ['widget']);

        parent::__construct($controller, $properties);

        $this->properties = $this->validateProperties($properties);
        $this->fillFromConfig($properties);
    }

    public function getPropertiesToSave()
    {
        return array_except($this->properties, ['startDate', 'endDate']);
    }

    public function getWidth()
    {
        return $this->property('width');
    }

    public function getCssClass()
    {
        return $this->property('cssClass', 'bg-light');
    }

    public function getPriority()
    {
        return $this->property('priority', 9999);
    }

    public function getStartDate()
    {
        return $this->property('startDate');
    }

    public function getEndDate()
    {
        return $this->property('endDate');
    }
}
