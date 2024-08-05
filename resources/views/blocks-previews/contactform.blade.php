<section class="bg-white dark:bg-gray-900">
    <div
        class="grid px-4 pt-8 pb-16 mx-auto max-w-7xl sm:px-6 lg:px-8 md:grid-cols-2 lg:grid-cols-2 gap-y-8 md:gap-x-8 md:gap-y-8 lg:gap-x-8 lg:gap-y-16">
        <div>

            <p class="max-w-sm mt-4 mb-4 dark:text-gray-400">{{ $short_text }}</p>
            @foreach($contacts as $contact)
            <div class="flex items-center mt-8 space-x-2 text-dark-600 dark:text-gray-400">
                <x-icon name="{{ $contact['icon'] }}" class="flex-shrink-0 inline-block w-4 h-4"/><span>{{ $contact['text'] }}</span>
            </div>
            @endforeach
        </div>
        <div>
            <div class="mb-5">
                <input type="text" placeholder="Full Name" autocomplete="false"
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-md outline-none placeholder:text-gray-800 dark:text-white dark:placeholder:text-gray-200 dark:bg-gray-900 focus:ring-4 focus:border-gray-600 ring-gray-100 dark:border-gray-600 dark:focus:border-white dark:ring-0"
                    name="name">
            </div>
            <div class="mb-5">
                <label for="email_address" class="sr-only">Email Address</label>
                <input id="email_address" type="email" placeholder="Email Address" autocomplete="false"
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-md outline-none placeholder:text-gray-800 dark:text-white dark:placeholder:text-gray-200 dark:bg-gray-900 focus:ring-4 focus:border-gray-600 ring-gray-100 dark:border-gray-600 dark:focus:border-white dark:ring-0"
                    name="email">
            </div>
            <div class="mb-3">
                <textarea placeholder="Your Message"
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-md outline-none placeholder:text-gray-800 dark:text-white dark:placeholder:text-gray-200 dark:bg-gray-900 h-36 focus:ring-4 focus:border-gray-600 ring-gray-100 dark:border-gray-600 dark:focus:border-white dark:ring-0"
                    name="message">
                </textarea>
            </div>
            <button type="submit"
                class="w-full py-4 font-semibold text-white transition-colors bg-gray-900 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-offset-2 focus:ring focus:ring-gray-200 px-7 dark:bg-white dark:text-black ">Send
                Message
            </button>
        </div>
    </div>
  </section>
