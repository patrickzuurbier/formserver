<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static CHECKBOX()
 * @method static static COLOR()
 * @method static static DATE()
 * @method static static DATETIME_LOCAL()
 * @method static static EMAIL()
 * @method static static FILE()
 * @method static static HIDDEN()
 * @method static static IMAGE()
 * @method static static MONTH()
 * @method static static NUMBER()
 * @method static static PASSWORD()
 * @method static static RADIO()
 * @method static static RANGE()
 * @method static static SEARCH()
 * @method static static TEL()
 * @method static static TEXT()
 * @method static static TIME()
 * @method static static URL()
 * @method static static WEEK()
 * @method static static SELECT()
 * @method static static TEXTAREA()
 *
 * @extends Enum<string>
 */
class FormFieldTypeEnum extends Enum
{
    public const CHECKBOX = 'checkbox';

    public const COLOR = 'color';

    public const DATE = 'date';

    public const DATETIME_LOCAL = 'datetime-local';

    public const EMAIL = 'email';

    public const FILE = 'file';

    public const HIDDEN = 'hidden';

    public const IMAGE = 'image';

    public const MONTH = 'month';

    public const NUMBER = 'number';

    public const PASSWORD = 'password';

    public const RADIO = 'radio';

    public const RANGE = 'range';

    public const SEARCH = 'search';

    public const TEL = 'tel';

    public const TEXT = 'text';

    public const TIME = 'time';

    public const URL = 'url';

    public const WEEK = 'week';

    public const SELECT = 'select';

    public const TEXTAREA = 'textarea';
}
