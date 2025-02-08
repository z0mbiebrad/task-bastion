<div class="bg-gradient-to-tr from-white to-gray-200 shadow-lg rounded-lg p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold text-gray-900">Welcome to Tasilisk</h1>
    <p class="mt-4 text-gray-700 leading-relaxed">
        <span class="font-semibold">Tasilisk is a sleek and simple task tracker</span> designed to keep you organized. Its intuitive interface lets you
        <span class="font-semibold">create, edit, complete, and delete tasks</span> effortlessly—because managing tasks shouldn’t be a task itself.
    </p>
    <p class="mt-4 text-gray-700 leading-relaxed">
        Whether you need structure or just appreciate a clean, efficient tool, I hope you find it useful.
    </p>
    <p class="mt-6 text-lg font-semibold text-gray-900">
        Let’s get things done—one task at a time.
    </p>
    <div class="flex justify-end">
        <button
            @click="$dispatch('set-tutorial-step', [1]); $dispatch('set-tutorial-start')"
            class="mt-6 px-2 py-1 shadow-lg bg-gradient-to-tr from-slate-800 to-slate-600 text-white font-medium rounded-md hover:bg-gray-800 transition duration-300 focus:outline-none focus:ring-2 focus:ring-gray-600"
        >
            Start Tutorial
        </button>
    </div>
</div>
