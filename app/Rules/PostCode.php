<?php

namespace App\Rules;

use App\Services\PostCodeService;
use Illuminate\Contracts\Validation\Rule;

class PostCode implements Rule
{
    /**
     * @var PostCodeService
     */
    private $postCodeService;

    /**
     * @var string
     */
    private $attribute;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(PostCodeService $postCodeService)
    {
        $this->postCodeService = $postCodeService;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->attribute = $attribute;

        dd($this->postCodeService->validate($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.postcode', ['attribute' => $this->attribute]);
    }
}
