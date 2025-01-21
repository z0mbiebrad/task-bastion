@if (session()->has("update-message"))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-init="setTimeout(() => show = false, 6000)" 
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
        role="alert"
    >
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('message') }}</span>
    </div>
@endif