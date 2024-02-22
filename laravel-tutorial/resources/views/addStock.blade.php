<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('Dashboard') }}
</h2>
</x-slot>

<div class="py-12 px-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="mt-8">
                    <form class="w-10/12 mx-auto md:max-w-md" action="./addStock" method="post">
                        @csrf
                        <div class="mb-8">
                            <label for="name" class="text-sm block">名前</label>
                            <input type="text" id="name" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="名前">
                        </div>
                        <div class="">
                            <label for="other">説明</label>
                            <textarea  id="explanation" cols="30" rows="8" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="説明"></textarea>
                        </div>
                        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
                        <div class="mb-3">
                            <label
                                for="formFile"
                                class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                            >写真</label
                            >
                            <input
                                class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50"
                                type="file"
                                id="file" />
                            <input class="btn btn-blue" type="submit" value="送信する">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>
