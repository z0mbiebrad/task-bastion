<div
    x-data="{
        show: true,
        message: $wire.entangle('message').live,
        key: $wire.entangle('key').live,
        timeout: null,
        }"
    x-init="
        timeout = setTimeout(() => show = false, 6000);

        $watch('key', value => {
            clearTimeout(timeout);
            if (value) {
                show = true;
                timeout = setTimeout(() => show = false, 6000);
            }
        });
    "
>
    @if ($message)
        <div
            x-show="show"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
            role="alert"
        >
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif
</div>
