<button @click="darkMode=!darkMode" type="button" title="{{ __('Theme style') }}"
        class="relative inline-flex flex-shrink-0 h-6 mr-5 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer bg-gray-100 dark:bg-gray-900 w-11"
        role="switch" aria-checked="false">
    <span class="sr-only">Theme toggle</span>
    <span
        class="relative inline-block w-5 h-5 transition duration-500 ease-in-out transform translate-x-0 rounded-full pointer-events-none dark:translate-x-5 ring-0">
      <span
          class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity duration-500 ease-in opacity-100 dark:opacity-0 dark:duration-100 dark:ease-out"
          aria-hidden="true">
         <x-svg svg="sun-filled" class="text-yellow-400 w-5 h-5"/>
      </span>
      <span
          class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity duration-100 ease-out opacity-0 dark:opacity-100 dark:duration-200 dark:ease-in"
          aria-hidden="true">
         <x-svg svg="moon-filled" class="text-yellow-500 w-5 h-5"/>
      </span>
   </span>
</button>
