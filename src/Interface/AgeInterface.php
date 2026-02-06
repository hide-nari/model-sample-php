<?php

namespace Hidenari\ModelSample\Interface;

interface AgeInterface
{
    const int INIT_AGE = 15;

    public int $age {
        get;
        set;
    }
}
