<?php

namespace Filament\Fields;

use Filament\Fields\Concerns;

class DateTime extends InputField
{
    use Concerns\CanBeAutofocused;
    use Concerns\CanBeCompared;
    use Concerns\CanBeDateConstrained;
    use Concerns\CanBeDisabled;
    use Concerns\CanBeUnique;
    use Concerns\HasDateFormats;
    use Concerns\HasPlaceholder;

    public $withoutSeconds = false;

    protected $defaultDisplayFormat = 'F j, Y H:i:s';

    protected $defaultDisplayFormatWithoutSeconds = 'F j, Y H:i';

    protected $defaultFormat = 'Y-m-d H:i:s';

    protected $defaultFormatWithoutSeconds = 'Y-m-d H:i';

    public function __construct($name)
    {
        parent::__construct($name);

        $this->displayFormat($this->defaultDisplayFormat);
        $this->format($this->defaultFormat);
    }

    public function withoutSeconds()
    {
        $this->withoutSeconds = true;

        if ($this->displayFormat === $this->defaultDisplayFormat) {
            $this->displayFormat($this->defaultDisplayFormatWithoutSeconds);
        }

        if ($this->format === $this->defaultFormat) {
            $this->format($this->defaultFormatWithoutSeconds);
        }

        return $this;
    }
}
