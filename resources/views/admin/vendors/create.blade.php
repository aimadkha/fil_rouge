@extends('layouts.admin')


@section('content')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Create Store</h2>
                <a href="{{route('admin.vendors') }}" class="btnn">Back to main Store</a>
            </div>
            <div class="container">
                <form class="form" action="{{route('admin.vendors.store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Store Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="Enter name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Number Phone</label>
                        <input type="text" name="mobile" class="form-control" id="mobile">
                        @error('mobile')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Address</label>
                        <input type="text" name="address" class="form-control" id="address">
                        @error('address')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="photo">Logo</label>
                        <input type="file" class="form-control" name="logo" id="photo">
                        @error('logo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group select2bs4">
                        <label for="exampleFormControlSelect1">Main Categories</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category">
                            <optgroup label="please choose category">
{{--                                <option>category</option>--}}
                                @isset($categories)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endisset
                            </optgroup>
                        </select>
                        @error('category')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1"
                                onclick="history.back();">
                            <i class="ft-x"></i> back
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


@endsection

@section('script')
    {{--    <script>--}}
    {{--        "use strict";--}}

    {{--        function initMap() {--}}
    {{--            const componentForm = [--}}
    {{--                'location',--}}
    {{--                'locality',--}}
    {{--                'administrative_area_level_1',--}}
    {{--                'country',--}}
    {{--                'postal_code',--}}
    {{--            ];--}}
    {{--            const map = new google.maps.Map(document.getElementById("map"), {--}}
    {{--                zoom: 11,--}}
    {{--                center: {lat: 37.4221, lng: -122.0841},--}}
    {{--                mapTypeControl: false,--}}
    {{--                fullscreenControl: true,--}}
    {{--                zoomControl: true,--}}
    {{--                streetViewControl: true--}}
    {{--            });--}}
    {{--            const marker = new google.maps.Marker({map: map, draggable: false});--}}
    {{--            const autocompleteInput = document.getElementById('location');--}}
    {{--            const autocomplete = new google.maps.places.Autocomplete(autocompleteInput);--}}
    {{--            autocomplete.addListener('place_changed', function () {--}}
    {{--                marker.setVisible(false);--}}
    {{--                const place = autocomplete.getPlace();--}}
    {{--                if (!place.geometry) {--}}
    {{--                    // User entered the name of a Place that was not suggested and--}}
    {{--                    // pressed the Enter key, or the Place Details request failed.--}}
    {{--                    window.alert('No details available for input: \'' + place.name + '\'');--}}
    {{--                    return;--}}
    {{--                }--}}
    {{--                renderAddress(place);--}}
    {{--                fillInAddress(place);--}}
    {{--            });--}}

    {{--            function fillInAddress(place) {  // optional parameter--}}
    {{--                const addressNameFormat = {--}}
    {{--                    'street_number': 'short_name',--}}
    {{--                    'route': 'long_name',--}}
    {{--                    'locality': 'long_name',--}}
    {{--                    'administrative_area_level_1': 'short_name',--}}
    {{--                    'country': 'long_name',--}}
    {{--                    'postal_code': 'short_name',--}}
    {{--                };--}}
    {{--                const getAddressComp = function (type) {--}}
    {{--                    for (const component of place.address_components) {--}}
    {{--                        if (component.types[0] === type) {--}}
    {{--                            return component[addressNameFormat[type]];--}}
    {{--                        }--}}
    {{--                    }--}}
    {{--                    return '';--}}
    {{--                };--}}
    {{--                document.getElementById('location').value = getAddressComp('street_number') + ' '--}}
    {{--                    + getAddressComp('route');--}}
    {{--                for (const component of componentForm) {--}}
    {{--                    // Location field is handled separately above as it has different logic.--}}
    {{--                    if (component !== 'location') {--}}
    {{--                        document.getElementById(component).value = getAddressComp(component);--}}
    {{--                    }--}}
    {{--                }--}}
    {{--            }--}}

    {{--            function renderAddress(place) {--}}
    {{--                map.setCenter(place.geometry.location);--}}
    {{--                marker.setPosition(place.geometry.location);--}}
    {{--                marker.setVisible(true);--}}
    {{--            }--}}
    {{--        }--}}
    {{--    </script>--}}
    {{--    <script--}}
    {{--        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_x4hRJ53OtRTG5mPrzvnUzk7OIoS674w&libraries=places&callback=initMap&channel=GMPSB_addressselection_v1_cABC"--}}
    {{--        async defer></script>--}}

@stop
