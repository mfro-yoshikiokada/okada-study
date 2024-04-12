<x-app-layout>
    <div class="py-12 px-3">
        <style>
            #sub-file-img {
                width: 100%;
                display: flex;
                flex-wrap: wrap;
            }
            .sub-img {
                max-width: 50%;
                padding: 2px;
                object-fit: cover;
            }
            .delete {
                background-color: rgb(248 113 113);
            }
            .delete:hover {
                background-color: rgb(185 28 28);
            }
        </style>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="mt-8">
                    
                    <div id="button">
                        <input class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 m-2 rounded" id="button" type="submit" value="編集する">
                        <input class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 m-2 rounded delete" id="button2" type="submit" onclick="DeleteClick();"value="削除する">
                    </div>
                    <form class="w-10/12 mx-auto md:max-w-md" action="./addStock" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <h1>{{ $stack["name"] }}</h1>
                        </div>
                        <div class="mb-8">
                            <h2>{{ $stack["fee"] }}円</h2>
                        </div>
                        <div class="mb-8">
                            <img src="/laravel-tutorial/public/image/{{ $stack["imagePath"] }}" alt="">
                            @foreach($subImages as $subImage)
                                <img src="/laravel-tutorial/public/image/{{ $subImage["imagePath"] }}" alt="">
                            @endforeach
                        </div><div class="mb-8">
                            <h3>ジャンル : {{$genre[$stack["genre"]]}}</h3>
                        </div>
                        <div class="mb-8">
                            <h3>{{ $stack["explain"] }}</h3>
                        </div>
                        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function DeleteClick () {
            const result = confirm('次の処理を続けますか？');
            const id = {{ $stack["id"] }}
            if(result) {
                window.location.href = `./delete/${id}`;
            }
        }
    </script>
</x-app-layout>
