<footer class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap md:text-left text-center order-first">
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">PAGES</h2>
                <nav class="list-none mb-10">
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Home</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">About</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Blog</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Contact</a>
                    </li>
                </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CATEGORIES</h2>
                <nav class="list-none mb-10">
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Nutrition and Healthy Eating</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Fitness and Exercise</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Mental Health and Well-being</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Healthy Lifestyle Tips</a>
                    </li>
                </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">USEFUL LINKS</h2>
                <nav class="list-none mb-10">
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Provicy Policy</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-800">Site Map</a>
                    </li>
                </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">SUBSCRIBE</h2>
                <div class="flex xl:flex-nowrap md:flex-nowrap lg:flex-wrap flex-wrap justify-center items-end md:justify-start">
                    <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2">
                        <label for="footer-field" class="leading-7 text-sm text-gray-600">Placeholder</label>
                        <input type="text" id="footer-field" name="footer-field" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <button class="lg:mt-2 xl:mt-0 flex-shrink-0 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                </div>
                <p class="text-gray-500 text-sm mt-2 md:text-left text-center">Bitters chicharrones fanny pack
                    <br class="lg:block hidden">waistcoat green juice
                </p>
            </div>
        </div>
    </div>
    <div class="bg-gray-100">
        <div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <img class="w-12" src="./images/logo.jpg" alt="">
                <span class="ml-3 text-xl">Healthy Life</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-6 sm:mt-0 mt-4">©
                <span id="year"></span> Asif Abir —
                <a href="https://twitter.com/AsifAbir15" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@AsifAbir15</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-500">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a class="ml-3 text-gray-500">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a class="ml-3 text-gray-500">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a class="ml-3 text-gray-500">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
            </span>
        </div>
    </div>
</footer>
<script>
    const year = document.getElementById("year");
    const d = new Date();
    year.innerHTML = d.getFullYear();
</script>

</body>

</html>