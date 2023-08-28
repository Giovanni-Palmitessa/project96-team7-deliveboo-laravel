@php 
    $user = Auth::user();
@endphp

<nav class="bg-primary fixed w-full z-20 top-0 left-0 border-gray-200">
    <div
      class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
    >
      <a href="{{ route('dashboard') }}" class="flex items-center">
        <div
            style="background-image: url({{ Vite::asset('public/img/logo-deliveboo_thumbnail.png') }})"
          class="h-14 w-52 md:ml-[-25px] overflow-hidden bg-[length:245px_155px] bg-center"
        >
        {{-- <img src="{{ Vite::asset('public/favicon.png') }}" alt=""> --}}
        </div>
      </a>
      <div class="flex">
        <button
          data-collapse-toggle="navbar-sticky"
          type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-secondary rounded-lg md:hidden hover:bg-secondary hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-200"
          aria-controls="navbar-sticky"
          aria-expanded="false"
        >
          <span class="sr-only">Open main menu</span>
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 17 14"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15"
            />
          </svg>
        </button>
      </div>
      <div
        class="items-center justify-between hidden w-full md:flex md:w-auto"
        id="navbar-sticky"
      >
        <ul
          class="flex flex-col lg:items-center text-center p-4 md:p-0 mt-4 font-medium border bg-primary border-secondary rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0"
        >
          <li>
            <a
              href="{{ route('dashboard') }}"
              class="block py-2 pl-3 pr-4 text-gray-900 hover:text-secondary md:p-0 rounded md:bg-transparent md:text-secondary"
              aria-current="page"
              >Home</a
            >
          </li>
          <li>
            <a
              href="{{ route('admin.products.create') }}"
              class="block py-2 pl-3 pr-4 text-gray-900 hover:text-secondary md:p-0 rounded md:bg-transparent"
              aria-current="page"
              >New Product</a
            >
          </li>
          <li>
            <a
              href="{{ route('admin.products.index') }}"
              class="block py-2 pl-3 pr-4 text-gray-900 hover:text-secondary md:p-0 rounded md:bg-transparent"
              aria-current="page"
              >Products</a
            >
          </li>
          <li>
            <a
              href="{{ route('admin.restaurants.create') }}"
              class="block py-2 pl-3 pr-4 text-gray-900 hover:text-secondary md:p-0 rounded md:bg-transparent"
              aria-current="page"
              >New Restaurant</a
            >
          </li>
          <li>
            <a
              href="{{ route('admin.restaurants.index') }}"
              class="block py-2 pl-3 pr-4 text-gray-900 hover:text-secondary md:p-0 rounded md:bg-transparent"
              aria-current="page"
              >Restaurants</a
            >
          </li>
        </ul>
      </div>
      <div>
        <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" type="button" class="hover:text-secondary">Profile</button>
            <!-- Dropdown menu -->
            <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit profile</a></li>
                    <li>
                  <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button>Logout</button>

                </form>
                </ul>
            </div>
      </div>
    </div>
    <!-- <div
      class="h-12 bg-primary text-center"
      :style="{ opacity: calculatedOpacity }"
    >
      DEVO APPARIRE ALLO SCROLL
    </div> -->
  </nav>