<x-app-layout>
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
<div class="py-12 px-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <div class="mt-8">
                        <div class="mb-8">
                        <form class="w-10/12 mx-auto md:max-w-md" action="../../detail/delete/{{ $stack["id"] }}" method="get" enctype="multipart/form-data">
                            <input class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 m-2 rounded delete" id="button" onclick="DeletePageClick();" type="submit" value="ページごと削除する">
                        </form>
                    </div>
                    <form class="w-10/12 mx-auto md:max-w-md" action="../../detail/update/{{ $stack["id"] }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-8">
                            <label for="name" class="text-sm block">名前</label>

                            <input type="text" id="name" name="name"
                                   value="{{ $stack["name"] }}" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="名前">
                        </div>
                        <div class="mb-8">
                            <label for="genre" class="text-sm block">ジャンル</label>
                            <select name="genre" id="genre">
                                <option value="electrical-products" value="{{ $stack["genre"] }}">電気製品</option>
                                <option value="antique">骨董品</option>
                                <option value="parts">部品</option>
                                <option value="drink">飲み物</option>
                                <option value="food">食品</option>
                                <option value="tool">道具</option>
                                <option value="instrument">楽器</option>
                                <option value="other">その他</option>
                            </select>
                        </div>
                        <div class="mb-8">
                            <label for="fee" class="text-sm block">値段</label>
                            <input type="number" id="fee" name="fee"  value="{{ $stack["fee"] }}" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="値段">
                        </div>
                        <div class="mb-8">
                            <label for="other">説明</label>
                            <textarea  
                            id="explanation" 
                            name="explanation" 
                            cols="30" 
                            rows="8" 
                            class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" 
                            placeholder="説明"
                            >{{ $stack["explain"] }}</textarea>
                        </div>
                        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
                        <div class="mb-8">
                            <label
                                for="formFile"
                                class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                            >メイン写真 (jpeg,png,jpg 形式のみ)</label>
                            <img id="file-img" src="/laravel-tutorial/public/image/{{  $stack["imagePath"] }}">
                            <input
                                class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50"
                                value="/laravel-tutorial/public/image/{{ $stack["imagePath"] }}"
                                accept=".jpeg,.png,.jpg"
                                type="file"
                                name="file"
                                id="file"
                            />
                        </div>
                        <div class="mb-8">
                            <label
                                for="formFile"
                                class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                            >サブ写真 (jpeg,png,jpg 形式のみ３枚まで)</label>

                            <img id="sub-file-1-img" {{ isset($subImages[0]->imagePath) ? 'src=/laravel-tutorial/public/image/'.$subImages[0]->imagePath : '' }}>
                            <input type="button" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 m-2 rounded delete" onclick="DeleteClick1();" value="削除する">
                            <input
                                class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50"
                                accept=".jpeg,.png,.jpg"
                                value="{{ old('sub-file-1') }}"
                                type="file"
                                name="sub-file-1"
                                id="sub-file-1"
                            />
                            <input type="hidden" id="sub-file-1-delete" value="Active">
                            <input type="hidden" name="sub-file-3-delete" value="Active">

                            <img id="sub-file-2-img" {{ isset($subImages[1]->imagePath) ? 'src=/laravel-tutorial/public/image/'.$subImages[1]->imagePath : '' }}>
                            <input type="button" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 m-2 rounded delete" onclick="DeleteClick2();" value="削除する">
                            <input
                                class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50"
                                accept=".jpeg,.png,.jpg"
                                value="{{ old('sub-file-2') }}"
                                type="file"
                                name="sub-file-2"
                                id="sub-file-2"
                            />


                            <img id="sub-file-3-img" {{ isset($subImages[2]->imagePath) ? 'src=/laravel-tutorial/public/image/'.$subImages[2]->imagePath : '' }}>
                            <input type="hidden" id="sub-file-3-delete" value="Active">
                            <input type="button" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 m-2 rounded delete" onclick="DeleteClick3();" value="削除する">
                            <input
                                class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50"
                                accept=".jpeg,.png,.jpg"
                                value="{{ old('sub-file-3') }}"
                                type="file"
                                name="sub-file-3"
                                id="sub-file-3"
                            />


                            <div id="button">
                                <input class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 m-2 rounded" id="button" type="submit" value="送信する">
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function DeleteClick1() {
            const element = document.getElementById("sub-file-1-img");
            element.insertAdjacentHTML('beforebegin','<input type="hidden" id="sub-file-1-delete" name="sub-file-1-delete" value="Active">');
            element.setAttribute('src', '');
        }
        function DeleteClick2() {
            const element = document.getElementById("sub-file-2-img");
            element.insertAdjacentHTML('beforebegin','<input type="hidden" id="sub-file-2-delete" name="sub-file-2-delete" value="Active">');
            element.setAttribute('src', '');
        }
        function DeleteClick3() {
            const element = document.getElementById("sub-file-3-img");
            element.insertAdjacentHTML('beforebegin','<input type="hidden" id="sub-file-3-delete" name="sub-file-3-delete" value="Active">');
            element.setAttribute('src', '');
        }
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
        function DeletePageClick() {
        const result = confirm('次の処理を続けますか？');
            if(result) {
                
            }
        }

        function  errorOutput(regName, error, selecter) {
            let testReg = new RegExp(regName);
            let selector = "#" + selecter;
            let test = testReg.test(error);
            if (test) document.querySelector(selector).insertAdjacentHTML('beforebegin', '<h6 style=" color: red;">' + error +'</h6>');
        }
        const errors =  @json($errors->all());
        const selectorNames = ["name", "fee", "explanation","file"];
        const regName = ["名前","値段","説明欄","写真"]
        regName.forEach((name, num) => {
            errors.forEach(function(err) {
                errorOutput(name , err, selectorNames[num]);
            });
        });

    </script>
    <script>

        document.querySelector('#file').addEventListener('change', (event) => {
            const file = event.target.files[0];
            const reader = new FileReader();
            if (!file) return
            reader.onload = (event) => {
                document.querySelector('#file-img').src = event.target.result
            }
            reader.readAsDataURL(file)
        })

        document.querySelector('#sub-file-1').addEventListener('change', (event) => {
            const file = event.target.files[0]
            if (!file) return
            const reader = new FileReader();
            reader.onload = (event) => {
                document.querySelector('#sub-file-1-img').src = event.target.result;
            }
            reader.readAsDataURL(file);
            let element = document.getElementById("sub-file-1-delete");
            element.remove();
            
        })
        document.querySelector('#sub-file-2').addEventListener('change', (event) => {
            const file = event.target.files[0]
            if (!file) return
            const reader = new FileReader();
            reader.onload = (event) => {
                document.querySelector('#sub-file-2-img').src = event.target.result
            }
            reader.readAsDataURL(file);
            let element = document.getElementById("sub-file-2-delete");
            element.remove();
        })
        document.querySelector('#sub-file-3').addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (!file) return
            const reader = new FileReader();
            reader.onload = (event) => {
                document.querySelector('#sub-file-3-img').src = event.target.result
            }
            reader.readAsDataURL(file);
            let element = document.getElementById("sub-file-3-delete");
            element.remove();
        })
    </script>
    <script>
       
        let subFile1 = {{ isset($subImages[1]->imagePath) ? $subImages[1]->imagePath : '' }};
        let subFile2 = {{ isset($subImages[2]->imagePath) ? $subImages[2]->imagePath : '' }};
        let subFile3 = {{ isset($subImages[3]->imagePath) ? $subImages[3]->imagePath : '' }};


    </script>

</x-app-layout>
