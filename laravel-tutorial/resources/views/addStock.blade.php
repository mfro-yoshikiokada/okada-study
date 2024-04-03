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
                    <form class="w-10/12 mx-auto md:max-w-md" action="./addStock" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-8">
                            <label for="name" class="text-sm block">名前</label>

                            <input type="text" id="name" name="name" value="{{ old("name") }}" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="名前">
                        </div>
                        <div class="mb-8">
                            <label for="fee" class="text-sm block">値段</label>
                            <input type="number" id="fee" name="fee"  value="{{ old('fee') }}" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="値段">
                        </div>
                        <div class="">
                            <label for="other">説明</label>
                            <textarea  id="explanation" name="explanation" cols="30" rows="8" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="説明">{{ old('explanation') }}</textarea>
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
                                value="{{ old('file') }}"
                                type="file"
                                name="file" />
                            <input class="btn btn-blue" id="image" type="submit" value="送信する">
                        </div>
                    </form>
                </div>
{{ var_dump(session()->get('explanation')) }}
            </div>
        </div>
    </div>
</div>
    <script>

        /**
         * Get the URL parameter value
         *
         * @param  name {string} パラメータのキー文字列
         * @return  url {url} 対象のURL文字列（任意）
         */
        function getParam(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
        if (getParam('name') !== null) document.querySelector('#name').insertAdjacentHTML('beforebegin', '<h6 style=" color: red;">※名前を入力して下さい。</h6>');
        if (getParam('fee') !== null) document.querySelector('#fee').insertAdjacentHTML('beforebegin', '<h6 style=" color: red;">※値段を入力して下さい。</h6>');
        if (getParam('explanation') !== null) document.querySelector('#explanation').insertAdjacentHTML('beforebegin', '<h6 style=" color: red;">※説明欄を入力して下さい。</h6>');
        if (getParam('image') !== null) document.querySelector('#image').insertAdjacentHTML('beforebegin', '<h6 style=" color: red;">※写真を入力して下さい。</h6>');
        console.log(old('explanation') );
    </script>

</x-app-layout>
