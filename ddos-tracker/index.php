<?php

const COMPARATOR_FORMAT = 'dH';

function ddosTracker($attackerDate): string
{
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $attackerDate)->format(COMPARATOR_FORMAT);

    $listOfIdentifiers = DateTimeZone::listIdentifiers();
    foreach ($listOfIdentifiers as $identifier){
        $timeZoneDate = createFormattedDateByTimezone($identifier, COMPARATOR_FORMAT);
        if($timeZoneDate === $date){
            return $identifier;
        }
    }
    return "";
}

function createFormattedDateByTimezone(string $timezone, $format = 'Y-m-d H:i:s'): string
{
    return (new DateTime("now", new DateTimeZone($timezone)))->format($format);
}
