<?php

/*
 * This file is part of the eluceo/iCal package.
 *
 * (c) Markus Poerschke <markus@eluceo.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eluceo\iCal\Component;

use Eluceo\iCal\Component;
use Eluceo\iCal\PropertyBag;

/**
 * Implementation of the TIMEZONE DESCRIPTION component
 */
class TimezoneDescription extends Component
{
    /**
     * @var string
     */
    protected $type;
    
    /**
     * @var string
     */
    protected $tzOffsetFrom;
    
    /**
     * @var string
     */
    protected $tzOffsetTo;
    
    /**
     * @var string
     */
    protected $tzName;
    
    /**
     * @var string
     */
    protected $dtStart;
    
    /**
     * @var RecurrenceRule
     */
    protected $rRule;


    public function __construct($type, $tzOffsetFrom, $tzOffsetTo, $tzName, $dtStart, $rRule = null)
    {
        $this->type = $type;
        $this->tzOffsetFrom = $tzOffsetFrom;
        $this->tzOffsetTo = $tzOffsetTo;
        $this->tzName = $tzName;
        $this->dtStart = $dtStart;
        $this->rRule = $rRule;        
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function buildPropertyBag()
    {
        $this->properties = new PropertyBag;

        $this->properties->set('TZOFFSETFROM', $this->tzOffsetFrom);
        $this->properties->set('TZOFFSETTO', $this->tzOffsetTo);
        $this->properties->set('TZNAME', $this->tzName);
        $this->properties->set('DTSTART', $this->dtStart);
        if( $this->rRule != null ) {
            $this->properties->set('RRULE', $this->rRule);
        }       
    }
}
