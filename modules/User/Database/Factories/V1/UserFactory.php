<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories\V1;

use Modules\Base\Database\Factory\V1\BaseFactory;
use Modules\User\Enums\V1\AccountStatus\AccountStatus;
use Modules\User\Enums\V1\AccountType\AccountType;

use function user;

class UserFactory extends BaseFactory
{
    /**
     * Get the target model
     */
    public function model(): string
    {
        return user()->model();
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email'               => fake()->unique()->safeEmail,
            'mobile'              => fake()->numerify('+1#########'),
            'password'            => bcrypt('password'),
            'name'                => fake()->name,
            'lang'                => fake()->randomElement(['en', 'es', 'fr']),
            'account_type'        => fake()->randomElement(AccountType::getValues()),
            'account_status'      => fake()->randomElement(AccountStatus::getValues()),
            'limitation_end_date' => fake()->dateTimeBetween('now', '+1 year'),
            'last_login_date'     => fake()->dateTimeBetween('-1 month', 'now')
        ];
    }
}
