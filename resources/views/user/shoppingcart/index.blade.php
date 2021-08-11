@extends('layouts.user')


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Shopping Cart</h2>
                <a href="{{ route('admin.maincategories.create') }}" class="btnn">Add Category</a>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Control</th>

                </tr>
                </thead>
                <tbody>
                <?php $total = 0 ?>
                @if(session('cart'))

                    @foreach(session('cart') as $id => $details)

                        <tr>
                            <td><img src="{{ $details['photo']  }}" class="w-25"> <span> {{ $details['name']}}</span>
                            </td>
                            <td>{{ $details['price'] }}</td>
                            <td>{{ $details['quantity'] }}</td>

                            <td>{{ $details['price'] * $details['quantity']  }}</td>
                            <?php $total += $details['price'] * $details['quantity'] ?>
                            <td>
                                <a href="">
                                    <button class="btn btn-success">Edit</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="cardHeader">
                <h2>Shopping Cart</h2>
                <a href="{{ route('admin.maincategories.create') }}" class="btnn">Check Out</a>
                <a href="{{ route('admin.maincategories.create') }}" class="btnn">Update</a>
            </div>

        </div>
    </div>
    {{--    start form for paypal payment--}}

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Make a payment
            </div>
            <div class="card-body">
                <form action="{{route('pay')}}" method="POST" id="paymentForm">
                    @csrf
                    <div class="row">
                        <div class="col-auto">
                            <label>How much you want to pay?</label>
                            <input
                                type="number"
                                min="5"
                                step="0.5"
                                class="form-control"
                                name="value"
                                value="<?= $total ?>"
                            >
                        </div>
                        <div class="col-auto">
                            <label>Currency</label>
                            <select class="custom-select" name="currency" required>
                                @foreach($currencies as $currency)
                                    <option value="{{$currency->iso}}">
                                        {{strtoupper($currency->iso)}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label>Select the desired payment platform</label>
                            <div class="form-group" id="toggler">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    @foreach($paymentPlatforms as $paymentPlatform)
                                        <label
                                            class="btn btn-outline-secondary rounded m-2 p-1"
                                            data-target="#{{ $paymentPlatform->name }}Collapse"
                                            data-toggle="collapse">
                                            <input
                                                type="radio"
                                                name="payment_platform"
                                                value="{{$paymentPlatform->id}}"
                                                required
                                            >
                                            <img class="img-thumbnail" src="{{asset($paymentPlatform->image)}}">
                                        </label>
                                    @endforeach
                                </div>
                                @foreach($paymentPlatforms as $paymentPlatform)
                                    <div
                                        id="{{ $paymentPlatform->name }}Collapse"
                                        class="collapse"
                                        data-parent="#toggler"
                                    >
                                        @includeIf('components.'.strtolower($paymentPlatform->name).'-collapse')
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" id="payButton" class="btn btn-primary btn-lg">Pay</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--    end form for paypal payment--}}


    {{--    start form for stripe payment--}}

    {{--    <div class="globalContent container">--}}
    {{--        <main>--}}
    {{--            <div class="cell example example2" id="example-2">--}}
    {{--                <form action="{{route('stripe.payment')}}" method="post" id="paymentForm">--}}
    {{--                    @csrf--}}
    {{--                    <div data-locale-reversible>--}}
    {{--                        <div class="row">--}}
    {{--                            <div class="field">--}}
    {{--                                <input id="example2-address" data-tid="elements_examples.form.address_placeholder"--}}
    {{--                                       class="input empty" type="text" placeholder="185 Berry St" required=""--}}
    {{--                                       autocomplete="address-line1" name="address">--}}
    {{--                                <label for="example2-address"--}}
    {{--                                       data-tid="elements_examples.form.address_label">Address</label>--}}
    {{--                                <div class="baseline"></div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="row" data-locale-reversible>--}}
    {{--                            <div class="field half-width">--}}
    {{--                                <input id="example2-city" data-tid="elements_examples.form.city_placeholder"--}}
    {{--                                       class="input empty" type="text" placeholder="San Francisco" required=""--}}
    {{--                                       autocomplete="address-level2" name="city">--}}
    {{--                                <label for="example2-city" data-tid="elements_examples.form.city_label">City</label>--}}
    {{--                                <div class="baseline"></div>--}}
    {{--                            </div>--}}
    {{--                            <div class="field quarter-width">--}}
    {{--                                <input id="example2-state" data-tid="elements_examples.form.state_placeholder"--}}
    {{--                                       class="input empty" type="text" placeholder="CA" required=""--}}
    {{--                                       autocomplete="address-level1" name="state">--}}
    {{--                                <label for="example2-state" data-tid="elements_examples.form.state_label">State</label>--}}
    {{--                                <div class="baseline"></div>--}}
    {{--                            </div>--}}
    {{--                            <div class="field quarter-width">--}}
    {{--                                <input id="example2-zip" data-tid="elements_examples.form.postal_code_placeholder"--}}
    {{--                                       class="input empty" type="text" placeholder="94107" required=""--}}
    {{--                                       autocomplete="postal-code">--}}
    {{--                                <label for="example2-zip"--}}
    {{--                                       data-tid="elements_examples.form.postal_code_label">ZIP</label>--}}
    {{--                                <div class="baseline"></div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="field">--}}
    {{--                            <div id="example2-card-number" class="input empty"></div>--}}
    {{--                            <label for="example2-card-number" data-tid="elements_examples.form.card_number_label">Card--}}
    {{--                                number</label>--}}
    {{--                            <div class="baseline"></div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="field half-width">--}}
    {{--                            <div id="example2-card-expiry" class="input empty"></div>--}}
    {{--                            <label for="example2-card-expiry" data-tid="elements_examples.form.card_expiry_label">Expiration</label>--}}
    {{--                            <div class="baseline"></div>--}}
    {{--                        </div>--}}
    {{--                        <div class="field half-width">--}}
    {{--                            <div id="example2-card-cvc" class="input empty"></div>--}}
    {{--                            <label for="example2-card-cvc" data-tid="elements_examples.form.card_cvc_label">CVC</label>--}}
    {{--                            <div class="baseline"></div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <button type="submit"--}}
    {{--                            data-tid="elements_examples.form.pay_button"><?php echo "pay " . $total . " MAD"; ?></button>--}}
    {{--                    <div class="error" role="alert">--}}
    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">--}}
    {{--                            <path class="base" fill="#000"--}}
    {{--                                  d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>--}}
    {{--                            <path class="glyph" fill="#FFF"--}}
    {{--                                  d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>--}}
    {{--                        </svg>--}}
    {{--                        <span class="message"></span></div>--}}
    {{--                </form>--}}
    {{--                <div class="success">--}}
    {{--                    <div class="icon">--}}
    {{--                        <svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1"--}}
    {{--                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
    {{--                            <circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4"--}}
    {{--                                    stroke="#000" fill="none"></circle>--}}
    {{--                            <path class="checkmark" stroke-linecap="round" stroke-linejoin="round"--}}
    {{--                                  d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4"--}}
    {{--                                  stroke="#000" fill="none"></path>--}}
    {{--                        </svg>--}}
    {{--                    </div>--}}
    {{--                    <h3 class="title" data-tid="elements_examples.success.title">Payment successful</h3>--}}
    {{--                    <p class="message"><span data-tid="elements_examples.success.message">Thanks for trying Stripe Elements. No money was charged, but we generated a token: </span><span--}}
    {{--                            class="token">tok_189gMN2eZvKYlo2CwTBv9KKh</span></p>--}}
    {{--                    <a class="reset" href="#">--}}
    {{--                        <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1"--}}
    {{--                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
    {{--                            <path fill="#000000"--}}
    {{--                                  d="M15,7.05492878 C10.5000495,7.55237307 7,11.3674463 7,16 C7,20.9705627 11.0294373,25 16,25 C20.9705627,25 25,20.9705627 25,16 C25,15.3627484 24.4834055,14.8461538 23.8461538,14.8461538 C23.2089022,14.8461538 22.6923077,15.3627484 22.6923077,16 C22.6923077,19.6960595 19.6960595,22.6923077 16,22.6923077 C12.3039405,22.6923077 9.30769231,19.6960595 9.30769231,16 C9.30769231,12.3039405 12.3039405,9.30769231 16,9.30769231 L16,12.0841673 C16,12.1800431 16.0275652,12.2738974 16.0794108,12.354546 C16.2287368,12.5868311 16.5380938,12.6540826 16.7703788,12.5047565 L22.3457501,8.92058924 L22.3457501,8.92058924 C22.4060014,8.88185624 22.4572275,8.83063012 22.4959605,8.7703788 C22.6452866,8.53809377 22.5780351,8.22873685 22.3457501,8.07941076 L22.3457501,8.07941076 L16.7703788,4.49524351 C16.6897301,4.44339794 16.5958758,4.41583275 16.5,4.41583275 C16.2238576,4.41583275 16,4.63969037 16,4.91583275 L16,7 L15,7 L15,7.05492878 Z M16,32 C7.163444,32 0,24.836556 0,16 C0,7.163444 7.163444,0 16,0 C24.836556,0 32,7.163444 32,16 C32,24.836556 24.836556,32 16,32 Z"></path>--}}
    {{--                        </svg>--}}
    {{--                    </a>--}}
    {{--                </div>--}}

    {{--                <div class="caption">--}}
    {{--                    <span data-tid="elements_examples.caption.no_charge"--}}
    {{--                          class="no-charge">Your card won't be charged</span>--}}
    {{--                    <a class="source" href="https://github.com/stripe/elements-examples/#example-2">--}}
    {{--                        <svg width="16px" height="10px" viewBox="0 0 16 10" version="1.1"--}}
    {{--                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
    {{--                            <path--}}
    {{--                                d="M1,8 L12,8 C12.5522847,8 13,8.44771525 13,9 C13,9.55228475 12.5522847,10 12,10 L1,10 C0.44771525,10 6.76353751e-17,9.55228475 0,9 C-6.76353751e-17,8.44771525 0.44771525,8 1,8 L1,8 Z M1,4 L8,4 C8.55228475,4 9,4.44771525 9,5 C9,5.55228475 8.55228475,6 8,6 L1,6 C0.44771525,6 6.76353751e-17,5.55228475 0,5 C-6.76353751e-17,4.44771525 0.44771525,4 1,4 L1,4 Z M1,0 L15,0 C15.5522847,-1.01453063e-16 16,0.44771525 16,1 L16,1 C16,1.55228475 15.5522847,2 15,2 L1,2 C0.44771525,2 6.76353751e-17,1.55228475 0,1 L0,1 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 L1,0 Z"--}}
    {{--                                fill="#AAB7C4"></path>--}}
    {{--                        </svg>--}}
    {{--                        <span data-tid="elements_examples.caption.view_source">View source on GitHub</span>--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </main>--}}
    {{--    </div>--}}

    {{--    end form for stripe payment--}}
@endsection
@section('script')
    {{--    <script>--}}
    {{--        var stripe = Stripe('pk_test_51JLyPJFmm8Uz9to12hbSddRW6mQEMH7dDNZCpGB2kVHGVtKkfYPn4shkVmk40uxGQ5bbIl7YFkH3q4Gx1EoaNq4v00ZqmMEIVH');--}}

    {{--        (function () {--}}
    {{--            'use strict';--}}

    {{--            var elements = stripe.elements({--}}
    {{--                fonts: [--}}
    {{--                    {--}}
    {{--                        cssSrc: 'https://fonts.googleapis.com/css?family=Source+Code+Pro',--}}
    {{--                    },--}}
    {{--                ],--}}
    {{--                // Stripe's examples are localized to specific languages, but if--}}
    {{--                // you wish to have Elements automatically detect your user's locale,--}}
    {{--                // use `locale: 'auto'` instead.--}}
    {{--                locale: window.__exampleLocale--}}
    {{--            });--}}

    {{--            // Floating labels--}}
    {{--            var inputs = document.querySelectorAll('.cell.example.example2 .input');--}}
    {{--            Array.prototype.forEach.call(inputs, function (input) {--}}
    {{--                input.addEventListener('focus', function () {--}}
    {{--                    input.classList.add('focused');--}}
    {{--                });--}}
    {{--                input.addEventListener('blur', function () {--}}
    {{--                    input.classList.remove('focused');--}}
    {{--                });--}}
    {{--                input.addEventListener('keyup', function () {--}}
    {{--                    if (input.value.length === 0) {--}}
    {{--                        input.classList.add('empty');--}}
    {{--                    } else {--}}
    {{--                        input.classList.remove('empty');--}}
    {{--                    }--}}
    {{--                });--}}
    {{--            });--}}

    {{--            var elementStyles = {--}}
    {{--                base: {--}}
    {{--                    color: '#32325D',--}}
    {{--                    fontWeight: 500,--}}
    {{--                    fontFamily: 'Source Code Pro, Consolas, Menlo, monospace',--}}
    {{--                    fontSize: '16px',--}}
    {{--                    fontSmoothing: 'antialiased',--}}

    {{--                    '::placeholder': {--}}
    {{--                        color: '#CFD7DF',--}}
    {{--                    },--}}
    {{--                    ':-webkit-autofill': {--}}
    {{--                        color: '#e39f48',--}}
    {{--                    },--}}
    {{--                },--}}
    {{--                invalid: {--}}
    {{--                    color: '#E25950',--}}

    {{--                    '::placeholder': {--}}
    {{--                        color: '#FFCCA5',--}}
    {{--                    },--}}
    {{--                },--}}
    {{--            };--}}

    {{--            var elementClasses = {--}}
    {{--                focus: 'focused',--}}
    {{--                empty: 'empty',--}}
    {{--                invalid: 'invalid',--}}
    {{--            };--}}

    {{--            var cardNumber = elements.create('cardNumber', {--}}
    {{--                style: elementStyles,--}}
    {{--                classes: elementClasses,--}}
    {{--            });--}}
    {{--            cardNumber.mount('#example2-card-number');--}}

    {{--            var cardExpiry = elements.create('cardExpiry', {--}}
    {{--                style: elementStyles,--}}
    {{--                classes: elementClasses,--}}
    {{--            });--}}
    {{--            cardExpiry.mount('#example2-card-expiry');--}}

    {{--            var cardCvc = elements.create('cardCvc', {--}}
    {{--                style: elementStyles,--}}
    {{--                classes: elementClasses,--}}
    {{--            });--}}
    {{--            cardCvc.mount('#example2-card-cvc');--}}

    {{--            registerElements([cardNumber, cardExpiry, cardCvc], 'example2');--}}
    {{--        })();--}}
    {{--    </script>--}}
@endsection
