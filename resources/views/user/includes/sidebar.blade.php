<div class="navigation">
    <ul>
        <li>
            <a href="#">
              <span class="icon"
              ><i class="fa fa-book" aria-hidden="true"></i>
</span>
                <span class="title">
                    <h2>BooKs.</h2>
              </span>
            </a>
        </li>
        <li>
            <a href="#">
              <span class="icon"
              ><i class="fa fa-home" aria-hidden="true"></i
                  ></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.maincategories') }}">
              <span class="icon">
                  <i class="fa fa-building" aria-hidden="true"></i>
              </span>
                <span class="title">Main Category</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.subcategories') }}">
              <span class="icon">
                  <i class="fa fa-level-down" aria-hidden="true"></i>
              </span>
                <span class="title">sub Category</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.vendors') }}">
              <span class="icon"
              ><i class="fa fa-shopping-bag" aria-hidden="true"></i>
</span>
                <span class="title">Store</span>
            </a>
        </li>
        <li>
            <a href="#">
              <span class="icon"
              ><i class="fa fa-user" aria-hidden="true"></i
                  ></span>
                <span class="title">Customers</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.products')}}"
            ><span class="icon"
                ><i class="fa fa-product-hunt" aria-hidden="true"></i></span>
                <span class="title">Product</span></a
            >
        </li>
        <li>
            <a href="#">
              <span class="icon"
              ><i class="fa fa-cogs" aria-hidden="true"></i
                  ></span>
                <span class="title">Settings</span></a
            >
        </li>
        <li>
            <a href="#">
              <span class="icon"
              ><i class="fa fa-key" aria-hidden="true"></i
                  ></span>
                <span class="title">Password</span>
            </a>
        </li>
        <li>
            <a href="{{route('logout')}}">
              <span class="icon"
              ><i class="fa fa-sign-out" aria-hidden="true"></i
                  ></span>
                <span class="title">Sign Out</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
