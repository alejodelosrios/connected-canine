 <!-- Navbar -->
 <nav class="mt-4 shadow-none -3 tPop-0 navbar navbar-expand-lg position-absolute z-index-3 w-100 navbar-transparent">
     <div class="container">
         <x-logo-brand/>
         <button class="shadow-none navbar-toggler ms-2" type="button" data-bs-toggle="collapse"
             data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
             aria-label="Toggle navigation">
             <span class="mt-2 navbar-toggler-icon">
                 <span class="navbar-toggler-bar bar1"></span>
                 <span class="navbar-toggler-bar bar2"></span>
                 <span class="navbar-toggler-bar bar3"></span>
             </span>
         </button>
         <div class="pt-3 pb-2 collapse navbar-collapse w-100 py-lg-0" id="navigation">
             <div class="mx-auto">
                 {{ $navlink ?? '' }}
             </div>
             <ul class="navbar-nav d-lg-block d-none">
                 <li class="nav-item">
                     <a href="https://www.creative-tim.com/product/soft-ui-dashboard-pro"
                         class="mb-0 btn btn-sm bg-gradient-primary btn-round me-1"
                         onclick="smoothToPricing('pricing-soft-ui')">Buy Now</a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
