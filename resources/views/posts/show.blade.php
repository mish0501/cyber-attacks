 <div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
         <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
             <h2 class="mb-2 text-xl leading-none text-gray-900 md:text-2xl dark:text-white">
                 <span class="font-semibold">Title:</span> {{ $post->title }}
             </h2>
             <dl>
                 <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                     Content:
                 </dt>
                 <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-300">
                     {!! $post->content !!}
                 </dd>
             </dl>
         </div>
     </div>
 </div>
