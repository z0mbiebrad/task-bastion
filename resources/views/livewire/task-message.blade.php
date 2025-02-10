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
            class="bg-neutral-200 border text-center p-1 border-neutral-400 text-neutral-700 rounded relative"
            role="alert"
        >
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif
</div>
