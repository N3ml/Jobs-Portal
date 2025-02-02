<?php

namespace App\Enums;

enum ApplicationStatusEnum: int
{
    case PENDING = 0;
    case APPROVED = 1;
    case REJECTED = 2;
    case CANCELLED = 3;

}
