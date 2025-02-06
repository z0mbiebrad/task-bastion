{{--<div class="bg-gradient-to-bl from-slate-300 to-blue-50 shadow-lg rounded-lg p-6 max-w-lg mx-auto">--}}
{{--    <h1 class="text-2xl font-bold text-gray-900 border-b border-gray-800 text-center pb-2">--}}
{{--        {{ $title }}--}}
{{--    </h1>--}}
{{--    <p class="mt-4 text-gray-700 leading-relaxed">--}}
{{--        {{ $body1 }}--}}
{{--    </p>--}}
{{--    <p class="mt-4 text-gray-700 leading-relaxed">--}}
{{--        <span class="font-medium text-gray-800 dark:text-gray-200">--}}
{{--            {{ $body2 }}--}}
{{--        </span>--}}
{{--    </p>--}}
{{--</div>--}}
<div class="relative flex flex-col my-6 bg-gradient-to-tr from-white to-gray-200 shadow-lg border border-slate-200 rounded-lg w-11/12 mx-auto">
    <div class="mx-3 mb-0 border-b border-slate-200 pt-3 pb-2 px-1">
    <span class="text-lg text-slate-600 font-medium">
        {{ $title }}
    </span>
    </div>

    <div class="p-4">
        <h5 class="mb-2 text-slate-800 text-xl font-semibold">
            {{ $body1 }}
        </h5>
        <p class="text-slate-600 leading-normal font-medium">
            {{ $body2 }}
        </p>
    </div>
</div>
