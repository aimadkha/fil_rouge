<?php

namespace Database\Seeders;

use App\Models\PaymentPlatform;
use Illuminate\Database\Seeder;

class PaymentPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPlatform::create([
            'name'=>'PayPal',
            'image'=>'assets/images/payment-platforms/paypal.jpg'
        ]);

        PaymentPlatform::create([
            'name'=>'Stripe',
            'image'=>'assets/images/payment-platforms/stripe.jpg'
        ]);
    }
}
