 {{--{{ $home = true ?? "blur blur-rounded shadow py-2 start-0 end-0 mx-4" : "mt-4 shadow-none w-100 navbar-transparent" }}--}}
<!-- Navbar -->
<nav {{ $attributes->merge(["class" => "top-0 my-3  navbar navbar-expand-lg position-absolute z-index-3 mx-2 mx-xl-0"]) }} >
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
             <ul class="navbar-nav d-flex">
                 {{ $buttons ?? '' }}
             </ul>
         </div>
     </div>
 </nav>
