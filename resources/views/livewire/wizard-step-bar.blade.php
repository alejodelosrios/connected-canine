 <div class="px-3 pt-3 text-right bg-white border fixed-bottom d-flex justify-content-between">
     <div>
         @if ($step > 1)
             <a href="{{ route('wizard.profile', $step - 1) }}" class="btn btn-outline-primary text-uppercase">
                 Previous
             </a>
         @endif
     </div>

     <div>
         <a wire:click="next" class="btn btn-primary text-uppercase">
             {{ __('Next') }}
         </a>
     </div>
 </div>
