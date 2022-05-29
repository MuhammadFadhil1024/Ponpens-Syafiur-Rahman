<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Document &raquo; Create
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            There's something wrong !
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                                <ul>
                                    @foreach ($errors->all() as $eror)
                                        <li>{{$eror}}</li>
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                    </div>
                @endif
                <form action="{{route('dashboard.document.store')}}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-s font-bold mb-2">Foto 3X4</label>
                            <label class="block uppercase tracking-wide text-red-700 text-xs font-bold mb-2">Background Merah, Berjas Hitam, Kemeja Putih dan Berkerudung Hitam</label>
                            <input type="file" name="foto" multiple placeholder="Foto 3X4" accept="image" class="block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-text focus:ooutline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-s font-bold mb-2">Foto KTP</label>
                            <input type="file" name="ktp" multiple placeholder="ktp" accept="image" class="block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-text focus:ooutline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-s font-bold mb-2">Surat Pernyataan</label>
                            <label class="block uppercase tracking-wide text-red-700 text-xs font-bold mb-2"  ><a href="#">Link Download Surat Pernyataan</a></label>
                            <input type="file" name="sp" multiple placeholder="Surat Pernyataan" accept="image" class="block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-text focus:ooutline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-s font-bold mb-2">Surat Keterangan</label>
                            <label class="block uppercase tracking-wide text-red-700 text-xs font-bold mb-2"  ><a href="#">Link Download Surat Keterangan</a></label>
                            <input type="file" name="sk" multiple placeholder="Surat Keterangan" accept="image" class="block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-text focus:ooutline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                           <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                                Save
                           </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

