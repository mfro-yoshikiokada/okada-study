<x-app-layout>
    <div class="container-fluid">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">
                {{ Auth::user()->name }}さんのカートの中身</h1>
            <p class="text-center">{{ $message ?? '' }}</p><br>
            <div class="">
                @foreach($myCartStocks as $stock)
                    {{$stock->stockId}}<br>
                    {{$stock->userId}}<br>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
