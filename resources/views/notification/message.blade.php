@if(session()->has('success'))
<div class="bg-green-500 mb-5 text-white p-4 rounded-lg shadow-md transition-opacity duration-500 ease-out"
    id="notification">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <button class="text-sm focus:outline-none" id="closeNotification">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
    </div>
    <p class="text-center">{{session('success')['message']}}</p>
</div>
<script>
    // Automatically close the notification after 5 seconds (5000 milliseconds)
    setTimeout(function () {
        const notification = document.getElementById('notification');
        if (notification) {
            notification.style.opacity = '0';
            setTimeout(function () {
                notification.classList.add('hidden');
            }, 500);
        }
    }, 5000);

    document.getElementById('closeNotification').addEventListener('click', function () {
        // Hide the notification when the close button is clicked
        const notification = document.getElementById('notification');
        if (notification) {
            notification.style.opacity = '0';
            setTimeout(function () {
                notification.classList.add('hidden');
            }, 500);
        }
    });
</script>
@endif