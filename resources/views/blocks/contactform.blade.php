<section>
    <div class="grid max-w-screen-xl px-4 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <!-- Colonna di testo e contatti -->
        <div class="lg:col-span-5 lg:pr-8">
            <p class="mb-6 font-light text-gray-500 md:text-lg lg:text-xl dark:text-gray-400">{{ $block['data']['short_text'] }}</p>

            @foreach($block['data']['contacts'] as $contact)
                <div class="flex items-center mt-4 space-x-2 font-light text-gray-500">
                    <x-icon name="{{ $contact['icon'] }}" class="flex-shrink-0 inline-block w-4 h-4"/><span>{{ $contact['text'] }}</span>
                </div>
            @endforeach
        </div>

        <!-- Colonna del form -->
        <div class="lg:col-span-7 lg:pl-8">
            <div class="grid grid-cols-1 gap-6">
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
                <div class="mb-5">
                    <textarea placeholder="Your Message"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-md outline-none placeholder:text-gray-800 dark:text-white dark:placeholder:text-gray-200 dark:bg-gray-900 h-36 focus:ring-4 focus:border-gray-600 ring-gray-100 dark:border-gray-600 dark:focus:border-white dark:ring-0"
                        name="message"></textarea>
                </div>
                <div>
                    <button type="submit"
                        class="w-full py-4 font-semibold text-white transition-colors bg-gray-900 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-offset-2 focus:ring focus:ring-gray-200 px-7 dark:bg-white dark:text-black">Send
                        Message
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
