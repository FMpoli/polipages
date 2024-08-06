<section>
    <div class="grid max-w-screen-xl px-4 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <!-- Colonna di testo e contatti -->
        <div class="lg:col-span-5 lg:pr-8">
            <p class="mb-6 font-light text-gray-500 md:text-lg lg:text-xl dark:text-gray-400">{{ $block['data']['short_text'] }}</p>

            @foreach($block['data']['contacts'] as $contact)
                <div class="flex items-center mt-4 space-x-2 font-light text-gray-500">
                    <x-icon name="{{ $contact['icon'] }}" class="flex-shrink-0 inline-block w-4 h-4 mr-2"/><span>{{ $contact['text'] }}</span>
                </div>
            @endforeach
        </div>

        <!-- Colonna del form -->
        <div class="lg:col-span-7 lg:pl-8">
            <form action="{{ route('page.sendmail') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6 ">
                    <div class="mb-5">
                        <input type="text" placeholder="Full Name" autocomplete="false"
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-md outline-none placeholder:text-gray-800 dark:text-white dark:placeholder:text-gray-200 dark:bg-gray-900 focus:ring-4 focus:border-gray-600 ring-gray-100 dark:border-gray-600 dark:focus:border-white dark:ring-0"
                            name="name" required>
                    </div>
                    <div class="mb-5">
                        <label for="from" class="sr-only">Email Address</label>
                        <input id="from" type="email" placeholder="Email Address" autocomplete="false"
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-md outline-none placeholder:text-gray-800 dark:text-white dark:placeholder:text-gray-200 dark:bg-gray-900 focus:ring-4 focus:border-gray-600 ring-gray-100 dark:border-gray-600 dark:focus:border-white dark:ring-0"
                            name="from" required>
                    </div>
                    <div class="mb-5">
                        <textarea placeholder="Your Message"
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-md outline-none placeholder:text-gray-800 dark:text-white dark:placeholder:text-gray-200 dark:bg-gray-900 h-36 focus:ring-4 focus:border-gray-600 ring-gray-100 dark:border-gray-600 dark:focus:border-white dark:ring-0"
                            name="message" required></textarea>
                    </div>
                    <div class="hidden">
                        <input type="text" name="subject" id="subject" value="{{ $block['data']['subject'] }}" hidden />
                        <input type="text" name="send_to" id="send_to" value="{{ $block['data']['send_to'] }}" hidden />
                    </div>
                    <div class="mb-5 font-light prose prose-xl text-gray-500 max-w-none md:text-lg lg:text-sm dark:text-gray-400">
                        <input type="checkbox" id="consent" name="consent" required>
                        <label for="consent">
                            I hereby consent to the use and circulation of the information inserted in the present form as stipulated by EU Regulation 679/2016 and I declare to have read and understood the privacy statement published at the <a href="/privacy" class="text-blue-600 underline">Privacy page</a>.
                        </label>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full py-4 font-semibold text-white transition-colors bg-gray-900 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-offset-2 focus:ring focus:ring-gray-200 px-7 dark:bg-white dark:text-black">Send
                            Message
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
