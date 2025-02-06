<div class="text-800 dark:text-gray-100 text-lg leading-relaxed">
    @if($tutorialStep === 1)
        <x-card>
            <x-slot:title>
                Welcome to the tutorial!
            </x-slot:title>
            <x-slot:body1>
                We will go over how you create, complete, edit, and delete a task.
            </x-slot:body1>
            <x-slot:body2>
                Just tap or click the "add a task" box above and start typing to get started.
                </span>
            </x-slot:body2>
        </x-card>
    @elseif($tutorialStep === 2)
        <x-card>
            <x-slot:title>
                Creating a task is easy!
            </x-slot:title>
            <x-slot:body1>
                Once you've entered a task -
                <span class="block text-gray-500 dark:text-gray-400 text-sm italic mt-1">
                    e.g., "Read for 30 minutes" or "Meditate for 10 minutes"
                </span>
                - click the "Create" button!
            </x-slot:body1>
            <x-slot:body2>
                You can optionally add a category or set a schedule.
            </x-slot:body2>
        </x-card>
    @elseif($tutorialStep === 3)
        <x-card>
            <x-slot:title>
                Congratulations!!
            </x-slot:title>
            <x-slot:body1>
                You've made your first task!
                <span class="block text-gray-500 dark:text-gray-400 text-sm italic mt-1">
                    Now lets complete it!
                </span>
            </x-slot:body1>
            <x-slot:body2>
                To mark your task as "completed" simply tap it!
            </x-slot:body2>
        </x-card>
    @elseif($tutorialStep === 4)
        <x-card>
            <x-slot:title>
                You completed your first task!
            </x-slot:title>
            <x-slot:body1>
                There is a progress bar for you to see how far you've come for the day!
                <br>
            </x-slot:body1>
            <x-slot:body2>
                Now lets continue to editing your first task.
                <span class="block text-gray-500 dark:text-gray-400 text-sm italic mt-1">
                    Tap the "Edit Tasks" button to continue.
                </span>
            </x-slot:body2>
        </x-card>
    @elseif($tutorialStep === 5)
        <x-card>
            <x-slot:title>
                That toggles the options for editing and deleting.
            </x-slot:title>
            <x-slot:body1>
                Click the edit button to continue.
            </x-slot:body1>
            <x-slot:body2>
                <span class="font-medium text-gray-800 dark:text-gray-200">
                </span>
            </x-slot:body2>
        </x-card>
    @elseif($tutorialStep === 6)
        <x-card>
            <x-slot:title>
                Lets edit the task!
            </x-slot:title>
            <x-slot:body1>
                You can edit any task at any time.
                <br>
            </x-slot:body1>
            <x-slot:body2>
                 <span class="font-medium text-gray-800 dark:text-gray-200">
                     Lets change one detail just for practice.
                </span>
                <span class="block text-gray-500 dark:text-gray-400 text-sm italic mt-1">
                    Tap the "Edit" button to continue.
                </span>
            </x-slot:body2>
        </x-card>
    @elseif($tutorialStep === 7)
        <x-card>
            <x-slot:title>
                Thats the end of the tutorial!
            </x-slot:title>
            <x-slot:body1>
                The last thing to know is that your currently a "guest" and the only way to ensure your tasks are saved between devices or switching IP addresses is to create an account and login.
            </x-slot:body1>
            <x-slot:body2>
                 <span class="font-medium text-gray-800 dark:text-gray-200">
                     You dont have to create an account, but it is free and guarantees your tasks stay ready for you!
                </span>
                <span class="block text-gray-500 dark:text-gray-400 text-sm italic mt-1">
                    Add more tasks to your list and start using the app!
                </span>
            </x-slot:body2>
        </x-card>
    @endif
</div>
