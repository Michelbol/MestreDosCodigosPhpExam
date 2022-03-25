<?php

function secretSalt($something)
{
    return hash('SHA256', $something.getenv('HASH_SALTING_VALUE'));
}
