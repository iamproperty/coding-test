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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct()
    {
        $this->postCodeService = app()->make(PostCodeService::class);
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

        $validation = $this->postCodeService->validate($value);

        return $validation->status == 200 && $validation->result == true;
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
