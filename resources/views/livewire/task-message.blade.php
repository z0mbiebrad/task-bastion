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
            class="relative p-1 text-center border rounded bg-zinc-200 border-zinc-400 text-zinc-700"
            role="alert"
        >
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif
</div>
