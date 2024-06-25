@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="fixed bottom-0 right-0 mb-4 mr-4 p-2 bg-red-500 text-white font-bold rounded-lg shadow-md transition-all transform duration-700 ease-in-out alert"
             role="alert">
            <div class="flex items-center justify-between">
                <div class=" flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                    </svg>
                    <p class="mb-0.5 ml-0.5 font-semibold animate-pulse">{{ $error }}</p>
                </div>
                <button class="close-alert a">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         class="h-6 w-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="fixed bottom-0 right-0 mb-4 mr-4 p-2 bg-green-500 text-white font-bold rounded-lg shadow-md transition-all transform duration-700 ease-in-out alert"
         role="alert">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <svg class="fill-current h-6 w-6 text-white mr-2 animate-bounce" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <path d="M2 10a8 8 0 1 0 16 0 8 8 0 0 0-16 0zm9-3h2v6H9V7zm0 8h2v2H9v-2z"/>
                </svg>
                <p class="font-semibold animate-pulse">{{ session('success') }}</p>
            </div>
            <button class="close-alert">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     class="h-6 w-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="fixed bottom-0 right-0 mb-4 mr-4 p-2 bg-red-500 text-white font-bold rounded-lg shadow-md transition-all transform duration-700 ease-in-out alert"
         role="alert">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <svg class="fill-current h-6 w-6 text-white mr-2 animate-bounce" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <path d="M2 10a8 8 0 1 0 16 0 8 8 0 0 0-16 0zm9-3h2v6H9V7zm0 8h2v2H9v-2z"/>
                </svg>
                <p class="font-semibold animate-pulse">{{ session('error') }}</p>
            </div>
            <button class="close-alert">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     class="h-6 w-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
@endif


<style>
    .alert {
        transition: opacity 0.5s ease-in-out;
        opacity: 0;
    }

    .alert.show {
        opacity: 1;
    }
</style>

<script>
    window.onload = function () {
        var alerts = document.querySelectorAll('.alert');
        var closeButtons = document.querySelectorAll('.close-alert');

        alerts.forEach(function (alert, index) {
            setTimeout(function () {
                alert.classList.add('show');
            }, 100);

            setTimeout(function () {
                alert.classList.remove('show');
            }, 5000);

            closeButtons[index].onclick = function () {
                alert.classList.remove('show');
            };
        });
    };

    document.addEventListener('DOMContentLoaded', function () {
        var closeButtons = document.querySelectorAll('.close-alert');

        closeButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var alert = this.parentElement.parentElement;
                alert.style.opacity = '0';

                setTimeout(function () {
                    alert.style.display = 'none';
                }, 500);
            });
        });
    });
</script>
