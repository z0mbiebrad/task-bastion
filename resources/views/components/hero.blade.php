@auth
    <div class="bg-zinc-100 dark:bg-neutral-800 text-black dark:text-white shadow-lg rounded-lg p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold">Welcome to Tasilisk, {{ Auth::user()->name }}!</h1>
        <p class="mt-4 leading-relaxed">
            Your account is now set up, and from now on, all your tasks will be securely linked to your account.
        </p>
        <p class="mt-4 leading-relaxed">
            This means you can <span class="font-semibold">access, manage, and track your tasks from any device</span>, whether you're at home, at work, or on the go. No more losing progress—your tasks stay with you, wherever you are.
        </p>
        <p class="mt-4 leading-relaxed">
            Tasilisk makes it easy to <span class="font-semibold">create, edit, complete, and delete tasks</span>, ensuring you stay organized with minimal effort.
        </p>
        <p class="mt-6 text-lg font-semibold">
            Your tasks are always within reach—let’s get started!
        </p>
    </div>
@else
    <div class="bg-zinc-100 dark:bg-neutral-800 text-black dark:text-white shadow-lg rounded-lg p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold">Welcome to Tasilisk</h1>
        <p class="mt-4 leading-relaxed">
            <span class="font-semibold">Tasilisk is a sleek and simple task tracker</span> designed to keep you organized. Its intuitive interface lets you
            <span class="font-semibold">create, edit, complete, and delete tasks</span> effortlessly—because managing tasks shouldn’t be a task itself.
        </p>
        <p class="mt-4 leading-relaxed">
            Whether you need structure or just appreciate a clean, efficient tool, I hope you find it useful.
        </p>
        <p class="mt-6 text-lg font-semibold">
            Let’s get things done—one task at a time.
        </p>
        </div>
    </div>
@endauth