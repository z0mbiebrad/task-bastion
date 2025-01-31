@if (empty($this->tasks))
    <div class="">
        <h3 class="text-xl text-gray-700 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-700 pb-2">
            You have no tasks yet, {{ Auth::user()->name }}. Add one above!
        </h3>
    </div>
@elseif ($progress === 100)
    <div class="">
        <h3 class="text-xl text-gray-700 dark:text-gray-200 pb-2">
            Way to go! {{ Auth::user()->name }}! You did all your tasks!
        </h3>
    </div>
@elseif ($progress >= 50)
    <div class="">
        <h3 class="text-xl text-gray-700 dark:text-gray-200 pb-2">
            Keep it up! {{ Auth::user()->name }}! You're on your way!
        </h3>
    </div>
@else
    <div class="">
        <h3 class="text-xl text-gray-700 dark:text-gray-200 border-b-2 border-gray-200 dark:border-gray-700 pb-2">
            Get them done, {{ Auth::user()->name }}! You've got this!
        </h3>
    </div>
@endif
