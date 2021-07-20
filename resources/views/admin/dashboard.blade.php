@extends('layouts.admin')



@section('content')




        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">1,024</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">24</div>
                    <div class="cardName">Sales</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">1,024</div>
                    <div class="cardName">Comments</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-comment" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">1,024</div>
                    <div class="cardName">Earning</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Orders</h2>
                    <a href="#" class="btnn">View All</a>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Payement</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Star refrigator</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="status delevered">Delevered</span></td>
                    </tr>
                    <tr>
                        <td>Star refrigator</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="status delevered">Delevered</span></td>
                    </tr>
                    <tr>
                        <td>Star refrigator</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>Star refrigator</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="status inProgress">Return</span></td>
                    </tr>
                    <tr>
                        <td>Star refrigator</td>
                        <td>$1200</td>
                        <td>Paid</td>
                        <td><span class="status delevered">In progress</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customers</h2>

                </div>
            </div>
        </div>



<!-- <script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"
></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
  crossorigin="anonymous"
></script>
<script
  src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
  crossorigin="anonymous"
></script> -->
@endsection
